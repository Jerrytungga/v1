<?php

use App\Http\Controllers\Ad_asistenController;
use App\Http\Controllers\Admin\AdasistenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\PoinController;
use App\Http\Controllers\Admin\WeeklyController;
use App\Http\Controllers\Asisten\Announcement_AsistenController;
use App\Http\Controllers\Asisten\Asisten_BibleReadingController;
use App\Http\Controllers\Asisten\Asisten_GoodlandController;
use App\Http\Controllers\Asisten\Asisten_PrayerBookController;
use App\Http\Controllers\Asisten\AsistenController;
use App\Http\Controllers\Asisten\AtraineeController;
use App\Http\Controllers\Asisten\Bible_readingController;
use App\Http\Controllers\Asisten\BibleReadingController as AsistenBibleReadingController;
use App\Http\Controllers\Asisten\five_timeprayerController;
use App\Http\Controllers\Asisten\Hymns_AsistenController;
use App\Http\Controllers\Asisten\Memorizing_Verses_AsistenController;
use App\Http\Controllers\Asisten\Personal_Goals_AsistenController;
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




Route::group(['middleware' => ['role:trainee']], function() {
    Route::get('/Trainee', [TraineeController::class, 'home'])->name('trainee.Home');
    Route::patch('/user/{id}/change-password', [TraineeController::class, 'changePassword'])->name('change.password');
    Route::resource('Trainee/BibleReading', BibleReadingController::class);
    Route::resource('Trainee/MemorizingVerses', MemorizingVersesController::class);
    Route::resource('Trainee/Hymns', HymnsController::class);
    Route::resource('Trainee/fiveTimesPrayer', TimePrayerController::class);
    Route::resource('Trainee/personalgoal', PersonalgoalController::class);
    Route::resource('Trainee/goodland', GoodlandController::class);
    Route::resource('Trainee/prayerbook', PrayerbookController::class);
    Route::get('Trainee/prayerbook/{id}/answer', [PrayerbookController::class, 'answer'])->name('prayerbook.answer');
    Route::put('Trainee/prayerbook/{id}/answer', [PrayerbookController::class, 'save_answer'])->name('prayerbook.save_answer');
    Route::resource('Trainee/ministri', MinistriController::class);
    Route::post('Trainee/ministri/filter-week', [MinistriController::class, 'filterWeek'])->name('filter.week');
    Route::resource('Trainee/fellowship', FellowshipController::class);
    Route::post('Trainee/fellowship/filter-week', [FellowshipController::class, 'filterWeek'])->name('fellowshipfilter.week');
    Route::resource('Trainee/pameran', PameranController::class);
    Route::post('Trainee/pameran/filter-week', [PameranController::class, 'filterWeek'])->name('pameranfilter.week');
    Route::resource('Trainee/agenda', AgendaController::class);
    Route::post('Trainee/agenda/filter-week', [AgendaController::class, 'filterWeek'])->name('Agendafilter.week');
    Route::resource('Trainee/keuangan', KeuanganController::class);
    Route::post('Trainee/keuangan/filter-week', [KeuanganController::class, 'filterWeek'])->name('keuangan.week');
    Route::get('Trainee/report', [ReportController::class, 'index'])->name('report.index');

    

    Route::prefix('Trainee/goodland/{id}/pengalaman')->group(function () {
        Route::get('/', [GoodlandController::class, 'inputpengalaman'])->name('goodland.inputpengalaman');
        Route::put('/', [GoodlandController::class, 'savepengalaman'])->name('goodland.savepengalaman');
    
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


// Hanya bisa diakses oleh role asisten
Route::group(['middleware' => ['role:asisten']], function() {
// View Asisten
Route::get('/Asisten', [AsistenController::class, 'index'])->name('asisten.Home');
Route::get('Asisten/trainee', [AtraineeController::class, 'strainee'])->name('htrainee.asisten');
// Route::get('Asisten/Bible/{$nip}', [Bible_readingController::class, 'index'])->name('bible.asisten');
Route::get('Asisten/Bible/{nip}', [Bible_readingController::class, 'index'])->name('bible-asisten');
Route::patch('/Asisten/{id}/poin', [Bible_readingController::class, 'bpoin'])->name('bible-poin');
Route::post('/Asisten/{id}/filter-week', [Bible_readingController::class, 'filterWeek'])->name('bible-week');
Route::get('Asisten/GoodLand/{nip}/Trainee', [Asisten_GoodlandController::class, 'index'])->name('Goodland-asisten');
Route::patch('/Asisten/GoodLand/{id}/poin', [Asisten_GoodlandController::class, 'GLpoin'])->name('GL-poin');
Route::post('/Asisten/{id}/filter-goodland', [Asisten_GoodlandController::class, 'filterWeekGL'])->name('GL-week');
Route::get('Asisten/Prayer-Book/{nip}/Trainee', [Asisten_PrayerBookController::class, 'index'])->name('Prayerbook-asisten');
Route::patch('/Asisten/Prayer-Book/{id}/poin', [Asisten_PrayerBookController::class, 'PBpoin'])->name('Pb-poin');
Route::post('/Asisten/{id}/filter-prayerbook', [Asisten_PrayerBookController::class, 'filterWeek_prayer'])->name('prayerBook-week');
Route::resource('Asisten/notif', Announcement_AsistenController::class);
Route::put('/Asisten/notif/{id}', [Announcement_AsistenController::class, 'update'])->name('h.message');
Route::get('Asisten/Memorizing-verses/{nip}/trainee', [Memorizing_Verses_AsistenController::class, 'index'])->name('Memorizing_verses-Asisten');
Route::patch('/Asisten/Memorizing-verses/{id}/poin', [Memorizing_Verses_AsistenController::class, 'MVpoin'])->name('MV-poin');
Route::post('/Asisten/{id}/Memorizing-verses', [Memorizing_Verses_AsistenController::class, 'filterMemorizingVersesWeek'])->name('Memorizing_Verses-week');
Route::get('Asisten/Hymns/{nip}/trainee', [Hymns_AsistenController::class, 'index'])->name('Hymns-Asisten');
Route::patch('/Asisten/Hymns/{id}/poin', [Hymns_AsistenController::class, 'Hymnspoin'])->name('HYMNS-poin');
Route::post('/Asisten/{id}/Hymns', [Hymns_AsistenController::class, 'filterHymnsWeek'])->name('Hymns-week');
Route::get('Asisten/fivetimeprayer/{nip}/trainee', [five_timeprayerController::class, 'index'])->name('Fivetimeprayer-Asisten');
Route::patch('/Asisten/fivetimeprayer/{id}/poin', [five_timeprayerController::class, 'fivetimeprayerpoin'])->name('fivetimeprayer-poin');
Route::post('/Asisten/{id}/fivetimeprayer', [five_timeprayerController::class, 'filterfivetimeprayerWeek'])->name('fivetimeprayer-week');
Route::get('Asisten/personal-goals/{nip}/trainee', [Personal_Goals_AsistenController::class, 'index'])->name('personalgoals-Asisten');
Route::patch('/Asisten/personal-goals/{id}/poin', [Personal_Goals_AsistenController::class, 'personalgoalspoin'])->name('personalgoals-poin');
Route::post('/Asisten/{id}/personal-goals', [Personal_Goals_AsistenController::class, 'filterpersonalgoalsWeek'])->name('personalgoals-week');






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
    Route::resource('Admin/Announcement', AnnouncementController::class);



});







