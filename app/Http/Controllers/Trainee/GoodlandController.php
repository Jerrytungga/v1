<?php

namespace App\Http\Controllers\Trainee;

use App\Models\GoodLand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GoodlandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                // Mendapatkan NIP Trainee dari session
            $nipTrainee = Session::get('nip');

            // Mendapatkan tanggal filter dari request atau default ke hari ini
            $today = now()->toDateString();
            $filterDate = $request->input('filter_date', $today);

            // Query data dengan filter berdasarkan tanggal (ignoring time) dan urutkan dari yang terbaru
            $entry = GoodLand::where('nip', $nipTrainee)
                            ->whereDate('created_at', Carbon::parse($filterDate))  // Cocokkan hanya tanggal, abaikan waktu
                            ->orderBy('created_at', 'DESC')
                            ->first();

            // Kembali ke view dengan data yang difilter
            return view('Trainee.content.goodland.index', [
                'title' => 'Good Land',
                'entry' => $entry,
                'filter_date' => $filterDate,
            ]);
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.goodland.create', [
            "title" => "Good Land",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
           
        ]);

       
    }

  
    public function store(Request $request)
    {
        //
        //
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = GoodLand::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 1 entri
            if ($entryCount >= 1) {
                return redirect()->route('goodland.index')->with('error', 'You have entered data 1 times today');
            }
        // Pengecekan form input
        $request->validate([
            'nip' => 'required|string',
        'asisten' => 'required|string',
        'verses' => 'required|string',
        'da' => 'nullable|string',
        'dt' => 'nullable|string',
        'ds' => 'nullable|string',
        ]);
        $semester = Session::get('semester');
        GoodLand::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'verses' => $request->verses,
            'da' => $request->da,
            'dt' => $request->dt,
            'ds' => $request->ds,
            'semester' => $semester,
           
        ]);
        return redirect()->route('goodland.index')->with('success', 'Input Good Land successfully!');
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
  
    
    public function inputpengalaman(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.goodland.experience_1', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }

    public function savepengalaman(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_1' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_1 = $request->experience_1;
            $data->experience_1_time = $request->experience_1 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_1 successfully!');
    }


    public function experience_2(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan

        return view('Trainee.content.goodland.experience_2', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }

    public function save_experience_2(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_2' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_2 = $request->experience_2;
            $data->experience_2_time = $request->experience_2 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_2 successfully!');
    }



    public function experience_3(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.goodland.experience_3', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }


    public function save_experience_3(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_3' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_3 = $request->experience_3;
            $data->experience_3_time = $request->experience_3 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_3 successfully!');
    }
    
    
    
    
    public function experience_4(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.goodland.experience_4', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }
    
    
    public function save_experience_4(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_4' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_4 = $request->experience_4;
            $data->experience_4_time = $request->experience_4 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_4 successfully!');
    }
    
    
    
    public function experience_5(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.goodland.experience_5', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }
    
    
    public function save_experience_5(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_5' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_5 = $request->experience_5;
            $data->experience_5_time = $request->experience_5 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_5 successfully!');
    }
    
    
    public function experience_6(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.goodland.experience_6', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }
    
    
    public function save_experience_6(Request $request, string $id)
    {
        //
        $request->validate([
            'experience_6' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = GoodLand::findOrFail($id);
            $data->experience_6 = $request->experience_6;
            $data->experience_6_time = $request->experience_6 ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('goodland.index')->with('success', 'experience_6 successfully!');
    }











    public function edit(string $id)
    {
        //
        $data = GoodLand::findOrFail($id); //
        return view('Trainee.content.goodland.edit', [
            "title" => "Good Land",
            "data" => $data // Kirim data ke view
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'verses' => 'required|string',
            'da' => 'nullable|string',
            'dt' => 'nullable|string',
            'ds' => 'nullable|string',
            'experience_1' => 'nullable|string',
            'experience_2' => 'nullable|string',
            'experience_3' => 'nullable|string',
            'experience_4' => 'nullable|string',
            'experience_5' => 'nullable|string',
            'experience_6' => 'nullable|string',
        ]);

         // Simpan data ke database
         $data = GoodLand::findOrFail($id);
            $data->update([
                'verses' => $request->verses,
                'da' => $request->da,
                'dt' => $request->dt,
                'ds' => $request->ds,
                'experience_1' => $request->experience_1,
                'experience_2' => $request->experience_2,
                'experience_3' => $request->experience_3,
                'experience_4' => $request->experience_4,
                'experience_5' => $request->experience_5,
                'experience_6' => $request->experience_6,
            ]);
            return redirect()->route('goodland.index')->with('success', 'Update Good Land successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
