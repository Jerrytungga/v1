<?php

namespace App\Http\Controllers\Trainee;

use DB;
use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Models\Report_weekly;
use App\Http\Controllers\Controller;
use App\Models\Fellowship;
use App\Models\GoodLand;
use App\Models\Hymns;
use App\Models\MemorizingVerses;
use App\Models\Ministri;
use App\Models\Personalgoals;
use App\Models\Prayers;
use App\Models\Script;
use App\Models\timeprayer;
use App\Models\Viewreport;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
   
    public function index()
    {
        //
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

          // Ambil pengaturan hari dan waktu untuk input otomatis dari database
          $setting = Viewreport::select('setting_name', 'input_time')->first();

        if ($setting) {
        $dayOfWeek = $setting->setting_name;  // Misalnya, Anda ingin melakukan pengecekan untuk hari Senin (1 = Monday)
        $inputTime = $setting->input_time;  // Waktu yang diinputkan, misalnya jam 08:00 AM
        
        Carbon::setLocale('id');

        // Mengambil nama hari dalam format teks (misalnya, Senin, Selasa, dst.)
        $currentDayName = Carbon::now()->locale('id')->isoFormat('dddd');


        if (($currentDayName == $dayOfWeek && Carbon::now()->format('H:i') >= $inputTime)) {

            // Mendapatkan tanggal Senin dan Minggu pada minggu ini
            $startOfWeek = Carbon::now()->startOfWeek();  // Senin
            $endOfWeek = Carbon::now()->endOfWeek();      // Minggu

            $id_asisten = Session::get('asisten');
            $nipTrainee = Session::get('nip');
            $weekly = Weekly::where('status', 'active')->first();
            $minggu = $weekly->Week;
            $semester = Session::get('semester');
                    
            $existingReport = Report_weekly::where('nip', $nipTrainee)
            ->where('week', $minggu)
            ->where('semester', $semester)
            ->first();

            if ($existingReport) {
                // Jika data sudah ada, tampilkan halaman index dengan pesan
                return view('Trainee.content.report.index', [
                    "title" => "Journal Report",
                    'entrys' => Report_weekly::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
                    'message' => 'Data untuk minggu ini sudah ada.',
                   
                ]);
            } else {

                // Jika data belum ada, lanjutkan untuk menghitung jumlah entri dalam minggu ini
                $current_time = Carbon::now();
                $startOfWeek = Carbon::now()->startOfWeek();  // Senin
                $endOfWeek = Carbon::now()->endOfWeek();      // Minggu

                // Menghitung jumlah total entry dalam minggu ini
                $bible = BibleReading::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $memorizing = MemorizingVerses::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $himns = Hymns::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $prayer5mnt = timeprayer::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $tp = GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $prayer = Prayers::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $personalgoals = Personalgoals::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $ministri = Ministri::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $fellowship = Fellowship::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $ts = Script::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

                // Menyimpan data baru jika belum ada
                Report_weekly::create([
                    'nip' => $nipTrainee,
                    'asisten_id' => $id_asisten,
                    'semester' => $semester,
                    'week' => $minggu,
                    'bible' => $bible,
                    'memorizing' => $memorizing,
                    'hymns' => $himns,
                    'prayer_5_time' => $prayer5mnt,
                    'tp' => $tp,
                    'doa' => $prayer,
                    'p_goals' => $personalgoals,
                    'ministry' => $ministri,
                    'fellowship' => $fellowship,
                    'ts' => $ts,
                    'status' => $ministri,
                    'created_at' => $current_time,
                    'updated_at' => $current_time,
                ]);

                $nipTrainee = Session::get('nip');
                // Redirect ke halaman index setelah data disimpan
                return view('Trainee.content.report.index', [
                    "title" => "Journal Report",
                    'entrys' => Report_weekly::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
                    'message' => 'Data berhasil disimpan.'
                ]);


            }

           
       

        } else {
            $nipTrainee = Session::get('nip');
            // Redirect ke halaman index setelah data disimpan
            return view('Trainee.content.report.index', [
                "title" => "Journal Report",
                'entrys' => Report_weekly::where('nip', $nipTrainee)->orderBy('created_at', 'DESC')->get(),
                'message' => 'Data berhasil disimpan.'
            ]);
        }





    
   
}
}

}
