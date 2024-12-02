<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Script;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Poindaily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PameranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        //menampilkan data awal
        $nipTrainee = Session::get('nip');
        $ambil_minggu = Weekly::where('status', 'active')->first();
        $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
        
        $entrys = Script::where('nip', $nipTrainee)
        ->where('week', $dapat_minggu)
        ->orderBy('created_at', 'DESC')
        ->take(2) // Limit to 4 records
        ->get();
        $weekly = Weekly::all();
        $noDataMessage = $entrys->isEmpty() ? 'No data found for this week' : null;
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        return view('Trainee.content.pameran.index',[
            'title' => 'Script',
            'entrys' => $entrys,
            'name_asisten' => $nama_asisten,
            'noDataMessage' => $noDataMessage,
            'weekly' => $weekly,
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
        return view('Trainee.content.pameran.create', [
            'title' => 'Script',
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
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        // Mendapatkan tanggal mulai dan akhir minggu ini (Senin hingga Minggu)
      $startOfWeek = Carbon::now()->startOfWeek();  // Tanggal mulai minggu ini (Senin)
      $endOfWeek = Carbon::now()->endOfWeek();  // Tanggal akhir minggu ini (Minggu)
      $nipTrainee = Session::get('nip');
      // Menghitung jumlah entri yang dibuat dalam minggu ini
      $entryCount = Script::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                            ->count();

      // Memeriksa apakah sudah ada 2 entri dalam minggu ini
      if ($entryCount >= 2) {
          return redirect()->route('pameran.index')->with('error', 'You have already entered data 2 times this week');
      }

      $request->validate([
        'nip' => 'required|string',
        'asisten' => 'required|string',
        'script' => 'required|string',
        'topic' => 'required|string',
        'verse' => 'required|string',
        'Truth' => 'required|string',
        'Experience' => 'required|string',
      ]);
      
      $weekly = Weekly::where('status', 'active')->first();
      $semester = Session::get('semester');
      $ambil_poin = Poindaily::where('semester', $semester)->first();
      $poin = $ambil_poin ? $ambil_poin->script_ts_exhibition : null;
      if ($weekly) {
      Script::create([
        'nip' => $request->nip,
        'asisten_id' => $request->asisten,
        'script' => $request->script,
        'Topic' => $request->topic,
        'verse' => $request->verse,
        'Truth' => $request->Truth,
        'Experience' => $request->Experience,
        'semester' => $semester,
        'week' => $weekly->Week,
        'poin_verse' => $poin,
        'poin_truth' => $poin,
        'poin_experience' => $poin,
      ]);

      return redirect()->route('pameran.index')->with('success', 'Input script successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('pameran.index')->with('error', 'No active week found, cannot process input.');
        }
      
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         //Mengambil id untuk edit data
         $data = Script::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
         // kembali ke view
         return view('Trainee.content.pameran.edit', [
           'title' => 'Script',
             "data" => $data // Kirim data ke view
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'script' => 'required|string',
            'topic' => 'required|string',
            'verse' => 'required|string',
            'Truth' => 'required|string',
            'Experience' => 'required|string',
        
        ]);
    
        // Temukan data berdasarkan ID
        $data = Script::findOrFail($id);
        $data->script = $request->script;
        $data->Topic = $request->topic;
        $data->verse = $request->verse; // Menyimpan jenis kitab
        $data->Truth = $request->Truth; // Menyimpan jenis kitab
        $data->Experience = $request->Experience; // Menyimpan jenis kitab
    
        // Simpan perubahan
        $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pameran.index')->with('success', 'Script updated successfully!');
    }


    public function filterWeek(Request $request)
    {
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip');
        // Query dasar
        $query = Script::where('semester', $selectsemester)
                            ->where('nip', $nipTrainee);
    
        // Tambahkan kondisi untuk week jika ada nilai
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }
    
        // Ambil data sesuai filter
        $entrys = $query->orderBy('week', 'ASC')->get();
    
        // Pesan jika tidak ada data ditemukan
        $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;
        $weekly = Weekly::all();
        // Return view dengan hasil yang sudah difilter
        return view('Trainee.content.pameran.index', [
            'title' => 'Script',
            'entrys' => $entrys,
            'smt' => $selectsemester,
            'noDataMessage' => $noDataMessage,
            'week' => $selectedWeek,
            'weekly' => $weekly,
        ]);
    }
    

  
}
