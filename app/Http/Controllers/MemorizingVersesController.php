<?php

namespace App\Http\Controllers;

use App\Models\MemorizingVerses;
use Illuminate\Http\Request;

class MemorizingVersesController extends Controller
{
    public function index()
    {
        //halaman utama Memorizing Verse
        return view('Trainee.content.MemorizingVerses.index', [
            "title" => "Memorizing Verses",
            'entrys' => MemorizingVerses::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        // ke halaan form input
        return view('Trainee.content.MemorizingVerses.create', [
            "title" => "Add Memorizing Verses"
        ]);
    }

    public function store(Request $request)
    {
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = MemorizingVerses::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 1) {
                return redirect()->route('BibleReading.index')->with('error', 'You have entered data 1 times today');
            }
        // Pengecekan form input
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'ayat' => 'required|string',
            'paraf' => 'required|string', 
        ]);

        MemorizingVerses::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'bible' => $request->ayat,
            'paraf' => $request->paraf,
           
        ]);
        return redirect()->route('MemorizingVerses.index')->with('success', 'Input Memorizing Verses successfully!');
    }


    public function edit(string $id)
    {
        //
        $MemorizingVerses = MemorizingVerses::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

        return view('Trainee.content.MemorizingVerses.edit', [
            "title" => "Edit Memorizing Verses",
            "MemorizingVerses" => $MemorizingVerses // Kirim data ke view
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'ayat' => 'required|string',
            'paraf' => 'required|string',
        ]);
        // Temukan data berdasarkan ID
            $MemorizingVerses = MemorizingVerses::findOrFail($id);
            $MemorizingVerses->bible = $request->ayat;
            $MemorizingVerses->paraf = $request->paraf;
            // Simpan perubahan
            $MemorizingVerses->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('MemorizingVerses.index')->with('success', 'Memorizing Verses updated successfully!');
    }

    public function destroy(string $id)
    {
        //
    }
}
