<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;
use App\Models\MemorizingVerses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class MemorizingVersesController extends Controller
{
    public function index()
    {
        //halaman utama Memorizing Verse
        $nipTrainee = Session::get('nip');
        return view('Trainee.content.MemorizingVerses.index', [
            "title" => "Memorizing Verses",
            'entrys' => MemorizingVerses::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        // ke halaan form input
        return view('Trainee.content.MemorizingVerses.create', [
            "title" => "Add Memorizing Verses",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
        ]);
    }

    public function store(Request $request)
    {
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = MemorizingVerses::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 1) {
                return redirect()->route('MemorizingVerses.index')->with('error', 'You have entered data 1 times today');
            }
        // Pengecekan form input
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'ayat' => 'required|string',
            'paraf' => 'required|string', 
        ]);
        $semester = Session::get('semester');
        MemorizingVerses::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'bible' => $request->ayat,
            'paraf' => $request->paraf,
            'semester' => $semester,
           
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