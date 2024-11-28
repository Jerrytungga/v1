<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Bible_readingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nip)
    {
        // You can still retrieve the `nipAsisten` from session if necessary
        // But you don't need to pass it as a parameter to the view if it's not needed in the view
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_biblereading = BibleReading::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();

        $totalPoin = $ambil_biblereading->sum('poin');  // Menghitung total poin
        $totaldata = $ambil_biblereading->count('verse');  // Menghitung total poin

        return view('Asisten.content.Bible_reading.index', [
            "title" => "Bible",
            "ambil_biblereading" => $ambil_biblereading,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
            "totalPoin" => $totalPoin,
            "totaldata" => $totaldata,
        ]);
    }
    
    public function bpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => '',  // Make sure the passwords match and are at least 8 characters
            'poin' => 'required',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $bible = BibleReading::findOrFail($id);
    
        // Update the password
        $bible->catatan = $request->note;  // Hash the new password
        $bible->poin = $request->poin;  // Hash the new password // Save the updated password
        $bible->save();  // Save the updated password
    
        // Redirect back with a success message
        return redirect()->route('bible-asisten', $bible->nip)->with('success', 'Points and notes successfully entered!');
    }




    public function filterWeek(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_biblereading = BibleReading::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        // Ambil data sesuai filter
        $ambil_biblereading = $ambil_biblereading->orderBy('created_at', 'DESC')->get();
        
        $totalPoin = $ambil_biblereading->sum('poin');  // Menghitung total poin
        $totaldata = $ambil_biblereading->count('verse'); 
      
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Bible_reading.index', [
            "title" => "Bible",
            "ambil_biblereading" => $ambil_biblereading,
            "totalPoin" => $totalPoin,
            "totaldata" => $totaldata,
            "namaAsisten" => $namaAsisten,
            "ambil_trainee" => $ambil_trainee,
        ]);
    }

}
