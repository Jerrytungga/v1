<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Script;
use Illuminate\Support\Facades\Session;

class Script_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_Script = Script::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_Script->sum('poin_verse') + $ambil_Script->sum('poin_truth') + $ambil_Script->sum('poin_experience');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $dropdown_weekly = Weekly::all();
        return view('Asisten.content.Script_Asisten.index', [
            "title" => "Script Ts & Exhibition",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Script" => $ambil_Script,
            "dropdown_weekly" => $dropdown_weekly,
        ]);
    }

    public function Scriptpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poinVerse' => 'required',  // Make sure the passwords match and are at least 8 characters
            'poinTruth' => 'required',  // Make sure the passwords match and are at least 8 characters
            'poinExperience' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Script = Script::findOrFail($id);
    
        // Update the password
        $Script->catatan = $request->note;  
        $Script->poin_verse = $request->poinVerse; 
        $Script->poin_truth = $request->poinTruth; 
        $Script->poin_experience = $request->poinExperience; 
        $Script->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Script-Asisten', $Script->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function ScriptWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_Script = Script::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_Script = $ambil_Script->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_Script->sum('poin_verse') + $ambil_Script->sum('poin_truth') + $ambil_Script->sum('poin_experience');
        $dropdown_weekly = Weekly::all();
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Script_Asisten.index', [
            "title" => "Script Ts & Exhibition",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Script" => $ambil_Script,
            "dropdown_weekly" => $dropdown_weekly,
        ]);
    }
}
