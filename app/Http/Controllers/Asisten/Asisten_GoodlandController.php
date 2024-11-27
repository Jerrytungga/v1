<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodLand;
use Illuminate\Support\Facades\Session;

class Asisten_GoodlandController extends Controller
{
    //
    public function index($nip)
    {
        // You can still retrieve the `nipAsisten` from session if necessary
        // But you don't need to pass it as a parameter to the view if it's not needed in the view
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly->Week;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_goodland = GoodLand::where('asisten_id', $nipAsisten)
            ->where('nip', $nip)
            ->where('week', $minggu)
            ->get();

        $totalPoin = $ambil_goodland->sum('poin_verses') + $ambil_goodland->sum('poin_da') + $ambil_goodland->sum('poin_dt') + $ambil_goodland->sum('poin_ds') + $ambil_goodland->sum('poin_experience_1') + $ambil_goodland->sum('poin_experience_2') + $ambil_goodland->sum('poin_experience_3') + $ambil_goodland->sum('poin_experience_4') + $ambil_goodland->sum('poin_experience_5') + $ambil_goodland->sum('poin_experience_6');  // 

        return view('Asisten.content.Good_land.index', [
            "title" => "Good Land",
            "ambil_trainee" => $ambil_trainee,
            "ambil_goodland" => $ambil_goodland,
            "totalPoin" => $totalPoin,
        ]);
    }


    public function GLpoin(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'poin_verses' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_DA' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_DT' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_DS' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_1' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_2' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_3' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_4' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_5' => '',  // Make sure the passwords match and are at least 8 characters
            'poin_Experience_6' => '',  // Make sure the passwords match and are at least 8 characters
            'note' => '',  // Make sure the passwords match and are at least 8 characters
        ]);
    
        // Find the user by ID
        $gl = GoodLand::findOrFail($id);
    
        // Update the password
        $gl->poin_verses = $request->poin_verses;  // Hash the new password // Save the updated password
        $gl->poin_da = $request->poin_DA;  // Hash the new password // Save the updated password
        $gl->poin_dt = $request->poin_DT;  // Hash the new password // Save the updated password
        $gl->poin_ds = $request->poin_DS;  // Hash the new password // Save the updated password
        $gl->poin_experience_1 = $request->poin_Experience_1;  // Hash the new password // Save the updated password
        $gl->poin_experience_2 = $request->poin_Experience_2;  // Hash the new password // Save the updated password
        $gl->poin_experience_3 = $request->poin_Experience_3;  // Hash the new password // Save the updated password
        $gl->poin_experience_4 = $request->poin_Experience_4;  // Hash the new password // Save the updated password
        $gl->poin_experience_5 = $request->poin_Experience_5;  // Hash the new password // Save the updated password
        $gl->poin_experience_6 = $request->poin_Experience_6;  // Hash the new password // Save the updated password
        $gl->catatan = $request->note;  // Hash the new password
        $gl->save();  // Save the updated password
    
        // Redirect back with a success message
        return redirect()->route('Goodland-asisten', $gl->nip)->with('success', 'Points and notes successfully entered!');
    }


    public function filterWeekGL(Request $request, $nip)
    {
        $selectedWeek = $request->input('week');
        $namaAsisten = Session::get('nama');
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambilsemester = $ambil_trainee->semester;
        $ambil_goodland = GoodLand::where('nip', $nip)
                            ->where('week', $selectedWeek)
                            ->where('semester', $ambilsemester);
    

        $totalPoin = $ambil_goodland->sum('poin_verses') + $ambil_goodland->sum('poin_da') + $ambil_goodland->sum('poin_dt') + $ambil_goodland->sum('poin_ds') + $ambil_goodland->sum('poin_experience_1') + $ambil_goodland->sum('poin_experience_2') + $ambil_goodland->sum('poin_experience_3') + $ambil_goodland->sum('poin_experience_4') + $ambil_goodland->sum('poin_experience_5') + $ambil_goodland->sum('poin_experience_6');  //


        // Ambil data sesuai filter
        $ambil_goodland = $ambil_goodland->orderBy('created_at', 'DESC')->get();
     
    
        // Return view dengan hasil yang sudah difilter
        return view('Asisten.content.Good_land.index', [
            "title" => "Good Land",
            "ambil_trainee" => $ambil_trainee,
            "ambil_goodland" => $ambil_goodland,
            "totalPoin" => $totalPoin,
        ]);
    }
}
