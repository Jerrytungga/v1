<?php

namespace App\Http\Controllers\Trainee;

use DB;
use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Models\Report_weekly;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Fellowship;
use App\Models\GoodLand;
use App\Models\Hymns;
use App\Models\Keuangan;
use App\Models\MemorizingVerses;
use App\Models\Ministri;
use App\Models\Personalgoals;
use App\Models\Poinjurnal;
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


        if (($currentDayName == $dayOfWeek && Carbon::now()->format('H:i') >= $inputTime || Carbon::now()->format('H:i') == $inputTime)) {

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
                // $bible = BibleReading::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
                $bible = BibleReading::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');  // Menjumlahkan nilai poin yang ada
                $memorizing = MemorizingVerses::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $himns = Hymns::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $prayer5mnt = timeprayer::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $tp = GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('poin_verses') + GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->sum('poin_da') + GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_dt') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_ds') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_1') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_2') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_3') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_4') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_5') + 
                GoodLand::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('experience_6'); 

                $prayer = Prayers::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_topic') +
                Prayers::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('light_poin') +
                Prayers::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('appreciation_poin') +
                Prayers::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('action_poin');

                $personalgoals = Personalgoals::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $ministri = Ministri::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $fellowship = Fellowship::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $ts = Script::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_verse') +
                Script::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_truth') +
                Script::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin_experience');
                $agenda = Agenda::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $keuangan = Keuangan::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('poin');
                $semester = Session::get('semester');

                // Ambil semua data yang sesuai dengan semester
                $ambil_standart_poin = Poinjurnal::where('semester', $semester)->get();
                
                // Menjumlahkan total dari semua record yang ditemukan
                $standar_poin = $ambil_standart_poin->sum('total');

                $pencapaian = $bible + $memorizing + $himns + $prayer5mnt + $tp + $prayer + $personalgoals + $ministri + $fellowship + $ts + $agenda + $keuangan;
                $alkitab = $ambil_standart_poin->first()->bible;
                $ayathafalan = $ambil_standart_poin->first()->memorizing_bible;
                $kidung = $ambil_standart_poin->first()->hymns;
                $doa5waktu = $ambil_standart_poin->first()->five_times_prayer;
                $tanahpermai = $ambil_standart_poin->first()->good_land;
                $doa = $ambil_standart_poin->first()->prayer_book;
                $personalgoal = $ambil_standart_poin->first()->personal_goals;
                $ringkasanMinistri = $ambil_standart_poin->first()->summary_of_ministry;
                $persekutuan = $ambil_standart_poin->first()->fellowship;
                $pameran = $ambil_standart_poin->first()->script_ts_exhibition;
                $catatan = $ambil_standart_poin->first()->agenda;
                $keuangan_ = $ambil_standart_poin->first()->finance;


                if ($bible > $alkitab){
                    $bible = $alkitab;
                } 
                
                if ($memorizing > $ayathafalan){
                    $memorizing = $ayathafalan;
                }
                
                if ($himns > $kidung) {
                    $himns = $kidung;
                } 
                
                if ($prayer5mnt > $doa5waktu){
                    $prayer5mnt = $doa5waktu;
                } 
                
                if ($tp > $tanahpermai){
                    $tp = $tanahpermai;
                } 
                
                if ($prayer > $doa){
                    $prayer = $doa;
                }
                
                if ($personalgoals > $personalgoal){
                    $personalgoals = $personalgoal;
                } 
                
                if ($ministri > $ringkasanMinistri){
                    $ministri = $ringkasanMinistri;
                } 
                
                if ($fellowship > $persekutuan ){
                    $fellowship = $persekutuan;
                } 
                
                if ($ts > $pameran) {
                    $ts = $pameran;
                } 
                
                if ($agenda > $catatan){
                    $agenda = $catatan;
                }
                
                if ($keuangan > $keuangan_) {
                    $keuangan = $keuangan_;
                }
                $total_ = $bible + $memorizing + $himns + $prayer5mnt + $tp + $prayer + $personalgoals + $ministri + $fellowship + $ts + $agenda + $keuangan;

            if($total_ >= $standar_poin){
                $status = 'C';
            } elseif($total_ <= $standar_poin){
                $status = 'IC';
            }
                $angkatan = Session::get('batch');
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
                    'Agenda' => $agenda,
                    'Finance' => $keuangan,
                    'standart_poin' => $standar_poin,
                    'created_at' => $current_time,
                    'updated_at' => $current_time,
                   
                    'Achievement' => $total_,
                    'batch' => $angkatan,
                    
                    'status' => $status,
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
