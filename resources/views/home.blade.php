<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <!-- Navbar start -->
    <header class="border-b border-gray-300 bg-white dark:border-gray-700 dark:bg-gray-900 shadow-sm">
        <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">
            <a href="#" title="" class="flex text-xl">
                <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
                <span class="text-blue-800 dark:text-blue-400">BPM</span>
            </a>

            <div class="flex flex-1 items-center justify-end md:justify-between">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="border-b-2 border-blue-700 pb-5 text-sm font-medium text-gray-900 dark:border-blue-500 dark:text-white" href="#"> Home </a>
                        </li>

                        <li>
                            <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="#"> Tentang Sekolah </a>
                        </li>

                        <li>
                            <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="#"> Informasi </a>
                        </li>

                        <li>
                            <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="#"> Pendaftaran </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="hidden lg:flex lg:items-center lg:space-x-4">
                        <a href="Registrasi.blade.html" title="" class="rounded-full border border-transparent bg-blue-800 px-4 py-2 text-base font-semibold text-white transition-all duration-200 hover:bg-blue-900 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-600" role="button"> Registrasi </a>
                        <a href="Login.html" title="" class="rounded-full border border-blue-800 bg-transparent px-4 py-2 text-base font-semibold text-blue-800 transition-all duration-200 hover:bg-blue-50 hover:text-blue-900 focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 focus:outline-none dark:border-blue-500 dark:text-blue-400 dark:hover:bg-blue-900/20 dark:hover:text-white dark:focus:ring-blue-500" role="button"> Login </a>
                    </div>
                    <div class="hidden sm:flex sm:gap-4">
                        <a href="#" class="block shrink-0">
                            <span class="sr-only">Profile</span>
                            <img alt="Man" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" class="h-10 w-10 rounded-full object-cover" />
                        </a>
                    </div>

                    <button class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-800 md:hidden dark:bg-gray-800 dark:text-gray-300 dark:hover:text-white">
                        <span class="sr-only">Toggle menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
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
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-blue-800 text-white font-semibold rounded-xl hover:bg-blue-900 transition-colors shadow-lg">
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
</body>
</html>