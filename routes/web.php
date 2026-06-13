<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\LoginController;

// Rute untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Rute untuk menangani proses login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Rute untuk menangani logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Rute untuk halaman registrasi
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

// Rute utama yang mengarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {

    Route::get('music/pdf', [MusicController::class, 'exportPdf'])->name('music.pdf');
    Route::resource('music', MusicController::class);
    });