<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personalgoals;
use Illuminate\Support\Facades\Session;

class Personal_Goals_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_personalgoals = Personalgoals::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_personalgoals->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        return view('Asisten.content.PersonalGoals.index', [
            "title" => "Memorizing Verses",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_personalgoals" => $ambil_personalgoals,
        ]);
    }


    public function personalgoalspoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Personalgoals = Personalgoals::findOrFail($id);
    
        // Update the password
        $Personalgoals->catatan = $request->note;  
        $Personalgoals->poin = $request->poin; 
        $Personalgoals->save(); 
    
        // Redirect back with a success message
        return redirect()->route('personalgoals-Asisten', $Personalgoals->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function filterpersonalgoalsWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_personalgoals = Personalgoals::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_personalgoals = $ambil_personalgoals->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_personalgoals->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.PersonalGoals.index', [
            "title" => "Bible",
            "ambil_personalgoals" => $ambil_personalgoals,
            "totalPoin" => $totalPoin,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

    
}
