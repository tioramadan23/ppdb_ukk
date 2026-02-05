<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="min-h-screen bg-coffee-gradient flex items-start justify-center px-4 pt-16 pb-16">
    <div class="max-w-md w-full">
        <!-- Form Transparan dengan Glassmorphism -->
        <div class="bg-glass rounded-2xl shadow-2xl p-10"> <!-- Padding diperbesar dari p-8 ke p-10 -->
            <div class="text-center mb-8"> <!-- Margin bottom diperbesar dari mb-6 ke mb-8 -->
                <h2 class="text-3xl font-bold text-white">
                    Login
                </h2>
                <p class="text-white mt-2 opacity-80"> <!-- Margin top diperbesar dari mt-1 ke mt-2 -->
                    Masuk ke akun Anda
                </p>
            </div>

            <form class="space-y-5"> <!-- Spacing diperbesar dari space-y-6 ke space-y-5 -->
                <!-- Email Address -->
                <div class="space-y-2"> <!-- Menambahkan spacing antara label dan input -->
                    <label for="email" class="block text-sm font-medium text-white opacity-90">
                        Email 
                    </label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all" 
                        placeholder="example@gmail.com">
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-white opacity-90">
                        Password
                    </label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                        class="input-glass w-full px-5 py-3.5 rounded-lg focus:outline-none transition-all"
                        placeholder="••••••••">
                </div>
                <!-- Remember Me -->
                <div class="flex items-center space-x-2"> <!-- Menambahkan spacing antara checkbox dan label -->
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-coffee-medium focus:ring-coffee-medium border-white border-opacity-30 rounded">
                    <label for="remember-me" class="text-sm text-white opacity-90">
                        Remember me
                    </label>
                </div>

               <!-- Button -->
                <div class="pt-2">
                <button type="submit" class="block mx-auto w-[200px] bg-sky-950 bg-opacity-90 text-white py-3 rounded-lg font-medium hover:bg-sky-900 hover:bg-opacity-100 transition-all">
                    Masuk
                </button>
                </div>

                <!-- Forgot Password -->
                <div class="pt-6"> <!-- Padding top sebelum link -->
                    <p class="text-center text-sm text-white opacity-80">
                        Belum Punya Akun?
                        <a href="Registrasi.blade.php" class="font-medium text-cyan-300 hover:text-cyan-500 transition-colors">
                            Daftar Sekarang
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>