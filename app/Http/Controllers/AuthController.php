<?php

namespace App\Http\Controllers;

use App\Models\Asisten;
use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function Halaman_Login()
    {
        return view("auth.index");
    }
    // Menampilkan Halaman cek login
    public function cek()
    {
        return view("auth.cek");
    }
     // Menampilkan Halaman registrasi
    public function regis()
    {
        // Ambil data dari tabel asisten
        $asistens = Asisten::all();

        // Kirim data ke view dengan nama yang konsisten
        return view('auth.register', compact('asistens'));
    }


     // Proses Pengecekan akun
     public function cekNip(Request $request)
     {
         // Validasi input
         $request->validate([
             'Cek_nip' => 'required|string',
         ]);
 
         // Mencari trainee berdasarkan NIP
         $trainee = Trainee::where('nip', $request->Cek_nip)->first();
 
         // Jika trainee tidak ditemukan, kembalikan pesan error
         if (!$trainee) {
             return back()->withErrors(['Cek_nip' => 'NIP not found in the database.'])->withInput();
         }
         // Jika ditemukan, arahkan atau lakukan sesuatu (misal menampilkan pesan)
         return back()->with('status', 'Account with NIP ' . $request->Cek_nip . ' found.');
     }


    

   
 

    // proses login
    public function login(Request $request) {
        // Validasi input
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);


        $trainee = Trainee::where('nip', $request->nip)->first();
        if ($trainee && Hash::check($request->password, $trainee->password)) {
            // Simpan role di session
            Session::put('role', 'trainee');
            Session::put('nip', $trainee->nip);
            Session::put('asisten', $trainee->asisten_id);
            Session::put('semester', $trainee->semester);
            Session::put('name', $trainee->name);
            return redirect()->route('trainee.Home');
        } elseif ($trainee && !Hash::check($request->password, $trainee->password)) {
            return redirect()->back()->withErrors(['password' => 'Password salah.']);
        }

         // Cek di tabel Asisten
         $asisten = Asisten::where('nip', $request->nip)->first();
        if ($asisten && Hash::check($request->password, $asisten->password)) {
        // Simpan role di session
        Session::put('role', 'asisten');
        Session::put('nama', $asisten->name);
        Session::put('nip', $asisten->nip);
            return redirect()->route('asisten.Home');
        } elseif ($asisten && !Hash::check($request->password, $asisten->password)) {
            return redirect()->back()->withErrors(['password' => 'Password salah.']);
        }





        // Cek di tabel Admin
        // $admin = Admin::where('nip', $request->nip)->first();
        // if ($admin && Hash::check($request->password, $admin->password)) {
        //     // Simpan role di session
        //     Session::put('role', 'admin');
        //     return redirect()->route('admin.dashboard');
        // }

        // // Cek di tabel Trainee
        // $trainee = Trainee::where('nip', $request->nip)->first();
        // // Pengecekan jika trainee ditemukan
        // if (!$trainee) {
        //     return redirect()->back()->withErrors(['nip' => 'NIP tidak ditemukan.']);
        // }
        // // Jika trainee ditemukan, periksa password
        // if (!password_verify($request->password, $trainee->password)) {
        //     return redirect()->back()->withErrors(['password' => 'Password salah.']);
        // }
        // // Bandingkan password secara langsung
        // if ($trainee && Hash::check($request->password, $trainee->password)) {
        //     // Simpan role di session
        //     Session::put('role', 'trainee');
        //     Session::put('nip', $trainee->nip);
        //     Session::put('asisten', $trainee->asisten_id);
        //     return redirect()->route('trainee.Home');
        // }

        // // Cek di tabel Asisten
        // $asisten = Asisten::where('nip', $request->nip)->first();
        // if (!$asisten) {
        //     return redirect()->back()->withErrors(['nip' => 'NIP tidak ditemukan.']);
        // }
        // // Jika trainee ditemukan, periksa password
        // if (!password_verify($request->password, $asisten->password)) {
        //     return redirect()->back()->withErrors(['password' => 'Password salah.']);
        // }
        // if ($asisten && Hash::check($request->password, $asisten->password)) {
        //     // Simpan role di session
        //     Session::put('role', 'asisten');
        //     Session::put('nip', $asisten->nip);
        //     return redirect()->route('Asisten.A_home');
        // }




        

        // Jika tidak ditemukan, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors([
            'nip' => 'NIP atau password salah.',
        ]);
    }

   

    public function logout()
    {
        // Menghapus session role
        Session::forget('role');

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('auth.index')->with('success', 'Anda telah logout.');
    }



    
}
