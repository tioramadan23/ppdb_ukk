<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Lupa Password</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: { 500: '#06b6d4', 600: '#0891b2' }
                }
            }
        }
    }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20"> 
            
            <!-- Header -->
            <div class="text-center mb-8"> 
                <div class="w-20 h-20 bg-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-4 ring-4 ring-cyan-500/30">
                    <i class="fas fa-key text-cyan-400 text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Lupa Password</h2>
                <p class="text-gray-300 mt-2 text-sm">
                    Masukkan email Anda untuk reset password
                </p>
            </div>

            <!-- Success Message (Contained in Box) -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/40 rounded-2xl backdrop-blur-sm">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-400 text-xl mt-0.5"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-green-100 font-medium text-sm mb-2">
                                Link reset password telah dikirim!
                            </p>
                            <div class="bg-black/30 rounded-lg p-3 text-xs space-y-2">
                                <div class="flex items-center text-gray-300">
                                    <i class="fas fa-key text-cyan-400 mr-2"></i>
                                    <span class="font-mono text-cyan-300 break-all">{{ Str::limit(session('token') ?? '', 40) }}</span>
                                </div>
                                <a href="{!! session('reset_password') !!}" 
                                   target="_blank" 
                                   class="flex items-center text-cyan-300 hover:text-cyan-200 transition-colors">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    Klik untuk Reset Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/40 rounded-2xl backdrop-blur-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-400 text-xl mr-3"></i>
                        <p class="text-red-100 text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Input -->
                <div class="space-y-2 mb-6"> 
                    <label for="email" class="block text-sm font-medium text-gray-200">
                        <i class="fas fa-envelope mr-2 text-cyan-400"></i>Email
                    </label>
                    <div class="relative">
                        <input id="email" 
                            name="email" 
                            type="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-5 py-3.5 bg-white/5 border-2 border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500/50 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                            placeholder="example@gmail.com">
                        @if($errors->has('email'))
                            <i class="fas fa-exclamation-circle absolute right-4 top-1/2 -translate-y-1/2 text-red-400"></i>
                        @endif
                    </div>
                    @error('email')
                        <p class="text-red-400 text-xs mt-1 flex items-center">
                            <i class="fas fa-info-circle mr-1.5"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-3.5 rounded-xl font-semibold hover:from-cyan-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-cyan-500/25">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Link Reset
                </button>

                <!-- Back to Login -->
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-sm text-gray-300 hover:text-cyan-400 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>