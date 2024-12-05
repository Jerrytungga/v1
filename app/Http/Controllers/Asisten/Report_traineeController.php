<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Poinjurnal;
use App\Models\Report_weekly;
use Illuminate\Support\Facades\Session;

class Report_traineeController extends Controller
{
    public function index($nip){
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_semester =  $ambil_trainee->semester;
        $standart_poin = Poinjurnal::where('semester', $ambil_semester)
        ->first();
        $ambil_report = Report_weekly::where('asisten_id', $nipAsisten)
        ->where('nip', $nip)
        ->where('week', $minggu)
        ->first();

        $weeklydropdown = Weekly::all();
        return view('Asisten.content.laporan.index', [
            "title" => "Weekly journal report",
            "ambil_trainee" => $ambil_trainee,
            "ambil_report" => $ambil_report,
            "namaAsisten" => $namaAsisten,
            "standart_poin" => $standart_poin,
            'weeklydropdown' => $weeklydropdown,
        ]);
    }


    public function ReportAsisten(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'note' => 'required|string|max:255',  // Ensure 'note' is required and a string with a max length of 255 characters
            'status' => 'required|in:C,IC', // Ensure 'status' is required and must be either 'C' (Completed) or 'IC' (Incomplete)
        ]);
    
    
        // Find the user by ID
        $report = Report_weekly::findOrFail($id);
    
        // Update the password
        $report->catatan = $request->note;  
        $report->status = $request->status; 
        $report->save(); 
    
        // Redirect back with a success message
        return redirect()->route('Report-Asisten', $report->nip)->with('success', 'Notes successfully entered!');
    }


    public function filterreport(Request $request, $nip)
{
    $nipAsisten = Session::get('nip');
    $selectedWeek = $request->input('week');
    $selectedsmt = $request->input('semester');
    $namaAsisten = Session::get('nama');
    
    // Ambil data trainee
    $ambil_trainee = Trainee::where('nip', $nip)->first();

    // Cek apakah data trainee ditemukan
    if (!$ambil_trainee) {
        // Jika trainee tidak ditemukan, redirect dengan pesan alert
        return redirect()->back()->with('alert', 'Data trainee tidak ditemukan.');
    }

    // Ambil semester trainee
    $ambil_semester = $ambil_trainee->semester;

    // Ambil report berdasarkan filter
    $ambil_report = Report_weekly::where('asisten_id', $nipAsisten)
                            ->where('week', $selectedWeek)
                            ->where('semester', $selectedsmt)
                            ->orderBy('created_at', 'DESC')
                            ->first();
    
    // Cek apakah report ditemukan
    if (!$ambil_report) {
        // Jika report tidak ditemukan, beri alert
        return redirect()->back()->with('alert', 'This week report was not found');
    }

    // Ambil poin standar berdasarkan semester
    $standart_poin = Poinjurnal::where('semester', $selectedsmt)->first();

    // Ambil data weekly dropdown
    $weeklydropdown = Weekly::all();

    // Return view dengan hasil yang sudah difilter
    return view('Asisten.content.laporan.index', [
        "title" => "Weekly journal report",
        "ambil_trainee" => $ambil_trainee,
        "ambil_report" => $ambil_report,
        "namaAsisten" => $namaAsisten,
        "standart_poin" => $standart_poin,
        'weeklydropdown' => $weeklydropdown,
    ]);
}

    

}
