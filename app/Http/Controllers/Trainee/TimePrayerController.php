<?php

namespace App\Http\Controllers\Trainee;

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
        //
        $nipTrainee = Session::get('nip');
        return view('Trainee.content.fiveTimesPrayer.index', [
            "title" => "5 Times Prayer",
            'entrys' => timeprayer::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
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
            "title" => "Add 5 Times Prayer",
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
        $entryCount = timeprayer::whereDate('created_at', $today)->count();
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
        $semester = Session::get('semester');
        timeprayer::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'poin_prayer' => $request->doa,
            'semester' => $semester,
           
        ]);
        return redirect()->route('fiveTimesPrayer.index')->with('success', 'Input 5 Time Prayer successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $data = timeprayer::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

        return view('Trainee.content.fiveTimesPrayer.edit', [
            "title" => "Edit 5 Time Prayer",
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

}