<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

// ================= PUBLIC ROUTES =================
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/tentang_sekolah', function () { return view('tentang_sekolah'); })->name('tentang_sekolah');
Route::get('/informasi', function () { return view('informasi'); })->name('informasi');

// ================= AUTH ROUTES =================
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ================= PROTECTED ROUTES (AUTH) =================
Route::middleware('auth')->group(function () {
    
    // Dashboard default
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin' 
            ? view('dashboard.admin') 
            : view('dashboard.siswa');
    })->name('dashboard');

    // ✅ PENDAFTARAN ROUTES (FIXED - NO DUPLICATES)
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');
    
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
    
    Route::get('/pendaftaran/status', [PendaftaranController::class, 'status'])
        ->name('pendaftaran.status');

    // Dashboard per role (jika butuh beda view)
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard/admin', function () { return view('dashboard.admin'); })->name('dashboard.admin');
    });

    Route::middleware('role:calon_siswa')->group(function () {
        Route::get('/dashboard/siswa', function () { return view('dashboard.siswa'); })->name('dashboard.siswa');
    });
});

// ================= PUBLIC FALLBACK (jika masih butuh) =================
Route::get('/registrasi', function () { return view('registrasi'); })->name('registrasi');
// Route::get('/status-pendaftaran', function () { return view('status_pendaftaran'); })->name('status_pendaftaran');