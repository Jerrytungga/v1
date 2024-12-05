<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use App\Models\PesanAsisten;
use Illuminate\Http\Request;
use App\Models\Message_asisten;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Announcement_AsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        // Mengambil data nipAsisten dari session
        $nipAsisten = Session::get('nip');
            
        // Memastikan nipAsisten tidak kosong
        if (!$nipAsisten) {
            // Jika tidak ada nipAsisten dalam session, berikan pesan atau arahkan ke halaman lain
            return redirect()->route('login')->with('error', 'Session expired or not logged in');
        }

        // Mengambil data pesan dari database berdasarkan nipAsisten
        $tampilkan_pesan = PesanAsisten::where('asisten_id', $nipAsisten)
        ->where('status', 'active')
        ->get();
        $ambil_trainee = Trainee::where('asisten_id', $nipAsisten)->get();
        return view('Asisten.content.Announcement.index', [
            "title" => "Announcement",
            "tampilkan_pesan" => $tampilkan_pesan,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

    
    public function store(Request $request)
    {
        //
          // Validate the input
          $request->validate([
            'traines' => '',  // Make sure the passwords match and are at least 8 characters
            'message' => '',  // Make sure the passwords match and are at least 8 characters
           
        ]);

        $trainee = $request->traines;
        
        // Mendapatkan data Weekly yang aktif
        $weekly = Weekly::where('status', 'active')->first();
        
        // Mendapatkan NIP Asisten dari session
        $nipAsisten = Session::get('nip');
        
        // Mengambil data Trainee berdasarkan NIP yang dikirim
        
        if($trainee == 'all'){
            $semester = 'all';
        } else {
            $trainee = $request->traines;
            $ambil_trainee = Trainee::where('nip', $trainee)->first();
            $semester = $ambil_trainee->semester;

        }
        // Pastikan data Trainee ditemukan sebelum melanjutkan
      
            // Menyimpan pesan asisten
            PesanAsisten::create([
                'nip' => $request->traines,
                'asisten_id' => $nipAsisten,
                'pesan' => $request->message,
                'semester' => $semester,
                'week' => $weekly->Week,
                'status' => 'active',
            ]);
        
            // Lakukan sesuatu jika data berhasil disimpan (misalnya redirect)
            return redirect()->route('notif.index')->with('success', 'Announcement successfully entered!');
       
        
    
        // Redirect back with a success message
    }

    public function update(Request $request, $id)
    {
        // Cari pesan berdasarkan ID
        $message = PesanAsisten::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $message->status = 'inactive';
        $message->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('notif.index')->with('success', 'Message successfully deleted!');
    }
  
 
}
