<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pendaftaran SMK BPM</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Tailwind Config -->
    <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                fontFamily: { poppins: ['Poppins', 'sans-serif'] },
                colors: {
                    primary: {
                        50: '#0f172a',
                        100: '#111827',
                        500: '#1e3a8a',
                        600: '#2563eb',
                        700: '#1d4ed8',
                        800: '#1e40af',
                        900: '#172554',
                        dark: '#0b1120'
                    },
                    secondary: {
                        DEFAULT: '#1e3a8a',
                        light: '#172554'
                    }
                },
                animation: {
                    'fade-in': 'fadeIn 0.5s ease-in-out',
                    'slide-in': 'slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1)',
                    'shake': 'shake 0.5s'
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0', transform: 'translateY(20px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    slideIn: {
                        '0%': { opacity: '0', transform: 'translateY(30px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    zoomIn: {
                        '0%': { transform: 'scale(0.8)', opacity: '0' },
                        '100%': { transform: 'scale(1)', opacity: '1' }
                    },
                    shake: {
                        '0%, 100%': { transform: 'translateX(0)' },
                        '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-5px)' },
                        '20%, 40%, 60%, 80%': { transform: 'translateX(5px)' }
                    }
                }
            }
        }
    }
    </script>
    

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const data = JSON.parse(localStorage.getItem("form_ppdb")) || {};

        // ambil data dari localStorage
        const nama = data.nama_lengkap || '-';
        const nisn = data.nisn || '-';
        const jurusan = data.jurusan || '-';

        // tampilkan ke summary
        document.getElementById("summary_nama").textContent = nama;
        document.getElementById("summary_nisn").textContent = nisn;
        document.getElementById("summary_jurusan").textContent = jurusan;
    });
    </script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .file-upload-container.drag-over {
            border-color: #1e40af !important;
            background-color: rgba(37, 99, 235, 0.05) !important;
        }
        .form-control.shake {
            animation: shake 0.5s;
        }
        [x-cloak] { display: none !important; }
        #toastNotification {
            transition: transform 0.3s ease-in-out;
        }
        #toastNotification.translate-x-full {
            transform: translateX(100%);
        }
        html { scroll-behavior: smooth; }
        
        /* FIX: Warna teks input form */
        .form-control {
            color: #1f2937 !important; /* gray-900 */
        }
        .form-control::placeholder {
            color: #9ca3af !important; /* gray-400 */
            opacity: 1;
        }
        .form-control:focus::placeholder {
            color: #6b7280 !important; /* gray-500 */
        }
        .dark .form-control {
            color: #1f2937 !important; /* gray-100 */
        }
        .dark .form-control::placeholder {
            color: #6b7280 !important; /* gray-500 */
        }
        
        /* FIX: Animasi progress bar lebih smooth */
        #progressBar {
            transition: width 0.4s ease-in-out;
        }

        /* Konfirmasi Alert */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s;
        }

        /* Error Message Animation */
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

    </style>


</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<!-- Toast Notification -->
<div id="toastNotification" class="fixed top-20 right-4 z-50 bg-white border-l-4 border-green-500 rounded-lg shadow-lg p-4 pr-12 translate-x-full">
    <div class="flex items-start">
        <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
        <div class="flex-1">
            <h4 id="toastTitle" class="font-bold text-gray-800">Sukses!</h4>
            <p id="toastMessage" class="text-gray-600 text-sm mt-1"></p>
        </div>
        <button onclick="closeToast()" class="text-gray-400 hover:text-gray-600">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-95 z-50 flex items-center justify-center hidden">
    <div class="text-center">
        <div class="w-20 h-20 border-4 border-gray-200 border-t-primary-600 rounded-full animate-spin mx-auto mb-4"></div>
        <p class="text-primary-800 font-semibold text-lg">Memproses pendaftaran...</p>
    </div>
</div>

<!-- Navbar -->
<header class="sticky top-0 z-50 border-b border-gray-300 bg-white/90 backdrop-blur-md dark:border-gray-700 dark:bg-gray-900/90 shadow-sm">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex-shrink-0 text-xl font-bold flex items-center gap-2">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-primary-700 dark:text-primary-400">BPM</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm font-medium">
                <li>
                    <a class="{{ request()->routeIs('home') ? 'border-b-2 border-primary-700 pb-1 text-gray-900 dark:border-primary-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('tentang_sekolah') ? 'border-b-2 border-primary-700 pb-1 text-gray-900 dark:border-primary-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('tentang_sekolah') }}">
                        Tentang Sekolah
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('informasi') ? 'border-b-2 border-primary-700 pb-1 text-gray-900 dark:border-primary-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('informasi') }}">
                        Informasi
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('dashboard.siswa') ? 'border-b-2 border-primary-700 pb-1 text-gray-900 dark:border-primary-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('dashboard.siswa') }}">
                        Pendaftaran
                    </a>
                </li>
            </ul>
        </nav>


        <!-- Profile & Dark Mode Toggle -->
        <div class="hidden sm:flex items-center gap-3">
            <!-- Dark Mode Toggle -->
            <button id="dark-mode-toggle" class="p-2 rounded-lg text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition" aria-label="Toggle dark mode">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline"></i>
            </button>

            <!-- Profile Dropdown Container -->
            <div class="relative" id="profileDropdown">
                <!-- Profile Button (Trigger) -->
                <button onclick="toggleProfileDropdown()" class="flex items-center gap-2 focus:outline-none">
                    <img alt="Profile"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1e40af&color=fff"
                        class="h-10 w-10 rounded-full object-cover ring-2 ring-transparent hover:ring-primary-500 transition" />
                    <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 z-50">
                    <!-- User Info Header -->
                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        <span class="inline-block mt-1 px-2 py-0.5 text-xs font-medium bg-primary-100 text-primary-700 rounded-full">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </div>

                    <!-- Menu Items -->
                    <div class="py-2">
                        <!-- Status Pendaftaran -->
                        <a href="{{ route('pendaftaran.status') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-clipboard-list w-5 text-primary-600"></i>
                            <span class="ml-3">Status Pendaftaran</span>
                        </a>

                        <!-- Form Pendaftaran (jika belum submit) -->
                        @if(!\App\Models\Pendaftaran::where('user_id', Auth::id())->exists())
                        <a href="{{ route('pendaftaran.create') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-edit w-5 text-blue-600"></i>
                            <span class="ml-3">Isi Pendaftaran</span>
                        </a>
                        @endif

                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-tachometer-alt w-5 text-green-600"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>

                        {{-- <!-- Profile Settings (Optional - bisa dihapus jika belum ada) -->
                        <!--
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-user-cog w-5 text-purple-600"></i>
                            <span class="ml-3">Pengaturan Akun</span>
                        </a>
                        --> --}}
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 dark:border-gray-700"></div>

                    <!-- Logout -->
                    <div class="py-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                <span class="ml-3">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu button (visible only on mobile) -->
        <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            <span class="sr-only">Toggle menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Home</a>
            <a href="{{ route('tentang_sekolah') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Informasi</a>
            <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium text-gray-900 dark:text-white border-l-4 border-primary-700 dark:border-primary-500 bg-primary-50 dark:bg-primary-900/20 rounded-r-lg">Pendaftaran</a>
        </div>
    </div>
</header>
<!-- Navbar end -->

<!-- Main Container -->
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- ✅ FIX HEADER: Gradient biru yang lebih menyatu -->
        <div class="bg-gradient-to-r from-primary-800 via-primary-600 to-primary-500 p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-2 flex items-center justify-center">
                    <i class="fas fa-graduation-cap mr-3"></i>
                    Pendaftaran Siswa Baru SMK BPM
                </h1>
                <p class="text-lg opacity-95 mb-2">Tahun Ajaran 2026/2027</p>
                <div class="inline-block bg-white/20 px-6 py-2 rounded-full mt-3">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Gelombang I: 1 Januari - 31 Desember 2025
                </div>
            </div>
        </div>

        <!-- ✅ FIX PROGRESS BAR: Tanpa width hardcoded -->
        <div class="bg-white px-8 py-5 border-b">
            <div class="flex justify-between items-center mb-3">
                <span id="progressText" class="font-semibold text-gray-700">Langkah 1 dari 4</span>
                <span id="progressPercent" class="font-bold text-primary-800">0%</span>
            </div>
            <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-primary-600 to-primary-800 transition-all duration-500"></div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="border-l-4 border-primary-600 px-8 py-6 mx-8 my-6 rounded-r-lg">
            <h5 class="font-bold text-primary-800 flex items-center mb-3">
                <i class="fas fa-info-circle mr-2 text-lg"></i>
                Petunjuk Pendaftaran
            </h5>
            <ul class="text-gray-700 space-y-2 text-sm">
                <li><i class="fas fa-check text-green-500 mr-2"></i>Lengkapi semua data yang bertanda <span class="text-red-500">*</span> (wajib diisi)</li>
                <li><i class="fas fa-check text-green-500 mr-2"></i>Unggah berkas dalam format JPG, PNG, atau PDF (max 2MB per file)</li>
                <li><i class="fas fa-check text-green-500 mr-2"></i>Pastikan data yang diisi sudah benar sebelum submit</li>
                <li><i class="fas fa-check text-green-500 mr-2"></i>Simpan nomor pendaftaran Anda setelah berhasil mendaftar</li>
            </ul>
        </div>

        <!-- Navigation Tabs -->
        <div class="px-4 py-0">
            <div class="bg-gradient-to-r from-primary-800 to-primary-600 rounded-xl p-0 flex flex-wrap justify-center gap-0 w-full">
                <button class="nav-btn active bg-white text-primary-800 px-6 py-3 rounded-l-lg font-semibold shadow-lg flex-1 min-w-[120px] flex items-center justify-center transition-all" data-step="1">
                    <span class="w-6 h-6 bg-primary-600 text-white rounded-full flex items-center justify-center text-xs mr-2">1</span>
                    <i class="fas fa-user mr-2"></i>Data Diri
                </button>
                <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-none font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center transition-all" data-step="2">
                    <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">2</span>
                    <i class="fas fa-users mr-2"></i>Orang Tua
                </button>
                <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-none font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center transition-all" data-step="3">
                    <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">3</span>
                    <i class="fas fa-file mr-2"></i>Berkas
                </button>
                <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-r-lg font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center transition-all" data-step="4">
                    <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">4</span>
                    <i class="fas fa-credit-card mr-2"></i>Pembayaran
                </button>
            </div>
        </div>

        {{-- <!-- Form -->
        @if(session('success'))
        <div style="color:green">
            {{ session('success') }}
        </div>
        @endif --}}
        
        <form id="registrationForm" action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="px-8 py-6">
            @csrf

            <!-- Section 1: Data Diri Siswa -->
            <div class="form-section active block" id="section-1">
                <h3 class="text-2xl font-bold text-primary-800 mb-6 flex items-center">
                    <div class="dark:bg-primary-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user-graduate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    Data Diri Siswa
                </h3>
                <p class="text-gray-600 mb-8">Lengkapi data pribadi Anda dengan benar</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Nama Lengkap Siswa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $data['nama_lengkap'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Masukkan nama lengkap sesuai ijazah" required>
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama lengkap wajib diisi</div>
                    </div>

                    <!-- NISN -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            NISN <span class="text-red-500">*</span>
                            <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Induk Siswa Nasional"></i>
                        </label>
                        <input type="text" name="nisn" value="{{ old('nisn', $data['nisn'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 1234567890" maxlength="10" required>
                        @error('nisn')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NISN wajib diisi dan harus 10 digit angka</div>
                    </div>

                    <!-- NIK Siswa -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            NIK Siswa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nik" value="{{ old('nik', $data['nik'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 1234567890123456" maxlength="16" required>
                        @error('nik')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                    </div>

                    <!-- No. KK -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            No. KK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="no_kk" value="{{ old('no_kk', $data['no_kk'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 1234567890123456" maxlength="16" required>
                        @error('no_kk')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. KK wajib diisi dan harus 16 digit angka</div>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $data['tempat_lahir'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Masukkan tempat lahir" required>
                        @error('tempat_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Tempat lahir wajib diisi</div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $data['tanggal_lahir'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100" required>
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Tanggal lahir wajib diisi</div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_kelamin" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ old('jenis_kelamin', $data['jenis_kelamin'] ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $data['jenis_kelamin'] ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Jenis kelamin wajib dipilih</div>
                    </div>

                    <!-- Agama -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <select name="agama" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam" {{ old('agama', $data['agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama', $data['agama'] ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama', $data['agama'] ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama', $data['agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama', $data['agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama', $data['agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Agama wajib dipilih</div>
                    </div>

                    <!-- No HP Siswa -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            No. HP Siswa <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="no_hp_siswa" value="{{ old('no_hp_siswa', $data['no_hp_siswa'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 081234567890" maxlength="13" required>
                        @error('no_hp_siswa')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP wajib diisi</div>
                    </div>

                    <!-- Email Siswa -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Email Siswa <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" readonly class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 bg-gray-100 white:bg-gray-700 cursor-not-allowed" placeholder="contoh@email.com" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Email wajib diisi dan harus valid</div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="form-group col-span-full">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat_siswa" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" rows="3" placeholder="Alamat lengkap sesuai KTP/KK" required>{{ old('alamat_siswa', $data['alamat_siswa'] ?? '') }}</textarea>
                        @error('alamat_siswa')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat lengkap wajib diisi</div>
                    </div>

                    <!-- Program Keahlian -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Program Keahlian Pilihan <span class="text-red-500">*</span>
                        </label>
                        <select name="jurusan" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white white:bg-gray-800 text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Program Keahlian --</option>
                            <option value="RPL" {{ old('jurusan', $data['jurusan'] ?? '') == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                            <option value="TKJ" {{ old('jurusan', $data['jurusan'] ?? '') == 'TKJ' ? 'selected' : '' }}>Teknik Komputer dan Jaringan (TKJ)</option>
                            <option value="DKV" {{ old('jurusan', $data['jurusan'] ?? '') == 'DKV' ? 'selected' : '' }}>Desain Komunikasi Visual (DKV)</option>
                            <option value="BD" {{ old('jurusan', $data['jurusan'] ?? '') == 'BD' ? 'selected' : '' }}>Bisnis Digital (BD)</option>
                            <option value="AK" {{ old('jurusan', $data['jurusan'] ?? '') == 'AK' ? 'selected' : '' }}>Akuntansi (AK)</option>
                        </select>
                        @error('jurusan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Program keahlian wajib dipilih</div>
                    </div>

                    <!-- Asal Sekolah -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">
                            Asal Sekolah <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $data['asal_sekolah'] ?? '') }}" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Nama SMP/MTs/Sederajat" required>
                        @error('asal_sekolah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Asal sekolah wajib diisi</div>
                    </div>
                </div>

                <!-- ✅ FIX BUTTON: Warna konsisten dengan tema biru -->
                <div class="flex justify-end mt-8">
                    <button type="button" class="btn-next bg-gradient-to-r from-primary-600 to-primary-800 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-900 transition-all flex items-center shadow-lg hover:shadow-xl">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            
            <!-- Section 2: Data Orang Tua/Wali -->
            <div class="form-section hidden" id="section-2">
                <h3 class="text-2xl font-bold text-primary-800 mb-6 flex items-center">
                    <div class="dark:bg-primary-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user-friends text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    Data Orang Tua/Wali
                </h3>
                <p class="text-gray-600 mb-8">Informasi orang tua atau wali siswa</p>

                <!-- Data Ayah -->
                <h5 class="text-xl font-bold text-primary-700 mb-4 flex items-center">
                    <i class="fas fa-male mr-2"></i>Data Ayah Kandung
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Nama Ayah <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Nama lengkap ayah" required>
                        @error('nama_ayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama ayah wajib diisi</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">NIK Ayah <span class="text-red-500">*</span></label>
                        <input type="text" name="nik_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 1234567890123456" maxlength="16" required>
                        @error('nik_ayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pekerjaan Ayah <span class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: Pegawai Swasta" required>
                        @error('pekerjaan_ayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pekerjaan ayah wajib diisi</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pendidikan Terakhir <span class="text-red-500">*</span></label>
                        <select name="pendidikan_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('pendidikan_ayah')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pendidikan ayah wajib dipilih</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">No. HP Ayah <span class="text-red-500">*</span></label>
                        <input type="tel" name="no_hp_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 081234567890" maxlength="13" required>
                        @error('no_hp_ayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP ayah wajib diisi</div>
                    </div>
                    <div class="form-group col-span-full">
                        <label class="block font-semibold text-gray-800 mb-2">Alamat Ayah <span class="text-red-500">*</span></label>
                        <textarea name="alamat_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" rows="2" placeholder="Alamat lengkap ayah" required></textarea>
                        @error('alamat_ayah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat ayah wajib diisi</div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Data Ibu -->
                <h5 class="text-xl font-bold text-primary-700 mb-4 flex items-center">
                    <i class="fas fa-female mr-2"></i>Data Ibu Kandung
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Nama Ibu <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Nama lengkap ibu" required>
                        
                        @error('nama_ibu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama ibu wajib diisi</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">NIK Ibu <span class="text-red-500">*</span></label>
                        <input type="text" name="nik_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 1234567890123456" maxlength="16" required>
                        @error('nik_ibu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pekerjaan Ibu <span class="text-red-500">*</span></label>
                        <input type="text" name="pekerjaan_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: Ibu Rumah Tangga" required>
                        @error('pekerjaan_ibu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pekerjaan ibu wajib diisi</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pendidikan Terakhir <span class="text-red-500">*</span></label>
                        <select name="pendidikan_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        @error('pendidikan_ibu')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pendidikan ibu wajib dipilih</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">No. HP Ibu <span class="text-red-500">*</span></label>
                        <input type="tel" name="no_hp_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 081234567890" maxlength="13" required>
                        @error('no_hp_ibu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP ibu wajib diisi</div>
                    </div>
                    <div class="form-group col-span-full">
                        <label class="block font-semibold text-gray-800 mb-2">Alamat Ibu <span class="text-red-500">*</span></label>
                        <textarea name="alamat_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" rows="2" placeholder="Alamat lengkap ibu" required></textarea>
                        @error('alamat_ibu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat ibu wajib diisi</div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Data Wali -->
                <h5 class="text-xl font-bold text-primary-700 mb-4 flex items-center">
                    <i class="fas fa-user-shield mr-2"></i>Data Wali (Opsional)
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Nama Wali</label>
                        <input type="text" name="nama_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Kosongkan jika tidak ada">
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Pekerjaan wali">
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">No. HP Wali</label>
                        <input type="tel" name="no_hp_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Contoh: 081234567890" maxlength="13">
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Hubungan dengan Siswa</label>
                        <select name="hubungan_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <option value="">-- Pilih Hubungan --</option>
                            <option value="Kakek">Kakek</option>
                            <option value="Nenek">Nenek</option>
                            <option value="Paman">Paman</option>
                            <option value="Bibi">Bibi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group col-span-full">
                        <label class="block font-semibold text-gray-800 mb-2">Alamat Wali</label>
                        <textarea name="alamat_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" rows="2" placeholder="Alamat lengkap wali"></textarea>
                    </div>
                </div>

                <!-- ✅ FIX BUTTON: Warna konsisten -->
                <div class="flex justify-between mt-8">
                    <button type="button" class="btn-prev bg-gradient-to-r from-primary-500 to-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all flex items-center shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </button>
                    <button type="button" class="btn-next bg-gradient-to-r from-primary-600 to-primary-800 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-900 transition-all flex items-center shadow-lg hover:shadow-xl">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Section 3: Berkas-Berkas -->
            <div class="form-section hidden" id="section-3">
                <h3 class="text-2xl font-bold text-primary-800 mb-6 flex items-center">
                    <div class="dark:bg-primary-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-folder-open text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    Berkas Persyaratan
                </h3>
                <p class="text-gray-600 mb-8">Unggah dokumen yang diperlukan untuk pendaftaran</p>

                <div class="border-l-4 border-primary-600 p-6 mb-8 rounded-r-lg">
                    <h5 class="font-bold text-primary-800 flex items-center mb-3">
                        <i class="fas fa-file-alt mr-2"></i>Persyaratan Berkas
                    </h5>
                    <ul class="text-primary-900 space-y-2 text-sm">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Pas Foto berwarna ukuran 3x4 dengan background merah</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Ijazah SMP/MTs/Sederajat yang sudah dilegalisir</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>SKHUN SMP/MTs/Sederajat yang sudah dilegalisir</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Akta Kelahiran</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Kartu Keluarga (KK)</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>KTP Orang Tua (Ayah & Ibu)</li>
                    </ul>
                    <p class="mt-3 mb-0 text-xs font-semibold text-primary-900">
                        <span class="block"><i class="fas fa-info-circle mr-1"></i>Format file: JPG, PNG, atau PDF | Ukuran maksimal: 5MB per file</span>
                    </p>
                </div>

                <!-- File upload sections (semua input sudah ditambahkan class text color) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Pas Foto -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Pas Foto (3x4) <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'pas_foto')" onclick="triggerFileInput('pas_foto')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-image"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Pas foto terbaru dengan background merah</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG | Max: 5MB</small>
                            <input type="file" id="pas_foto" name="pas_foto" class="file-upload-input hidden" accept="image/jpeg,image/png" required onchange="handleFileSelect(this, 'pas_foto')">
                           
                            @error('pas_foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="pas_foto_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-image"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="pas_foto_name">-</h6>
                                        <p class="text-xs text-gray-600" id="pas_foto_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('pas_foto')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <img src="" alt="Preview Pas Foto" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="pas_foto_image">
                        </div>
                    </div>

                    <!-- Ijazah -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Scan Ijazah SMP/MTs <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'ijazah')" onclick="triggerFileInput('ijazah')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-file-certificate"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Ijazah yang sudah dilegalisir</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 5MB</small>
                            <input type="file" id="ijazah" name="ijazah" class="file-upload-input hidden" accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'ijazah')">
                            
                            @error('ijazah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="ijazah_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-alt"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="ijazah_name">-</h6>
                                        <p class="text-xs text-gray-600" id="ijazah_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('ijazah')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" id="ijazah_pdf"></iframe>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="ijazah_image">
                        </div>
                    </div>

                    <!-- SKHUN -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Scan Surat keterangan Lulus SMP/MTs <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'skhun')" onclick="triggerFileInput('skhun')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-file-contract"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Surat Keterangan Hasil Ujian Nasional</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 5MB</small>
                            <input type="file" id="skhun" name="skhun" class="file-upload-input hidden" accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'skhun')">
                            
                            @error('skhun') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="skhun_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-alt"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="skhun_name">-</h6>
                                        <p class="text-xs text-gray-600" id="skhun_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('skhun')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" id="skhun_pdf"></iframe>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="skhun_image">
                        </div>
                    </div>

                    <!-- Akta Kelahiran -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Scan Akta Kelahiran <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'akta')" onclick="triggerFileInput('akta')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-file-signature"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Akta kelahiran siswa</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 5MB</small>
                            <input type="file" id="akta" name="akta_kelahiran" class="file-upload-input hidden" accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'akta')">
                           
                            @error('akta_kelahiran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="akta_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-alt"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="akta_name">-</h6>
                                        <p class="text-xs text-gray-600" id="akta_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('akta')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" id="akta_pdf"></iframe>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="akta_image">
                        </div>
                    </div>

                    <!-- Kartu Keluarga -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Scan Kartu Keluarga (KK) <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'kk')" onclick="triggerFileInput('kk')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-users"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Kartu Keluarga</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 5MB</small>
                            <input type="file" id="kk" name="kartu_keluarga" class="file-upload-input hidden" accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'kk')">
                            
                            @error('kartu_keluarga') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="kk_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-alt"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="kk_name">-</h6>
                                        <p class="text-xs text-gray-600" id="kk_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('kk')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" id="kk_pdf"></iframe>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="kk_image">
                        </div>
                    </div>

                    <!-- KTP Orang Tua -->
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Scan KTP Orang Tua (Optional)</label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'ktp')" onclick="triggerFileInput('ktp')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-id-card"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">KTP Ayah dan Ibu (bisa digabung)</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 5MB</small>
                            <input type="file" id="ktp" name="ktp_orang_tua" class="file-upload-input hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFileSelect(this, 'ktp')">
                            
                            @error('ktp_orang_tua') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="ktp_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-alt"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="ktp_name">-</h6>
                                        <p class="text-xs text-gray-600" id="ktp_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('ktp')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" id="ktp_pdf"></iframe>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="ktp_image">
                        </div>
                    </div>
                </div>

                <!-- ✅ FIX BUTTON: Warna konsisten -->
                <div class="flex justify-between mt-8">
                    <button type="button" class="btn-prev bg-gradient-to-r from-primary-500 to-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-600 hover:to-primary-700 transition-all flex items-center shadow-md hover:shadow-lg">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </button>
                    <button type="button" class="btn-next bg-gradient-to-r from-primary-600 to-primary-800 text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-700 hover:to-primary-900 transition-all flex items-center shadow-lg hover:shadow-xl">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Section 4: Bukti Pembayaran -->
            <div class="form-section hidden" id="section-4">
                <h3 class="text-2xl font-bold text-primary-800 mb-6 flex items-center">
                    <div class="dark:bg-primary-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-receipt text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    Bukti Pembayaran
                </h3>
                <p class="text-gray-600 mb-8">Upload bukti pembayaran pendaftaran</p>

                <div class="bg-gradient-to-br from-white to-primary-100 border-2 border-primary-600 rounded-xl p-6 mb-8 shadow-lg">
                    <h5 class="text-xl font-bold text-primary-800 mb-4 flex items-center">
                        <i class="fas fa-money-bill-wave mr-2"></i>Informasi Pembayaran
                    </h5>
                    <div class="text-4xl font-bold text-primary-700 text-center my-4">Rp 100.000,-</div>
                    <p class="text-gray-700 mb-4 text-center">Transfer biaya pendaftaran ke salah satu rekening berikut:</p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 mt-4 rounded-r-lg">
                        <p class="text-yellow-800 mb-0 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong>Penting:</strong> Simpan bukti transfer Anda. Upload bukti transfer setelah melakukan pembayaran.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Bank Tujuan Transfer <span class="text-red-500">*</span></label>
                        <select name="bank_transfer" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" required>
                            <option value="">-- Pilih Bank --</option>
                            <option value="BRI" {{ old('bank_transfer') == 'BRI' ? 'selected' : '' }}>BRI</option>
                            <option value="Mandiri" {{ old('bank_transfer') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                        </select>
                        @error('bank_transfer')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Bank tujuan wajib dipilih</div>
                    </div>
                    <div class="form-group">
                        <label class="block font-semibold text-gray-800 mb-2">Tanggal Transfer <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_transfer"  value="{{ old('tanggal_transfer', date('Y-m-d')) }}"  class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-600/20 transition-all text-gray-900 dark:text-gray-100" required>
                        @error('tanggal_transfer')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Tanggal transfer wajib diisi</div>
                    </div>
                    <div class="form-group col-span-full">
                        <label class="block font-semibold text-gray-800 mb-2">Upload Bukti Transfer <span class="text-red-500">*</span></label>
                        <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary-600 hover:bg-primary-50 transition-all" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'bukti_transfer')" onclick="triggerFileInput('bukti_transfer')">
                            <div class="text-5xl text-primary-600 mb-3"><i class="fas fa-file-invoice-dollar"></i></div>
                            <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                            <p class="text-gray-600 text-sm mb-2">Foto struk transfer atau screenshot bukti transfer</p>
                            <small class="text-gray-500 text-xs italic">Format: JPG/PNG | Max: 5MB</small>
                            <input type="file" id="bukti_transfer" name="bukti_transfer" class="file-upload-input hidden" accept="image/*" required onchange="handleFileSelect(this, 'bukti_transfer')">
                            
                            @error('bukti_transfer') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                        </div>
                        <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg" id="bukti_transfer_preview_container">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center flex-1">
                                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center mr-3 text-primary-700"><i class="fas fa-file-image"></i></div>
                                    <div>
                                        <h6 class="font-semibold text-gray-800 text-sm" id="bukti_transfer_name">-</h6>
                                        <p class="text-xs text-gray-600" id="bukti_transfer_size">-</p>
                                    </div>
                                </div>
                                <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('bukti_transfer')"><i class="fas fa-times text-sm"></i></button>
                            </div>
                            <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md" id="bukti_transfer_image">
                        </div>
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="bg-white border-2 border-gray-200 rounded-xl p-6 mt-8">
                    <h5 class="text-xl font-bold text-primary-800 mb-4 flex items-center">
                        <i class="fas fa-list-check mr-2"></i>Ringkasan Pendaftaran
                    </h5>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-700 font-medium">Nama Siswa</span>
                            <span class="text-primary-800 font-semibold" id="summary_nama">-</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-700 font-medium">NISN</span>
                            <span class="text-primary-800 font-semibold" id="summary_nisn">-</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-700 font-medium">Program Keahlian</span>
                            <span class="text-primary-800 font-semibold" id="summary_jurusan">-</span>
                        </div>

                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-700 font-medium">Biaya Pendaftaran</span>
                            <span class="text-primary-800 font-bold text-lg">Rp 100.000,-</span>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-6 rounded-r-lg">
                    <h5 class="font-bold text-yellow-800 flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Konfirmasi Sebelum Submit
                    </h5>
                    <p class="text-yellow-700 mb-0">Pastikan semua data sudah benar. Setelah submit, data tidak dapat diubah. Simpan nomor pendaftaran yang akan diberikan setelah berhasil mendaftar.</p>
                </div>

                <!-- BUTTON SUBMIT -->
                <button type="button" onclick="openConfirmModal()" class="btn-submit bg-gradient-to-r from-green-600 to-green-700 text-white w-full px-8 py-4 rounded-lg font-bold text-lg mt-6 hover:from-green-700 hover:to-green-800 transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                    <i class="fas fa-paper-plane mr-2"></i>Submit Pendaftaran
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ============ GLOBAL VARIABLES ============
    let currentSection = 1;
    const totalSections = 4;
    const form = document.getElementById('registrationForm');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const progressPercent = document.getElementById('progressPercent');

    // ============ INISIALISASI PROGRESS SAAT LOAD ✅ ============
    if (progressBar && progressText && progressPercent) {
        updateProgress();
        updateNavTabs();
    }

    // ============ NAVIGATION BUTTONS ============
    if (form) {
        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', nextSection);
        });
        document.querySelectorAll('.btn-prev').forEach(btn => {
            btn.addEventListener('click', prevSection);
        });
        document.querySelectorAll('.nav-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetStep = parseInt(this.getAttribute('data-step'));
                goToSection(targetStep);
            });
        });
    }

    // ============ NAVIGATION FUNCTIONS ============
    function nextSection() {
        if (!validateSection(currentSection)) return;
        toggleSection(currentSection, false);
        currentSection++;
        toggleSection(currentSection, true);
        updateProgress();
        updateNavTabs();
        scrollToTop();
    }

    function prevSection() {
        toggleSection(currentSection, false);
        currentSection--;
        toggleSection(currentSection, true);
        updateProgress();
        updateNavTabs();
        scrollToTop();
    }

    function goToSection(step) {
        if (step === currentSection) return;
        if (step < currentSection || validateSection(currentSection)) {
            toggleSection(currentSection, false);
            toggleSection(step, true);
            currentSection = step;
            updateProgress();
            updateNavTabs();
            scrollToTop();
        }
    }

    function toggleSection(sectionNum, show) {
        const section = document.getElementById(`section-${sectionNum}`);
        if (!section) return;
        if (show) {
            section.classList.remove('hidden');
            section.classList.add('active', 'block');
        } else {
            section.classList.add('hidden');
            section.classList.remove('active', 'block');
        }
    }

    // ============ UPDATE PROGRESS BAR ✅ ============
    function updateProgress() {
        if (!progressBar || !progressText || !progressPercent) return;
        const progress = (currentSection / totalSections) * 100;
        progressBar.style.width = `${progress}%`;
        progressText.textContent = `Langkah ${currentSection} dari ${totalSections}`;
        progressPercent.textContent = `${Math.round(progress)}%`;
    }

    // ============ UPDATE NAV TABS ✅ ============
    function updateNavTabs() {
        document.querySelectorAll('.nav-btn').forEach((btn, index) => {
            const step = index + 1;
            // Reset classes
            btn.className = 'nav-btn px-6 py-3 font-semibold flex-1 min-w-[120px] flex items-center justify-center transition-all';
            
            if (step === currentSection) {
                // Tab aktif
                btn.classList.add('bg-white', 'text-primary-800', 'shadow-lg');
                if (index === 0) btn.classList.add('rounded-l-lg');
                if (index === 3) btn.classList.add('rounded-r-lg');
            } else if (step < currentSection) {
                // Tab selesai
                btn.classList.add('bg-white/30', 'text-white', 'hover:bg-white/40');
            } else {
                // Tab belum dicapai
                btn.classList.add('bg-transparent', 'text-white/80', 'hover:bg-white/10');
            }
        });
    }

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ============ VALIDATION ============
    function validateSection(section) {
        let isValid = true;
        const sectionElement = document.getElementById(`section-${section}`);
        if (!sectionElement) return true;
        
        const inputs = sectionElement.querySelectorAll('[required]');
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500', 'shake');
                const feedback = input.parentElement?.querySelector('.invalid-feedback');
                if (feedback) feedback.classList.remove('hidden');
                setTimeout(() => input.classList.remove('shake'), 500);
            } else {
                input.classList.remove('border-red-500');
                const feedback = input.parentElement?.querySelector('.invalid-feedback');
                if (feedback) feedback.classList.add('hidden');
            }
        });

        // Validasi NISN
        if (section === 1) {
            const nisnInput = document.querySelector('input[name="nisn"]');
            if (nisnInput?.value && !/^\d{10}$/.test(nisnInput.value)) {
                isValid = false;
                showToast('NISN harus 10 digit angka', 'error');
                nisnInput.classList.add('border-red-500', 'shake');
                setTimeout(() => nisnInput.classList.remove('shake'), 500);
            }
        }

        // Validasi file upload section 3
        if (section === 3) {
            const requiredFiles = ['pas_foto', 'ijazah', 'skhun', 'akta', 'kk'];
            requiredFiles.forEach(fileId => {
                const fileInput = document.getElementById(fileId);
                if (!fileInput?.files || fileInput.files.length === 0) {
                    isValid = false;
                    fileInput?.closest('.file-upload-container')?.classList.add('border-red-500');
                    showToast(`File ${fileId.replace('_', ' ')} wajib diupload`, 'error');
                } else {
                    fileInput?.closest('.file-upload-container')?.classList.remove('border-red-500');
                }
            });
        }

        if (!isValid) showToast('Silakan lengkapi semua field yang wajib diisi', 'error');
        return isValid;
    }

    // ============ FILE UPLOAD HANDLERS ============
    window.handleDragOver = function(e) {
        e.preventDefault();
        e.stopPropagation();
        const container = e.target.closest('.file-upload-container');
        container?.classList.add('drag-over');
    }

    window.handleDragLeave = function(e) {
        e.preventDefault();
        e.stopPropagation();
        const container = e.target.closest('.file-upload-container');
        container?.classList.remove('drag-over');
    }

    window.handleDrop = function(e, fileId) {
        e.preventDefault();
        e.stopPropagation();
        const container = e.target.closest('.file-upload-container');
        container?.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            const input = document.getElementById(fileId);
            if (input) {
                input.files = e.dataTransfer.files;
                handleFileSelect(input, fileId);
            }
        }
    }

    window.handleFileSelect = function(input, fileId) {
        const file = input.files[0];
        if (!file) return;

        if (file.size > 5 * 1024 * 1024) {
            showToast(`File ${file.name} terlalu besar! Maksimal 5MB`, 'error');
            input.value = '';
            return;
        }

        const allowedTypes = {
            'pas_foto': ['image/jpeg', 'image/png', 'image/jpg'],
            'ijazah': ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'],
            'skhun': ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'],
            'akta': ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'],
            'kk': ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'],
            'ktp': ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'],
            'bukti_transfer': ['image/jpeg', 'image/png', 'image/jpg']
        };

        const allowedExtensions = allowedTypes[fileId] || ['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'];
        if (!allowedExtensions.includes(file.type)) {
            showToast(`Format file ${file.name} tidak valid!`, 'error');
            input.value = '';
            return;
        }

        const previewContainer = document.querySelector(`#${fileId}_preview_container`);
        const fileNameElement = document.querySelector(`#${fileId}_name`);
        const fileSizeElement = document.querySelector(`#${fileId}_size`);
        
        if (fileNameElement) fileNameElement.textContent = file.name;
        if (fileSizeElement) fileSizeElement.textContent = formatFileSize(file.size);
        if (previewContainer) previewContainer.classList.remove('hidden');

        if (file.type.startsWith('image/') || file.type === 'application/pdf') {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.querySelector(`#${fileId}_image`);
                const pdfPreview = document.querySelector(`#${fileId}_pdf`);
                if (file.type.startsWith('image/') && imagePreview) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    pdfPreview?.classList.add('hidden');
                } else if (file.type === 'application/pdf' && pdfPreview) {
                    pdfPreview.src = e.target.result;
                    pdfPreview.classList.remove('hidden');
                    imagePreview?.classList.add('hidden');
                }
            };
            reader.readAsDataURL(file);
        }

        showToast(`File ${file.name} berhasil diupload`, 'success');
        input.closest('.file-upload-container')?.classList.remove('border-red-500');
    }

    window.triggerFileInput = function(fileId) {
        document.getElementById(fileId)?.click();
    }

    window.removeFile = function(fileId) {
        const input = document.getElementById(fileId);
        const previewContainer = document.querySelector(`#${fileId}_preview_container`);
        const imagePreview = document.querySelector(`#${fileId}_image`);
        const pdfPreview = document.querySelector(`#${fileId}_pdf`);
        
        if (input) input.value = '';
        previewContainer?.classList.add('hidden');
        if (imagePreview) { imagePreview.classList.add('hidden'); imagePreview.src = ''; }
        if (pdfPreview) { pdfPreview.classList.add('hidden'); pdfPreview.src = ''; }
        showToast('File berhasil dihapus', 'success');
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024, sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    // ============ FORM SUBMISSION ============
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!validateForm()) return;
            if (!confirm('Apakah Anda yakin data sudah benar? Setelah submit, data tidak dapat diubah.')) return;

            document.getElementById('loadingOverlay')?.classList.remove('hidden');
            document.querySelector('.btn-submit')?.setAttribute('disabled', 'true');
            updateSummary();

            setTimeout(() => {
                alert('Pendaftaran berhasil! Nomor pendaftaran Anda: BPM-2026-001234');
                document.getElementById('loadingOverlay')?.classList.add('hidden');
                form.reset();
                resetFilePreviews();
                resetSummary();
                goToSection(1);
                document.querySelector('.btn-submit')?.removeAttribute('disabled');
            }, 1500);
        });
    }

    function validateForm() {
        for (let i = 1; i <= totalSections; i++) {
            if (!validateSection(i)) { goToSection(i); return false; }
        }
        return true;
    }

    function updateSummary() {
        const namaInput = document.querySelector('input[name="nama_lengkap"]');
        const nisnInput = document.querySelector('input[name="nisn"]');
        const jurusanSelect = document.querySelector('select[name="jurusan"]');
        
        document.getElementById('summary_nama').textContent = namaInput?.value || '-';
        document.getElementById('summary_nisn').textContent = nisnInput?.value || '-';
        
        const jurusanText = {
            'RPL': 'Rekayasa Perangkat Lunak', 'TKJ': 'Teknik Komputer dan Jaringan',
            'DKV': 'Desain Komunikasi Visual', 'BD': 'Bisnis Digital', 'AK': 'Akuntansi'
        };
        document.getElementById('summary_jurusan').textContent = jurusanSelect ? (jurusanText[jurusanSelect.value] || '-') : '-';
    }

    function resetFilePreviews() {
        document.querySelectorAll('.file-preview-container').forEach(c => c.classList.add('hidden'));
        document.querySelectorAll('.image-preview').forEach(img => { img.classList.add('hidden'); img.src = ''; });
        document.querySelectorAll('.pdf-preview').forEach(iframe => { iframe.classList.add('hidden'); iframe.src = ''; });
    }

    function resetSummary() {
        document.getElementById('summary_nama').textContent = '-';
        document.getElementById('summary_nisn').textContent = '-';
        document.getElementById('summary_jurusan').textContent = '-';
    }

    // ============ TOAST NOTIFICATIONS ============
    window.showToast = function(message, type = 'success') {
        const toast = document.getElementById('toastNotification');
        if (!toast) return;
        const icon = toast.querySelector('i');
        const title = document.getElementById('toastTitle');
        const msg = document.getElementById('toastMessage');
        
        if (type === 'error') {
            toast.classList.remove('border-green-500'); toast.classList.add('border-red-500');
            icon.className = 'fas fa-exclamation-circle text-red-500 text-2xl mr-3';
            title.textContent = 'Error!'; title.classList.add('text-red-800');
            msg.classList.add('text-red-700'); msg.classList.remove('text-gray-600');
        } else {
            toast.classList.remove('border-red-500'); toast.classList.add('border-green-500');
            icon.className = 'fas fa-check-circle text-green-500 text-2xl mr-3';
            title.textContent = 'Sukses!'; title.classList.remove('text-red-800');
            msg.classList.remove('text-red-700'); msg.classList.add('text-gray-600');
        }
        msg.textContent = message;
        toast.classList.remove('translate-x-full');
        setTimeout(() => toast.classList.add('translate-x-full'), 3000);
    }

    window.closeToast = function() {
        document.getElementById('toastNotification')?.classList.add('translate-x-full');
    }

    // ============ AUTO-SAVE TO LOCALSTORAGE ============
    const savedData = JSON.parse(localStorage.getItem("form_ppdb")) || {};
    Object.keys(savedData).forEach(name => {
        const field = form?.querySelector(`[name="${name}"]`);
        if (!field) return;
        if (field.type === "radio" || field.type === "checkbox") {
            field.checked = savedData[name] === field.value;
        } else {
            field.value = savedData[name];
        }
    });

    form?.addEventListener("input", function(e) {
        const name = e.target.name;
        if (!name) return;
        savedData[name] = e.target.value;
        localStorage.setItem("form_ppdb", JSON.stringify(savedData));
    });

    // Auto-update summary
    function updateSummaryFromInputs() {
        const namaInput = document.querySelector('input[name="nama_lengkap"]');
        const nisnInput = document.querySelector('input[name="nisn"]');
        const jurusanSelect = document.querySelector('select[name="jurusan"]');
        
        if (namaInput) {
            document.getElementById('summary_nama').textContent = namaInput.value || '-';
        }
        if (nisnInput) {
            document.getElementById('summary_nisn').textContent = nisnInput.value || '-';
        }
        if (jurusanSelect) {
            const jurusanMap = {
                'RPL': 'Rekayasa Perangkat Lunak',
                'TKJ': 'Teknik Komputer dan Jaringan',
                'DKV': 'Desain Komunikasi Visual',
                'BD': 'Bisnis Digital',
                'AK': 'Akuntansi'
            };
            document.getElementById('summary_jurusan').textContent = jurusanMap[jurusanSelect.value] || '-';
        }
    }

    // Update saat input berubah
    document.querySelectorAll('input[name="nama_lengkap"], input[name="nisn"]').forEach(input => {
        input.addEventListener('input', updateSummaryFromInputs);
    });
    document.querySelector('select[name="jurusan"]')?.addEventListener('change', updateSummaryFromInputs);

    // Update saat halaman load (untuk handle old() values)
    document.addEventListener('DOMContentLoaded', updateSummaryFromInputs);
    // =========================================================

    // ============ MOBILE MENU ============
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        const toggleIcon = (isHidden) => {
            mobileMenuButton.querySelector('svg').innerHTML = isHidden 
                ? '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />'
                : '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />';
        };

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            toggleIcon(mobileMenu.classList.contains('hidden'));
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                toggleIcon(true);
            });
        });

        document.addEventListener('click', (e) => {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                toggleIcon(true);
            }
        });
    }

    // ============ DARK MODE ============
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    if (darkModeToggle) {
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });
    }
    });
    </script>

    <!-- AOS Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({ duration: 600, easing: 'ease-in-out', once: true, offset: 50 });
    });
    </script>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 hidden" style="display:none;">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeConfirmModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 z-10">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Konfirmasi Pendaftaran</h3>
            </div>

            <div class="bg-gray-50 rounded-lg p-4 mb-4 space-y-2 text-sm">
                <p><strong>Nama:</strong> <span id="modalNama">-</span></p>
                <p><strong>NISN:</strong> <span id="modalNisn">-</span></p>
                <p><strong>Jurusan:</strong> <span id="modalJurusan">-</span></p>
                <p><strong>Biaya:</strong> <span class="font-bold text-green-600">Rp 100.000</span></p>
            </div>

            <div class="bg-red-50 border-l-4 border-red-400 p-3 rounded-r mb-4">
                <p class="text-red-700 text-sm">
                    <i class="fas fa-ban mr-1"></i>
                    <strong>Peringatan:</strong> Data tidak dapat diubah setelah disubmit. Jika terdapat kesalahan, silakan hubungi admin pendaftaran.
                </p>
            </div>

            <label class="flex items-start mb-4 cursor-pointer">
                <input type="checkbox" id="confirmCheckbox" class="mt-1 w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                <span class="ml-2 text-sm text-gray-700">Saya menyatakan data yang diisi sudah benar dan bertanggung jawab atas keabsahannya.</span>
            </label>

            <div class="flex gap-3">
                <button onclick="closeConfirmModal()" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Batalkan</button>
                <button id="finalSubmitBtn" disabled onclick="submitFormFinal()" class="flex-1 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Ya, Submit Pendaftaran
                </button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Fungsi buka modal
        window.openConfirmModal = function() {
            console.log('🔘 Tombol Submit diklik!');
            
            // Validasi semua section
            let allValid = true;
            for (let i = 1; i <= 4; i++) {
                if (typeof validateSection === 'function' && !validateSection(i)) {
                    allValid = false;
                    if (typeof goToSection === 'function') goToSection(i);
                    return;
                }
            }

            // Isi ringkasan
            const namaInput = document.querySelector('input[name="nama_lengkap"]');
            const nisnInput = document.querySelector('input[name="nisn"]');
            const jurusanSelect = document.querySelector('select[name="jurusan"]');
            
            document.getElementById('modalNama').textContent = namaInput?.value || '-';
            document.getElementById('modalNisn').textContent = nisnInput?.value || '-';
            
            const jurusanMap = { 
                RPL:'Rekayasa Perangkat Lunak', 
                TKJ:'Teknik Komputer dan Jaringan', 
                DKV:'Desain Komunikasi Visual', 
                BD:'Bisnis Digital', 
                AK:'Akuntansi' 
            };
            document.getElementById('modalJurusan').textContent = jurusanMap[jurusanSelect?.value] || '-';

            // Reset & tampilkan modal
            const checkbox = document.getElementById('confirmCheckbox');
            const submitBtn = document.getElementById('finalSubmitBtn');
            if (checkbox) checkbox.checked = false;
            if (submitBtn) submitBtn.disabled = true;
            
            const modal = document.getElementById('confirmModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.style.display = 'block';
                console.log('Modal ditampilkan');
            }
        };

        //  Fungsi tutup modal
        window.closeConfirmModal = function() {
            const modal = document.getElementById('confirmModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.style.display = 'none';
                console.log('❌ Modal ditutup');
            }
        };

        //  Event listener checkbox (dipasang setelah DOM ready)
        const confirmCheckbox = document.getElementById('confirmCheckbox');
        const finalSubmitBtn = document.getElementById('finalSubmitBtn');
        
        if (confirmCheckbox && finalSubmitBtn) {
            confirmCheckbox.addEventListener('change', function() {
                finalSubmitBtn.disabled = !this.checked;
                console.log('🔲 Checkbox:', this.checked ? 'dicentang' : 'dilepas');
            });
        }

        // Fungsi submit final
        window.submitFormFinal = function() {
            console.log('Submit form dipanggil');
            closeConfirmModal();
            
            // Loading
            const loading = document.getElementById('loadingOverlay');
            const submitBtn = document.querySelector('button[onclick="openConfirmModal()"]');
            
            if (loading) loading.classList.remove('hidden');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            }
            
            // Submit form
            const form = document.getElementById('registrationForm');
            if (form) form.submit();
        };

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeConfirmModal();
            }
        });

    });
    </script>
    <!-- End Modal Konfirmasi -->

    {{-- // Toggle Profile Dropdown --}}
    <script>
    function toggleProfileDropdown() {
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('profileDropdown');
        const menu = document.getElementById('profileMenu');
        
        if (dropdown && !dropdown.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });

    // Close dropdown when pressing ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const menu = document.getElementById('profileMenu');
            if (menu) menu.classList.add('hidden');
        }
    });
    </script>

<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// Initialize AOS
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        offset: 50
    });

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            const icon = mobileMenuButton.querySelector('svg');
            const isHidden = mobileMenu.classList.contains('hidden');
            icon.innerHTML = isHidden 
                ? '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />'
                : '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />';
        });

        // Close menu when clicking a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenuButton.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />';
            });
        });
    }

    // Dark mode toggle
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    if (darkModeToggle) {
        // Check for saved preference or system preference
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (mobileMenuButton && mobileMenu && 
            !mobileMenuButton.contains(e.target) && 
            !mobileMenu.contains(e.target) && 
            !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            mobileMenuButton.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />';
        }
    });
});
</script>

</body>
</html>