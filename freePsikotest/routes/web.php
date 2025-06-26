<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;
use App\Http\Controllers\dashboardControlleer;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/instruksi', function () {
    return view('public.instruksi');
})->name('instruksi');

Route::get('/biodata', function () {
    return view('public.biodata');
})->name('biodata');

Route::post('/biodata', [publicController::class, 'addBiodata'])->name('biodataAdd');

Route::get('/tes/{no?}', [publicController::class, 'showTes'])->name('tes');
Route::post('/tes/{no}', [publicController::class, 'addTes'])->name('tesAdd');

Route::get('/feedback', function () {
    return view('public.feedback');
})->name('feedback');

Route::post('/feedback', [publicController::class, 'addFeedback'])->name('feedbackAdd');

Route::get('/hasil', [publicController::class, 'hasil'])->name('hasil');

Route::get('/selesai', function () {
    return redirect()->route('home')->with('success', 'Terima kasih atas feedback Anda!');
})->name('selesai');


// Dashboard
//Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index'); 
    })->name('dashboard');

    Route::get('/login', function () {
        return view('dashboard.login');
    })->name('login');

    Route::post('/login', [dashboardController::class, 'login'])->name('loging');

    Route::get('/soal', [dashboardController::class, 'soal'])->name('soal');

    Route::post('/soalAdd', [dashboardController::class, 'soalAdd'])->name('soalAdd');

    Route::post('/soalEdit', [dashboardController::class, 'soalEdit'])->name('soalEdit');

    Route::post('/soalDelete', [dashboardController::class, 'soalDelete'])->name('soalDelete');

    Route::get('/respon', [dashboardController::class, 'respon'])->name('respon');

    Route::get('/responDetail', [dashboardController::class, 'responDetail'])->name('responDetail');

    Route::post('/responDelete', [dashboardController::class, 'responDelete'])->name('responDelete');
    
    Route::get('/logout',  [dashboardController::class, 'logout'])->name('logout');
});