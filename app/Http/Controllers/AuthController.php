<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Batch;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Trainee;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function Halaman_Login()
    {
        $nip = Cookie::get('nip');
        $password = Cookie::get('password');
    
        return view('auth.index', compact('nip', 'password'));
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
        $batch = Batch::all();

        // Kirim data ke view dengan nama yang konsisten
        return view('auth.register', compact('asistens', 'batch'));
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


    

   
 

     public function login(Request $request) {
        // Validasi input
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Mencari trainee berdasarkan NIP
        $trainee = Trainee::where('nip', $request->nip)->first();

        if ($trainee) {
            // Check if the trainee is inactive
            if ($trainee->status == 'inactive') {
                return redirect()->back()->with('status', 'Your account is inactive. Please contact admin.');
            }

            // Check if the password matches
            if ($request->password == $trainee->password) {
                // Simpan role di session
                Session::put('role', 'trainee');
                Session::put('nip', $trainee->nip);
                Session::put('asisten', $trainee->asisten_id);
                Session::put('semester', $trainee->semester);
                Session::put('name', $trainee->name);
                Session::put('batch', $trainee->batch);

                // Jika "Remember Me" dicentang, simpan cookie untuk nip dan password
                if ($request->remember) {
                    Cookie::queue('nip', $trainee->nip, 60 * 24 * 30);  // 30 hari
                    Cookie::queue('password', $trainee->password, 60 * 24 * 30);  // 30 hari
                }

                return redirect()->route('trainee.Home');
            } else {
                return redirect()->back()->withErrors(['password' => 'Password salah.']);
            }
        } 

        // Cek di tabel Asisten
        $asisten = Asisten::where('nip', $request->nip)->first();
    
        if ($asisten && $request->password == $asisten->password) {
            // Simpan role di session
            Session::put('role', 'asisten');
            Session::put('nama', $asisten->name);
            Session::put('nip', $asisten->nip);
    
            // Jika "Remember Me" dicentang, simpan cookie untuk nip dan password
            if ($request->remember) {
                Cookie::queue('nip', $asisten->nip, 60 * 24 * 30);  // 30 hari
                Cookie::queue('password', $asisten->password, 60 * 24 * 30);  // 30 hari
            }
    
            return redirect()->route('asisten.Home');
        } elseif ($asisten && $request->password != $asisten->password) {
            return redirect()->back()->withErrors(['password' => 'Password salah.']);
        }
    
        // Cek di tabel Admin
        $admin = Admin::where('username', $request->nip)->first();
    
        if ($admin && $request->password == $admin->password) {
            // Simpan role di session
            Session::put('role', 'admin');
            
            // Jika "Remember Me" dicentang, simpan cookie untuk nip dan password
            if ($request->remember) {
                Cookie::queue('nip', $admin->username, 60 * 24 * 30);  // 30 hari
                Cookie::queue('password', $admin->password, 60 * 24 * 30);  // 30 hari
            }
    
            return redirect()->route('admin.Home');
        } else {
            return back()->withErrors(['password' => 'Invalid credentials.']);
        }
    
        return redirect()->back()->withErrors([
            'nip' => 'NIP atau password salah.',
        ]);
    }
    

   

  
public function logout()
{
    // Hapus semua session
    Session::flush();

    // Hapus semua cookie
    Cookie::queue(Cookie::forget('nip'));
    Cookie::queue(Cookie::forget('password'));

    // Redirect ke halaman login
    return redirect()->route('auth.index')->with('success', 'Anda telah logout.');
}

public function handle($request, Closure $next)
{
    if (!Session::has('role')) {
        return redirect()->route('auth.index')->with('error', 'Silakan login terlebih dahulu.');
    }

    return $next($request);
}

    
}
