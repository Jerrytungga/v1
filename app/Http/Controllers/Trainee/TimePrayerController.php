<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Poindaily;
use App\Models\timeprayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TimePrayerController extends Controller
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
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        $nipTrainee = Session::get('nip');
        $ambil_minggu = Weekly::where('status', 'active')->first();
        $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
        $weekly = Weekly::all();
        return view('Trainee.content.fiveTimesPrayer.index', [
            "title" => "5 Times Prayer",
            'name_asisten' => $nama_asisten,
            'entrys' => timeprayer::where('nip', $nipTrainee)
            ->where('week', $dapat_minggu)
            ->orderBy('created_at', 'DESC')
            ->get(),
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
        return view('Trainee.content.fiveTimesPrayer.create', [
            "title" => "5 Times Prayer",
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
        $entryCount = timeprayer::whereDate('created_at', $today)
                                ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                                ->count();
       
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 5) {
                return redirect()->route('fiveTimesPrayer.index')->with('error', 'You have entered data 5 times today');
            }
        // Pengecekan form input
        $request->validate([
            'nip' => 'required|string',
            'asisten' => 'required|string',
            'doa' => 'required|string',
        ]);
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');
        $ambil_poin = Poindaily::where('semester', $semester)->first();
        $poin = $ambil_poin ? $ambil_poin->five_times_prayer : null;
        if ($weekly) {
        timeprayer::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'poin_prayer' => $request->doa,
            'semester' => $semester,
            'week' => $weekly->Week,
            'poin' => $poin,
           
        ]);
        return redirect()->route('fiveTimesPrayer.index')->with('success', 'Input 5 Time Prayer successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('fiveTimesPrayer.index')->with('error', 'No active week found, cannot process input.');
        }
    }

    public function edit(string $id)
    {
        //
        $data = timeprayer::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.fiveTimesPrayer.edit', [
            "title" => "5 Times Prayer",
            "data" => $data // Kirim data ke view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
            // Validasi input
       $request->validate([
        'doa' => 'required|string',
        ]);

        // Temukan data berdasarkan ID
        $data = timeprayer::findOrFail($id);
        $data->poin_prayer = $request->doa;

        // Simpan perubahan
        $data->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('fiveTimesPrayer.index')->with('success', '5 Times Prayer updated successfully!');
    }

    public function fiveTimesPrayerFil(Request $request)
    {
        // Mengambil input dari form filter (minggu dan semester)
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip');

        // Query dasar untuk mengambil data Fellowship
        $query = timeprayer::where('semester', $selectsemester)
                            ->where('nip', $nipTrainee);

        // Menambahkan filter untuk minggu jika ada nilai minggu yang dipilih
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }

        // Mengambil data berdasarkan filter
        $entrys = $query->orderBy('week', 'ASC')->get();

        $id_asisten = Session::get('asisten');
        $weekly = Weekly::all();
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        return view('Trainee.content.fiveTimesPrayer.index', [
            "title" => "5 Times Prayer",
            "entrys" => $entrys,
            'name_asisten' => $nama_asisten,
            'weekly' => $weekly,
            'smt' => $selectsemester,
            'week' => $selectedWeek,
        ]);

    }
}
