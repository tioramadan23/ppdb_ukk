<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    // ======================
    // FORM REGISTER
    // ======================
    public function register()
    {
        return view('registrasi');
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

        return redirect()->route('dashboard.siswa')
            ->with('success', 'Registrasi berhasil! Silakan lengkapi data.');
    }

    // ======================
    // FORM LOGIN
    // ======================
    public function login()
    {
        return view('login');
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
                return redirect()->route('dashboard.admin')
                    ->with('success', 'Selamat datang Admin!');
            }

            return redirect()->route('dashboard.siswa')
                ->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
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

    // ======================
    // FORGOT PASSWORD - FORM
    // ======================
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // ======================
    // FORGOT PASSWORD - KIRIM LINK
    // ======================
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email tidak terdaftar di sistem kami.',
        ]);

        $token = Str::random(60);
        
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => hash('sha256', $token),
                'created_at' => Carbon::now()
            ]
        );

        $resetLink = route('password.reset', ['token' => $token]);
        
        return redirect()->back()->with([
            'success' => true,
            'token' => $token,
            'reset_link' => $resetLink
        ]);
    }

    // ======================
    // RESET PASSWORD - FORM
    // ======================
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // ======================
    // RESET PASSWORD - PROSES
    // ======================
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Cek token di database
        $resetData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetData || hash('sha256', $request->token) !== $resetData->token) {
            return back()->withErrors(['email' => 'Token reset password tidak valid.']);
        }

        // Cek apakah token sudah kadaluarsa (1 jam)
        if (Carbon::parse($resetData->created_at)->addHour()->isPast()) {
            return back()->withErrors(['email' => 'Token reset password sudah kadaluarsa.']);
        }

        // Update password user
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus token setelah digunakan
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', '✅ Password berhasil direset. Silakan login dengan password baru.');
    }
}