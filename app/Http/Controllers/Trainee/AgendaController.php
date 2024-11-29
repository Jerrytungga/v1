<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Agenda;
use App\Models\Weekly;
use App\Models\Asisten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AgendaController extends Controller
{
  
    public function index()
    {
        // Mengecek apakah user memiliki role 'trainee' dalam session
        // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
    
        // Mengambil data Asisten berdasarkan NIP yang ada di session
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        // Jika Asisten ditemukan, ambil nama asisten, jika tidak, beri nilai default 'Asisten Not Found'
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        
        // Mengambil NIP Trainee dari session
        $nipTrainee = Session::get('nip');
        $ambil_minggu = Weekly::where('status', 'active')->first();
        $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
        $weekly = Weekly::all();
        // Menampilkan data agenda Trainee berdasarkan NIP-nya, diurutkan berdasarkan waktu dibuat (created_at)
        return view('Trainee.content.Agenda.index', [
            "title" => "Agenda", // Judul halaman
            'name_asisten' => $nama_asisten, // Nama Asisten yang dikirim ke view
            'entrys' => Agenda::where('nip', $nipTrainee)
            ->where('week', $dapat_minggu)
            ->orderBy('created_at', 'DESC')
            ->get(), // Data agenda yang akan ditampilkan
            'weekly' => $weekly,
        ]);
    }
    
    public function create()
    {
        // Menampilkan form untuk membuat agenda baru
        // Mengambil NIP Trainee dan ID Asisten dari session dan mengirimkannya ke view
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        
        return view('Trainee.content.Agenda.create', [
            "title" => "Agenda", // Judul halaman
            'nipTrainee' => $nipTrainee, // Mengirimkan NIP Trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan ID Asisten ke view
        ]);
    }
    
    public function store(Request $request)
    {
        // Validasi input yang diterima dari form create
        $request->validate([
            'asisten' => 'required|string', // Asisten harus diisi dan berupa string
            'nip' => 'required|string', // NIP harus diisi dan berupa string
            'agenda' => 'required|string', // Agenda harus diisi dan berupa string
        ]);
    
        // Mengambil data minggu aktif dari tabel Weekly
        $weekly = Weekly::where('status', 'active')->first();
        // Mengambil semester dari session
        $semester = Session::get('semester');
        if ($weekly) {
        // Menyimpan data agenda baru ke database
        Agenda::create([
            'nip' => $request->nip, // NIP yang diinput
            'asisten_id' => $request->asisten, // ID Asisten yang diinput
            'agenda' => $request->agenda, // Agenda yang diinput
            'light' => $request->terang, // Terang yang diinput (mungkin berupa boolean atau string)
            'semester' => $semester, // Semester yang diambil dari session
            'week' => $weekly->Week, // Minggu aktif yang diambil dari data Weekly
        ]);
        
        // Redirect ke halaman index agenda dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Input Agenda successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('agenda.index')->with('error', 'No active week found, cannot process input.');
        }
    }
    
    public function edit(string $id)
    {
        // Mengambil data agenda berdasarkan ID yang diterima
        // Jika data tidak ditemukan, akan otomatis memunculkan halaman error 404
        $data = Agenda::findOrFail($id); 
    
        // Menampilkan form edit dengan data agenda yang ingin diedit
        return view('Trainee.content.Agenda.edit', [
            "title" => "Agenda", // Judul halaman
            "data" => $data // Data agenda yang akan diedit
        ]);
    }
    
    public function update(Request $request, string $id)
    {
        // Validasi input agenda yang diterima dari form edit
        $request->validate([
            'agenda' => 'required|string' // Agenda harus diisi dan berupa string
        ]);
    
        // Mengambil data agenda yang akan diupdate berdasarkan ID
        $data = Agenda::findOrFail($id);
        // Memperbarui nilai agenda dengan yang baru
        $data->agenda = $request->agenda;
        // Menyimpan perubahan data ke database
        $data->save();
    
        // Redirect ke halaman index agenda dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Agenda updated successfully!');
    }
    
    public function filterWeek(Request $request)
    {
        // Mengambil nilai minggu dan semester yang dipilih dari form filter
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip'); // Mengambil NIP Trainee dari session
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        // Jika Asisten ditemukan, ambil nama asisten, jika tidak, beri nilai default 'Asisten Not Found'
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        // Menyiapkan query dasar untuk mengambil agenda berdasarkan semester dan NIP Trainee
        $query = Agenda::where('semester', $selectsemester)
                        ->where('nip', $nipTrainee);
    
        // Jika ada filter minggu yang dipilih, tambahkan kondisi untuk week
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }
    
        // Ambil data agenda yang sudah difilter dan urutkan berdasarkan minggu
        $entrys = $query->orderBy('week', 'ASC')->get();
    
        // Menyediakan pesan jika tidak ada data yang ditemukan setelah filter
        $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;
        $weekly = Weekly::all();
        // Menampilkan halaman index dengan data yang sudah difilter
        return view('Trainee.content.Agenda.index', [
            "title" => "Agenda", // Judul halaman
            "entrys" => $entrys, // Data agenda yang sudah difilter
            "smt" => $selectsemester, // Semester yang dipilih
            "noDataMessage" => $noDataMessage, // Pesan jika tidak ada data
            'weekly' => $weekly,
            'week' => $selectedWeek,
            'name_asisten' => $nama_asisten, // Nama Asisten yang dikirim ke view
        ]);
    }
    

}
