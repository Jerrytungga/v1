<?php

use App\Http\Controllers\Ad_asistenController;
use App\Http\Controllers\Admin\AdasistenController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PoinController;
use App\Http\Controllers\Admin\WeeklyController;
use App\Http\Controllers\Asisten\Asisten_BibleReadingController;
use App\Http\Controllers\Asisten\AsistenController;
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
    Route::get('/Trainee', function () {
        return view('Trainee.content.home',
    ["title" => "Home"]);
    })->name('trainee.Home');
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
// Route::resource('Asisten/BibleReading', Asisten_BibleReadingController::class);
Route::resource('Asisten', AsistenController::class)->names([
    'index'   => 'asisten.Home',
]);



Route::get('/Asisten/Memorizing', function () {
    return view('Asisten.content.Memorizing',
["title" => "Memorizing Verses"]);
})->name('Asisten.A_Memorizing');

Route::get('/Asisten/Hymn', function () {
    return view('Asisten.content.hymn',
["title" => "Hymn"]);
})->name('Asisten.A_Hymn');

Route::get('/Asisten/5 Times Prayer', function () {
    return view('Asisten.content.TimesPrayer',
["title" => "5 Times Prayer"]);
})->name('Asisten.A_TimesPrayer');

Route::get('/Asisten/Personal goals', function () {
    return view('Asisten.content.Personalgoals',
["title" => "Personal goals"]);
})->name('Asisten.A_Personalgoals');

Route::get('/Asisten/Good Land', function () {
    return view('Asisten.content.GoodLand',
["title" => "Good Land"]);
})->name('Asisten.A_GoodLand');

Route::get('/Asisten/Prayer Book', function () {
    return view('Asisten.content.PrayerBook',
["title" => "Prayer Book"]);
})->name('Asisten.A_PrayerBook');

Route::get('/Asisten/Summary Of Ministry', function () {
    return view('Asisten.content.SummaryOfMinistry',
["title" => "Summary Of Ministry"]);
})->name('Asisten.A_SummaryOfMinistry');

Route::get('/Asisten/Fellowship', function () {
    return view('Asisten.content.Fellowship',
["title" => "Fellowship"]);
})->name('Asisten.A_Fellowship');

Route::get('/Asisten/ScriptTs', function () {
    return view('Asisten.content.ScriptTs',
["title" => "Script Ts"]);
})->name('Asisten.A_ScriptTs');

Route::get('/Asisten/Agenda', function () {
    return view('Asisten.content.Agenda',
["title" => "Agenda"]);
})->name('Asisten.A_Agenda');

Route::get('/Asisten/Financial Statements', function () {
    return view('Asisten.content.FinancialStatements',
["title" => "Financial Statements"]);
})->name('Asisten.A_FinancialStatements');

Route::get('/Asisten/Journal Report', function () {
    return view('Asisten.content.JournalReport',
["title" => "Journal Report"]);
})->name('Asisten.A_JournalReport');



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



});







