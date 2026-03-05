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
        ->name('pendaftaran');

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
Route::get('/tentang-sekolah', function () {
    return view('tentang-sekolah');
})->name('tentang-sekolah');

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');

Route::get('/siswa', function () {
    return view('dashboard.pendaftaran');
})->name('dashboard.siswa');

// DHASHBOARD ADMIN & SISWA
    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin');
        })->name('admin.dashboard');

        Route::get('/dashboard/siswa', function () {
            return view('dashboard.siswa');
        })->name('dashboard.siswa');

    });


// AKSES KHUSUS ADMIN
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');


// =====================
// DASHBOARD ADMIN
// =====================
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin');
        })->name('dashboard.admin');
    });


// =====================
// DASHBOARD SISWA
// =====================
    Route::middleware(['auth', 'role:calon_siswa'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.siswa');
        })->name('dashboard.siswa');
    });

   



