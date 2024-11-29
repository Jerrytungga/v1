<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ministri;
use Illuminate\Support\Facades\Session;

class Summery_of_MinistryController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_ministri = Ministri::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_ministri->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        return view('Asisten.content.Summery_of_Ministry.index', [
            "title" => "Summary Of Ministry",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_ministri" => $ambil_ministri,
        ]);
    }

    public function Summery_of_Ministrypoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Ministri = Ministri::findOrFail($id);
    
        // Update the password
        $Ministri->catatan = $request->note;  
        $Ministri->poin = $request->poin; 
        $Ministri->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Ministry-Asisten', $Ministri->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function Summery_of_MinistryWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_ministri = Ministri::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_ministri = $ambil_ministri->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_ministri->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Summery_of_Ministry.index', [
            "title" => "Summary Of Ministry",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_ministri" => $ambil_ministri,
        ]);
    }
}
