<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fellowship;
use Illuminate\Support\Facades\Session;

class Fellowship_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_fellowship = Fellowship::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_fellowship->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        return view('Asisten.content.Fellowship.index', [
            "title" => "Fellowship",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_fellowship" => $ambil_fellowship,
        ]);
    }

    public function FellowshipAsistenpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Fellowship = Fellowship::findOrFail($id);
    
        // Update the password
        $Fellowship->catatan = $request->note;  
        $Fellowship->poin = $request->poin; 
        $Fellowship->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Fellowship-Asisten', $Fellowship->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function FellowshipAsistenWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_fellowship = Fellowship::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_fellowship = $ambil_fellowship->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_fellowship->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Fellowship.index', [
            "title" => "Fellowship",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_fellowship" => $ambil_fellowship,
        ]);
    }

}
