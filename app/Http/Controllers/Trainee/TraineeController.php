<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

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


 
}
