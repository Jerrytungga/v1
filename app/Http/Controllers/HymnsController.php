<?php

namespace App\Http\Controllers;

use App\Models\Hymns;
use Illuminate\Http\Request;

class HymnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Trainee.content.Hymns.index', [
            "title" => "My Hymns",
            'entrys' => Hymns::orderBy('created_at', 'DESC')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Trainee.content.Hymns.create', [
            "title" => "Add Hymns",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = Hymns::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 1) {
                return redirect()->route('Hymns.index')->with('error', 'You have entered data 1 times today');
            }
        // Pengecekan form input
        $request->validate([
            'nip' => 'required|string',
            'asisten' => 'required|string',
            'kidung' => 'required|string',
            'stanza' => 'required|string', 
            'frase' => 'required|string', 
        ]);

        Hymns::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'no_Hymns' => $request->kidung,
            'stanza' => $request->stanza,
            'frase' => $request->frase,
           
        ]);
        return redirect()->route('Hymns.index')->with('success', 'Input Hymns successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

          // Pengambilan data berdasarkan id
          $hymns = Hymns::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
          // Ke halaman form edit data
          return view('Trainee.content.Hymns.edit', [
              "title" => "Edit Hymns",
              "hymns" => $hymns // Kirim data ke view
          ]);
    }

  
    public function update(Request $request, string $id)
    {
        // Validasi input
       $request->validate([
        'kidung' => 'required|string',
        'number' => 'required|string',
        'frase' => 'required|string',
    
    ]);

    // Temukan data berdasarkan ID
    $hymns = Hymns::findOrFail($id);
    $hymns->no_Hymns = $request->kidung;
    $hymns->stanza = $request->number;
    $hymns->frase = $request->frase; // Menyimpan jenis kitab

    // Simpan perubahan
    $hymns->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('Hymns.index')->with('success', 'Hymns updated successfully!');

    }

 
}
