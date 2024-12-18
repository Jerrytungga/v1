<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Poindaily;
use Illuminate\Http\Request;
use App\Models\MemorizingVerses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class MemorizingVersesController extends Controller
{
    public function index()
    {
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        //halaman utama Memorizing Verse
        $id_asisten = Session::get('asisten');
        $nipTrainee = Session::get('nip');
        $weekly = Weekly::all();
        $ambil_minggu = Weekly::where('status', 'active')->first();
        $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        return view('Trainee.content.MemorizingVerses.index', [
            "title" => "Memorizing Verses",
            'entrys' => MemorizingVerses::where('nip', $nipTrainee)
            ->where('week', $dapat_minggu)
            ->orderBy('created_at', 'DESC')
            ->get(),
            'name_asisten' => $nama_asisten,
            'weekly' => $weekly,
        ]);
    }





    public function create()
    {
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        // ke halaan form input
        return view('Trainee.content.MemorizingVerses.create', [
            "title" => "Memorizing Verses",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
        ]);
    }

    public function store(Request $request)
    {
        $nipTrainee = Session::get('nip');
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = MemorizingVerses::whereDate('created_at', $today)
                                        ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                                        ->count();
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
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');
        $ambil_poin = Poindaily::where('semester', $semester)->first();
        $poin = $ambil_poin ? $ambil_poin->memorizing_bible : null;
        if ($weekly) {
        MemorizingVerses::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'bible' => $request->ayat,
            'paraf' => $request->paraf,
            'semester' => $semester,
            'week' => $weekly->Week,
            'poin' => $poin,
           
        ]);
        return redirect()->route('MemorizingVerses.index')->with('success', 'Input Memorizing Verses successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('MemorizingVerses.index')->with('error', 'No active week found, cannot process input.');
        }
        
    }


    public function edit(string $id)
    {
        //
        $MemorizingVerses = MemorizingVerses::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

        return view('Trainee.content.MemorizingVerses.edit', [
            "title" => "Memorizing Verses",
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

        public function MemorizingVersesFil(Request $request)
    {
        // Mengambil input dari form filter (minggu dan semester)
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip');

        // Query dasar untuk mengambil data Fellowship
        $query = MemorizingVerses::where('semester', $selectsemester)
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
        return view('Trainee.content.MemorizingVerses.index', [
            "title" => "Memorizing Verses",
            "entrys" => $entrys,
            'name_asisten' => $nama_asisten,
            'weekly' => $weekly,
            'smt' => $selectsemester,
            'week' => $selectedWeek,
        ]);

    }


}
