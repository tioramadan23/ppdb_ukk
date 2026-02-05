<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes untuk registrasi, login, logout, dan pendaftaran.
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// ----------------------
// AUTHENTIKASI
// ----------------------
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ----------------------
// PENDAFTARAN
// ----------------------
Route::middleware('auth')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
});
