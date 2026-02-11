<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Routing\RouteRegistrar;

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


route::get('/utama', function () {
    return view('utama');
})->name('utama');

Route::get('/registrasi', function () {
    return view('registrasi');
})->name('registrasi');

Route::get('/home', function () {
    return view('home');
})->name('home');

// DHASHBOARD ADMIN & SISWA
    Route::middleware(['auth'])->group(function () {

        Route::get('/admin/dashboard', function () {
            return view('dashboard.admin');
        })->name('admin.dashboard');

        Route::get('/siswa/dashboard', function () {
            return view('dashboard.siswa');
        })->name('siswa.dashboard');

    });

