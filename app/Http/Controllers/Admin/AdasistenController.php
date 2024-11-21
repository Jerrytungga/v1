<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asisten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdasistenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
          if (!Session::has('role') || Session::get('role') !== 'admin') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        $asisten = Asisten::all();
        return view('Admin.content.asisten.index', [
            "title" => "ASISTEN",
            "asisten" => $asisten,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          // Ambil data dari tabel asisten
          return view('Admin.content.asisten.create', [
              "title" => "ASISTEN"
           
             
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

                 // Validasi data input
                 $request->validate([
                    'name' => 'required|string', // Pastikan tabel users memiliki kolom nip
                    'nip' => 'required|string',
                    'password' => 'required|string',
                    'status' => 'required|string',
                ]);
        
                Asisten::create([
                    'name' => $request->name,
                    'nip' => $request->nip,
                    'password' =>$request->password,
                    'status' => $request->status,
                  
                  ]);
        
                  return redirect()->route('asisten.index')->with('success', 'Input asisten successfully!');
            
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
          // Ambil data trainee berdasarkan ID
        $asistens = Asisten::findOrFail($id);
        
     
           return view('Admin.content.asisten.edit', [
              "title" => "ASISTEN",
               "asistens" => $asistens,
              
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         // Validasi inputan form
    $request->validate([
        'name' => 'required|string', // Pastikan tabel users memiliki kolom nip
        'nip' => 'required|string',
        'status' => 'required|string',
        'password' => 'required|string',
    ]);

    // Mengambil data Fellowship berdasarkan ID
    $data = Asisten::findOrFail($id);

    // Mengupdate data fellowship
    $data->name = $request->name;// Menyimpan catatan trainee
    $data->nip = $request->nip; // Menyimpan tindakan
    $data->status = $request->status; // Menyimpan tindakan
    $data->password = $request->password; // Menyimpan tindakan

    // Menyimpan perubahan ke database
    $data->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('asisten.index')->with('success', 'Asisten updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
