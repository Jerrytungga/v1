<?php

use App\Http\Controllers\Ad_asistenController;
use App\Http\Controllers\Admin\AdasistenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\Batch_AController;
use App\Http\Controllers\Admin\Item_JurnalController;
use App\Http\Controllers\Admin\PoinController;
use App\Http\Controllers\Admin\Report_jurnalController;
use App\Http\Controllers\Admin\WeeklyController;
use App\Http\Controllers\Asisten\Agenda_AsistenController;
use App\Http\Controllers\Asisten\Announcement_AsistenController;
use App\Http\Controllers\Asisten\Asisten_BibleReadingController;
use App\Http\Controllers\Asisten\Asisten_GoodlandController;
use App\Http\Controllers\Asisten\Asisten_PrayerBookController;
use App\Http\Controllers\Asisten\AsistenController;
use App\Http\Controllers\Asisten\AtraineeController;
use App\Http\Controllers\Asisten\Bible_readingController;
use App\Http\Controllers\Asisten\BibleReadingController as AsistenBibleReadingController;
use App\Http\Controllers\Asisten\Fellowship_AsistenController;
use App\Http\Controllers\Asisten\Financial_AsistenController;
use App\Http\Controllers\Asisten\five_timeprayerController;
use App\Http\Controllers\Asisten\Hymns_AsistenController;
use App\Http\Controllers\Asisten\Memorizing_Verses_AsistenController;
use App\Http\Controllers\Asisten\Personal_Goals_AsistenController;
use App\Http\Controllers\Asisten\Report_traineeController;
use App\Http\Controllers\Asisten\Script_AsistenController;
use App\Http\Controllers\Asisten\Summery_of_MinistryController;
use App\Http\Controllers\Asisten\Task_personalgoalsController;
use App\Models\Asisten;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Trainee\AgendaController;
use App\Http\Controllers\Trainee\HymnsController;
use App\Http\Controllers\Trainee\TraineeController;
use App\Http\Controllers\Trainee\BibleReadingController;
use App\Http\Controllers\Trainee\FellowshipController;
use App\Http\Controllers\Trainee\GoodlandController;
use App\Http\Controllers\Trainee\KeuanganController;
use App\Http\Controllers\Trainee\MemorizingVersesController;
use App\Http\Controllers\Trainee\MinistriController;
use App\Http\Controllers\Trainee\PameranController;
use App\Http\Controllers\Trainee\PersonalgoalController;
use App\Http\Controllers\Trainee\PrayerbookController;
use App\Http\Controllers\Trainee\ReportController;
use App\Http\Controllers\Trainee\TimePrayerController;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

// alur login
Route::get('/', [AuthController::class, 'Halaman_Login'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/Checking-Data', [AuthController::class, 'cek'])->name('auth.cek');
Route::post('/Checking-Data', [AuthController::class, 'cekNip'])->name('cek.nip');
Route::get('/Register', [AuthController::class, 'regis'])->name('auth.register');
Route::post('/Register', [TraineeController::class, 'register'])->name('auth.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');




// Hanya bisa diakses oleh role 'trainee'
Route::group(['middleware' => ['role:trainee']], function() {

    // Halaman Home Trainee
    Route::get('/Trainee', [TraineeController::class, 'home'])->name('trainee.Home');
    
    // Ganti Password
    Route::patch('/user/{id}/change-password', [TraineeController::class, 'changePassword'])->name('change.password');

    // Bible Reading
    Route::resource('Trainee/BibleReading', BibleReadingController::class);
    Route::post('Trainee/BibleReading/gd527253', [BibleReadingController::class, 'BibleReadingFil'])->name('Bible.Filter');

    // Memorizing Verses
    Route::resource('Trainee/MemorizingVerses', MemorizingVersesController::class);
    Route::post('Trainee/MemorizingVerses/v-261426', [MemorizingVersesController::class, 'MemorizingVersesFil'])->name('MemorizingVerses.Filter');

    // Hymns
    Route::resource('Trainee/Hymns', HymnsController::class);
    Route::post('Trainee/Hymns/H-72762', [HymnsController::class, 'HymnsFil'])->name('Hymns.Filter');

    // Five Times Prayer
    Route::resource('Trainee/fiveTimesPrayer', TimePrayerController::class);
    Route::post('Trainee/fiveTimesPrayer/fv-826152', [TimePrayerController::class, 'fiveTimesPrayerFil'])->name('fiveTimesPrayer.Filter');

    // Personal Goals
    Route::resource('Trainee/personalgoal', PersonalgoalController::class);
    Route::post('Trainee/personalgoal/Ps-826152', [PersonalgoalController::class, 'personalgoalFil'])->name('personalgoal.Filter');

    // Goodland
    Route::resource('Trainee/goodland', GoodlandController::class);

    // Prayerbook
    Route::resource('Trainee/prayerbook', PrayerbookController::class);
    Route::post('Trainee/prayerbook/Pb-8266752', [PrayerbookController::class, 'prayerbookFil'])->name('prayerbook.Filter');
    Route::get('Trainee/prayerbook/{id}/answer', [PrayerbookController::class, 'answer'])->name('prayerbook.answer');
    Route::put('Trainee/prayerbook/{id}/answer', [PrayerbookController::class, 'save_answer'])->name('prayerbook.save_answer');

    // Ministri
    Route::resource('Trainee/ministri', MinistriController::class);
    Route::post('Trainee/ministri/filter-week', [MinistriController::class, 'filterWeek'])->name('filter.week');

    // Fellowship
    Route::resource('Trainee/fellowship', FellowshipController::class);
    Route::post('Trainee/fellowship/filter-week', [FellowshipController::class, 'filterWeek'])->name('fellowshipfilter.week');

    // Pameran
    Route::resource('Trainee/pameran', PameranController::class);
    Route::post('Trainee/pameran/filter-week', [PameranController::class, 'filterWeek'])->name('pameranfilter.week');

    // Agenda
    Route::resource('Trainee/agenda', AgendaController::class);
    Route::post('Trainee/agenda/filter-week', [AgendaController::class, 'filterWeek'])->name('Agendafilter.week');

    // Keuangan
    Route::resource('Trainee/keuangan', KeuanganController::class);
    Route::post('Trainee/keuangan/filter-week', [KeuanganController::class, 'filterWeek'])->name('keuangan.week');

    // Report
    Route::get('Trainee/report', [ReportController::class, 'index'])->name('report.index');

    // Goodland Pengalaman Routes
    Route::prefix('Trainee/goodland/{id}/pengalaman')->group(function () {
        
        // Input Pengalaman
        Route::get('/', [GoodlandController::class, 'inputpengalaman'])->name('goodland.inputpengalaman');
        Route::put('/', [GoodlandController::class, 'savepengalaman'])->name('goodland.savepengalaman');
        
        // Experience 2 to 6
        Route::get('/experience_2', [GoodlandController::class, 'experience_2'])->name('goodland.experience_2');
        Route::put('/experience_2', [GoodlandController::class, 'save_experience_2'])->name('goodland.saveexperience_2');

        Route::get('/experience_3', [GoodlandController::class, 'experience_3'])->name('goodland.experience_3');
        Route::put('/experience_3', [GoodlandController::class, 'save_experience_3'])->name('goodland.saveexperience_3');

        Route::get('/experience_4', [GoodlandController::class, 'experience_4'])->name('goodland.experience_4');
        Route::put('/experience_4', [GoodlandController::class, 'save_experience_4'])->name('goodland.saveexperience_4');

        Route::get('/experience_5', [GoodlandController::class, 'experience_5'])->name('goodland.experience_5');
        Route::put('/experience_5', [GoodlandController::class, 'save_experience_5'])->name('goodland.saveexperience_5');

        Route::get('/experience_6', [GoodlandController::class, 'experience_6'])->name('goodland.experience_6');
        Route::put('/experience_6', [GoodlandController::class, 'save_experience_6'])->name('goodland.saveexperience_6');
    });

});


// Hanya bisa diakses oleh role 'asisten'
Route::group(['middleware' => ['role:asisten']], function() {

    // View Asisten
    Route::get('/Asisten', [AsistenController::class, 'index'])->name('asisten.Home');
    Route::get('Asisten/trainee', [AtraineeController::class, 'strainee'])->name('htrainee.asisten');
    Route::get('Asisten/trainee/4626372', [AtraineeController::class, 'report_jurnal_tidak_dikerjakan'])->name('HaventCompletedtheJournal');

    // Bible Reading
    Route::get('Asisten/Bible/{nip}', [Bible_readingController::class, 'index'])->name('bible-asisten');
    Route::patch('/Asisten/{id}/poin', [Bible_readingController::class, 'bpoin'])->name('bible-poin');
    Route::post('/Asisten/{id}/filter-week', [Bible_readingController::class, 'filterWeek'])->name('bible-week');

    // GoodLand
    Route::get('Asisten/GoodLand/{nip}/Trainee', [Asisten_GoodlandController::class, 'index'])->name('Goodland-asisten');
    Route::patch('/Asisten/GoodLand/{id}/poin', [Asisten_GoodlandController::class, 'GLpoin'])->name('GL-poin');
    Route::post('/Asisten/{id}/filter-goodland', [Asisten_GoodlandController::class, 'filterWeekGL'])->name('GL-week');

    // Prayer Book
    Route::get('Asisten/Prayer-Book/{nip}/Trainee', [Asisten_PrayerBookController::class, 'index'])->name('Prayerbook-asisten');
    Route::patch('/Asisten/Prayer-Book/{id}/poin', [Asisten_PrayerBookController::class, 'PBpoin'])->name('Pb-poin');
    Route::post('/Asisten/{id}/filter-prayerbook', [Asisten_PrayerBookController::class, 'filterWeek_prayer'])->name('prayerBook-week');

    // Announcements
    Route::resource('Asisten/notif', Announcement_AsistenController::class);
    Route::put('/Asisten/notif/{id}', [Announcement_AsistenController::class, 'update'])->name('h.message');

    // Memorizing Verses
    Route::get('Asisten/Memorizing-verses/{nip}/trainee', [Memorizing_Verses_AsistenController::class, 'index'])->name('Memorizing_verses-Asisten');
    Route::patch('/Asisten/Memorizing-verses/{id}/poin', [Memorizing_Verses_AsistenController::class, 'MVpoin'])->name('MV-poin');
    Route::post('/Asisten/{id}/Memorizing-verses', [Memorizing_Verses_AsistenController::class, 'filterMemorizingVersesWeek'])->name('Memorizing_Verses-week');

    // Hymns
    Route::get('Asisten/Hymns/{nip}/trainee', [Hymns_AsistenController::class, 'index'])->name('Hymns-Asisten');
    Route::patch('/Asisten/Hymns/{id}/poin', [Hymns_AsistenController::class, 'Hymnspoin'])->name('HYMNS-poin');
    Route::post('/Asisten/{id}/Hymns', [Hymns_AsistenController::class, 'filterHymnsWeek'])->name('Hymns-week');

    // Five Time Prayer
    Route::get('Asisten/fivetimeprayer/{nip}/trainee', [five_timeprayerController::class, 'index'])->name('Fivetimeprayer-Asisten');
    Route::patch('/Asisten/fivetimeprayer/{id}/poin', [five_timeprayerController::class, 'fivetimeprayerpoin'])->name('fivetimeprayer-poin');
    Route::post('/Asisten/{id}/fivetimeprayer', [five_timeprayerController::class, 'filterfivetimeprayerWeek'])->name('fivetimeprayer-week');

    // Personal Goals
    Route::get('Asisten/personal-goals/{nip}/trainee', [Personal_Goals_AsistenController::class, 'index'])->name('personalgoals-Asisten');
    Route::patch('/Asisten/personal-goals/{id}/poin', [Personal_Goals_AsistenController::class, 'personalgoalspoin'])->name('personalgoals-poin');
    Route::post('/Asisten/{id}/personal-goals', [Personal_Goals_AsistenController::class, 'filterpersonalgoalsWeek'])->name('personalgoals-week');

    // Summary of Ministry
    Route::get('Asisten/Summery_of_Ministry/{nip}/trainee', [Summery_of_MinistryController::class, 'index'])->name('Ministry-Asisten');
    Route::patch('/Asisten/Summery_of_Ministry/{id}/poin', [Summery_of_MinistryController::class, 'Summery_of_Ministrypoin'])->name('Summery_of_Ministry-poin');
    Route::post('/Asisten/{id}/Summery_of_Ministry', [Summery_of_MinistryController::class, 'Summery_of_MinistryWeek'])->name('Summery_of_Ministry-week');

    // Fellowship
    Route::get('Asisten/Fellowship/{nip}/trainee', [Fellowship_AsistenController::class, 'index'])->name('Fellowship-Asisten');
    Route::patch('/Asisten/Fellowship/{id}/poin', [Fellowship_AsistenController::class, 'FellowshipAsistenpoin'])->name('Fellowship-poin');
    Route::post('/Asisten/{id}/Fellowship', [Fellowship_AsistenController::class, 'FellowshipAsistenWeek'])->name('Fellowship-week');

    // Script
    Route::get('Asisten/Script/{nip}/trainee', [Script_AsistenController::class, 'index'])->name('Script-Asisten');
    Route::patch('/Asisten/Script/{id}/poin', [Script_AsistenController::class, 'Scriptpoin'])->name('Script-poin');
    Route::post('/Asisten/{id}/Script', [Script_AsistenController::class, 'ScriptWeek'])->name('Script-week');

    // Agenda
    Route::get('Asisten/Agenda/{nip}/trainee', [Agenda_AsistenController::class, 'index'])->name('Agenda-Asisten');
    Route::patch('/Asisten/Agenda/{id}/poin', [Agenda_AsistenController::class, 'Agendapoin'])->name('Agenda-poin');
    Route::post('/Asisten/{id}/Agenda', [Agenda_AsistenController::class, 'AgendaWeek'])->name('Agenda-week');

    // Financial
    Route::get('Asisten/finance/{nip}/trainee', [Financial_AsistenController::class, 'index'])->name('Financial-Asisten');
    Route::patch('/Asisten/finance/{id}/poin', [Financial_AsistenController::class, 'Agendapoin'])->name('Financial-poin');
    Route::post('/Asisten/{id}/finance', [Financial_AsistenController::class, 'AgendaWeek'])->name('Financial-week');

    // Assignment
    Route::get('Asisten/Assignment/{nip}/trainee', [Task_personalgoalsController::class, 'index'])->name('Assignment-Asisten');
    Route::post('/Asisten/Assignment', [Task_personalgoalsController::class, 'Add_Assignment'])->name('Add_Assignment');
    Route::put('/Asisten/Assignment/{id}/838827263', [Task_personalgoalsController::class, 'Inactive'])->name('Add_Assignment_Inactive');
    Route::put('/Asisten/Assignment/{id}/77482738', [Task_personalgoalsController::class, 'Active'])->name('Add_Assignment_Active');
    Route::post('/Asisten/Assignment/{id}/F-47263', [Task_personalgoalsController::class, 'Filter_Assignment'])->name('Add_Assignment_Week');

    // Report
    Route::get('Asisten/report/{nip}/trainee', [Report_traineeController::class, 'index'])->name('Report-Asisten');
    Route::patch('Asisten/report/{id}/5362526', [Report_traineeController::class, 'ReportAsisten'])->name('Report_Asisten');
    Route::post('/Asisten/report/{id}/4334526', [Report_traineeController::class, 'filterreport'])->name('Report_Asisten-week');

});



// Hanya bisa diakses oleh role admin
Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/Admin', function () {
        return view('Admin.home',
    ["title" => "Home"]);
    })->name('admin.Home');

    Route::resource('Admin/trainee', AdminController::class);
    Route::resource('Admin/asisten', AdasistenController::class);
    Route::resource('Admin/weekly', WeeklyController::class);
    Route::get('Admin/report', [WeeklyController::class, 'reportw'])->name('report.w');
    Route::post('Admin/report', [WeeklyController::class, 'set'])->name('set');
    Route::resource('Admin/poin', PoinController::class);
    Route::get('Admin/report/73826273', [PoinController::class, 'form_target_daily'])->name('report.daily');
    Route::post('Admin/report/P3627362', [PoinController::class, 'input_poin'])->name('report.inputdaily');
    Route::get('Admin/report/{id}/E3627362', [PoinController::class, 'edit_poin_daily'])->name('report.formeditdaily');
    Route::put('Admin/report/{id}/S3627362', [PoinController::class, 'update_poin_daily'])->name('report.method');
    Route::resource('Admin/Announcement', AnnouncementController::class);
    Route::resource('Admin/batch', Batch_AController::class);
    Route::get('Admin/jurnal', [Item_JurnalController::class, 'index'])->name('item.jurnal');
    Route::get('Admin/jurnal/{id}/837284', [Item_JurnalController::class, 'Inactive'])->name('Inactive.jurnal');
    Route::get('Admin/jurnal/{id}/948539', [Item_JurnalController::class, 'Active'])->name('Active.jurnal');
    Route::get('Admin/jurnal/{id}/42323224', [Item_JurnalController::class, 'Inactive_Menu'])->name('Inactive.jurnal_Asisten');
    Route::get('Admin/jurnal/{id}/94853433439', [Item_JurnalController::class, 'Active_Menu'])->name('Active.jurnal_Asisten');
    Route::get('Admin/jurnal/report/', [Report_jurnalController::class, 'index'])->name('report_view_jurnal');
  


});







