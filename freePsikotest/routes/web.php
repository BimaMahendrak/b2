<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\publicController;

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

Route::get('/tes', function () {
    return view('public.tes');
})->name('tes');

Route::post('/tes', [publicController::class, 'addTes'])->name('tesAdd');

Route::get('/feedback', function () {
    return view('public.feedback');
})->name('feedback');

Route::post('/feedback', [publicController::class, 'addFeedback'])->name('feedbackAdd');

Route::get('/hasil', function () {
    return view('public.hasil');
})->name('hasil');

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

    Route::get('/respon', function () {
        return view('dashboard.respon');
    })->name('respon');

    Route::get('/soal', function () {
        return view('dashboard.soal');
    })->name('soal');
});