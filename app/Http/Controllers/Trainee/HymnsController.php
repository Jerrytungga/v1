<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Hymns;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Poindaily;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class HymnsController extends Controller
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
        return view('Trainee.content.Hymns.index', [
            "title" => "My Hymns",
            'name_asisten' => $nama_asisten,
            'entrys' => Hymns::where('nip', $nipTrainee)
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
        return view('Trainee.content.Hymns.create', [
            "title" => "My Hymns",
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
        $entryCount = Hymns::whereDate('created_at', $today)
                            ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                            ->count();
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
        $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');
        $ambil_poin = Poindaily::where('semester', $semester)->first();
        $poin = $ambil_poin ? $ambil_poin->hymns : null;
        
        if ($weekly) {
        Hymns::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'no_Hymns' => $request->kidung,
            'stanza' => $request->stanza,
            'frase' => $request->frase,
            'semester' => $semester,
            'week' => $weekly->Week,
            'poin' => $poin,
           
        ]);
        return redirect()->route('Hymns.index')->with('success', 'Input Hymns successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('Hymns.index')->with('error', 'No active week found, cannot process input.');
        }
    }


    public function edit(string $id)
    {

          // Pengambilan data berdasarkan id
          $hymns = Hymns::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
          // Ke halaman form edit data
          return view('Trainee.content.Hymns.edit', [
            "title" => "My Hymns",
              "hymns" => $hymns // Kirim data ke view
          ]);
    }

  
    public function update(Request $request, string $id)
    {
        // Validasi input
       $request->validate([
        'kidung' => 'required|string',
        'stanza' => 'required|string',
        'frase' => 'required|string',
    
    ]);

    // Temukan data berdasarkan ID
    $hymns = Hymns::findOrFail($id);
    $hymns->no_Hymns = $request->kidung;
    $hymns->stanza = $request->stanza;
    $hymns->frase = $request->frase; // Menyimpan jenis kitab

    // Simpan perubahan
    $hymns->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('Hymns.index')->with('success', 'Hymns updated successfully!');

    }

    public function HymnsFil(Request $request)
    {
        // Mengambil input dari form filter (minggu dan semester)
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip');

        // Query dasar untuk mengambil data Fellowship
        $query = Hymns::where('semester', $selectsemester)
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
        return view('Trainee.content.Hymns.index', [
           "title" => "My Hymns",
            "entrys" => $entrys,
            'name_asisten' => $nama_asisten,
            'weekly' => $weekly,
            'smt' => $selectsemester,
            'week' => $selectedWeek,
        ]);

    }

 
}
