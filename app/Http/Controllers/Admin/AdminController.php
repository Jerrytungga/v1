<?php

namespace App\Http\Controllers\Admin;

use App\Models\Batch;
use App\Models\Hymns;
use App\Models\Agenda;
use App\Models\Script;
use App\Models\Asisten;
use App\Models\Prayers;
use App\Models\Trainee;
use App\Models\GoodLand;
use App\Models\Keuangan;
use App\Models\Ministri;
use App\Models\Fellowship;
use App\Models\timeprayer;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Models\Personalgoals;
use App\Models\MemorizingVerses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       
          // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
          if (!Session::has('role') || Session::get('role') !== 'admin') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
     
        $traines = Trainee::query();  // Start with a query builder instance

        // Apply filter if there is any
        if ($request->has('filter')) {
            $filter = $request->input('filter');
            if ($filter == 'active') {
                $traines->where('status', 'active');
            } elseif ($filter == 'inactive') {
                $traines->where('status', 'inactive');
            }
        }
        
        // Apply ordering and get the results
        $traines = $traines->orderBy('id', 'DESC')->get();
        
        $batch = Batch::all();
        return view('Admin.content.trainee.index', [
            "title" => "TRAINEE",
            "trainee" => $traines,
            "batch" => $batch,
            "angkatan" => $batch,
        ]);

    }
   
    public function create()
    {
     
        // Ambil data dari tabel asisten
        $asistens = Asisten::all();
        $batch = Batch::all();
        return view('Admin.content.trainee.create', [
            "title" => "TRAINEE",
            "asistens" => $asistens,
            "batch" => $batch,
         
           
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

        $existingTrainee = Trainee::where('name', $request->name)
        ->where('nip', $request->nip)
        ->first();

        if ($existingTrainee) {
            // Jika sudah ada, kembalikan dengan pesan error
            return back()->withErrors(['name' => 'The combination of name and NIP has already been registered!'])->withInput();
        }

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
        $batch = Batch::all();

     
        return view('Admin.content.trainee.edit', [
            "title" => "TRAINEE",
            "asistens" => $asistens,
            "batch" => $batch,
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

    public function ubasemester(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'semester' => 'required|string',
            'angkatan' => 'required|string',  // Validasi angkatan (batch) yang diterima
        ]);

        // Ambil angkatan (batch) dan semester dari request
        $batch = $request->angkatan;
        $newSemester = $request->semester;

        // Cari semua trainee berdasarkan batch
        $trainees = Trainee::where('batch', $batch)->get();

        // Jika tidak ada trainee ditemukan, beri pesan error
        if ($trainees->isEmpty()) {
            return redirect()->route('trainee.index')->with('error', 'No trainees found for the provided batch.');
        }

        // Loop dan update semester untuk semua trainee yang ditemukan
        foreach ($trainees as $trainee) {
            $trainee->semester = $newSemester;
            $trainee->save();
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('trainee.index')->with('success', 'All trainees semester updated successfully!');
    }

    public function ubastatus(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'status' => 'required|string',
            'angkatan' => 'required|string',  // Validasi angkatan (batch) yang diterima
        ]);

        // Ambil angkatan (batch) dan semester dari request
        $batch = $request->angkatan;
        $newstatus = $request->status;

        // Cari semua trainee berdasarkan batch
        $trainees = Trainee::where('batch', $batch)->get();

        // Jika tidak ada trainee ditemukan, beri pesan error
        if ($trainees->isEmpty()) {
            return redirect()->route('trainee.index')->with('error', 'No trainees found for the provided batch.');
        }

        // Loop dan update semester untuk semua trainee yang ditemukan
        foreach ($trainees as $trainee) {
            $trainee->status = $newstatus;
            $trainee->save();
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('trainee.index')->with('success', 'All trainees status updated successfully!');
    }

    public function destroy($id)
    {
        // Retrieve the trainee record
        $trainee = Trainee::findOrFail($id);
        $nip = $trainee->nip;
    
        // Count related data
        $bible = BibleReading::where('nip', $nip)->count();
        $memorizing = MemorizingVerses::where('nip', $nip)->count();
        $himns = Hymns::where('nip', $nip)->count();
        $prayer5mnt = timeprayer::where('nip', $nip)->count();
        $tp = GoodLand::where('nip', $nip)->count();
        $prayer = Prayers::where('nip', $nip)->count();
        $personalgoals = Personalgoals::where('nip', $nip)->count();
        $ministri = Ministri::where('nip', $nip)->count();
        $fellowship = Fellowship::where('nip', $nip)->count();
        $ts = Script::where('nip', $nip)->count();
        $agenda = Agenda::where('nip', $nip)->count();
    
        // Check if all related data counts are zero
        if ($bible == 0 && $memorizing == 0 && $himns == 0 && $prayer5mnt == 0 && $tp == 0 &&
            $prayer == 0 && $personalgoals == 0 && $ministri == 0 && $fellowship == 0 && 
            $ts == 0 && $agenda == 0) {
            
            // If no related data exists, delete the trainee
            $trainee->delete();
    
            return redirect()->route('trainee.index')->with('success', 'Trainee deleted successfully.');
        } else {
            // If there is related data, prevent deletion and show a message
            return redirect()->route('trainee.index')->with('error', 'Cannot delete trainee with associated data.');
        }
    }
    
    
   
}
