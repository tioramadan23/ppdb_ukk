<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Informasi - SMK Bina Putra Mandiri</title>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
        
    </script>
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
           .footer-title {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 1rem;
            padding-left: 0.75rem;
            border-left: 4px solid #60a5fa;
        }
        .footer-list li {
            @apply text-blue-100 text-sm py-2 transition-colors hover:text-white cursor-pointer;
        }
        .footer-link {
            @apply text-blue-200 hover:text-white transition-colors;
        }
        .info-card {
            transition: all 0.4s ease;
        }
        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.2);
        }
        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #1e40af, #3b82f6, #1e40af);
            border-radius: 2px;
        }
        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: #1e40af;
            border: 4px solid #fff;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(30, 64, 175, 0.3);
        }
        .faq-item {
            transition: all 0.3s ease;
        }
        .faq-item.active {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        }
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }
        .faq-content.open {
            max-height: 500px;
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .step-card {
            counter-increment: step-counter;
        }
        .step-card::before {
            content: counter(step-counter);
            position: absolute;
            top: -15px;
            left: -15px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.25rem;
            box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<!-- Navbar -->
<header class="sticky top-0 z-50 border-b border-gray-300 bg-white/90 backdrop-blur-md dark:border-gray-700 dark:bg-gray-900/90 shadow-sm">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex-shrink-0 text-xl font-bold flex items-center gap-2">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-blue-800 dark:text-blue-400">BPM</span>
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm font-medium">
                <li>
                    <a class="{{ request()->routeIs('home') ? 'border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('tentang_sekolah') ? 'border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('tentang_sekolah') }}">
                        Tentang Sekolah
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('informasi') ? 'border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('informasi') }}">
                        Informasi
                    </a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('dashboard.siswa') ? 'border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white' : 'text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white' }}" href="{{ route('dashboard.siswa') }}">
                        Pendaftaran
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Profile & Dark Mode Toggle -->
        <div class="hidden sm:flex items-center gap-3">
            <button id="dark-mode-toggle" class="p-2 rounded-lg text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition" aria-label="Toggle dark mode">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline"></i>
            </button>
            
            {{-- User Sudah Login --}}
            @auth
                <div class="relative" id="profileDropdown">
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

                    {{-- status --}}
                    <a href="{{ route('pendaftaran.status') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-file-alt mr-2"></i>Status Pendaftaran
                    </a>

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
            
            {{-- User Belum Login --}}
            @else
                <div class="hidden lg:flex lg:items-center lg:space-x-4">
                            <a href="{{ route('register') }}" title="" class="rounded-full border border-transparent bg-blue-800 px-4 py-2 text-base font-semibold text-white transition-all duration-200 hover:bg-blue-900 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-600" role="button"> Registrasi </a>
                            <a href="{{ route('login') }}" title="" class="rounded-full border border-blue-800 bg-transparent px-4 py-2 text-base font-semibold text-blue-800 transition-all duration-200 hover:bg-blue-50 hover:text-blue-900 focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 focus:outline-none dark:border-blue-500 dark:text-blue-400 dark:hover:bg-blue-900/20 dark:hover:text-white dark:focus:ring-blue-500" role="button"> Login </a>
                        </div>
            @endauth
        </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Home</a>
            <a href="{{ route('tentang_sekolah') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('tentang_sekolah') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('informasi') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Informasi</a>
            <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('dashboard.siswa') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-5  rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Pendaftaran</a>
        </div>
    </div>
</header>


<!-- Hero Section dengan Animasi -->
<section class="relative py-24 px-6 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl opacity-10 float-animation"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-400 rounded-full blur-3xl opacity-20 float-animation" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-blue-300 rounded-full blur-3xl opacity-15 float-animation" style="animation-delay: 2s;"></div>
    </div>
    <div class="relative max-w-5xl mx-auto text-center">
        <div data-aos="fade-down" class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-6">
            <i class="fas fa-bullhorn text-yellow-400 mr-3"></i>
            <span class="text-white font-medium">PPDB Tahun Ajaran 2026/2027 Telah Dibuka!</span>
        </div>
        <h1 data-aos="fade-up" class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
            Informasi <span class="text-yellow-400">Pendaftaran</span>
        </h1>
        <p data-aos="fade-up" data-aos-delay="100" class="text-xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
            SMK Bina Putra Mandiri membuka kesempatan bagi lulusan SMP/MTs untuk bergabung dan meraih masa depan gemilang melalui pendidikan vokasi berkualitas.
        </p>
        <div data-aos="fade-up" data-aos-delay="200" class="flex flex-wrap justify-center gap-4">
            <a href="#persyaratan" class="group px-8 py-4 bg-white text-blue-800 font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-file-alt group-hover:rotate-12 transition-transform"></i>
                <span>Persyaratan</span>
            </a>
            <a href="#biaya" class="group px-8 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl border border-blue-400 flex items-center gap-2">
                <i class="fas fa-money-bill-wave group-hover:scale-110 transition-transform"></i>
                <span>Biaya</span>
            </a>
            <a href="#jadwal" class="group px-8 py-4 bg-white text-blue-800 font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-calendar-check group-hover:rotate-12 transition-transform"></i>
                <span>Jadwal</span>
            </a>
            <a href="#faq" class="group px-8 py-4 bg-white text-blue-800 font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i class="fas fa-question-circle group-hover:rotate-12 transition-transform"></i>
                <span>FAQ</span>
            </a>
        </div>
    </div>
</section>



<!-- Alur Pendaftaran Section -->
<section class="py-20 px-6 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Alur Pendaftaran</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Ikuti 5 langkah mudah untuk mendaftar di SMK Bina Putra Mandiri</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 relative">
            <!-- Step 1 -->
            <div data-aos="fade-up" data-aos-delay="0" class="step-card relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border-2 border-blue-300 dark:border-gray-500 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Daftar Online</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Isi formulir pendaftaran melalui website</p>
            </div>

            <!-- Step 2 -->
            <div data-aos="fade-up" data-aos-delay="100" class="step-card relative bg-gradient-to-br from-green-50 to-green-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border-2 border-green-300 dark:border-gray-500 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-upload text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Upload Berkas</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Unggah dokumen persyaratan yang diminta</p>
            </div>

            <!-- Step 3 -->
            <div data-aos="fade-up" data-aos-delay="200" class="step-card relative bg-gradient-to-br from-purple-50 to-purple-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border-2 border-purple-300 dark:border-gray-500 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-money-bill text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pembayaran</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Lakukan pembayaran biaya pendaftaran</p>
            </div>

            <!-- Step 4 -->
            <div data-aos="fade-up" data-aos-delay="300" class="step-card relative bg-gradient-to-br from-orange-50 to-orange-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border-2 border-orange-300 dark:border-gray-500 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-clipboard-check text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Seleksi</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Hasil seleksi menunggu dan diverifikasi  </p>
            </div>

            <!-- Step 5 -->
            <div data-aos="fade-up" data-aos-delay="400" class="step-card relative bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-2xl border-2 border-red-300 dark:border-gray-500 text-center group hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pengumuman</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Cek hasil seleksi dan daftar ulang</p>
            </div>
        </div>
    </div>
</section>

<!-- Persyaratan Section -->
<section id="persyaratan" class="py-20 px-6 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="max-w-6xl mx-auto">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Persyaratan Pendaftaran</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Dokumen dan syarat yang perlu dipersiapkan</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Persyaratan Umum -->
            <div data-aos="fade-right" class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Persyaratan Umum</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kriteria calon siswa</p>
                    </div>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Lulusan SMP/MTs atau paket B tahun 2026</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Usia maksimal 21 tahun pada tanggal 1 Juli 2026</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Sehat jasmani dan rohani (tidak buta warna)</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Berkelakuan baik dan tidak terlibat narkoba</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Bersedia mematuhi peraturan sekolah</span>
                    </li>
                </ul>
            </div>

            <!-- Berkas yang Diperlukan -->
            <div data-aos="fade-left" class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-600 to-green-700 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-folder-open text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Berkas yang Diperlukan</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Dokumen administratif</p>
                    </div>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Fotokopi Ijazah SMP/MTs (2 lembar, dilegalisir)</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Fotokopi SKHUN/SKL (2 lembar, dilegalisir)</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Fotokopi Kartu Keluarga (2 lembar)</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Fotokopi Akta Kelahiran (2 lembar)</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Pas foto 3x4 (4 lembar) & 4x6 (4 lembar), latar merah</span>
                    </li>
                    <li class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300">Surat Keterangan Sehat dari Dokter/Puskesmas</span>
                    </li>
                </ul>
            </div>
        </div>

        
    </div>
</section>

<!-- Biaya Pendaftaran Section -->
<section id="biaya" class="py-20 px-6 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Biaya Pendidikan</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Investasi pendidikan berkualitas untuk masa depan gemilang</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Biaya Pendaftaran -->
            <div data-aos="fade-up" data-aos-delay="0" class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 border-2 border-blue-400 dark:border-gray-500 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="absolute top-4 right-4 px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">POPULER</div>
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-ticket-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Biaya Pendaftaran</h3>
                    <div class="text-5xl font-extrabold text-blue-700 dark:text-blue-400 mb-2">Rp100.000</div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Sekali bayar di awal</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>Formulir pendaftaran lengkap</span>
                    </li>
                   
            </div>

            <!-- SPP -->
            <div data-aos="fade-up" data-aos-delay="100" class="relative bg-gradient-to-br from-green-50 to-green-100 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 border-2 border-green-400 dark:border-gray-500 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="absolute top-4 right-4 px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full">BULANAN</div>
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-700 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">SPP Bulanan</h3>
                    <div class="text-5xl font-extrabold text-green-700 dark:text-green-400 mb-2">Sesuai Jurusan</div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Per bulan (12x per tahun)</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>DKV : Rp350.000</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>RPL : Rp325.000</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>TKJ : Rp150.000</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span>Bidi: Rp100.000</span>
                    </li>
                </ul>
            </div>

            <!-- Beasiswa -->
            <div data-aos="fade-up" data-aos-delay="200" class="relative bg-gradient-to-br from-purple-50 to-purple-100 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 border-2 border-purple-400 dark:border-gray-500 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="absolute top-4 right-4 px-3 py-1 bg-purple-600 text-white text-xs font-bold rounded-full">SPECIAL</div>
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-award text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Program Beasiswa</h3>
                    <div class="text-4xl font-extrabold text-purple-700 dark:text-purple-400 mb-2">Tersedia!</div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Untuk siswa berprestasi</p>
                </div>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-star text-yellow-500"></i>
                        <span>Beasiswa Prestasi Akademik (50-100%)</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-heart text-red-500"></i>
                        <span>Beasiswa Tidak Mampu (50-100%)</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-trophy text-blue-500"></i>
                        <span>Beasiswa Olahraga/Seni (50%)</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700 dark:text-gray-300">
                        <i class="fas fa-users text-green-500"></i>
                        <span>Beasiswa Yatim Piatu (100%)</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div data-aos="fade-up" class="mt-12 bg-gray-50 dark:bg-gray-700 rounded-2xl p-8 border border-gray-200 dark:border-gray-600">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Metode Pembayaran</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center gap-4 p-4 bg-white dark:bg-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-university text-blue-600 dark:text-blue-400 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Transfer Bank</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">BCA, Mandiri, BRI</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-white dark:bg-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-store text-green-600 dark:text-green-400 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">Tunai di Sekolah</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Bagian Keuangan</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-white dark:bg-gray-800 rounded-xl">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-purple-600 dark:text-purple-400 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white">E-Wallet</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">OVO, GoPay, Dana</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catatan Penting -->
        <div data-aos="fade-up" class="mt-8 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-6 rounded-r-xl">
            <div class="flex items-start gap-4">
                <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl mt-1"></i>
                <div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-2">Catatan Penting:</h4>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li>• Pembayaran dapat dilakukan melalui transfer bank atau tunai di sekolah</li>
                        <li>• Konfirmasi pembayaran wajib dilakukan melalui WhatsApp panitia</li>
                        <li>• Simpan bukti pembayaran dengan baik sebagai dokumen verifikasi</li>
                        <li>• Biaya sudah termasuk seragam dan buku panduan siswa</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jadwal Pendaftaran Section dengan Timeline -->
<section id="jadwal" class="py-20 px-6 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="max-w-6xl mx-auto">
        <div data-aos="fade-up" class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Jadwal Pendaftaran</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Tahun Ajaran 2026/2027</p>
        </div>

        <!-- Timeline Container -->
        <div class="relative">
            <!-- Timeline Line (Desktop) -->
            <div class="hidden md:block timeline-line"></div>

            <div class="space-y-12">
                <!-- Gelombang 1 -->
                <div data-aos="fade-right" class="relative flex flex-col md:flex-row gap-6 items-center md:items-start">
                    <div class="hidden md:block timeline-dot"></div>
                    <div class="flex-1 bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                            <div class="flex items-center gap-4 mb-4 md:mb-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-2xl">1</span>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Gelombang I</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Early Bird Registration</p>
                                </div>
                            </div>
                            <span class="inline-block px-5 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-full text-sm font-bold shadow-lg">
                                <i class="fas fa-calendar-alt mr-2"></i>1 Nov - 31 Des 2025
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                                <i class="fas fa-edit text-blue-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pendaftaran Online</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                                <i class="fas fa-file-upload text-blue-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Upload Berkas</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                                <i class="fas fa-money-bill text-blue-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pembayaran</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Kuota Tersedia:</span>
                                <div class="flex items-center gap-2">
                                    <div class="w-32 h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-green-500 rounded-full" style="width: 80%"></div>
                                    </div>
                                    <span class="text-sm font-bold text-green-600">80%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gelombang 2 -->
                <div data-aos="fade-left" class="relative flex flex-col md:flex-row gap-6 items-center md:items-start">
                    <div class="hidden md:block timeline-dot"></div>
                    <div class="flex-1 bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                            <div class="flex items-center gap-4 mb-4 md:mb-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-600 to-green-700 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-2xl">2</span>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Gelombang II</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Regular Registration</p>
                                </div>
                            </div>
                            <span class="inline-block px-5 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-full text-sm font-bold shadow-lg">
                                <i class="fas fa-calendar-alt mr-2"></i>2 Jan - 31 Mar 2026
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl">
                                <i class="fas fa-edit text-green-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pendaftaran Online</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl">
                                <i class="fas fa-file-upload text-green-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Upload Berkas</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl">
                                <i class="fas fa-money-bill text-green-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pembayaran</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Kuota Tersedia:</span>
                                <div class="flex items-center gap-2">
                                    <div class="w-32 h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-yellow-500 rounded-full" style="width: 50%"></div>
                                    </div>
                                    <span class="text-sm font-bold text-yellow-600">50%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gelombang 3 -->
                <div data-aos="fade-right" class="relative flex flex-col md:flex-row gap-6 items-center md:items-start">
                    <div class="hidden md:block timeline-dot"></div>
                    <div class="flex-1 bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                            <div class="flex items-center gap-4 mb-4 md:mb-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-600 to-orange-700 rounded-xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-2xl">3</span>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Gelombang III</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Last Chance Registration</p>
                                </div>
                            </div>
                            <span class="inline-block px-5 py-2 bg-gradient-to-r from-orange-600 to-orange-700 text-white rounded-full text-sm font-bold shadow-lg">
                                <i class="fas fa-calendar-alt mr-2"></i>1 APR - 30 Jul 2026
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex items-center gap-3 p-3 bg-orange-50 dark:bg-orange-900/20 rounded-xl">
                                <i class="fas fa-edit text-orange-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pendaftaran Online</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-orange-50 dark:bg-orange-900/20 rounded-xl">
                                <i class="fas fa-file-upload text-orange-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Upload Berkas</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-orange-50 dark:bg-orange-900/20 rounded-xl">
                                <i class="fas fa-money-bill text-orange-600"></i>
                                <span class="text-gray-700 dark:text-gray-300 text-sm">Pembayaran</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Kuota Tersedia:</span>
                                <div class="flex items-center gap-2">
                                    <div class="w-32 h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div class="h-full bg-red-500 rounded-full" style="width: 20%"></div>
                                    </div>
                                    <span class="text-sm font-bold text-red-600">20%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</section>


<!-- CTA Section -->
<section class="py-20 px-6 bg-gradient-to-r from-blue-800 via-blue-900 to-blue-950 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl opacity-5"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-400 rounded-full blur-3xl opacity-10"></div>
    </div>
    <div class="relative max-w-4xl mx-auto text-center">
        <div data-aos="fade-up" class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-6">
            <i class="fas fa-clock text-yellow-400 mr-3"></i>
            <span class="text-white font-medium">Pendaftaran Gelombang I Ditutup 31 Desember 2025</span>
        </div>
        <h2 data-aos="fade-up" data-aos-delay="100" class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
            Siap Mendaftar di <span class="text-yellow-400">SMK BPM</span>?
        </h2>
        <p data-aos="fade-up" data-aos-delay="200" class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto leading-relaxed">
            Jangan lewatkan kesempatan untuk bergabung dengan SMK Bina Putra Mandiri. Daftar sekarang dan raih masa depan gemilang bersama kami!
        </p>
        <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('dashboard.siswa') }}" class="group px-10 py-5 bg-white text-blue-800 font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-3">
                <i class="fas fa-user-plus group-hover:rotate-12 transition-transform"></i>
                <span>Daftar Sekarang</span>
            </a>
            <a href="https://wa.me/6281234567890" class="group px-10 py-5 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-3">
                <i class="fab fa-whatsapp group-hover:scale-110 transition-transform"></i>
                <span>Hubungi Panitia</span>
            </a>
        </div>
        <p data-aos="fade-up" data-aos-delay="400" class="mt-8 text-blue-200 text-sm">
            <i class="fas fa-info-circle mr-2"></i>
            Biaya pendaftaran terjangkau hanya Rp100.000 • Tersedia program beasiswa
        </p>
    </div>
</section>

<!-- Footer (Sama seperti home page) -->
    <!-- Footer -->
    <footer class="relative bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 text-white dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 pt-20 pb-10">
        <div class="absolute inset-0 pointer-events-none bg-[radial-gradient(circle_at_top,rgba(59,130,246,0.15),transparent_55%)]"></div>
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-14">
                <div class="space-y-6">
                    <div class="flex items-center gap-1 text-2xl font-extrabold tracking-wide">
                        <span>SMK</span>
                        <span class="text-blue-300">BPM</span>
                    </div>
                    <p class="text-blue-100/90 text-sm leading-relaxed max-w-sm">
                        Membangun generasi unggul melalui pendidikan vokasi berkualitas
                        yang adaptif, inovatif, dan siap bersaing di era digital.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-600 transition duration-300 backdrop-blur-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 transition duration-300 backdrop-blur-sm">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-600 transition duration-300 backdrop-blur-sm">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-gray-900 transition duration-300 backdrop-blur-sm">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                       <!-- Bagian Program Keahlian -->
<div>
    <h3 class="footer-title text-lg font-bold mb-4 text-white">Program Keahlian</h3>
    <ul class="footer-list space-y-2">
        <li>
            <a href="/program/rpl" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                Rekayasa Perangkat Lunak
            </a>
        </li>
        <li>
            <a href="/program/tkj" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                Teknik Komputer & Jaringan
            </a>
        </li>
        <li>
            <a href="/program/dkv" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                Desain Komunikasi Visual
            </a>
        </li>
        <li>
            <a href="/program/bisnis-digital" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                Bisnis Digital
            </a>
        </li>
        <li>
            <a href="/program/akuntansi" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                Akuntansi
            </a>
        </li>
    </ul>
</div>

<!-- Bagian Informasi -->
<div>
    <h3 class="footer-title text-lg font-bold mb-4 text-white">Informasi</h3>
    <ul class="footer-list space-y-2">
        <li>
            <a href="/tentang-sekolah" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                
                Tentang Sekolah
            </a>
        </li>
        <li>
            <a href="/fasilitas" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                
                Fasilitas Sekolah
            </a>
        </li>
        <li>
            <a href="/galeri" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
               
                Galeri Kegiatan
            </a>
        </li>
        <li>
            <a href="/pendaftaran" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
                
                Informasi Pendaftaran
            </a>
        </li>
        <li>
            <a href="/kontak" 
               class="text-gray-300 hover:text-white transition-colors duration-200 flex items-center">
               
                Hubungi Kami
            </a>
        </li>
    </ul>
</div>
                <div class="space-y-6">
                    <h3 class="footer-title">Kontak Kami</h3>
                    <ul class="space-y-4 text-blue-100 text-sm">
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Jl. Bina No. 23, Bandung</li>
                        <li><i class="fas fa-phone mr-2"></i> (022) 123 4567</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@smkbpm.sch.id</li>
                    </ul>
                    <a href="https://wa.me/6281234567890"
                       class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 px-6 py-3 rounded-xl font-semibold text-sm text-white transition-all duration-300 shadow-md hover:shadow-lg">
                        <i class="fab fa-whatsapp"></i>
                        <span>Chat WhatsApp</span>
                    </a>
                </div>
            </div>
            <div class="mt-16 border-t border-blue-700/40"></div>
            <div class="mt-10 text-center">
                <h4 class="text-sm font-semibold text-blue-200 mb-4 tracking-wide">
                    Tim Developer Website
                </h4>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://www.instagram.com/rindria08/" target="_blank"
                       class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-pink-500 rounded-full text-sm font-medium transition duration-300 backdrop-blur-sm">
                        <i class="fab fa-instagram"></i>
                        <span>@rindria08</span>
                    </a>
                    <a href="https://www.instagram.com/tioramdan23/" target="_blank"
                       class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-pink-500 rounded-full text-sm font-medium transition duration-300 backdrop-blur-sm">
                        <i class="fab fa-instagram"></i>
                        <span>@tioramdan23</span>
                    </a>
                    <a href="https://www.instagram.com/syafira_td/" target="_blank"
                       class="flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-pink-500 rounded-full text-sm font-medium transition duration-300 backdrop-blur-sm">
                        <i class="fab fa-instagram"></i>
                        <span>@syafira_td</span>
                    </a>
                </div>
            </div>
            <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-blue-200">
                <p>© 2026 SMK Bina Putra Mandiri. All Rights Reserved.</p>
                <div class="flex flex-wrap items-center gap-6">
                    <a href="#" class="footer-link">Privasi</a>
                    <a href="#" class="footer-link">Syarat</a>
                    <a href="#" class="footer-link">Sitemap</a>
                    <span class="flex items-center gap-1"><i class="far fa-clock mr-1"></i> 08.00 – 16.00 WIB</span>
                </div>
            </div>
            <p class="mt-6 text-center text-xs text-blue-300/70">
                Dikembangkan oleh Tim IT SMK BPM • v2.1.0
            </p>
        </div>
    </footer>
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
<!-- AOS Animation Script -->

<script>

   
// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add scroll animation to navbar
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('shadow-md');
    } else {
        header.classList.remove('shadow-md');
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