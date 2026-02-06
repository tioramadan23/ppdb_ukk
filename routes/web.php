<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Routes untuk registrasi, login, logout, dan pendaftaran.
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ----------------------
// AUTHENTIKASI
// ----------------------
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ----------------------
// PENDAFTARAN (WAJIB LOGIN)
// ----------------------
Route::middleware('auth')->group(function () {

    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // Dashboard (opsional)
    Route::get('/dashboard', function () {
        return 'Login berhasil';
    })->name('dashboard');
});

