<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login</title>
</head>
<body class="min-h-screen bg-coffee-gradient flex items-start justify-center px-4 pt-16 pb-16">
    <div class="max-w-md w-full">
        <div class="bg-glass rounded-2xl shadow-2xl p-10"> 
            <div class="text-center mb-8"> 
                <h2 class="text-3xl font-bold text-white">Login</h2>
                <p class="text-white mt-2 opacity-80">Masuk ke akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Success/Error Messages (Hanya untuk session) -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-500/10 border border-green-500/20 rounded-xl backdrop-blur-sm">
                        <p class="text-green-200 text-sm flex items-center">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        </p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-500/10 border border-red-500/20 rounded-xl backdrop-blur-sm">
                        <p class="text-red-200 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                        </p>
                    </div>
                @endif

                <!-- Email Address -->
                <div class="space-y-2"> 
                    <label for="email" class="block text-sm font-medium text-white opacity-90">Email</label>
                    <div class="relative">
                        <input id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            value="{{ old('email') }}"
                            required
                            class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all
                                {{ $errors->has('email') ? 'border-red-500/50 bg-red-500/10 ring-1 ring-red-500/30' : '' }}"
                            placeholder="example@gmail.com">
                        @if($errors->has('email'))
                            <i class="fas fa-exclamation-circle absolute right-4 top-1/2 -translate-y-1/2 text-red-400 text-sm"></i>
                        @endif
                    </div>
                    @error('email')
                        <p class="text-red-400 text-xs mt-1 flex items-center">
                            <i class="fas fa-info-circle mr-1.5"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-white opacity-90">Password</label>
                    <div class="relative">
                        <input id="password" 
                            name="password" 
                            type="password" 
                            autocomplete="new-password" 
                            required
                            class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all
                                {{ $errors->has('password') ? 'border-red-500/50 bg-red-500/10 ring-1 ring-red-500/30' : '' }}"
                            placeholder="••••••••">
                        @if($errors->has('password'))
                            <i class="fas fa-exclamation-circle absolute right-4 top-1/2 -translate-y-1/2 text-red-400 text-sm"></i>
                        @endif
                    </div>
                    @error('password')
                        <p class="text-red-400 text-xs mt-1 flex items-center">
                            <i class="fas fa-info-circle mr-1.5"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Forgot Password Link -->
                <div class="pt-2 text-right">
                    <a href="{{ route('password.request') }}" class="text-sm text-cyan-300 hover:text-cyan-200 transition-colors opacity-90 hover:opacity-100">
                        Lupa password?
                    </a>
                </div>

                <!-- Button -->
                <div class="pt-4">
                    <button type="submit" class="block mx-auto w-[200px] bg-sky-950 bg-opacity-90 text-white py-3 rounded-lg font-medium hover:bg-sky-900 hover:bg-opacity-100 transition-all">
                        Masuk
                    </button>
                </div>

                <!-- Register Link -->
                <div class="pt-6">
                    <p class="text-center text-sm text-white opacity-80">
                        Belum Punya Akun?
                        <a href="{{ route('register') }}" class="font-medium text-cyan-300 hover:text-cyan-500 transition-colors">
                            Daftar Sekarang
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>