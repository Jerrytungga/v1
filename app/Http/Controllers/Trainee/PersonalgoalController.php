<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Weekly;
use App\Models\Asisten;
use Illuminate\Http\Request;
use App\Models\Personalgoals;
use App\Models\Taskpersonalgoal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PersonalgoalController extends Controller
{
  
    public function index()
    {

        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        //menampilkan data awal
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        return view('Trainee.content.personalgoal.index', [
            "title" => "Personal Goals",
            'name_asisten' => $nama_asisten,
            'entrys' => Personalgoals::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
            'tasks' => Taskpersonalgoal::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
        ]);
       
    }


    public function create()
    {
        // kirim data ke form create
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.personalgoal.create', [
            "title" => "Personal Goals",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
        ]);
    }

  
    public function store(Request $request)
    {
        // input personal goals
        $nipTrainee = Session::get('nip');
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = Personalgoals::whereDate('created_at', $today)
                                    ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                                    ->count();
        // Cek apakah sudah ada 1 entri
        if ($entryCount >= 1) { return redirect()->route('personalgoal.index')->with('error', 'You have entered data 1 times today');}
        // Pengecekan form input
        $request->validate([
            'nip' => 'required|string',
            'asisten' => 'required|string',
            'deskripsi' => 'required|string', ]);
         $weekly = Weekly::where('status', 'active')->first();
        $semester = Session::get('semester');

        if ($weekly) {
             Personalgoals::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'personalgoals' => $request->deskripsi,
            'semester' => $semester, 
            'week' => $weekly->Week,
        
        ]);
             return redirect()->route('personalgoal.index')->with('success', 'Input Personal Goals successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('personalgoal.index')->with('error', 'No active week found, cannot process input.');
        }
    }

 
    public function edit(string $id)
    {
        //Mengambil id untuk edit data
        $data = Personalgoals::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        // kembali ke view
        return view('Trainee.content.personalgoal.edit', [
            "title" => "Personal Goals",
            "data" => $data // Kirim data ke view
        ]);
    }

   
    public function update(Request $request, string $id)
    {
        // Validasi input
       $request->validate([
        'deskripsi' => 'required|string',
        ]);
        // Temukan data berdasarkan ID
        $data = Personalgoals::findOrFail($id);
        $data->personalgoals = $request->deskripsi;
        // Simpan perubahan
        $data->save();
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('personalgoal.index')->with('success', 'Personal Goals updated successfully!');
        
    }

}
