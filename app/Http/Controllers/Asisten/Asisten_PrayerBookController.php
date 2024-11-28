<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Prayers;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Asisten_PrayerBookController extends Controller
{
    //
    public function index($nip){
        $namaAsisten = Session::get('nama');
        $nipAsisten = Session::get('nip');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_prayer = Prayers::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();
            $totalPoin = $ambil_prayer->sum('poin_topic') + $ambil_prayer->sum('light_poin') + $ambil_prayer->sum('appreciation_poin') + $ambil_prayer->sum('action_poin'); 

        return view('Asisten.content.Prayer_book.index', [
            "title" => "Prayer Book",
            "ambil_prayer" => $ambil_prayer,
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
        ]);
    }

    public function PBpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'poin_topic' => '',  // Make sure the passwords match and are at least 8 characters
            'light_poin' => '',  // Make sure the passwords match and are at least 8 characters
            'appreciation_poin' => '',  // Make sure the passwords match and are at least 8 characters
            'action_poin' => '',  // Make sure the passwords match and are at least 8 characters
           
            'note' => '',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $prayer = Prayers::findOrFail($id);
    
        // Update the password
        $prayer->poin_topic = $request->poin_topic;  // Hash the new password // Save the updated password
        $prayer->light_poin = $request->light_poin;  // Hash the new password // Save the updated password
        $prayer->appreciation_poin = $request->appreciation_poin;  // Hash the new password // Save the updated password
        $prayer->action_poin = $request->action_poin;  // Hash the new password // Save the updated password
        $prayer->catatan = $request->note;  // Hash the new password
        $prayer->save();  // Save the updated password
    
        // Redirect back with a success message
        return redirect()->route('Prayerbook-asisten', $prayer->nip)->with('success', 'Points and notes successfully entered!');
    }


    public function filterWeek_prayer(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_prayer = Prayers::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    
        $totalPoin = $ambil_prayer->sum('poin_topic') + $ambil_prayer->sum('light_poin') + $ambil_prayer->sum('appreciation_poin') + $ambil_prayer->sum('action_poin'); 
      

        // Ambil data sesuai filter
        $ambil_prayer = $ambil_prayer->orderBy('created_at', 'DESC')->get();
     
    
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Prayer_book.index', [
            "title" => "Prayer Book",
            "ambil_prayer" => $ambil_prayer,
            "ambil_trainee" => $ambil_trainee,
            "namaAsisten" => $namaAsisten,
            "totalPoin" => $totalPoin,
        ]);
    }
}
