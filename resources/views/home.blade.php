<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
    <title>Home </title>
</head>
<body>
      <!-- Navbar start -->
<header class="sticky top-0 z-50 border-b border-gray-300 bg-white/90 backdrop-blur-md dark:border-gray-700 dark:bg-gray-900/90 shadow-sm">
    <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <a href="#" title="" class="flex text-xl">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-blue-800 dark:text-blue-400">BPM</span>
        </a>
 
        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="border-b-2 border-blue-700 pb-5 text-sm font-medium text-gray-900 dark:border-blue-500 dark:text-white" href="#">
                            Home
                        </a>
                    </li>
 
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="#">
                            Tentang Sekolah
                        </a>
                    </li>
 
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="#">
                            Informasi
                        </a>
                    </li>
 
                    <li>
<a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('dashboard.pendaftaran') }}">
Pendaftaran
</a>
</li>
                </ul>
            </nav>
 
            <div class="flex items-center gap-3">
                <!-- Search -->
                <div class="relative hidden lg:block">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>
                    </span>
 
                    <input type="text" placeholder="Cari"
                        class="w-64 xl:w-72 rounded-full border border-gray-300 bg-white
                        py-2.5 pl-11 pr-4 text-sm text-gray-700 shadow-sm
                        transition-all duration-200
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-600 focus:outline-none
                        hover:border-blue-400
                        dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" />
                </div>
 
                <!-- Profile -->
                <a href="#" class="hidden sm:block shrink-0">
                    <span class="sr-only">Profile</span>
                    <img alt="Profile"
                        src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1770&q=80"
                        class="h-10 w-10 rounded-full object-cover ring-2 ring-transparent hover:ring-blue-500 transition" />
                </a>
            </div>
 
            <button
                class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-800 md:hidden dark:bg-gray-800 dark:text-gray-300 dark:hover:text-white">
                <span class="sr-only">Toggle menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>
<!-- Navbar end -->
 

    <section class="relative py-24 px-6 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-900 dark:to-gray-800 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600 rounded-full blur-3xl opacity-10"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600 rounded-full blur-3xl opacity-10"></div>
        </div>
        <div class="relative max-w-4xl mx-auto">
            <div class="backdrop-blur-xl bg-white/90 dark:bg-white/10 border border-gray-200 dark:border-white/20 rounded-3xl p-12 text-center shadow-2xl">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Selamat Datang di SPMB 
                </h1>
                <span class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6"> SMK BPM 2026/2027 </span>
                <p class="text-lg mt-4 text-gray-700 dark:text-gray-300 mb-8 max-w-xl mx-auto">
                    Pilih kompetensi terbaik: Rekayasa Perangkat Lunak, Teknik Komputer dan Jaringan, Desain Komunikasi Visual, Bisnis Digital dan Akuntansi. Kurikulum industri, fasilitas modern, guru berpengalaman.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('registrasi') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-800 text-white font-semibold rounded-xl hover:bg-blue-900 transition-colors shadow-lg">
                        Daftar
                    </a>
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-gray-100 dark:bg-white/10 backdrop-blur text-gray-900 dark:text-white font-semibold rounded-xl border border-gray-300 dark:border-white/20 hover:bg-gray-200 dark:hover:bg-white/20 transition-colors">
                        Informasi Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA Akhir -->
    <section class="py-14 bg-gradient-to-r from-blue-800 to-blue-900 text-white">
        <div class="container mx-auto px-4 text-center max-w-4xl">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Kenapa Memilih SMK Bina Putra Mandiri?</h2>
            <p class="text-lg opacity-90 mb-8">Kurikulum industri, fasilitas praktik terkini, guru profesional, serta dukungan karir menjadikan lulusan siap kerja di berbagai bidang digital & teknik.</p>
            <a href="#pendaftaran" class="inline-block bg-white text-blue-800 font-bold py-4 px-10 rounded-full text-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                Daftar Sekarang - Gelombang I Ditutup 31 desember 2025
            </a>
            <p class="mt-4 text-sm opacity-85">*Biaya pendaftaran terjangkau hanya Rp100.000 per pendaftaran</p>
        </div>
    </section>

    <section id="keunggulan" class="py-24 bg-gradient-to-b from-blue-50 via-blue-50/20 to-white dark:from-gray-900 dark:to-gray-800 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+PHJlY3Qgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBmaWxsPSJub25lIi8+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9IiMxOTJBNDQiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-5"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-4xl mx-auto mb-24">
                <div data-aos="fade-down" class="inline-flex items-center px-5 py-2 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#1e40af" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium text-blue-900 dark:text-blue-200">Keunggulan Kami</span>
                </div>

                <h2 data-aos="fade-up" class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-8">
                    Keunggulan Yang Ada Di
                    <span class="block mt-3 text-blue-800">SMK Bina Putra Mandiri</span>
                </h2>

                <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                    Kami berkomitmen memberikan pendidikan vokasi berkualitas tinggi dengan standar industri, fasilitas modern, dan tenaga pengajar profesional untuk membentuk generasi muda yang kompeten dan siap bersaing di dunia kerja.
                </p>

                <div data-aos="fade-up" data-aos-delay="200" class="mt-10">
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-700 to-blue-900 mx-auto rounded-full"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-7xl mx-auto">
                <!-- Card 1: Kurikulum Industri -->
                <div data-aos="fade-up" data-aos-delay="100" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551650975-87de45972773?w=400&h=144&fit=crop&crop=center" alt="Kurikulum Berbasis Industri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Kurikulum Berbasis Industri
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Materi pembelajaran dirancang bersama praktisi industri terkini. Siswa belajar kompetensi yang benar-benar dibutuhkan di dunia kerja modern.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Fasilitas Modern -->
                <div data-aos="fade-up" data-aos-delay="200" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=400&h=144&fit=crop&crop=center" alt="Fasilitas Praktik Modern" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Fasilitas Praktik Modern
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Laboratorium komputer berteknologi tinggi, studio desain profesional, ruang jaringan enterprise, dan perpustakaan digital yang mendukung pembelajaran optimal.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pengajar Profesional -->
                <div data-aos="fade-up" data-aos-delay="300" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=144&fit=crop&crop=center" alt="Tenaga Pengajar Profesional" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Tenaga Pengajar Profesional
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Guru dan mentor berpengalaman industri dengan sertifikasi kompetensi nasional dan internasional, siap membimbing siswa mencapai potensi terbaik.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Sertifikasi -->
                <div data-aos="fade-up" data-aos-delay="400" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=144&fit=crop&crop=center" alt="Sertifikasi Kompetensi" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Sertifikasi Kompetensi
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Program sertifikasi internasional (Cisco, Microsoft, Adobe) dan nasional untuk memperkuat kompetensi dan daya saing lulusan di pasar kerja.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Magang Industri -->
                <div data-aos="fade-up" data-aos-delay="500" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?w=400&h=144&fit=crop&crop=center" alt="Program Magang Industri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Program Magang Industri
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Kesempatan magang di perusahaan ternama dengan bimbingan langsung dari praktisi industri untuk pengalaman kerja nyata sebelum lulus.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Jaringan Alumni -->
                <div data-aos="fade-up" data-aos-delay="600" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=144&fit=crop&crop=center" alt="Jaringan Alumni Kuat" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Jaringan Alumni Kuat
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Komunitas alumni yang solid dan tersebar di berbagai perusahaan ternama, siap membantu membuka peluang karir bagi lulusan baru.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-blue-700 dark:text-blue-300 font-medium hover:text-blue-900 dark:hover:text-blue-200 transition-colors group">
                                <span>Selengkapnya</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jurusan Section -->
    <section class="py-20 px-6 bg-gradient-to-b from-blue-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Program Keahlian
                </h2>
                <div class="w-24 h-1 bg-blue-700 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                    Pilih jurusan yang sesuai dengan minat dan bakat Anda. Setiap program keahlian dirancang untuk memberikan kompetensi terbaik di bidangnya masing-masing.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
               <!-- RPL Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=192&fit=crop&crop=center" alt="Rekayasa Perangkat Lunak" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Rekayasa Perangkat Lunak</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Mempelajari pengembangan aplikasi, website, dan sistem perangkat lunak menggunakan teknologi terkini.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>

<!-- TKJ Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581276879432-15e50529f34b?w=400&h=192&fit=crop&crop=center" alt="Teknik Komputer & Jaringan" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Teknik Komputer & Jaringan</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Menguasai instalasi, konfigurasi, dan administrasi jaringan komputer serta keamanan siber.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>

<!-- DKV Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=400&h=192&fit=crop&crop=center" alt="Desain Komunikasi Visual" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Desain Komunikasi Visual</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Mengembangkan kreativitas dalam desain grafis, multimedia, dan komunikasi visual untuk industri kreatif.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>

<!-- Bisnis Digital Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=192&fit=crop&crop=center" alt="Bisnis Digital" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Bisnis Digital</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Mempelajari strategi bisnis berbasis digital, e-commerce, pemasaran online, dan manajemen startup.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>

<!-- Akuntansi Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1554224145-66d668709f03?w=400&h=192&fit=crop&crop=center" alt="Akuntansi" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Akuntansi</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Menguasai prinsip akuntansi, perpajakan, auditing, dan manajemen keuangan untuk dunia usaha.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>

<!-- Multimedia Card -->
<div class="jurusan-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
    <div class="h-48 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?w=400&h=192&fit=crop&crop=center" alt="Multimedia" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Multimedia</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">Menggabungkan seni dan teknologi untuk menciptakan konten audio visual yang menarik dan inovatif.</p>
        </div>
        <a href="multimedia.html" class="w-full flex items-center justify-center bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-xl transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 mt-auto">
            <span>Selengkapnya</span>
            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</div>
            </div>
        </div>
    </section>

<footer class="relative bg-gradient-to-br from-blue-950 via-blue-900 to-blue-800 text-white dark:from-gray-950 dark:via-gray-900 dark:to-gray-800 pt-20 pb-10">
  <!-- Decorative Glow -->
  <div class="absolute inset-0 pointer-events-none bg-[radial-gradient(circle_at_top,rgba(59,130,246,0.15),transparent_55%)]"></div>

  <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
    <!-- Main Footer -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-14">

      <!-- Brand -->
      <div class="space-y-6">
        <div class="flex items-center gap-1 text-2xl font-extrabold tracking-wide">
          <span>SMK</span>
          <span class="text-blue-300">BPM</span>
        </div>

        <p class="text-blue-100/90 text-sm leading-relaxed max-w-sm">
          Membangun generasi unggul melalui pendidikan vokasi berkualitas
          yang adaptif, inovatif, dan siap bersaing di era digital.
        </p>

       <!-- Social Media -->
<div class="flex items-center gap-3 pt-2">

  <!-- Facebook -->
  <a href="#" 
     class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-600 transition duration-300 backdrop-blur-sm">
    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
      <path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.3 0-1.7.8-1.7 1.6V12H17l-.4 3h-2.2v7A10 10 0 0022 12z"/>
    </svg>
  </a>

  <!-- Instagram -->
  <a href="#" 
     class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 transition duration-300 backdrop-blur-sm">
    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
      <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
    </svg>
  </a>

  <!-- YouTube -->
  <a href="#" 
     class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-600 transition duration-300 backdrop-blur-sm">
    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
      <path d="M21.8 8s-.2-1.4-.8-2c-.8-.8-1.6-.8-2-.9C16 5 12 5 12 5h0s-4 0-7 .1c-.4 0-1.2 0-2 .9-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6C2 14.4 2.2 16 2.2 16s.2 1.4.8 2c.8.8 1.8.8 2.2.9 1.6.1 6.8.1 6.8.1s4 0 7-.1c.4 0 1.2 0 2-.9.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6C22 9.6 21.8 8 21.8 8zM10 15V9l5 3-5 3z"/>
    </svg>
  </a>

  <!-- X (Twitter) -->
  <a href="#" 
     class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-gray-900 transition duration-300 backdrop-blur-sm">
    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
      <path d="M18.9 2H22l-7.5 8.6L23 22h-6.8l-5.3-6.9L4.5 22H1.4l8-9.2L1 2h6.9l4.8 6.3L18.9 2z"/>
    </svg>
  </a>

</div>

      </div>

      <!-- Program -->
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

      <!-- Informasi -->
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

      <!-- Kontak -->
      <div class="space-y-6">
        <h3 class="footer-title">Kontak Kami</h3>

        <ul class="space-y-4 text-blue-100 text-sm">
          <li>📍 Jl. Bina No. 23, Bandung</li>
          <li>📞 (022) 123 4567</li>
          <li>✉️ info@smkbpm.sch.id</li>
        </ul>

       <a href="https://wa.me/6281234567890"
   class="inline-flex items-center gap-3 
          bg-green-500 hover:bg-green-600 
          px-6 py-3 rounded-xl 
          font-semibold text-sm text-white
          transition-all duration-300 
          shadow-md hover:shadow-lg">

  <!-- Icon -->
  <svg xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 32 32"
       class="w-5 h-5"
       fill="currentColor">
    <path d="M16 .4C7.4.4.4 7.4.4 16c0 2.8.7 5.4 2.1 7.8L.4 31.6l8-2.1c2.3 1.2 4.8 1.8 7.6 1.8 8.6 0 15.6-7 15.6-15.6S24.6.4 16 .4zm0 28.3c-2.4 0-4.7-.6-6.7-1.7l-.5-.3-4.7 1.2 1.3-4.6-.3-.5C3.9 20.8 3.3 18.5 3.3 16 3.3 8.9 8.9 3.3 16 3.3S28.7 8.9 28.7 16 23.1 28.7 16 28.7z"/>
  </svg>

  <span>Chat WhatsApp</span>

</a>


      </div>
    </div>

    <!-- Divider -->
    <div class="mt-16 border-t border-blue-700/40"></div>
    <!-- Instagram Tim Developer -->
<div class="mt-10 text-center">

  <h4 class="text-sm font-semibold text-blue-200 mb-4 tracking-wide">
    Tim Developer Website
  </h4>

  <div class="flex flex-wrap justify-center gap-4">

    <!-- Person 1 -->
    <a href="https://www.instagram.com/rindria08/" target="_blank"
       class="flex items-center gap-2 px-4 py-2 
              bg-white/10 hover:bg-pink-500 
              rounded-full text-sm font-medium
              transition duration-300 backdrop-blur-sm">

      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
      </svg>

      <span>@rindria08</span>
    </a>

    <!-- Person 2 -->
    <a href="https://www.instagram.com/tioramdan23/" target="_blank"
       class="flex items-center gap-2 px-4 py-2 
              bg-white/10 hover:bg-pink-500 
              rounded-full text-sm font-medium
              transition duration-300 backdrop-blur-sm">

      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
      </svg>

      <span>@tioramdan23</span>
    </a>

    <!-- Person 3 -->
    <a href="https://www.instagram.com/syafira_td/" target="_blank"
       class="flex items-center gap-2 px-4 py-2 
              bg-white/10 hover:bg-pink-500 
              rounded-full text-sm font-medium
              transition duration-300 backdrop-blur-sm">

      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
      </svg>

      <span>@syafira_td</span>
    </a>

  </div>

</div>

    <!-- Bottom Footer -->
    <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-blue-200">
      <p>© 2026 SMK Bina Putra Mandiri. All Rights Reserved.</p>

      <div class="flex flex-wrap items-center gap-6">
        <a href="#" class="footer-link">Privasi</a>
        <a href="#" class="footer-link">Syarat</a>
        <a href="#" class="footer-link">Sitemap</a>
        <span class="flex items-center gap-1">⏰ 08.00 – 16.00 WIB</span>
      </div>
    </div>

    <p class="mt-6 text-center text-xs text-blue-300/70">
      Dikembangkan oleh Tim IT SMK BPM • v2.1.0
    </p>
  </div>

  <!-- Helper Styles -->
  <style>
.footer-title {
  font-size: 1.125rem;
  font-weight: bold;
  margin-bottom: 1rem;
  padding-left: 0.75rem;
  border-left: 4px solid #60a5fa;
}
</style>

</footer>

</body>
</html>