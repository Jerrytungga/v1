<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\Trainee;
use App\Models\Keuangan;
use App\Models\Announcement;
use App\Models\PesanAsisten;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TraineeController extends Controller
{
    //pengecekan data trainee
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nip' => 'required|string', // Pastikan tabel users memiliki kolom nip
            'asisten' => 'required|string',
            'nama' => 'required|string|max:255',
            'angkatan' => 'required|numeric',
            'semester' => 'required|string',
            'sandi' => 'required|string',
        ]);

        // Simpan data ke database
        try {
            Trainee::create([
                'name' => $request->nama,
                'nip' => $request->nip,
                'asisten_id' => $request->asisten, // Misal ini kolom asisten yang menyimpan NIP asisten
                'batch' => $request->angkatan,
                'semester' => $request->semester,
                'password' => $request->sandi,
                'status' => 'active',
            ]);

            // Berikan feedback berhasil
            return redirect()->back()->with('success', 'Registration successful. You can now login.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan pesan error
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }

    public function home(){
        $batch = Session::get('batch');  // Mendapatkan batch dari session
    
        // Mendapatkan batch_id dari query parameter atau request
        $batchId = $batch;  // Misalnya bisa didapatkan dari URL atau form
    
        // Mulai query dasar untuk pengumuman dengan status 'active'
        $query = Announcement::where('status', 'active');
    
        // Ambil pengumuman pertama untuk melihat batch yang aktif
        $announcement = $query->first();
    
        // Pastikan pengumuman ditemukan sebelum mengambil batch
        if ($announcement) {
            $ambil_batch = $announcement->batch;
    
            if ($ambil_batch == $batchId) {
                // Jika batch yang diambil sama dengan batchId, filter pengumuman untuk batch tersebut
                $query->where('batch', $batchId);
            } elseif ($ambil_batch == 'all') {
                // Jika batch adalah 'all', tampilkan pengumuman untuk semua batch
                $query->where('batch', 'all');
            } elseif ($batchId != 'all' && $batchId != $ambil_batch) {
                // Jika batchId berbeda dan bukan 'all', tampilkan pesan
                $message = "No announcements available.";
                $Announcement = null;  // Tidak menampilkan pengumuman karena tidak ada yang cocok
            }
    
            // Ambil pengumuman pertama setelah filter
            if (!isset($message)) {
                $Announcement = $query->first();
            }
        } else {
            // Jika tidak ada pengumuman yang aktif, bisa handle sesuai kebutuhan
            $Announcement = null;
            $message = "No announcements available.";
        }

        $nipTrainee = Session::get('nip');
        $ambilT = Trainee::where('nip', $nipTrainee)->first();
        $weekly = Weekly::where('status', 'active')->first();
        $minggu =$weekly->Week;
        $totals = Keuangan::where('nip', $nipTrainee)
        ->where('week', $minggu)
        ->selectRaw('sum(debit) as total_pemasukan, sum(credit) as total_pengeluaran')
        ->first();
        
        
        
        $pesan_Asisten = PesanAsisten::where('status', 'active')
        ->where('nip', $nipTrainee)
        ->first();

        // Mengembalikan view dengan data pengumuman dan pesan (jika ada)
        return view('Trainee.content.home', [
            "title" => "Home",
            "ambil" => $ambilT,
            "pesan_Asisten" => $pesan_Asisten,
            "total" => $totals,
            "Announcement" => $Announcement,
            "message" => isset($message) ? $message : null,  // Menyertakan pesan jika ada
        ]);


        
    }

    public function changePassword(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'new_password' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $user = Trainee::findOrFail($id);
    
        // Update the password
        $user->password = $request->new_password;  // Hash the new password
        $user->save();  // Save the updated password
    
        // Redirect back with a success message
        return redirect()->route('trainee.Home')->with('success', 'Update successfully!');
    }

    
 
}
