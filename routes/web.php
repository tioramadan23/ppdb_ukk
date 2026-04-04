<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| AREA LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return 'Login berhasil';
    })->name('dashboard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
        ->name('pendaftaran');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
});

// Forgot Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/utama', function () {
    return view('halaman_utama');
})->name('utama');

Route::get('/registrasi', function () {
    return view('registrasi');
})->name('registrasi');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/tentang_sekolah', function () {
    return view('tentang_sekolah');
})->name('tentang_sekolah');

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');

Route::get('/dashboard/siswa', function () {
    return view('dashboard.siswa');
})->name('dashboard.siswa');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN & SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');

    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');
});

/*
|--------------------------------------------------------------------------
| AKSES KHUSUS ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
})->name('dashboard.admin');

Route::get('/dashboard/siswa', function () {
    return view('dashboard.siswa');
})->name('dashboard.siswa');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN (ROLE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD SISWA (ROLE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:calon_siswa'])->group(function () {

    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');
});

/*
|--------------------------------------------------------------------------
| STATUS PENDAFTARAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

// Route untuk form pendaftaran (CREATE)
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
    ->name('pendaftaran.create')
    ->middleware('auth');

// Route untuk submit form (STORE)
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
    ->name('pendaftaran.store')
    ->middleware('auth');

// Route untuk lihat status (STATUS)
Route::get('/status', [PendaftaranController::class, 'status'])
    ->name('pendaftaran.status')
    ->middleware('auth');
});
