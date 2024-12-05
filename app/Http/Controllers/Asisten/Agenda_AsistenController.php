<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Support\Facades\Session;

class Agenda_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_Agenda = Agenda::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_Agenda->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $dropdown_weekly = Weekly::all();
        return view('Asisten.content.Agenda_Asisten.index', [
            "title" => "Agenda",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Agenda" => $ambil_Agenda,
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
        $Agenda = Agenda::findOrFail($id);
    
        // Update the password
        $Agenda->catatan = $request->note;  
        $Agenda->poin = $request->poin; 
        $Agenda->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Agenda-Asisten', $Agenda->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function AgendaWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_Agenda = Agenda::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_Agenda = $ambil_Agenda->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_Agenda->sum('poin');  // Menghitung total poin
        $dropdown_weekly = Weekly::all();
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Agenda_Asisten.index', [
            "title" => "Agenda",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_Agenda" => $ambil_Agenda,
            "dropdown_weekly" => $dropdown_weekly,
        ]);
    }




}
