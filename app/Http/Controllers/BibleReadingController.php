<?php

namespace App\Http\Controllers;
use App\Models\BibleReading;
use Illuminate\Http\Request;

class BibleReadingController extends Controller
{
 
    public function index()
    {
        return view('Trainee.content.BibleReading.index', [
            "title" => "Bible Reading",
            'entrys' => BibleReading::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        //
        return view('Trainee.content.biblereading.create', [
            "title" => "Add Bible Reading"
        ]);
      
    }

    public function store(Request $request)
    {
        //
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = BibleReading::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 2 entri
            if ($entryCount >= 2) {
                return redirect()->route('BibleReading.index')->with('error', 'You have entered data 2 times today');
            }
      
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'kitab' => 'required|string|in:Old Testament,New Testament',
            'kitab_pl' => 'required_if:kitab,Old Testament|string', // For Old Testament
            'kitab_pb' => 'required_if:kitab,New Testament|string', // For New Testament
            'verse' => 'required|integer',
            'terang' => 'required|string',
        ]);
        
        $book = $request->kitab === 'Old Testament' ? $request->kitab_pl : $request->kitab_pb;
        BibleReading::create([
            'asisten_id' => $request->asisten,
            'nip' => $request->nip,
            'pl_pb' => $request->kitab,
            'book' => $request->kitab_pl,
            'book' => $book,
            'verse' => $request->verse,
            'phrase_light' => $request->terang,
        ]);
        return redirect()->route('BibleReading.index');

    }
    public function edit(string $id)
    {
        //
        $bibleReading = BibleReading::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

        return view('Trainee.content.BibleReading.edit', [
            "title" => "Edit Bible Reading",
            "bibleReading" => $bibleReading // Kirim data ke view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Validasi input
       $request->validate([
        'kitab' => 'required|string',
        'verse' => 'required|integer',
        'terang' => 'required|string',
        'kitab_pl' => 'nullable|string',
        'kitab_pb' => 'nullable|string',
    ]);

    // Temukan data berdasarkan ID
    $bibleReading = BibleReading::findOrFail($id);

    // Update data berdasarkan input yang diterima
    if ($request->kitab === 'Old Testament') {
        $bibleReading->book = $request->kitab_pl; // Update untuk Old Testament
    } else {
        $bibleReading->book = $request->kitab_pb; // Update untuk New Testament
    }

    $bibleReading->verse = $request->verse;
    $bibleReading->phrase_light = $request->terang;
    $bibleReading->pl_pb = $request->kitab; // Menyimpan jenis kitab

    // Simpan perubahan
    $bibleReading->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('BibleReading.index')->with('success', 'Bible Reading updated successfully!');

    }

}
