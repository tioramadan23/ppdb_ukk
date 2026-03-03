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
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        <a href="#" title="" class="flex-shrink-0 text-xl font-bold">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-blue-800 dark:text-blue-400">BPM</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm font-medium">
                <li>
                    <a class="border-b-2 border-blue-700 pb-1 text-gray-900 dark:border-blue-500 dark:text-white" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('tentang-sekolah') }}">
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

       tema warna
            <a href="#" class="hidden sm:block shrink-0">
                <span class="sr-only">Profile</span>
                <img alt="Profile"
                    src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1770&q=80"
                    class="h-10 w-10 rounded-full object-cover ring-2 ring-transparent hover:ring-blue-500 transition" />
            </a>
        </div>

        <!-- Mobile menu button (visible only on mobile) -->
        <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="sr-only">Toggle menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg">Home</a>
            <a href="{{ route('tentang-sekolah') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Informasi</a>
            <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Pendaftaran</a>
            
            
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
            <p class="text-lg opacity-90 mb-8">SMK Bina Putra Mandiri menghadirkan pendidikan berkualitas dengan kurikulum berbasis industri, fasilitas praktik modern, dan tenaga pengajar profesional. Siswa dibekali keterampilan, karakter, serta kesiapan kerja agar mampu bersaing dan meraih masa depan yang lebih baik.</p>
            <a href="{{ route('dashboard.siswa') }}" class="inline-block bg-white text-blue-800 font-bold py-4 px-10 rounded-full text-lg shadow-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
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
                    SMK Bina Putra Mandiri berfokus pada pengembangan keterampilan, pengetahuan, dan karakter siswa melalui sistem pembelajaran vokasi yang berkualitas. Dengan dukungan fasilitas modern dan pembelajaran berbasis praktik, siswa dipersiapkan untuk menghadapi dunia kerja dan perkembangan teknologi.
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
                        <img src="https://media.istockphoto.com/id/2201622849/id/video/lokasi-target-animasi-dengan-pin-dan-tanda-gps-cocok-untuk-keuangan-pemasaran-strategi-situs.avif?s=640x640&k=20&c=hc5AZRpGCStu6eoVOA4SQKMp7M4SUMoDFrk1SDzzPGU=" alt="Kurikulum Berbasis Industri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            Lokasi Strategis 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Terletak di lokasi yang mudah dijangkau sehingga memudahkan akses transportasi bagi siswa.
                        </p>
                        <div class="mt-6">
                           
                        </div>
                    </div>
                </div>

                <!-- Card 2: Fasilitas Modern -->
                <div data-aos="fade-up" data-aos-delay="200" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://media.istockphoto.com/id/2200381347/id/video/kemajuan-karir-yang-dianimasikan-dengan-tanda-pekerja-dan-arah-cocok-untuk-keuangan-karyawan.avif?s=640x640&k=20&c=BkiFeozFMqb2nq6g6xL1ZrUdxiJ40naJtLsD59v_RSg=" alt="Fasilitas Praktik Modern" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                           Siap Terjun ke Dunia Usaha 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                           Membekali siswa dengan keterampilan kewirausahaan agar mampu membuka usaha sendiri.
                        </p>
                        <div class="mt-6">
                            
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pengajar Profesional -->
                <div data-aos="fade-up" data-aos-delay="300" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://media.istockphoto.com/id/2155936157/id/video/koin-sekantong-uang.avif?s=640x640&k=20&c=sZmGES2CfP9QGO6RppkGw7fbwxhHLEkL10xrzLb83Mk=" alt="Tenaga Pengajar Profesional" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                         Program Beasiswa Berprestasi 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Tersedia beasiswa bagi siswa berprestasi sebagai bentuk dukungan terhadap pengembangan potensi siswa.
                        </p>
                        <div class="mt-6">
                            
                        </div>
                    </div>
                </div>

                <!-- Card 4: Sertifikasi -->
                <div data-aos="fade-up" data-aos-delay="400" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="data:image/png;base64,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" alt="Sertifikasi Kompetensi" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Bursa Kerja Khusus (BKK) 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                            Membantu menyalurkan lulusan ke dunia kerja melalui kerja sama dengan berbagai perusahaan.
                        </p>
                        <div class="mt-6">
                            
                        </div>
                    </div>
                </div>

                <!-- Card 5: Magang Industri -->
                <div data-aos="fade-up" data-aos-delay="500" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://media.istockphoto.com/id/2241310846/id/video/memberdayakan-pemimpin-masa-depan-dengan-animasi-pendidikan-dan-kecerdasan-buatan-video.avif?s=640x640&k=20&c=t3Nj35rq-pmmm-HO_O9Lb1U1F6CBJeuMP7McbY2pqf0=" alt="Program Magang Industri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Kesempatan Melanjutkan Pendidikan 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                           Lulusan memiliki peluang melanjutkan pendidikan ke perguruan tinggi sesuai bidang keahlian.
                        </p>
                        <div class="mt-6">
                          
                        </div>
                    </div>
                </div>

                <!-- Card 6: Jaringan Alumni -->
                <div data-aos="fade-up" data-aos-delay="600" class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 flex flex-col">
                    <div class="h-1 bg-gradient-to-r from-blue-700 to-blue-900"></div>
                    <div class="h-36 overflow-hidden">
                        <img src="https://media.istockphoto.com/id/2214087909/id/video/ikon-kolaborasi-animasi-sempurna-untuk-karyawan-bisnis-tim-perusahaan-pekerjaan-kerja-tim.avif?s=640x640&k=20&c=y6LdkoIq9Evp2MeAuWFtlldGw7cBFPwmeiTz4UYQAeY=" alt="Jaringan Alumni Kuat" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Kerja Sama Industri 
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed flex-grow">
                           Siswa mendapatkan kesempatan praktik kerja lapangan (PKL) di perusahaan mitra sehingga memperoleh pengalaman kerja nyata sesuai bidang keahlian.
                        </p>
                        <div class="mt-6">
                            
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
                    SMK Bina Putra Mandiri menyediakan berbagai program keahlian yang dirancang sesuai kebutuhan dunia industri dan perkembangan teknologi. Setiap jurusan dibekali pembelajaran teori dan praktik untuk membentuk siswa yang kompeten, profesional, dan siap kerja.
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
            <p class="text-gray-700 dark:text-gray-300 mb-6">SMK Bina Putra Mandiri menyediakan berbagai program keahlian yang dirancang sesuai kebutuhan dunia industri dan perkembangan teknologi. Setiap jurusan dibekali pembelajaran teori dan praktik untuk membentuk siswa yang kompeten, profesional, dan siap kerja.</p>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (!mobileMenuButton || !mobileMenu) return;
    
    // Toggle mobile menu
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        const icon = mobileMenuButton.querySelector('svg');
        if (mobileMenu.classList.contains('hidden')) {
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />`;
        } else {
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />`;
        }
    });
    
    // Close menu when clicking a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            mobileMenuButton.querySelector('svg').innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />`;
        });
    });
    
    // Close menu when clicking outside
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
</body>
</html>