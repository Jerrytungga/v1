<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\BibleReading;
use App\Models\Poindaily;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class BibleReadingController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Cek role user apakah 'trainee'
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        // Ambil NIP Trainee dari session
        $nipTrainee = Session::get('nip');
        $ambil_minggu = Weekly::where('status', 'active')->first();
        $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
        $query = BibleReading::where('nip', $nipTrainee) // Query untuk data BibleReading
        ->where('week', $dapat_minggu);
        // Apply filter jika ada
        if ($request->has('filter')) {
            $filter = $request->input('filter');
            if ($filter === 'Old Testament') {
                $query->where('pl_pb', 'Old Testament');
            } elseif ($filter === 'New Testament') {
                $query->where('pl_pb', 'New Testament');
            }
        }

        // Ambil data asisten berdasarkan NIP asisten
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
     
        // Ambil data BibleReading dan Weekly
        $entrys = $query->orderBy('created_at', 'DESC')->get();
        $weekly = Weekly::all();

        return view('Trainee.content.BibleReading.index', [
            'title' => 'Bible Reading',
            'entrys' => $entrys,
            'weekly' => $weekly,
            'name_asisten' => $nama_asisten,
        ]);
    }

    // Show the form for creating a new BibleReading
    public function create()
    {
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');

        return view('Trainee.content.BibleReading.create', [
            'title' => 'Bible Reading',
            'nipTrainee' => $nipTrainee,
            'id_asisten' => $id_asisten,
        ]);
    }

    // Store a newly created BibleReading
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'kitab' => 'required|string|in:Old Testament,New Testament',
            'kitab_pl' => 'required_if:kitab,Old Testament|string',
            'kitab_pb' => 'required_if:kitab,New Testament|string',
            'verse' => 'required|integer',
            'terang' => 'required|string',
        ]);

        // Ambil data weekly aktif dan semester dari session
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');

        if (!$weekly) {
            return redirect()->route('BibleReading.index')->with('error', 'No active week found, cannot process input.');
        }

        // Tentukan kitab berdasarkan input
        $book = $request->kitab === 'Old Testament' ? $request->kitab_pl : $request->kitab_pb;
        $ambil_poin = Poindaily::where('semester', $semester)->first();
        $poin = $ambil_poin ? $ambil_poin->bible : null;
        // Simpan data BibleReading ke database
        BibleReading::create([
            'asisten_id' => $request->asisten,
            'nip' => $request->nip,
            'pl_pb' => $request->kitab,
            'book' => $book,
            'verse' => $request->verse,
            'phrase_light' => $request->terang,
            'semester' => $semester,
            'week' => $weekly->Week,
            'poin' => $poin,
        ]);

        return redirect()->route('BibleReading.index')->with('success', 'Input Bible Reading successfully!');
    }

    // Show the form for editing the specified BibleReading
    public function edit(string $id)
    {
        $bibleReading = BibleReading::findOrFail($id);

        return view('Trainee.content.BibleReading.edit', [
            'title' => 'Bible Reading',
            'bibleReading' => $bibleReading,
        ]);
    }

    // Update the specified BibleReading in storage
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

        // Ambil data BibleReading yang akan diupdate
        $bibleReading = BibleReading::findOrFail($id);

        // Tentukan kitab yang akan diupdate (Old Testament atau New Testament)
        $bibleReading->book = $request->kitab === 'Old Testament' ? $request->kitab_pl : $request->kitab_pb;
        $bibleReading->verse = $request->verse;
        $bibleReading->phrase_light = $request->terang;
        $bibleReading->pl_pb = $request->kitab;

        // Simpan perubahan ke database
        $bibleReading->save();

        return redirect()->route('BibleReading.index')->with('success', 'Bible Reading updated successfully!');
    }

    // Filter BibleReading berdasarkan semester dan minggu
    public function BibleReadingFil(Request $request)
    {
        $selectedsemester = $request->input('semester');
        $selectedWeek = $request->input('week');
        $nipTrainee = Session::get('nip');
        
        // Query untuk BibleReading berdasarkan semester, minggu, dan filter kitab
        $query = BibleReading::where('semester', $selectedsemester)
        ->where('nip', $nipTrainee);
        
        // Menambahkan filter untuk minggu jika ada
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }
        if ($request->has('filter')) {
        
        // Apply filter untuk Old/New Testament jika ada
            $filter = $request->input('filter');
            if ($filter === 'Old Testament') {
                $query->where('pl_pb', 'Old Testament');
            } elseif ($filter === 'New Testament') {
                $query->where('pl_pb', 'New Testament');
            }
        }
        
        // Ambil data berdasarkan filter
        $entrys = $query->orderBy('created_at', 'DESC')->get();
        $weekly = Weekly::all();
        // Ambil data asisten

        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';

        return view('Trainee.content.BibleReading.index', [
            'title' => 'Bible Reading',
            'entrys' => $entrys,
            'weekly' => $weekly,
            'name_asisten' => $nama_asisten,
            'smt' => $selectedsemester,
            'week' => $selectedWeek,
     
        ]);
    }
}
