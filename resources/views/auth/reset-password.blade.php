<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Reset Password</title>
</head>
<body class="min-h-screen bg-coffee-gradient flex items-start justify-center px-4 pt-16 pb-16">
    <div class="max-w-md w-full">
        <div class="bg-glass rounded-2xl shadow-2xl p-10"> 
            <div class="text-center mb-8"> 
                <div class="w-16 h-16 bg-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock text-cyan-400 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Reset Password</h2>
                <p class="text-white mt-2 opacity-80 text-sm">
                    Masukkan password baru untuk akun Anda.
                </p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-500/10 border border-red-500/20 rounded-xl backdrop-blur-sm">
                        <p class="text-red-200 text-sm flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                        </p>
                    </div>
                @endif

                <!-- Email -->
                <div class="space-y-2 mb-4"> 
                    <label for="email" class="block text-sm font-medium text-white opacity-90">Email</label>
                    <input id="email" 
                        name="email" 
                        type="email" 
                        value="{{ old('email') }}"
                        required
                        class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all"
                        placeholder="example@gmail.com">
                </div>

                <!-- New Password -->
                <div class="space-y-2 mb-4">
                    <label for="password" class="block text-sm font-medium text-white opacity-90">Password Baru</label>
                    <div class="relative">
                        <input id="password" 
                            name="password" 
                            type="password" 
                            required
                            class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all
                                {{ $errors->has('password') ? 'border-red-500/50 bg-red-500/10 ring-1 ring-red-500/30' : '' }}"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2 mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-white opacity-90">Konfirmasi Password</label>
                    <input id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required
                        class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all"
                        placeholder="••••••••">
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="block mx-auto w-[200px] bg-sky-950 bg-opacity-90 text-white py-3 rounded-lg font-medium hover:bg-sky-900 hover:bg-opacity-100 transition-all">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>