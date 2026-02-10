<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ======================
    // FORM REGISTER
    // ======================
    public function register()
    {
        return view('auth.register');
    }

    // ======================
    // PROSES REGISTER
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'calon_siswa',
        ]);

        Auth::login($user);

        return redirect()->route('pendaftaran.create')
            ->with('success', 'Registrasi berhasil! Silakan lengkapi data pendaftaran.');
    }

    // ======================
    // FORM LOGIN
    // ======================
    public function login()
    {
        return view('home');
    }

    // ======================
    // PROSES LOGIN
    // ======================
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // calon siswa
            return redirect()->route('pendaftaran.create');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }


    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logout berhasil!');
    }
}
