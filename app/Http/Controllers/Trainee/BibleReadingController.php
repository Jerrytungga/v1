<?php

namespace App\Http\Controllers\Trainee;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class BibleReadingController extends Controller
{
 
    public function index(Request $request)
    {
        // Cek apakah session 'role' ada dan apakah role user adalah 'trainee'
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
    
        // Ambil NIP trainee dari session
        $nipTrainee = Session::get('nip');
        $query = BibleReading::where('nip', $nipTrainee); // Inisialisasi query untuk data BibleReading
    
        // Cek jika ada filter yang diterima (Old Testament / New Testament)
        if ($request->has("filter")) {
            $filter = $request->input("filter");
            if ($filter === "Old Testament") {
                $query->where("pl_pb", "Old Testament");
            } elseif ($filter === "New Testament") {
                $query->where("pl_pb", "New Testament");
            }
        }
    
        // Ambil data asisten berdasarkan NIP asisten
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
    
        // Ambil data BibleReading berdasarkan filter yang diterapkan, urutkan berdasarkan created_at DESC
        $entrys = $query->orderBy("created_at", "DESC")->get();
    
        return view("Trainee.content.BibleReading.index", [
            "title" => "Bible Reading",
            "entrys" => $entrys,
            'name_asisten' => $nama_asisten,
        ]);
    }
    
    public function create()
    {
        // Menyiapkan data untuk form input Bible Reading
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.BibleReading.create', [
            "title" => "Bible Reading",
            'nipTrainee' => $nipTrainee, // Kirimkan NIP trainee ke view
            'id_asisten' => $id_asisten, // Kirimkan ID asisten ke view
        ]);
    }
    
    public function store(Request $request)
    {
        // Ambil tanggal hari ini
        $today = now()->format('Y-m-d');
        $nipTrainee = Session::get('nip');
    
        // Cek apakah sudah ada 2 entri Bible Reading pada hari ini untuk trainee yang sama
        // $entryCount = BibleReading::whereDate('created_at', $today)
        //                           ->where('nip', $nipTrainee)
        //                           ->count();
    
        // Jika sudah ada 2 entri, batalkan dan beri pesan error
        // if ($entryCount >= 2) {
        //     return redirect()->route('BibleReading.index')->with('error', 'You have entered data 2 times today');
        // }
    
        // Validasi input yang diterima dari form
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'kitab' => 'required|string|in:Old Testament,New Testament',
            'kitab_pl' => 'required_if:kitab,Old Testament|string', // Untuk Old Testament
            'kitab_pb' => 'required_if:kitab,New Testament|string', // Untuk New Testament
            'verse' => 'required|integer',
            'terang' => 'required|string',
        ]);
    
        // Ambil data weekly aktif dan semester dari session
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');
    
        if ($weekly) {
        // Tentukan kitab berdasarkan input (Old Testament atau New Testament)
        $book = $request->kitab === 'Old Testament' ? $request->kitab_pl : $request->kitab_pb;
    
        // Simpan data BibleReading ke database
        BibleReading::create([
            'asisten_id' => $request->asisten,
            'nip' => $request->nip,
            'pl_pb' => $request->kitab,
            'book' => $book, // Simpan kitab yang sesuai
            'verse' => $request->verse,
            'phrase_light' => $request->terang,
            'semester' => $semester,
            'week' => $weekly->Week, // Ambil data minggu aktif
        ]);
        return redirect()->route('BibleReading.index')->with('success', 'Input Bible Reading successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('BibleReading.index')->with('error', 'No active week found, cannot process input.');
        }
        
    }
    
    public function edit(string $id)
    {
        // Ambil data BibleReading berdasarkan ID
        $bibleReading = BibleReading::findOrFail($id);
    
        // Kirimkan data ke halaman form edit
        return view('Trainee.content.BibleReading.edit', [
            "title" => "Bible Reading",
            "bibleReading" => $bibleReading,
        ]);
    }
    
    public function update(Request $request, string $id)
    {
        // Validasi input yang diterima dari form
        $request->validate([
            'kitab' => 'required|string',
            'verse' => 'required|integer',
            'terang' => 'required|string',
            'kitab_pl' => 'nullable|string',
            'kitab_pb' => 'nullable|string',
        ]);
    
        // Ambil data BibleReading berdasarkan ID
        $bibleReading = BibleReading::findOrFail($id);
    
        // Tentukan kitab yang akan diupdate (Old Testament atau New Testament)
        if ($request->kitab === 'Old Testament') {
            $bibleReading->book = $request->kitab_pl; // Update untuk Old Testament
        } else {
            $bibleReading->book = $request->kitab_pb; // Update untuk New Testament
        }
    
        // Update field lainnya
        $bibleReading->verse = $request->verse;
        $bibleReading->phrase_light = $request->terang;
        $bibleReading->pl_pb = $request->kitab;
    
        // Simpan perubahan ke database
        $bibleReading->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('BibleReading.index')->with('success', 'Bible Reading updated successfully!');
    }
    

}
