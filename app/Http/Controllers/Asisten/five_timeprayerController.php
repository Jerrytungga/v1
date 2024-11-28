<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use App\Models\timeprayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class five_timeprayerController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_timeprayer = timeprayer::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_timeprayer->sum('poin');  
        return view('Asisten.content.5_Time_Prayer.index', [
            "title" => "Hymns",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_timeprayer" => $ambil_timeprayer,
        ]);
    }

    public function fivetimeprayerpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poinprayer' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $timeprayer = timeprayer::findOrFail($id);
    
        // Update the password
        $timeprayer->catatan = $request->note;  
        $timeprayer->poin = $request->poinprayer; 
        $timeprayer->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Fivetimeprayer-Asisten', $timeprayer->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function filterfivetimeprayerWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_timeprayer = timeprayer::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_timeprayer = $ambil_timeprayer->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_timeprayer->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.5_Time_Prayer.index', [
            "title" => "Bible",
            "ambil_timeprayer" => $ambil_timeprayer,
            "totalPoin" => $totalPoin,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

}
