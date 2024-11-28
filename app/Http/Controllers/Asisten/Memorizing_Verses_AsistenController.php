<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MemorizingVerses;
use Illuminate\Support\Facades\Session;

class Memorizing_Verses_AsistenController extends Controller
{
    //
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_memorizing_verse = MemorizingVerses::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_memorizing_verse->sum('poin');  
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        return view('Asisten.content.Memorizing_verses.index', [
            "title" => "Memorizing Verses",
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
            "ambil_memorizing_verse" => $ambil_memorizing_verse,
        ]);
    }


    public function MVpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'ayat' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $memorizing = MemorizingVerses::findOrFail($id);
    
        // Update the password
        $memorizing->catatan = $request->note;  
        $memorizing->poin = $request->ayat; 
        $memorizing->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Memorizing_verses-Asisten', $memorizing->nip)->with('success', 'Points and notes successfully entered!');
    }


    public function filterMemorizingVersesWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_memorizing_verse = MemorizingVerses::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_memorizing_verse = $ambil_memorizing_verse->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_memorizing_verse->sum('poin');  // Menghitung total poin
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Memorizing_verses.index', [
            "title" => "Bible",
            "ambil_memorizing_verse" => $ambil_memorizing_verse,
            "totalPoin" => $totalPoin,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

}
