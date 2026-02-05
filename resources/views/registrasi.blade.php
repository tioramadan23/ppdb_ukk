<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Registrasi</title>
</head>
<body class="min-h-screen bg-coffee-gradient flex items-start justify-center px-4 pt-16 pb-16">
    <div class="max-w-md w-full">
        <div class="bg-glass rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold -mt-2 text-white">Registrasi</h2>
                <p class="text-white mt-1 opacity-80">Membuat Akun Anda</p>
            </div>

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="mb-4 bg-green-500 bg-opacity-20 text-green-200 px-4 py-3 rounded-lg text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ALERT ERROR --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-500 bg-opacity-20 text-red-200 px-4 py-3 rounded-lg">
                    <ul class="text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-white mb-2 opacity-90">
                        Nama Lengkap
                    </label>
                    <input name="nama_lengkap" type="text" value="{{ old('nama_lengkap') }}" required
                        class="input-glass w-full px-4 py-3 rounded-lg focus:outline-none transition-all"
                        placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-white mb-2 opacity-90">
                        Email
                    </label>
                    <input name="email" type="email" value="{{ old('email') }}" required
                        class="input-glass w-full px-4 py-3 rounded-lg focus:outline-none transition-all"
                        placeholder="example@gmail.com">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-white mb-2 opacity-90">
                        Password
                    </label>
                    <input name="password" type="password" required
                        class="input-glass w-full px-4 py-3 rounded-lg focus:outline-none transition-all"
                        placeholder="••••••••">
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label class="block text-sm font-medium text-white mb-2 opacity-90">
                        Konfirmasi Password
                    </label>
                    <input name="password_confirmation" type="password" required
                        class="input-glass w-full px-4 py-3 rounded-lg focus:outline-none transition-all"
                        placeholder="••••••••">
                </div>

                <!-- Button -->
                <button type="submit"
                    class="block mx-auto w-[200px] bg-sky-950 bg-opacity-90 text-white py-3 rounded-lg font-medium hover:bg-sky-900 transition-all">
                    Daftar
                </button>

                <!-- Login -->
                <p class="mt-8 text-center text-sm text-white opacity-80">
                    Sudah Punya Akun?
                    <a href="{{ route('login') }}"
                       class="font-medium text-cyan-300 hover:text-cyan-500 transition-colors">
                        Login Sekarang
                    </a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
