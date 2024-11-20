<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asisten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainee;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
          // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
          if (!Session::has('role') || Session::get('role') !== 'admin') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
     
        $traines = Trainee::all();

        return view('Admin.content.trainee.index', [
            "title" => "TRAINEE",
            "trainee" => $traines,
        ]);

    }
   
    public function create()
    {
     
        // Ambil data dari tabel asisten
        $asistens = Asisten::all();
        return view('Admin.content.trainee.create', [
            "title" => "TRAINEE",
            "asistens" => $asistens,
         
           
        ]);
    }

    public function store(Request $request)
    {

         // Validasi data input
         $request->validate([
            'name' => 'required|string', // Pastikan tabel users memiliki kolom nip
            'angkatan' => 'required|numeric',
            'semester' => 'required|string',
            'nip' => 'required|string',
            'password' => 'required|string',
            'status' => 'required|string',
            'asisten' => 'required|string',
        ]);

        Trainee::create([
            'name' => $request->name,
            'batch' => $request->angkatan,
            'semester' => $request->semester,
            'nip' => $request->nip,
            'password' =>$request->password,
            'status' => $request->status,
            'asisten_id' => $request->asisten,
          
          ]);

          return redirect()->route('trainee.index')->with('success', 'Input trainee successfully!');
    

    }

    // App\Http\Controllers\TraineeController.php

    public function edit($id)
    {
        // Ambil data trainee berdasarkan ID
        $trainee = Trainee::findOrFail($id);
        
        // Ambil data asisten untuk dropdown
        $asistens = Asisten::all(); // Sesuaikan dengan model Assistant

     
        return view('Admin.content.trainee.edit', [
            "title" => "TRAINEE",
            "asistens" => $asistens,
            "trainee" => $trainee,
         
           
        ]);
    }

    public function update(Request $request, string $id)
{
    // Validasi inputan form
    $request->validate([
        'name' => 'required|string', // Pastikan tabel users memiliki kolom nip
        'angkatan' => 'required|numeric',
        'semester' => 'required|string',
        'nip' => 'required|string',
        'password' => 'required|string',
        'status' => 'required|string',
        'asisten' => 'required|string',
    ]);

    // Mengambil data Fellowship berdasarkan ID
    $data = Trainee::findOrFail($id);

    // Mengupdate data fellowship
    $data->name = $request->name;
    $data->batch = $request->angkatan;
    $data->semester = $request->semester; // Menyimpan catatan trainee
    $data->nip = $request->nip; // Menyimpan tindakan
    $data->password = $request->password; // Menyimpan tindakan
    $data->status = $request->status; // Menyimpan tindakan
    $data->asisten_id = $request->asisten; // Menyimpan tindakan

    // Menyimpan perubahan ke database
    $data->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('trainee.index')->with('success', 'Trainee updated successfully!');
}

public function show($id)
{
    $trainee = Trainee::findOrFail($id);
   
    return view('Admin.content.trainee.show', [
        "title" => "TRAINEE",
        "trainee" => $trainee,
     
       
    ]);
}

   
}
