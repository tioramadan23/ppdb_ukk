<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

// HOME
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ======================
// AUTH
// ======================
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ======================
// AREA LOGIN
// ======================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return 'Login berhasil';
    })->name('dashboard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
});
