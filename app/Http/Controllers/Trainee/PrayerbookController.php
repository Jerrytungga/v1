<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Prayers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PrayerbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        //
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        $nipTrainee = Session::get('nip');
        return view("Trainee.content.prayerbook.index", [
            "title" => "Prayer Book",
            'name_asisten' => $nama_asisten,
            'entrys' => Prayers::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // kirim data ke form create
         $nipTrainee = Session::get('nip');
         $id_asisten = Session::get('asisten');
         return view('Trainee.content.prayerbook.create', [
             "title" => "Prayer Book",
             'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
             'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // input personal goals
          $nipTrainee = Session::get('nip');
          $today = now()->format('Y-m-d'); // Format tanggal saat ini
          $entryCount = Prayers::whereDate('created_at', $today)
                                ->where('nip', $nipTrainee) // Filter berdasarkan NIP                  
                                ->count();
          // Cek apakah sudah ada 1 entri
          if ($entryCount >= 1) { return redirect()->route('prayerbook.index')->with('error', 'You have entered data 1 times today');}
          // Pengecekan form input
            $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'doa' => 'required|string',
            'terang' => 'required|string',
            'apresiasi' => 'required|string',
            'action' => 'required|string',
            ]);
            $weekly = Weekly::where('status', 'active')->first();
            $semester = Session::get('semester');
               Prayers::create([
              'nip' => $request->nip,
              'asisten_id' => $request->asisten,
              'topic' => $request->doa,
              'light' => $request->terang,
              'appreciation' => $request->apresiasi,
              'action' => $request->action,
              'semester' => $semester, 
              'prayer_date' => $today,
             'week' => $weekly->Week,
            
            ]);
               return redirect()->route('prayerbook.index')->with('success', 'Input Prayer Book successfully!');
    }

  
    public function answer(string $id)
    {
        //
        $data = Prayers::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        return view('Trainee.content.prayerbook.answerprayer', [
          "title" => "Prayer Book",
            "data" => $data // Kirim data ke view
        ]);
    }


    public function save_answer(Request $request, int $id){
          //
          $request->validate([
            'answer' => 'required|string',
            ]);
    
            // Temukan data berdasarkan ID
            $data = Prayers::findOrFail($id);
            $data->prayer_answer = $request->answer;
            $data->prayer_answered_date = $request->answer ? now() : null;
            // Simpan perubahan
            $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('prayerbook.index')->with('success', 'Answer successfully!');
    }


    public function edit(string $id)
    {
        //
           //Mengambil id untuk edit data
           $data = Prayers::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
           // kembali ke view
           return view('Trainee.content.prayerbook.edit', [
            "title" => "Prayer Book",
               "data" => $data // Kirim data ke view
           ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request data
        $request->validate([
            'doa' => 'required|string',
            'terang' => 'required|string',
            'apresiasi' => 'required|string',
            'action' => 'required|string',
            'answer' => 'string',
        ]);

          // Find the existing prayerbook entry by ID
          $prayerbook = Prayers::findOrFail($id);
          $prayerbook->topic = $request->doa;
          $prayerbook->light = $request->terang;
          $prayerbook->appreciation = $request->apresiasi;
          $prayerbook->action = $request->action;
          $prayerbook->prayer_answer = $request->answer;
            $prayerbook->save();

                // Redirect to the prayerbook index or show page with a success message
        return redirect()->route('prayerbook.index')->with('success', 'Prayer entry updated successfully!');

    }

}
