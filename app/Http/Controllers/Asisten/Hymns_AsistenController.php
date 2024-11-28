<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hymns;
use Illuminate\Support\Facades\Session;

class Hymns_AsistenController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_hymns = Hymns::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_hymns->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        return view('Asisten.content.Hymns.index', [
            "title" => "Hymns",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_hymns" => $ambil_hymns,
        ]);
    }


    public function Hymnspoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $Hymns = Hymns::findOrFail($id);
    
        // Update the password
        $Hymns->catatan = $request->note;  
        $Hymns->poin = $request->poin; 
        $Hymns->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Hymns-Asisten', $Hymns->nip)->with('success', 'Points and notes successfully entered!');
    }

    public function filterHymnsWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_hymns = Hymns::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_hymns = $ambil_hymns->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_hymns->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Hymns.index', [
            "title" => "Bible",
            "ambil_hymns" => $ambil_hymns,
            "totalPoin" => $totalPoin,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

}
