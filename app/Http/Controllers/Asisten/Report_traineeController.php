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
        $ambil_semester = $ambil_trainee->semester;
        $standart_poin = Poinjurnal::where('semester', $ambil_semester)
        ->first();
        $ambil_report = Report_weekly::where('asisten_id', $nipAsisten)
        ->where('nip', $nip)
        ->where('week', $minggu)
        ->first();


        return view('Asisten.content.laporan.index', [
            "title" => "Weekly journal report",
            "ambil_trainee" => $ambil_trainee,
            "ambil_report" => $ambil_report,
            "namaAsisten" => $namaAsisten,
            "standart_poin" => $standart_poin,
        ]);
    }
}
