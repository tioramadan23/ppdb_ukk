<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SMK Bina Putra Mandiri - PPDB 2026/2027">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Home - SMK Bina Putra Mandiri</title>
     <link rel="shortcut icon" href="c:\Users\tioramadan\Downloads\Desain tanpa judul (5).png" type="image/x-icon">
    <link rel="icon" href="c:\Users\tioramadan\Downloads\Desain tanpa judul (5).png" type="image/png">
    <link rel="apple-touch-icon" href="c:\Users\tioramadan\Downloads\Desain tanpa judul (5).png">
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
        .jurusan-card {
            transition: all 0.3s ease;
        }
        .jurusan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
        html { scroll-behavior: smooth; }
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

     <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Toggle menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Home</a>
            <a href="{{ route('tentang_sekolah') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('tentang_sekolah') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('informasi') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Informasi</a>
            <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('dashboard.siswa') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Pendaftaran</a>
        </div>
    </div>
</header>
{{-- END Navbar --}}

<!-- Hero Section -->
<section class="relative py-24 px-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-900 dark:to-gray-800 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600 rounded-full blur-3xl opacity-10"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600 rounded-full blur-3xl opacity-10"></div>
    </div>
    <div class="relative max-w-4xl mx-auto">
        <div class="backdrop-blur-xl bg-white/90 dark:bg-white/10 border border-gray-200 dark:border-white/20 rounded-3xl p-8 md:p-12 text-center shadow-2xl">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Selamat Datang di PPDB
            </h1>
            <span class="block text-3xl md:text-4xl font-bold text-blue-800 dark:text-blue-400 mb-6">
                SMK Bina Putra Mandiri 2026/2027
            </span>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                Pilih kompetensi terbaik: Rekayasa Perangkat Lunak, Teknik Komputer dan Jaringan, Desain Komunikasi Visual, Bisnis Digital, dan Akuntansi. Kurikulum industri, fasilitas modern, guru berpengalaman.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-800 text-white font-semibold rounded-xl hover:bg-blue-900 transition-colors shadow-lg hover:shadow-xl">
                    Daftar Sekarang
                </a>
                <a href="{{ route('informasi') }}" class="w-full sm:w-auto px-8 py-4 bg-gray-100 dark:bg-white/10 backdrop-blur text-gray-900 dark:text-white font-semibold rounded-xl border border-gray-300 dark:border-white/20 hover:bg-gray-200 dark:hover:bg-white/20 transition-colors">
                    Informasi Pendaftaran
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-14 bg-gradient-to-r from-blue-800 to-blue-900 text-white">
    <div class="container mx-auto px-4 text-center max-w-4xl">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Kenapa Memilih SMK Bina Putra Mandiri?</h2>
        <p class="text-lg opacity-90 mb-8 leading-relaxed">
            SMK Bina Putra Mandiri menghadirkan pendidikan berkualitas dengan kurikulum berbasis industri, fasilitas praktik modern, dan tenaga pengajar profesional. Siswa dibekali keterampilan, karakter, serta kesiapan kerja agar mampu bersaing dan meraih masa depan yang lebih baik.
        </p>
        <a href="{{ route('dashboard.siswa') }}" class="inline-block bg-white text-blue-800 font-bold py-4 px-10 rounded-full text-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
            Daftar Sekarang - Gelombang I Ditutup 31 Desember 2025
        </a>
        <p class="mt-4 text-sm opacity-85">*Biaya pendaftaran terjangkau hanya Rp100.000 per pendaftaran</p>
    </div>
</section>

<!-- Keunggulan Section -->
<section id="keunggulan" class="py-24 bg-gradient-to-b from-blue-50 via-blue-50/20 to-white dark:from-gray-900 dark:to-gray-800 relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.05),transparent_50%)]"></div>
    </div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <div data-aos="fade-down" class="inline-flex items-center px-5 py-2 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 mb-6">
                <i class="fas fa-star text-blue-600 dark:text-blue-400 w-5 h-5 mr-2"></i>
                <span class="text-sm font-medium text-blue-900 dark:text-blue-200">Keunggulan Kami</span>
            </div>
            <h2 data-aos="fade-up" class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                Keunggulan Yang Ada Di
                <span class="block mt-2 text-blue-800 dark:text-blue-400">SMK Bina Putra Mandiri</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                SMK Bina Putra Mandiri berfokus pada pengembangan keterampilan, pengetahuan, dan karakter siswa melalui sistem pembelajaran vokasi yang berkualitas.
            </p>
            <div data-aos="fade-up" data-aos-delay="200" class="mt-8">
                <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Card 1 -->
            <div data-aos="fade-up" data-aos-delay="100" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=160&fit=crop&crop=center" alt="Lokasi Strategis" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Lokasi Strategis</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Terletak di lokasi yang mudah dijangkau sehingga memudahkan akses transportasi bagi siswa.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div data-aos="fade-up" data-aos-delay="200" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=400&h=160&fit=crop&crop=center" alt="Siap Kerja" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Siap Terjun ke Dunia Usaha</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Membekali siswa dengan keterampilan kewirausahaan agar mampu membuka usaha sendiri.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div data-aos="fade-up" data-aos-delay="300" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1523580494863-132a890389f2?w=400&h=160&fit=crop&crop=center" alt="Beasiswa" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Program Beasiswa</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Tersedia beasiswa bagi siswa berprestasi sebagai bentuk dukungan terhadap pengembangan potensi.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div data-aos="fade-up" data-aos-delay="400" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=160&fit=crop&crop=center" alt="BKK" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Bursa Kerja Khusus (BKK)</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Membantu menyalurkan lulusan ke dunia kerja melalui kerja sama dengan berbagai perusahaan.
                    </p>
                </div>
            </div>

            <!-- Card 5 -->
            <div data-aos="fade-up" data-aos-delay="500" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=400&h=160&fit=crop&crop=center" alt="Kuliah Lanjut" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Lanjut ke Perguruan Tinggi</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Lulusan memiliki peluang melanjutkan pendidikan ke perguruan tinggi sesuai bidang keahlian.
                    </p>
                </div>
            </div>

            <!-- Card 6 -->
            <div data-aos="fade-up" data-aos-delay="600" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=160&fit=crop&crop=center" alt="Kerja Sama Industri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Kerja Sama Industri</h3>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Siswa mendapatkan kesempatan PKL di perusahaan mitra untuk pengalaman kerja nyata.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jurusan Section -->
<section class="py-20 px-6 bg-gradient-to-b from-blue-50 to-white dark:from-gray-900 dark:to-gray-800">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Program Keahlian</h2>
            <div class="w-24 h-1 bg-blue-700 mx-auto rounded-full mb-4"></div>
            <p class="text-lg text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                SMK Bina Putra Mandiri menyediakan berbagai program keahlian yang dirancang sesuai kebutuhan dunia industri dan perkembangan teknologi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- RPL Card -->
            <div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=192&fit=crop&crop=center" alt="Rekayasa Perangkat Lunak" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Rekayasa Perangkat Lunak</h3>
                        <p class="text-gray-700 dark:text-gray-300">Mempelajari pengembangan aplikasi web, mobile, dan desktop dengan teknologi terkini.</p>
                    </div>
                    <a href="" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 mt-4">
                        <span>Selengkapnya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- TKJ Card -->
            <div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1581276879432-15e50529f34b?w=400&h=192&fit=crop&crop=center" alt="Teknik Komputer & Jaringan" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Teknik Komputer & Jaringan</h3>
                        <p class="text-gray-700 dark:text-gray-300">Menguasai instalasi, konfigurasi, dan administrasi jaringan komputer serta keamanan siber.</p>
                    </div>
                    <a href="" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 mt-4">
                        <span>Selengkapnya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- DKV Card -->
            <div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=400&h=192&fit=crop&crop=center" alt="Desain Komunikasi Visual" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Desain Komunikasi Visual</h3>
                        <p class="text-gray-700 dark:text-gray-300">Mengembangkan kreativitas dalam desain grafis, multimedia, dan komunikasi visual.</p>
                    </div>
                    <a href="" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 mt-4">
                        <span>Selengkapnya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Bisnis Digital Card -->
            <div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=192&fit=crop&crop=center" alt="Bisnis Digital" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Bisnis Digital</h3>
                        <p class="text-gray-700 dark:text-gray-300">Mempelajari strategi bisnis berbasis digital, e-commerce, pemasaran online, dan manajemen startup.</p>
                    </div>
                    <a href="" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 mt-4">
                        <span>Selengkapnya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Akuntansi Card -->
            <div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554224145-66d668709f03?w=400&h=192&fit=crop&crop=center" alt="Akuntansi" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Akuntansi</h3>
                        <p class="text-gray-700 dark:text-gray-300">Menguasai prinsip akuntansi, perpajakan, auditing, dan manajemen keuangan untuk dunia usaha.</p>
                    </div>
                    <a href="" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 mt-4">
                        <span>Selengkapnya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

           
                
            </div>
        </div>
    </div>
</section>

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