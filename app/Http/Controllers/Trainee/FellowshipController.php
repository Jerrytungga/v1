<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Fellowship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FellowshipController extends Controller
{
    /**
 * Display a listing of the resource.
 */
public function index()
{
    // Cek apakah pengguna memiliki role 'trainee', jika tidak redirect ke halaman login
    if (!Session::has('role') || Session::get('role') !== 'trainee') {
        return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
    }

    // Menentukan rentang waktu minggu ini
    $startOfWeek = Carbon::now()->startOfWeek(); // Mulai minggu ini (Senin)
    $endOfWeek = Carbon::now()->endOfWeek(); // Akhir minggu ini (Minggu)

    // Mengambil data dari sesi (nip trainee dan id asisten)
    $nipTrainee = Session::get('nip');
    $id_asisten = Session::get('asisten');

    // Mengambil data asisten berdasarkan NIP
    $asisten = Asisten::where('nip', $id_asisten)->first();
    $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';

    // Mengambil data Fellowship berdasarkan NIP trainee dan rentang waktu minggu ini
    $entrys = Fellowship::where('nip', $nipTrainee)
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->orderBy('created_at', 'DESC')
        ->take(4) // Batasi hanya 4 data
        ->get();

    // Menampilkan pesan jika tidak ada data untuk minggu ini
    $noDataMessage = $entrys->isEmpty() ? 'No data found for this week' : null;

    // Mengirimkan data ke view
    return view('Trainee.content.fellowship.index', [
        "title" => "Fellowship",
        'entrys' => $entrys,
        'name_asisten' => $nama_asisten,
        'noDataMessage' => $noDataMessage, // Mengirimkan pesan jika tidak ada data
    ]);
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    // Mengambil data dari sesi (nip trainee dan id asisten)
    $nipTrainee = Session::get('nip');
    $id_asisten = Session::get('asisten');

    // Menampilkan form untuk input data Fellowship
    return view('Trainee.content.fellowship.create', [
        "title" => "Fellowship",
        'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
        'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
    ]);
}

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Mengambil nip trainee dari sesi
    $nipTrainee = Session::get('nip');
    $today = now()->format('Y-m-d'); // Mendapatkan tanggal hari ini dalam format Y-m-d

    // Mengecek apakah sudah ada lebih dari 4 entri pada hari ini
    $entryCount = Fellowship::whereDate('created_at', $today)
                            ->where('nip', $nipTrainee) // Filter berdasarkan NIP
                            ->count();

    // Jika sudah ada 4 entri, tampilkan pesan error
    if ($entryCount >= 4) {
        return redirect()->route('fellowship.index')->with('error', 'You have entered data 4 times today');
    }

    // Validasi inputan form
    $request->validate([
        'nip' => 'required|string',
        'asisten' => 'required|string',
        'name' => 'required|string',
        'topic' => 'required|string',
        'Notes' => 'required|string',
        'action' => 'required|string',
    ]);

    // Mengambil data minggu aktif
    $weekly = Weekly::where('status', 'active')->first();
    $semester = Session::get('semester'); // Mengambil semester dari sesi

    // Menyimpan data Fellowship baru
    Fellowship::create([
        'nip' => $request->nip,
        'asisten_id' => $request->asisten,
        'asisten_trainer' => $request->name,
        'topic' => $request->topic,
        'notes_trainee' => $request->Notes,
        'action' => $request->action,
        'semester' => $semester,
        'week' => $weekly->Week,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('fellowship.index')->with('success', 'Input Fellowship successfully!');
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    // Mengambil data Fellowship berdasarkan ID untuk diedit
    $data = Fellowship::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

    // Menampilkan form edit data Fellowship
    return view('Trainee.content.fellowship.edit', [
        "title" => "Fellowship",
        "data" => $data, // Mengirimkan data ke view untuk diedit
    ]);
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validasi inputan form
    $request->validate([
        'name' => 'required|string',
        'topic' => 'required|string',
        'Notes' => 'required|string',
        'action' => 'required|string',
    ]);

    // Mengambil data Fellowship berdasarkan ID
    $data = Fellowship::findOrFail($id);

    // Mengupdate data fellowship
    $data->asisten_trainer = $request->name;
    $data->topic = $request->topic;
    $data->notes_trainee = $request->Notes; // Menyimpan catatan trainee
    $data->action = $request->action; // Menyimpan tindakan

    // Menyimpan perubahan ke database
    $data->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('fellowship.index')->with('success', 'Fellowship updated successfully!');
}

/**
 * Filter data Fellowship berdasarkan minggu dan semester yang dipilih.
 */
public function filterWeek(Request $request)
{
    // Mengambil input dari form filter (minggu dan semester)
    $selectedWeek = $request->input('week');
    $selectsemester = $request->input('semester');
    $nipTrainee = Session::get('nip');

    // Query dasar untuk mengambil data Fellowship
    $query = Fellowship::where('semester', $selectsemester)
                        ->where('nip', $nipTrainee);

    // Menambahkan filter untuk minggu jika ada nilai minggu yang dipilih
    if (!empty($selectedWeek)) {
        $query->where('week', $selectedWeek);
    }

    // Mengambil data berdasarkan filter
    $entrys = $query->orderBy('week', 'ASC')->get();

    // Pesan jika tidak ada data ditemukan
    $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;

    // Mengirimkan data ke view setelah difilter
    return view('Trainee.content.fellowship.index', [
        "title" => "Fellowship",
        'entrys' => $entrys,
        'smt' => $selectsemester,
        'noDataMessage' => $noDataMessage, // Mengirimkan pesan jika tidak ada data ditemukan
    ]);
}

        
}
