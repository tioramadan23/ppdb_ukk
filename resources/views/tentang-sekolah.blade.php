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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Tentang Sekolah - SMK Bina Putra Mandiri</title>
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
        .visi-misi-card {
            @apply bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-all duration-300;
        }
        .program-card {
            @apply bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all duration-300;
        }
        .stats-card {
            @apply bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-xl p-6 shadow-lg;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 
dark:bg-gray-950 dark:text-gray-200 transition-colors duration-300">
    
   <!-- Navbar -->
    <header class="sticky top-0 z-50 border-b 
border-gray-200 dark:border-gray-800 
bg-white/90 dark:bg-gray-900/90 
backdrop-blur-md shadow-sm">

        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
            <a href="index.html" class="flex-shrink-0 text-xl font-bold">
                <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
                <span class="text-blue-800 dark:text-blue-400">BPM</span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm font-medium">
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white" href="{{ route('tentang-sekolah') }}">
                            Tentang Sekolah
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('informasi') }}">
                            Informasi
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('dashboard.siswa') }}">
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
        <a href="#" class="hidden sm:block shrink-0">
                    <img alt="Profile"
                        src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1770&q=80  "
                        class="h-10 w-10 rounded-full object-cover ring-2 ring-transparent hover:ring-blue-500 transition" />
                </a>
    </div>
    
           
            
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="sr-only">Toggle menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4 pt-4 pb-6 space-y-1">
                <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Home</a>
                <a href="{{ route('tentang-sekolah') }}" class="block py-3 px-4 text-base font-medium text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg">Tentang Sekolah</a>
                <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Informasi</a>
                <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Pendaftaran</a>
                <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Cari di SMK BPM..."
                            class="w-full rounded-full border border-gray-300 bg-gray-50 py-3 pl-11 pr-4 text-sm text-gray-700 focus:border-blue-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-white" />
                    </div>
                </div>
            </div>
        </div>
    </header>
   <!-- Kepala Sekolah Section -->
    <section id="kepala-sekolah" class="py-20 px-6 bg-blue-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
           

            <div class="max-w-5xl mx-auto bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="relative h-80 lg:h-auto">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&h=400&fit=crop" alt="Kepala Sekolah" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <div class="w-16 h-16 rounded-full bg-blue-600 flex items-center justify-center mb-3">
                                <i class="fas fa-user-tie text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold">Heni Hermawati M.Ak</h4>
                                <p class="text-blue-200 text-sm">Kepala Sekolah SMK BPM</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                <i class="fas fa-quote-left text-blue-600 mr-1"></i>
                                Selamat datang di SMK Bina Putra Mandiri. Sebagai lembaga pendidikan vokasi, kami berkomitmen penuh untuk mencetak generasi muda yang tidak hanya memiliki kompetensi teknis yang mumpuni, tetapi juga berkarakter dan siap bersaing di era digital.
                            </p>
                            <p>
                                Dengan kurikulum berbasis industri, fasilitas modern, dan tenaga pengajar profesional, kami memastikan setiap siswa mendapatkan pengalaman belajar yang optimal dan relevan dengan kebutuhan dunia kerja.
                            </p>
                            <p>
                                Kami mengundang Anda untuk bergabung dengan keluarga besar SMK BPM dan bersama-sama membangun masa depan yang gemilang.
                                <i class="fas fa-quote-right text-blue-600 ml-1"></i>
                            </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <i class="fas fa-award text-blue-600 mr-2"></i>
                                    <span class="text-gray-700 dark:text-gray-300 font-semibold text-sm">20+ Tahun Pengalaman</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap text-blue-600 mr-2"></i>
                                    <span class="text-gray-700 dark:text-gray-300 font-semibold text-sm">Magister Pendidikan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  
        <!-- Profil Sekolah Section -->
<section id="profil" class="py-16 md:py-24 px-4 md:px-6 bg-gradient-to-b from-white to-blue-50 dark:from-gray-800 dark:to-gray-900 transition-colors duration-300">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12 md:mb-16">
            <div class="inline-flex items-center px-4 py-2 md:px-5 md:py-2.5 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 mb-4 md:mb-6">
                <i class="fas fa-school mr-2"></i>
                <span class="font-medium text-sm md:text-base">Profil Sekolah</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-blue-700 dark:from-white dark:to-blue-400 mb-4 md:mb-5">
                Tentang Kami
            </h2>
            <div class="w-16 md:w-20 h-1.5 bg-gradient-to-r from-blue-500 to-blue-700 mx-auto rounded-full"></div>
            <p class="text-gray-600 dark:text-gray-300 mt-4 md:mt-6 max-w-3xl mx-auto text-base md:text-lg leading-relaxed">
                Menjadi mitra terpercaya dalam mencetak generasi unggul yang siap menghadapi tantangan era digital
            </p>
        </div>

        <!-- Hero Image with Overlay -->
        <div class="relative h-64 sm:h-80 md:h-96 lg:h-[450px] rounded-2xl md:rounded-3xl overflow-hidden shadow-xl md:shadow-2xl mb-12 md:mb-16 group">
            <img 
                src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200&h=400&fit=crop" 
                alt="Gedung SMK Bina Putra Mandiri - Fasilitas Modern" 
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                loading="lazy"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            
            <!-- Badge Akreditasi -->
            <div class="absolute top-4 md:top-6 right-4 md:right-6 bg-blue-600 text-white px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-semibold shadow-lg flex items-center">
                <i class="fas fa-award mr-1.5 md:mr-2"></i> 
                <span class="hidden sm:inline">Terakreditasi </span>A
            </div>
            
            <!-- Content Overlay -->
            <div class="absolute bottom-6 md:bottom-10 left-6 md:left-10 lg:left-16 right-6 md:right-10">
                <div class="flex items-center mb-2 md:mb-3">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-blue-600 flex items-center justify-center mr-3 md:mr-4 flex-shrink-0">
                        <i class="fas fa-crown text-white text-base md:text-xl"></i>
                    </div>
                    <span class="text-blue-200 md:text-blue-300 font-medium text-sm md:text-lg">Didirikan sejak 2010</span>
                </div>
                <h3 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-1 md:mb-2 leading-tight">
                    SMK Bina Putra Mandiri
                </h3>
                <p class="text-base md:text-xl text-blue-100 md:text-blue-200 max-w-xl leading-relaxed">
                    Mencetak Generasi Digital yang Kompeten dan Berkarakter
                </p>
            </div>
        </div>

        <!-- Content Grid: Info Cards + Stats -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-start max-w-6xl mx-auto">
            
            <!-- Left Column: Info Cards -->
            <div class="space-y-6 md:space-y-8">
                <!-- Profil Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start mb-4 md:mb-5">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-graduation-cap text-xl md:text-2xl text-blue-700 dark:text-blue-400"></i>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white ml-3 md:ml-4 pt-1">
                            Profil Sekolah
                        </h3>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-base md:text-lg">
                        SMK Bina Putra Mandiri (SMK BPM) adalah lembaga pendidikan vokasi yang berkomitmen penuh untuk mencetak tenaga kerja profesional di bidang teknologi informasi, desain digital, dan bisnis modern. Didirikan pada tahun 2010, kami telah menjadi pilihan utama bagi generasi muda yang ingin meraih kesuksesan di era digital.
                    </p>
                </article>
                
                <!-- Komitmen Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start mb-4 md:mb-5">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-bullseye text-xl md:text-2xl text-blue-700 dark:text-blue-400"></i>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white ml-3 md:ml-4 pt-1">
                            Komitmen Kami
                        </h3>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-base md:text-lg">
                        Dengan mengedepankan kurikulum berbasis industri, fasilitas modern, dan tenaga pengajar berpengalaman, kami memastikan setiap lulusan memiliki kompetensi yang dibutuhkan untuk bersaing di dunia kerja maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.
                    </p>
                </article>
            </div>
            
            <!-- Right Column: Stats Cards -->
            <div class="grid grid-cols-2 gap-4 md:gap-6">
                <!-- Program Keahlian -->
                <div class="stats-card rounded-2xl p-4 md:p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm border border-blue-100/30 dark:border-blue-900/30">
                    <div class="mb-3 md:mb-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-2 md:mb-3">
                            <i class="fas fa-laptop-code text-xl md:text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="text-3xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-200">
                            6
                        </div>
                    </div>
                    <div class="text-base md:text-lg font-bold text-gray-800 dark:text-white mb-0.5 md:mb-1">
                        Program Keahlian
                    </div>
                    <div class="text-blue-600 dark:text-blue-400 font-medium text-xs md:text-sm">
                        Teknologi & Bisnis
                    </div>
                    <div class="mt-3 md:mt-4 h-1 w-12 md:w-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mx-auto"></div>
                </div>
                
                <!-- Siswa Aktif -->
                <div class="stats-card rounded-2xl p-4 md:p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm border border-blue-100/30 dark:border-blue-900/30">
                    <div class="mb-3 md:mb-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-2 md:mb-3">
                            <i class="fas fa-users text-xl md:text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="text-3xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-200">
                            600+
                        </div>
                    </div>
                    <div class="text-base md:text-lg font-bold text-gray-800 dark:text-white mb-0.5 md:mb-1">
                        Siswa Aktif
                    </div>
                    <div class="text-blue-600 dark:text-blue-400 font-medium text-xs md:text-sm">
                        Generasi Digital
                    </div>
                    <div class="mt-3 md:mt-4 h-1 w-12 md:w-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mx-auto"></div>
                </div>
                
                <!-- Guru Profesional -->
                <div class="stats-card rounded-2xl p-4 md:p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm border border-blue-100/30 dark:border-blue-900/30">
                    <div class="mb-3 md:mb-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-2 md:mb-3">
                            <i class="fas fa-chalkboard-teacher text-xl md:text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="text-3xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-200">
                            30+
                        </div>
                    </div>
                    <div class="text-base md:text-lg font-bold text-gray-800 dark:text-white mb-0.5 md:mb-1">
                        Guru Profesional
                    </div>
                    <div class="text-blue-600 dark:text-blue-400 font-medium text-xs md:text-sm">
                        Berpengalaman
                    </div>
                    <div class="mt-3 md:mt-4 h-1 w-12 md:w-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mx-auto"></div>
                </div>
                
                <!-- Penyerapan Kerja -->
                <div class="stats-card rounded-2xl p-4 md:p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm border border-blue-100/30 dark:border-blue-900/30">
                    <div class="mb-3 md:mb-4">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-2 md:mb-3">
                            <i class="fas fa-briefcase text-xl md:text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="text-3xl md:text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-200">
                            98%
                        </div>
                    </div>
                    <div class="text-base md:text-lg font-bold text-gray-800 dark:text-white mb-0.5 md:mb-1">
                        Penyerapan Kerja
                    </div>
                    <div class="text-blue-600 dark:text-blue-400 font-medium text-xs md:text-sm">
                        Lulusan Terserap
                    </div>
                    <div class="mt-3 md:mt-4 h-1 w-12 md:w-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full mx-auto"></div>
                </div>
            </div>
        </div>
        
       
    </div>
</section>
    <!-- Visi & Misi Section -->
    <section id="visi-misi" class="py-20 px-6 bg-blue-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Visi dan Misi Sekolah
                </h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="text-gray-700 dark:text-gray-300 mt-4">
                    Landasan filosofis yang menjadi pedoman dalam penyelenggaraan pendidikan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Visi Card -->
                <div class="visi-misi-card">
                    <div class="h-2 bg-blue-600 rounded-t-2xl"></div>
                    <div class="p-8">
                        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 dark:bg-blue-900/30 mb-6 mx-auto">
                            <i class="fas fa-eye text-2xl text-blue-700"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6">Visi Sekolah</h3>
                        <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 p-6 rounded-r-lg">
                            <p class="text-gray-800 dark:text-gray-200 text-lg font-semibold leading-relaxed text-center">
                                "Dengan bekal keimanan & ketaqwaan mempercepat kemampuan wilayah dengan mempersiapkan
                                sumber daya manusia yang berkualitas, memiliki daya nalar tinggi,kreatif,produktif & inovatif.
                                mempersiapkan sumber daya manusia yang mampu beradaptasi dengan segala perkembangan keilmuan di era revolusi teknologi informasi & komunikasi"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="visi-misi-card">
                    <div class="h-2 bg-blue-600 rounded-t-2xl"></div>
                    <div class="p-8">
                        <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 dark:bg-blue-900/30 mb-6 mx-auto">
                            <i class="fas fa-tasks text-2xl text-blue-700"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6">Misi Sekolah</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm mr-3 mt-1">1</div>
                                <p class="text-gray-700 dark:text-gray-300">memiliki aktivitas yang kreatif, aktif, produktif dan inovatif</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm mr-3 mt-1">2</div>
                                <p class="text-gray-700 dark:text-gray-300">melaksanakan pembelajaran,pelatihan dan bimbingan secara efektif.</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm mr-3 mt-1">3</div>
                                <p class="text-gray-700 dark:text-gray-300">menghasilkan tenaga kerja profesional teknologi untuk memenuhi tuntutan dunia usaha dan bidang industri (DUDI)</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm mr-3 mt-1">4</div>
                                <p class="text-gray-700 dark:text-gray-300">membekali peserta didik dengan kemampuan untuk dapat mengembangkan diri</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm mr-3 mt-1">5</div>
                                <p class="text-gray-700 dark:text-gray-300">mengembangkan pendidikan berbasis kompetensi yang berorientasi pada dunia kerja dan industri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Sekolah Section -->
    <section id="program-sekolah" class="py-20 px-6 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 text-white mb-6">
                    <i class="fas fa-book-open mr-2"></i>
                    <span class="text-sm font-semibold">Program Sekolah</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Program Unggulan SMK BPM
                </h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full mb-4"></div>
                <p class="text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                    Berbagai program pendidikan dan pengembangan yang kami selenggarakan untuk mendukung pertumbuhan siswa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
               
                <!-- Program 4: Kewirausahaan -->
                <div class="program-card">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=400&h=192&fit=crop" alt="Kewirausahaan" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                                <i class="fas fa-lightbulb text-2xl text-blue-700"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Kewirausahaan</h3>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Program pengembangan jiwa kewirausahaan untuk mencetak wirausaha muda yang inovatif dan mandiri.
                        </p>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Workshop Bisnis</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Business Plan Competition</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Startup Incubator</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Seed Funding</li>
                        </ul>
                    </div>
                </div>

                <!-- Program 5: Karakter -->
                <div class="program-card">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=192&fit=crop" alt="Pengembangan Karakter" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                                <i class="fas fa-heart text-2xl text-blue-700"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Pengembangan Karakter</h3>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Pembentukan karakter dan nilai-nilai moral melalui kegiatan keagamaan, bakti sosial, dan leadership training.
                        </p>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Kegiatan Keagamaan</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Bakti Sosial</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Leadership Training</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Anti Bullying Program</li>
                        </ul>
                    </div>
                </div>

                <!-- Program 6: Bimbingan Karir -->
                <div class="program-card">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=400&h=192&fit=crop" alt="Bimbingan Karir" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                                <i class="fas fa-chart-line text-2xl text-blue-700"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Bimbingan Karir</h3>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Layanan bimbingan karir untuk membantu siswa merencanakan masa depan dan mempersiapkan diri memasuki dunia kerja.
                        </p>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Psikotes & Assessment</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Job Fair</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>CV & Interview Training</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i>Alumni Network</li>
                        </ul>
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
                <div>
                    <h3 class="footer-title">Program Keahlian</h3>
                    <ul class="footer-list">
                        <li>Rekayasa Perangkat Lunak</li>
                        <li>Teknik Komputer & Jaringan</li>
                        <li>Desain Komunikasi Visual</li>
                        <li>Bisnis Digital</li>
                        <li>Akuntansi</li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Informasi</h3>
                    <ul class="footer-list">
                        <li>Tentang Sekolah</li>
                        <li>Fasilitas Sekolah</li>
                        <li>Galeri Kegiatan</li>
                        <li>Informasi Pendaftaran</li>
                        <li>Hubungi Kami</li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (!mobileMenuButton || !mobileMenu) return;
            
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                const icon = mobileMenuButton.querySelector('svg');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />`;
                } else {
                    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />`;
                }
            });
            
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.querySelector('svg').innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />`;
                });
            });
            
            document.addEventListener('click', (e) => {
                if (!mobileMenuButton.contains(e.target) && 
                    !mobileMenu.contains(e.target) && 
                    !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.querySelector('svg').innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />`;
                }
            });
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