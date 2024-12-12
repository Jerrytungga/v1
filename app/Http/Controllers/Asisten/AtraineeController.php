<?php

namespace App\Http\Controllers\Asisten;

use Carbon\Carbon;
use App\Models\Hymns;
use App\Models\Agenda;
use App\Models\Script;
use App\Models\Weekly;
use App\Models\Prayers;
use App\Models\Trainee;
use App\Models\GoodLand;
use App\Models\Keuangan;
use App\Models\MenuItem;
use App\Models\Ministri;
use App\Models\Fellowship;
use App\Models\timeprayer;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Models\Personalgoals;
use App\Models\MemorizingVerses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AtraineeController extends Controller
{
    public function strainee()
    {
        //
        $nipAsisten = Session::get('nip');
        $trainee = Trainee::where('asisten_id', $nipAsisten)->get();
        $dailyItems = MenuItem::where('status', 'active')
        ->where('type', 'daily')
        ->get();
        $weeklyItems = MenuItem::where('status', 'active')
        ->where('type', 'weekly')
        ->get();
        return view('Asisten.content.Trainee.index', [
            "title" => "myTrainee",
            "traines" => $trainee,
            "dailyItems" => $dailyItems,
            "weeklyItems" => $weeklyItems,
        ]);

    }
    
    public function report_jurnal_tidak_dikerjakan()
    {
          // Mendapatkan nip dari session
    $nipAsisten = Session::get('nip');

    // Mengambil data trainee berdasarkan asisten_id (nipAsisten)
    $trainees = Trainee::where('asisten_id', $nipAsisten)->get();

  
    // Mendapatkan minggu aktif dari tabel Weekly
    $weekly = Weekly::where('status', 'active')->first();
    $minggu = $weekly ? $weekly->Week : null;

    // Array untuk menyimpan hasil hitung poin per trainee
    $traineeData = [];

    // Loop melalui setiap trainee untuk menghitung data berdasarkan nip dan asisten_id
    foreach ($trainees as $trainee) {
        $nip = $trainee->nip;  // Ambil nip setiap trainee
        $semester = $trainee->semester;  // Ambil nip setiap trainee

        // Menghitung jumlah total entri berdasarkan NIP dan Asisten ID dalam minggu ini
        $traineeData[] = [
            'name' => $trainee->name,
            'batch' => $trainee->batch,
            'semester' => $trainee->semester,
            'bible' => BibleReading::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'memorizing' => MemorizingVerses::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'hymns' => Hymns::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'prayer5mnt' => Timeprayer::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'tp' => GoodLand::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'prayer' => Prayers::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'personalgoals' => Personalgoals::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'ministri' => Ministri::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'fellowship' => Fellowship::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'ts' => Script::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'agenda' => Agenda::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
            'keuangan' => Keuangan::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $minggu)
               ->where('semester', $semester) // Filter berdasarkan minggu
                ->count(),
        ];
    }

    $weeklydropdown = Weekly::all();
    // Mengirim data ke view
    return view('Asisten.content.Track_record.index', [
        "title" => "Jurnal",
        "traineeData" => $traineeData,  // Mengirim data hasil hitung
        "weeklydropdown" => $weeklydropdown,
    ]);

    }




    public function filter_week_report(Request $request){

    $selectedWeek = $request->input('week');

    $nipAsisten = Session::get('nip');

    // Mengambil data trainee berdasarkan asisten_id (nipAsisten)
    $trainees = Trainee::where('asisten_id', $nipAsisten)->get();


    $traineeData = [];

    // Loop melalui setiap trainee untuk menghitung data berdasarkan nip dan asisten_id
    foreach ($trainees as $trainee) {
        $nip = $trainee->nip;  // Ambil nip setiap trainee
        $semester = $trainee->semester; 
        // Menghitung jumlah total entri berdasarkan NIP dan Asisten ID dalam minggu ini
        $traineeData[] = [
            'name' => $trainee->name,
            'batch' => $trainee->batch,
            'semester' => $trainee->semester,
            'bible' => BibleReading::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'memorizing' => MemorizingVerses::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'hymns' => Hymns::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'prayer5mnt' => Timeprayer::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'tp' => GoodLand::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'prayer' => Prayers::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'personalgoals' => Personalgoals::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'ministri' => Ministri::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'fellowship' => Fellowship::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'ts' => Script::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'agenda' => Agenda::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
            'keuangan' => Keuangan::where('nip', $nip)
                ->where('asisten_id', $nipAsisten)
               ->where('week', $selectedWeek)
                ->where('semester', $semester)  // Filter berdasarkan minggu
                ->count(),
        ];
    }
    $traineeData = collect($traineeData);
        $weeklydropdown = Weekly::all();
        return view('Asisten.content.Track_record.index', [
            "title" => "Jurnal",
            "traineeData" => $traineeData,  // Mengirim data hasil hitung
            "weeklydropdown" => $weeklydropdown,
        ]);

    }
}
