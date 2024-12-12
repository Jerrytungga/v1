<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hymns;
use App\Models\Agenda;
use App\Models\Script;
use App\Models\Asisten;
use App\Models\Prayers;
use App\Models\GoodLand;
use App\Models\Ministri;
use App\Models\Fellowship;
use App\Models\timeprayer;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Models\Personalgoals;
use App\Models\MemorizingVerses;
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

        $asisten = Asisten::latest()->get();
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

    public function destroy($id)
    {
        // Retrieve the trainee record
        $asisten = Asisten::findOrFail($id);
        $nip = $asisten->nip;
    
        // Count related data
        $bible = BibleReading::where('asisten_id', $nip)->count();
        $memorizing = MemorizingVerses::where('asisten_id', $nip)->count();
        $himns = Hymns::where('asisten_id', $nip)->count();
        $prayer5mnt = timeprayer::where('asisten_id', $nip)->count();
        $tp = GoodLand::where('asisten_id', $nip)->count();
        $prayer = Prayers::where('asisten_id', $nip)->count();
        $personalgoals = Personalgoals::where('asisten_id', $nip)->count();
        $ministri = Ministri::where('asisten_id', $nip)->count();
        $fellowship = Fellowship::where('asisten_id', $nip)->count();
        $ts = Script::where('asisten_id', $nip)->count();
        $agenda = Agenda::where('asisten_id', $nip)->count();
    
        // Check if all related data counts are zero
        if ($bible == 0 && $memorizing == 0 && $himns == 0 && $prayer5mnt == 0 && $tp == 0 &&
            $prayer == 0 && $personalgoals == 0 && $ministri == 0 && $fellowship == 0 && 
            $ts == 0 && $agenda == 0) {
            
            // If no related data exists, delete the trainee
            $asisten->delete();
    
            return redirect()->route('asisten.index')->with('success', 'asisten deleted successfully.');
        } else {
            // If there is related data, prevent deletion and show a message
            return redirect()->route('asisten.index')->with('error', 'Cannot delete asisten with associated data.');
        }
    }
}
