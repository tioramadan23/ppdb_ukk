<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\PendaftaranAdminController;
use App\Models\Pendaftaran;

// ================= PUBLIC ROUTES =================
Route::get('/', function () { return view('home'); })->name('home');
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
    
    // Dashboard default (auto redirect by role)
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        // Jika siswa sudah mendaftar, redirect ke status
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.status');
        }
        
        return view('dashboard.siswa');
    })->name('dashboard');

    // ✅ PENDAFTARAN ROUTES (Siswa)
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');
    
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
    
    Route::get('/pendaftaran/status', [PendaftaranController::class, 'status'])
        ->name('pendaftaran.status');

    // ================= 🎯 ADMIN ROUTES =================
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        
        // 📊 Dashboard Admin (Halaman Utama)
        Route::get('/dashboard', function () {
            return view('dashboard.admin'); 
        })->name('dashboard');
        
        // 📡 API: Ambil data pendaftar (✅ URL Disesuaikan dengan JS jadi /pendaftarans/data)
        Route::get('/pendaftarans/data', [PendaftaranAdminController::class, 'getData'])
            ->name('pendaftarans.data');

        // 📡 API: Export data ke CSV (✅ Dipindah ke ATAS {id} agar tidak terbaca sebagai ID)
        Route::get('/pendaftarans/export', [PendaftaranAdminController::class, 'export'])
            ->name('pendaftarans.export');
        
        // 📡 API: Detail lengkap satu pendaftar
        Route::get('/pendaftarans/{id}', [PendaftaranAdminController::class, 'show'])
            ->name('pendaftarans.show');
        
        // 📡 API: Verifikasi pendaftar
        Route::post('/pendaftarans/{id}/verifikasi', [PendaftaranAdminController::class, 'verifikasi'])
            ->name('pendaftarans.verifikasi');

        // 📡 API: Tolak pendaftar
        Route::post('/pendaftarans/{id}/tolak', [PendaftaranAdminController::class, 'tolak'])
            ->name('pendaftarans.tolak');
        
        // 📡 API: Update status (approve/reject)
        Route::patch('/pendaftarans/{id}/status', [PendaftaranAdminController::class, 'updateStatus'])
            ->name('pendaftarans.status');
        
        // 📡 API: Statistik untuk chart
        Route::get('/stats', [PendaftaranAdminController::class, 'getStats'])
            ->name('stats');
    });
    // ================= END ADMIN ROUTES =================

    // Dashboard per role (jika butuh akses langsung)
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard/admin', function () { 
            return redirect()->route('admin.dashboard'); 
        })->name('dashboard.admin');
    });

    Route::middleware('role:calon_siswa')->group(function () {
        Route::get('/dashboard/siswa', function () { return view('dashboard.siswa'); })->name('dashboard.siswa');
    });
});

// ================= PUBLIC FALLBACK =================
Route::get('/registrasi', function () { return view('registrasi'); })->name('registrasi');