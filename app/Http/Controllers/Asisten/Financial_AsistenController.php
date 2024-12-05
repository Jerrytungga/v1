<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Session;

class Financial_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_Financial = Keuangan::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_Financial->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $dropdown_weekly = Weekly::all();
        return view('Asisten.content.Keuangan_Asisten.index', [
            "title" => "Agenda",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Financial" => $ambil_Financial,
            "dropdown_weekly" => $dropdown_weekly,
        ]);
    }


    public function Agendapoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Keuangan = Keuangan::findOrFail($id);
    
        // Update the password
        $Keuangan->catatan = $request->note;  
        $Keuangan->poin = $request->poin; 
        $Keuangan->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Financial-Asisten', $Keuangan->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function AgendaWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_Financial = Keuangan::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_Financial = $ambil_Financial->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_Financial->sum('poin');  // Menghitung total poin
        $dropdown_weekly = Weekly::all();
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Keuangan_Asisten.index', [
            "title" => "Agenda",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Financial" => $ambil_Financial,
            "dropdown_weekly" => $dropdown_weekly,
        ]);
    }

}
