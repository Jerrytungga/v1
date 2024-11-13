<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Fellowship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FellowshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
        //
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the current week (Monday)
        $endOfWeek = Carbon::now()->endOfWeek(); // End of the current week (Sunday)
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        $entrys = Fellowship::where('nip', $nipTrainee)
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->orderBy('created_at', 'DESC')
        ->take(4) // Limit to 4 records
        ->get();

        $noDataMessage = $entrys->isEmpty() ? 'No data found for this week' : null;

        return view('Trainee.content.fellowship.index', [
            "title" => "Fellowship",
            'entrys' => $entrys,
            'name_asisten' => $nama_asisten,
            'noDataMessage' => $noDataMessage, // Pass the no data message
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.fellowship.create', [
            "title" => "Fellowship",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nipTrainee = Session::get('nip');
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = Fellowship::whereDate('created_at', $today)
                                ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                                ->count();
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 4) {
                return redirect()->route('fellowship.index')->with('error', 'You have entered data 4 times today');
            }
        // Pengecekan form input
        $request->validate([
             'nip' => 'required|string',
              'asisten' => 'required|string',
              'name' => 'required|string',
              'topic' => 'required|string',
              'Notes' => 'required|string',
              'action' => 'required|string',
        ]);
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');
        Fellowship::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'asisten_trainer' => $request->name,
            'topic' => $request->topic,
            'notes_trainee' => $request->Notes,
            'action' => $request->action,
            'semester' => $semester,
            'week' => $weekly->Week,
           
        ]);
        return redirect()->route('fellowship.index')->with('success', 'Input Fellowship successfully!');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          //Mengambil id untuk edit data
          $data = Fellowship::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
          // kembali ke view
          return view('Trainee.content.fellowship.edit', [
            "title" => "Fellowship",
              "data" => $data // Kirim data ke view
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'topic' => 'required|string',
            'Notes' => 'required|string',
            'action' => 'required|string',
        ]);

         // Temukan data berdasarkan ID
        $data = Fellowship::findOrFail($id);
        $data->asisten_trainer = $request->name;
        $data->topic = $request->topic;
        $data->notes_trainee = $request->Notes; // Menyimpan jenis kitab
        $data->action = $request->action; // Menyimpan jenis kitab

        // Simpan perubahan
        $data->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('fellowship.index')->with('success', 'Fellowship updated successfully!');
    }


  

        public function filterWeek(Request $request)
        {
            $selectedWeek = $request->input('week');
            $selectsemester = $request->input('semester');
            $nipTrainee = Session::get('nip');
            // Query dasar
            $query = Fellowship::where('semester', $selectsemester)
                                ->where('nip', $nipTrainee);
        
            // Tambahkan kondisi untuk week jika ada nilai
            if (!empty($selectedWeek)) {
                $query->where('week', $selectedWeek);
            }
        
            // Ambil data sesuai filter
            $entrys = $query->orderBy('week', 'ASC')->get();
        
            // Pesan jika tidak ada data ditemukan
            $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;
        
            // Return view dengan hasil yang sudah difilter
            return view('Trainee.content.fellowship.index', [
                "title" => "Fellowship",
                'entrys' => $entrys,
                'smt' => $selectsemester,
                'noDataMessage' => $noDataMessage
            ]);
        }
        
}
