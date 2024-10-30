<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HymnsController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\BibleReadingController;
use App\Http\Controllers\MemorizingVersesController;




// alur login
Route::get('/', [AuthController::class, 'Halaman_Login'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/Checking-Data', [AuthController::class, 'cek'])->name('auth.cek');
Route::post('/Checking-Data', [AuthController::class, 'cekNip'])->name('cek.nip');
Route::get('/Register', [AuthController::class, 'regis'])->name('auth.register');
Route::post('/Register', [TraineeController::class, 'register'])->name('auth.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');




Route::middleware(['check.role:trainee'])->group(function () {
    Route::get('/Trainee', function () {
        return view('Trainee.content.home',
    ["title" => "Home"]);
    })->name('trainee.Home');
    Route::resource('BibleReading', BibleReadingController::class);
    Route::resource('MemorizingVerses', MemorizingVersesController::class);
    Route::resource('Hymns', HymnsController::class);
    // Tambahkan rute lainnya di sini
});










Route::get('/Trianee/5 Times Prayer', function () {
    return view('Trainee.content.TimesPrayer',
["title" => "5 Times Prayer"]);
})->name('trainee.TimesPrayer');

Route::get('/Trianee/Personal goals', function () {
    return view('Trainee.content.Personalgoals',
["title" => "Personal goals"]);
})->name('trainee.Personalgoals');

Route::get('/Trianee/Good Land', function () {
    return view('Trainee.content.GoodLand',
["title" => "Good Land"]);
})->name('trainee.GoodLand');

Route::get('/Trianee/Prayer Book', function () {
    return view('Trainee.content.PrayerBook',
["title" => "Prayer Book"]);
})->name('trainee.PrayerBook');

Route::get('/Trianee/Summary Of Ministry', function () {
    return view('Trainee.content.SummaryOfMinistry',
["title" => "Summary Of Ministry"]);
})->name('trainee.SummaryOfMinistry');

Route::get('/Trianee/Fellowship', function () {
    return view('Trainee.content.Fellowship',
["title" => "Fellowship"]);
})->name('trainee.Fellowship');

Route::get('/Trianee/ScriptTs', function () {
    return view('Trainee.content.ScriptTs',
["title" => "Script Ts"]);
})->name('trainee.ScriptTs');

Route::get('/Trianee/Agenda', function () {
    return view('Trainee.content.Agenda',
["title" => "Agenda"]);
})->name('trainee.Agenda');

Route::get('/Trianee/Financial Statements', function () {
    return view('Trainee.content.FinancialStatements',
["title" => "Financial Statements"]);
})->name('trainee.FinancialStatements');

Route::get('/Trianee/Journal Report', function () {
    return view('Trainee.content.JournalReport',
["title" => "Journal Report"]);
})->name('trainee.JournalReport');



// View Asisten
Route::get('/Asisten', function () {
    return view('Asisten.content.home',
["title" => "Home"]);
})->name('Asisten.A_home');

Route::get('/Asisten/Bible', function () {
    return view('Asisten.content.biblereading',
["title" => "Bible Reading"]);
})->name('Asisten.A_biblereading');

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


