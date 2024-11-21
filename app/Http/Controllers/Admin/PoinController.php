<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Poinjurnal;
use Illuminate\Support\Facades\Session;

class PoinController extends Controller
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
            $poin = Poinjurnal::all();
            return view('Admin.content.poin.index', [
                "title" => "Target",
                "poin" => $poin,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.content.poin.create', [
            "title" => "Target",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'semester' => 'required|string',
            'bible' => 'required|string',
            'Memorizing' => 'required|string',
            'Hymns' => 'required|string',
            'TimesPrayer' => 'required|string',
            'pgoals' => 'required|string',
            'tp' => 'required|string',
            'bprayer' => 'required|string',
            'sministry' => 'required|string',
            'fellowship' => 'required|string',
            'script' => 'required|string',
            'agenda' => 'required|string',
        ]);
    
        // Cek apakah sudah ada record dengan semester yang sama
         $existingRecord = Poinjurnal::where('semester', $request->semester)->first();

        // Jika ada, tampilkan pesan error
        if ($existingRecord) {
            return redirect()->route('poin.index')->with('error', 'Record with the same semester already exists!');
        }

        // Cek jumlah total record di Poinjurnal
        $existingRecords = Poinjurnal::count();

        // Batasi hanya 4 record secara total
        if ($existingRecords >= 4) {
            return redirect()->route('poin.index')->with('error', 'You can only input up to 4 records.');
        }
    
        // Hitung total dari semua kolom
        $total = $request->bible + $request->Memorizing + $request->Hymns + $request->TimesPrayer + $request->pgoals + $request->tp + $request->bprayer + $request->sministry + $request->fellowship + $request->script + $request->agenda;
    
        // Simpan data ke dalam database
        Poinjurnal::create([
            'semester' => $request->semester,
            'bible' => $request->bible,
            'memorizing_bible' => $request->Memorizing,
            'hymns' => $request->Hymns,
            'five_times_prayer' => $request->TimesPrayer,
            'personal_goals' => $request->pgoals,
            'good_land' => $request->tp,
            'prayer_book' => $request->bprayer,
            'summary_of_ministry' => $request->sministry,
            'fellowship' => $request->fellowship,
            'script_ts_exhibition' => $request->script,
            'agenda' => $request->agenda,
            'total' => $total,
        ]);
    
        // Redirect back with success message
        return redirect()->route('poin.index')->with('success', 'Input point successfully!');
    }
    
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
          // Ambil data trainee berdasarkan ID
          $poinjurnal = Poinjurnal::findOrFail($id);
   
          return view('Admin.content.poin.edit', [
              "title" => "Target",
              "poinjurnal" => $poinjurnal,
    
          ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data input
        $request->validate([
            'bible' => 'required|string',
            'Memorizing' => 'required|string',
            'Hymns' => 'required|string',
            'TimesPrayer' => 'required|string',
            'pgoals' => 'required|string',
            'tp' => 'required|string',
            'bprayer' => 'required|string',
            'sministry' => 'required|string',
            'fellowship' => 'required|string',
            'script' => 'required|string',
            'agenda' => 'required|string',
        ]);

       
  
    
        // Find the existing record by ID
        $data = Poinjurnal::findOrFail($id);
    
        // Update the data with the new input values
      
        $data->bible = $request->bible;
        $data->memorizing_bible = $request->Memorizing;
        $data->hymns = $request->Hymns;
        $data->five_times_prayer = $request->TimesPrayer;
        $data->personal_goals = $request->pgoals;
        $data->good_land = $request->tp;
        $data->prayer_book = $request->bprayer;
        $data->summary_of_ministry = $request->sministry;
        $data->fellowship = $request->fellowship;
        $data->script_ts_exhibition = $request->script;
        $data->agenda = $request->agenda;
    
        // Calculate the total points
        $total = $request->bible + $request->Memorizing + $request->Hymns + $request->TimesPrayer + $request->pgoals + $request->tp + $request->bprayer + $request->sministry + $request->fellowship + $request->script + $request->agenda;
        $data->total = $total;
    
        // Save the updated data to the database
        $data->save();
    
        // Redirect back to the index page with a success message
        return redirect()->route('poin.index')->with('success', 'Point Achievement Standard updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
