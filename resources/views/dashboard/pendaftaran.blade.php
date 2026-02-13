<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>
<!-- Navbar start -->
<header class="sticky top-0 z-50 border-b border-gray-300 bg-white/90 backdrop-blur-md dark:border-gray-700 dark:bg-gray-900/90 shadow-sm">
    <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" title="" class="flex text-xl">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-blue-800 dark:text-blue-400">BPM</span>
        </a>
 
        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white" href="{{ route('home') }}">
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
                        <a class="border-b-2 border-blue-700 pb-5 text-sm font-medium text-gray-900 dark:border-blue-500 dark:text-white" href="{{ route('dashboard.pendaftaran') }}">
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
<!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
    
    <script>
 // Di bagian tailwind.config
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: {
          dark: '#1e40af',    // Biru gelap
          DEFAULT: '#2563eb',  // Biru terang
        },
        secondary: {
          DEFAULT: '#1e293b',  // Abu-abu gelap
          light: '#334155',    // Abu-abu lebih terang
        }
      },
      // ... konfigurasi lain tetap
  
                  
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-in': 'slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1)',
                        'zoom-in': 'zoomIn 0.4s ease',
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
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
 
    <style>
        .file-upload-container.drag-over {
            @apply border-2 border-primary-dark bg-primary/5;
        }
        .form-control.shake {
            animation: shake 0.5s;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen font-sans">
 
    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-95 z-50 flex items-center justify-center hidden">
        <div class="text-center">
            <div class="w-20 h-20 border-4 border-gray-200 border-t-primary rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-primary-dark font-semibold text-lg">Memproses pendaftaran...</p>
        </div>
    </div>
 
    
 
    <!-- Main Container -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
 
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary-dark to-primary p-8 text-white relative overflow-hidden">
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
 
            <!-- Progress Bar -->
            <div class="bg-white px-8 py-5 border-b">
                <div class="flex justify-between items-center mb-3">
                    <span id="progressText" class="font-semibold text-gray-700">Langkah 1 dari 4</span>
                    <span id="progressPercent" class="font-bold text-primary-dark">25%</span>
                </div>
                <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                    <div id="progressBar" class="h-full bg-gradient-to-r from-primary to-primary-dark transition-all duration-500" style="width: 25%"></div>
                </div>
            </div>
 
            <!-- Info Box -->
            <div class="bg-primary/5 border-l-4 border-primary px-8 py-6 mx-8 my-6 rounded-r-lg">
                <h5 class="font-bold text-primary-dark flex items-center mb-3">
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
 
           <!-- Navigation Tabs dengan sedikit jarak di sisi -->
<div class="px-4 py-0"> <!-- px-4 memberikan jarak 1rem di kiri/kanan -->
    <div class="bg-gradient-to-r from-secondary to-secondary-light rounded-xl p-0 flex flex-wrap justify-center gap-0 w-full">
        <button class="nav-btn active bg-white text-primary-dark px-6 py-3 rounded-l-lg font-semibold shadow-lg flex-1 min-w-[120px] flex items-center justify-center" data-step="1">
            <span class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center text-xs mr-2">1</span>
            <i class="fas fa-user mr-2"></i>Data Diri
        </button>
        <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-none font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center" data-step="2">
            <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">2</span>
            <i class="fas fa-users mr-2"></i>Orang Tua
        </button>
        <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-none font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center" data-step="3">
            <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">3</span>
            <i class="fas fa-file mr-2"></i>Berkas
        </button>
        <button class="nav-btn bg-transparent text-white px-6 py-3 rounded-r-lg font-semibold hover:bg-white/20 flex-1 min-w-[120px] flex items-center justify-center" data-step="4">
            <span class="w-6 h-6 bg-white/30 rounded-full flex items-center justify-center text-xs mr-2">4</span>
            <i class="fas fa-credit-card mr-2"></i>Pembayaran
        </button>
    </div>
</div>
             <!-- Form -->
            <form id="registrationForm" action="/registrasi" method="POST" enctype="multipart/form-data" class="px-8 py-6">
                @csrf
 
                <!-- Section 1: Data Diri Siswa -->
                <div class="form-section active block" id="section-1">
                    <h3 class="text-2xl font-bold text-primary-dark mb-6 flex items-center">
    <div class="bg-blue-50 dark:bg-blue-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
        <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
    </div>
    Data Diri Siswa
</h3>
                    <p class="text-gray-600 mb-8">Lengkapi data pribadi Anda dengan benar</p>
 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Nama Lengkap Siswa <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_siswa" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Masukkan nama lengkap sesuai ijazah" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama lengkap wajib diisi</div>
                        </div>
 
                        <!-- NISN -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                NISN (Nomor Induk Siswa Nasional) <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Induk Siswa Nasional"></i>
                            </label>
                            <input type="text" name="nisn" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 1234567890" maxlength="10" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NISN wajib diisi dan harus 10 digit angka</div>
                        </div>
                         <!-- NIK -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                NIK (Nomor Identitas Penduduk) <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Induk Siswa Nasional"></i>
                            </label>
                            <input type="text" name="nik" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 1234567890" maxlength="16" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                        </div>
                        
                       <!-- No. KK -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                No. KK (Nomor Kartu Keluarga) <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Kartu Keluarga"></i>
                            </label>
                            <input type="text" name="nik" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 1234567890" maxlength="16" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                        </div>
 
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Tanggal Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_lahir" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Tanggal lahir wajib diisi</div>
                        </div>
 
                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_kelamin" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Jenis kelamin wajib dipilih</div>
                        </div>
 
                        <!-- Agama -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Agama <span class="text-red-500">*</span>
                            </label>
                            <select name="agama" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Agama wajib dipilih</div>
                        </div>
 
                        <!-- No HP Siswa -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                No. HP Siswa <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor HP aktif untuk menerima informasi pendaftaran"></i>
                            </label>
                            <input type="tel" name="no_hp_siswa" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 081234567890" maxlength="13" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP wajib diisi</div>
                        </div>
 
                        <!-- Email Siswa -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Email Siswa <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email_siswa" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="contoh@email.com" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Email wajib diisi dan harus valid</div>
                        </div>
 
                        <!-- Alamat Lengkap -->
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat_siswa" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                      rows="3" placeholder="Alamat lengkap sesuai KTP/KK" required></textarea>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat lengkap wajib diisi</div>
                        </div>
 
                        <!-- Program Keahlian -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Program Keahlian Pilihan <span class="text-red-500">*</span>
                            </label>
                            <select name="program_keahlian" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
                                <option value="">-- Pilih Program Keahlian --</option>
                                <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                                <option value="TKJ">Teknik Komputer dan Jaringan (TKJ)</option>
                                <option value="DKV">Desain Komunikasi Visual (DKV)</option>
                                <option value="BD">Bisnis Digital (BD)</option>
                                <option value="AK">Akuntansi (AK)</option>
                            </select>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Program keahlian wajib dipilih</div>
                        </div>
 
                        <!-- Asal Sekolah -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Asal Sekolah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="asal_sekolah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Nama SMP/MTs/Sederajat" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Asal sekolah wajib diisi</div>
                        </div>
 
                        <!-- Alamat Sekolah -->
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Alamat Sekolah <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat_sekolah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                      rows="2" placeholder="Alamat lengkap sekolah" required></textarea>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat sekolah wajib diisi</div>
                        </div>
                    </div>
 
                    <div class="flex justify-end mt-8">
                        <button type="button" class="btn-next bg-gradient-to-r from-primary to-primary-dark text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-dark hover:to-primary-dark transition-all flex items-center shadow-lg hover:shadow-xl">
                            Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
 
                <!-- Section 2: Data Orang Tua/Wali -->
                <div class="form-section hidden" id="section-2">
                    <h3 class="text-2xl font-bold text-primary-dark mb-6 flex items-center">
                <div class="bg-blue-50 dark:bg-blue-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-user-friends text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                Data Orang Tua/Wali
            </h3>
                    <p class="text-gray-600 mb-8">Informasi orang tua atau wali siswa</p>
 
                    <!-- Warning Box -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-lg">
                        <h5 class="font-bold text-yellow-800 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>Catatan
                        </h5>
                        <p class="text-yellow-700 mt-2">Data orang tua/wali digunakan untuk keperluan administrasi dan komunikasi selama proses pendaftaran.</p>
                    </div>
 
                    <!-- Data Ayah -->
                    <h5 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <i class="fas fa-male mr-2"></i>Data Ayah Kandung
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Nama Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Nama lengkap ayah" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama ayah wajib diisi</div>
                        </div>
                         <!-- NIK -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                NIK (Nomor Identitas Penduduk) <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Induk Siswa Nasional"></i>
                            </label>
                            <input type="text" name="nik" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 1234567890" maxlength="16" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Pekerjaan Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="pekerjaan_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: Pegawai Swasta" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pekerjaan ayah wajib diisi</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Pendidikan Terakhir <span class="text-red-500">*</span>
                            </label>
                            <select name="pendidikan_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
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
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pendidikan ayah wajib dipilih</div>
                            
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                No. HP Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="no_hp_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 081234567890" maxlength="13" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP ayah wajib diisi</div>
                        </div>
                        <!-- Alamat Ayah -->
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Alamat Ayah <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat_ayah" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                      rows="2" placeholder="Alamat lengkap ayah" required></textarea>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat ayah wajib diisi</div>
                        </div>
                    </div>
 
                    <hr class="my-8 border-gray-200">
 
                    <!-- Data Ibu -->
                    <h5 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <i class="fas fa-female mr-2"></i>Data Ibu Kandung
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Nama Ibu <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Nama lengkap ibu" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Nama ibu wajib diisi</div>
                        </div>
                         <!-- NIK -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                NIK (Nomor Identitas Penduduk) <span class="text-red-500">*</span>
                                <i class="fas fa-info-circle text-gray-400 ml-1 cursor-help text-sm" title="Nomor Induk Siswa Nasional"></i>
                            </label>
                            <input type="text" name="nik" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 1234567890" maxlength="16" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">NIK wajib diisi dan harus 16 digit angka</div>
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Pekerjaan Ibu <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="pekerjaan_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: Ibu Rumah Tangga" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pekerjaan ibu wajib diisi</div>
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Pendidikan Terakhir <span class="text-red-500">*</span>
                            </label>
                            <select name="pendidikan_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
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
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Pendidikan ibu wajib dipilih</div>
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                No. HP Ibu <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="no_hp_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 081234567890" maxlength="13" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">No. HP ibu wajib diisi</div>
                        </div>
                        <!-- Alamat Ibu -->
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Alamat Ibu <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat_ibu" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                      rows="2" placeholder="Alamat lengkap ibu" required></textarea>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Alamat ibu wajib diisi</div>
                        </div>
                    </div>
 
                    <hr class="my-8 border-gray-200">
 
                    <!-- Data Wali -->
                    <h5 class="text-xl font-bold text-primary mb-4 flex items-center">
                        <i class="fas fa-user-shield mr-2"></i>Data Wali (Opsional)
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2">
                                Nama Wali
                            </label>
                            <input type="text" name="nama_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Kosongkan jika tidak ada">
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2">
                                Pekerjaan Wali
                            </label>
                            <input type="text" name="pekerjaan_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Pekerjaan wali">
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2">
                                No. HP Wali
                            </label>
                            <input type="tel" name="no_hp_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                   placeholder="Contoh: 081234567890" maxlength="13">
                        </div>
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2">
                                Hubungan dengan Siswa
                            </label>
                            <select name="hubungan_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white">
                                <option value="">-- Pilih Hubungan --</option>
                                <option value="Kakek">Kakek</option>
                                <option value="Nenek">Nenek</option>
                                <option value="Paman">Paman</option>
                                <option value="Bibi">Bibi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2">
                                Alamat Wali
                            </label>
                            <textarea name="alamat_wali" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" 
                                      rows="2" placeholder="Alamat lengkap wali"></textarea>
                        </div>
                    </div>
 
                    <div class="flex justify-between mt-8">
                        <button type="button" class="btn-prev bg-gradient-to-r from-secondary to-secondary-light text-primary-dark px-8 py-3 rounded-lg font-semibold hover:from-secondary-light hover:to-secondary transition-all flex items-center shadow-md hover:shadow-lg">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </button>
                        <button type="button" class="btn-next bg-gradient-to-r from-primary to-primary-dark text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-dark hover:to-primary-dark transition-all flex items-center shadow-lg hover:shadow-xl">
                            Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
 
                <!-- Section 3: Berkas-Berkas -->
<div class="form-section hidden" id="section-3">
    <h3 class="text-2xl font-bold text-primary-dark mb-6 flex items-center">
        <div class="bg-blue-50 dark:bg-blue-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
            <i class="fas fa-folder-open text-blue-600 dark:text-blue-400 text-xl"></i>
        </div>
        Berkas Persyaratan
    </h3>
    <p class="text-gray-600 mb-8">Unggah dokumen yang diperlukan untuk pendaftaran</p>

    <!-- Info Box Berkas -->
    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8 rounded-r-lg">
        <h5 class="font-bold text-blue-800 flex items-center mb-3">
            <i class="fas fa-file-alt mr-2"></i>Persyaratan Berkas
        </h5>
        <ul class="text-blue-700 space-y-2 text-sm">
            <li><i class="fas fa-check text-green-500 mr-2"></i>Pas Foto berwarna ukuran 3x4 dengan background merah</li>
            <li><i class="fas fa-check text-green-500 mr-2"></i>Ijazah SMP/MTs/Sederajat yang sudah dilegalisir</li>
            <li><i class="fas fa-check text-green-500 mr-2"></i>SKHUN SMP/MTs/Sederajat yang sudah dilegalisir</li>
            <li><i class="fas fa-check text-green-500 mr-2"></i>Akta Kelahiran</li>
            <li><i class="fas fa-check text-green-500 mr-2"></i>Kartu Keluarga (KK)</li>
            <li><i class="fas fa-check text-green-500 mr-2"></i>KTP Orang Tua (Ayah & Ibu)</li>
        </ul>
        <p class="mt-3 mb-0 text-xs font-semibold">
            <span class="block"><i class="fas fa-info-circle mr-1"></i>Format file: JPG, PNG, atau PDF | Ukuran maksimal: 2MB per file</span>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Pas Foto -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2 required">
                Pas Foto (3x4) <span class="text-red-500">*</span>
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'pas_foto')"
                 onclick="triggerFileInput('pas_foto')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-image"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">Pas foto terbaru dengan background merah</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG | Max: 2MB</small>
                <input type="file" id="pas_foto" name="pas_foto" class="file-upload-input hidden" 
                       accept="image/jpeg,image/png" required onchange="handleFileSelect(this, 'pas_foto')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-image"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="pas_foto_name">-</h6>
                            <p class="text-xs text-gray-600" id="pas_foto_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('pas_foto')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <img src="" alt="Preview Pas Foto" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md">
            </div>
        </div>

        <!-- Ijazah -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2 required">
                Scan Ijazah SMP/MTs <span class="text-red-500">*</span>
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'ijazah')"
                 onclick="triggerFileInput('ijazah')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-file-certificate"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">Ijazah yang sudah dilegalisir</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 2MB</small>
                <input type="file" id="ijazah" name="ijazah" class="file-upload-input hidden" 
                       accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'ijazah')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="ijazah_name">-</h6>
                            <p class="text-xs text-gray-600" id="ijazah_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('ijazah')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" frameborder="0"></iframe>
            </div>
        </div>

        <!-- SKHUN -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2 required">
                Scan SKHUN SMP/MTs <span class="text-red-500">*</span>
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'skhun')"
                 onclick="triggerFileInput('skhun')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">Surat Keterangan Hasil Ujian Nasional</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 2MB</small>
                <input type="file" id="skhun" name="skhun" class="file-upload-input hidden" 
                       accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'skhun')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="skhun_name">-</h6>
                            <p class="text-xs text-gray-600" id="skhun_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('skhun')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" frameborder="0"></iframe>
            </div>
        </div>

        <!-- Akta Kelahiran -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2 required">
                Scan Akta Kelahiran <span class="text-red-500">*</span>
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'akta')"
                 onclick="triggerFileInput('akta')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-file-signature"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">Akta kelahiran siswa</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 2MB</small>
                <input type="file" id="akta" name="akta_kelahiran" class="file-upload-input hidden" 
                       accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'akta')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="akta_name">-</h6>
                            <p class="text-xs text-gray-600" id="akta_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('akta')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" frameborder="0"></iframe>
            </div>
        </div>

        <!-- Kartu Keluarga -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2 required">
                Scan Kartu Keluarga (KK) <span class="text-red-500">*</span>
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'kk')"
                 onclick="triggerFileInput('kk')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">Kartu Keluarga</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 2MB</small>
                <input type="file" id="kk" name="kartu_keluarga" class="file-upload-input hidden" 
                       accept=".pdf,.jpg,.jpeg,.png" required onchange="handleFileSelect(this, 'kk')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="kk_name">-</h6>
                            <p class="text-xs text-gray-600" id="kk_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('kk')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" frameborder="0"></iframe>
            </div>
        </div>

        <!-- KTP Orang Tua -->
        <div class="form-group">
            <label class="block font-semibold text-gray-800 mb-2">
                Scan KTP Orang Tua (Optional)
            </label>
            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                 ondragover="handleDragOver(event)" 
                 ondragleave="handleDragLeave(event)" 
                 ondrop="handleDrop(event, 'ktp')"
                 onclick="triggerFileInput('ktp')">
                <div class="text-5xl text-primary mb-3">
                    <i class="fas fa-id-card"></i>
                </div>
                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                <p class="text-gray-600 text-sm mb-2">KTP Ayah dan Ibu (bisa digabung)</p>
                <small class="text-gray-500 text-xs italic">Format: JPG/PNG/PDF | Max: 2MB</small>
                <input type="file" id="ktp" name="ktp_orang_tua" class="file-upload-input hidden" 
                       accept=".pdf,.jpg,.jpeg,.png" onchange="handleFileSelect(this, 'ktp')">
            </div>
            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h6 class="font-semibold text-gray-800 text-sm" id="ktp_name">-</h6>
                            <p class="text-xs text-gray-600" id="ktp_size">-</p>
                        </div>
                    </div>
                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('ktp')">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
                <iframe src="" class="pdf-preview hidden mt-3 w-full h-48 border rounded-lg" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <div class="flex justify-between mt-8">
        <button type="button" class="btn-prev bg-gradient-to-r from-secondary to-secondary-light text-primary-dark px-8 py-3 rounded-lg font-semibold hover:from-secondary-light hover:to-secondary transition-all flex items-center shadow-md hover:shadow-lg">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </button>
        <button type="button" class="btn-next bg-gradient-to-r from-primary to-primary-dark text-white px-8 py-3 rounded-lg font-semibold hover:from-primary-dark hover:to-primary-dark transition-all flex items-center shadow-lg hover:shadow-xl">
            Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
        </button>
    </div>

                <!-- Section 4: Bukti Pembayaran -->
                <div class="form-section hidden" id="section-4">
                   <h3 class="text-2xl font-bold text-primary-dark mb-6 flex items-center">
                        <div class="bg-blue-50 dark:bg-blue-900/30 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-receipt text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                        Bukti Pembayaran
                    </h3>
                    <p class="text-gray-600 mb-8">Upload bukti pembayaran pendaftaran</p>
 
                    <!-- Payment Info Card -->
                    <div class="bg-gradient-to-br from-white to-secondary-light border-2 border-primary rounded-xl p-6 mb-8 shadow-lg">
                        <h5 class="text-xl font-bold text-primary-dark mb-4 flex items-center">
                            <i class="fas fa-money-bill-wave mr-2"></i>Informasi Pembayaran
                        </h5>
                        <div class="text-4xl font-bold text-primary text-center my-4">Rp 100.000,-</div>
                        <p class="text-gray-700 mb-4 text-center">Transfer biaya pendaftaran ke salah satu rekening berikut:</p>
 
 
 
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 mt-4 rounded-r-lg">
                            <p class="text-yellow-800 mb-0 flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <strong>Penting:</strong> Simpan bukti transfer Anda. Upload bukti transfer setelah melakukan pembayaran.
                            </p>
                        </div>
                    </div>
 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bank Transfer -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Bank Tujuan Transfer <span class="text-red-500">*</span>
                            </label>
                            <select name="bank_transfer" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all bg-white" required>
                                <option value="">-- Pilih Bank --</option>
                                <option value="BRI">BRI</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Bank tujuan wajib dipilih</div>
                        </div>
 
                        <!-- Tanggal Transfer -->
                        <div class="form-group">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Tanggal Transfer <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_transfer" class="form-control w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" required>
                            <div class="invalid-feedback text-red-500 text-sm mt-1 hidden">Tanggal transfer wajib diisi</div>
                        </div>
 
                        <!-- Bukti Transfer -->
                        <div class="form-group col-span-full">
                            <label class="block font-semibold text-gray-800 mb-2 required">
                                Upload Bukti Transfer <span class="text-red-500">*</span>
                            </label>
                            <div class="file-upload-container border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 cursor-pointer hover:border-primary hover:bg-primary/5 transition-all" 
                                 ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event, 'bukti_transfer')">
                                <div class="text-5xl text-primary mb-3">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <h5 class="font-semibold text-gray-800 mb-2">Drag & Drop atau Klik untuk Upload</h5>
                                <p class="text-gray-600 text-sm mb-2">Foto struk transfer atau screenshot bukti transfer</p>
                                <small class="text-gray-500 text-xs italic">Format: JPG/PNG | Max: 2MB</small>
                                <input type="file" id="bukti_transfer" name="bukti_transfer" class="file-upload-input hidden" 
                                       accept="image/*" required onchange="handleFileSelect(this, 'bukti_transfer')">
                            </div>
                            <div class="file-preview-container hidden mt-4 p-3 bg-white border-2 border-gray-200 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center flex-1">
                                        <div class="w-10 h-10 bg-secondary-light rounded-lg flex items-center justify-center mr-3 text-primary">
                                            <i class="fas fa-file-image"></i>
                                        </div>
                                        <div>
                                            <h6 class="font-semibold text-gray-800 text-sm" id="bukti_transfer_name">-</h6>
                                            <p class="text-xs text-gray-600" id="bukti_transfer_size">-</p>
                                        </div>
                                    </div>
                                    <button type="button" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors" onclick="removeFile('bukti_transfer')">
                                        <i class="fas fa-times text-sm"></i>
                                    </button>
                                </div>
                                <img src="" alt="Preview" class="image-preview hidden mt-3 max-w-full h-auto rounded-lg shadow-md">
                            </div>
                        </div>
                    </div>
 
                    <!-- Summary Section -->
                    <div class="bg-white border-2 border-gray-200 rounded-xl p-6 mt-8">
                        <h5 class="text-xl font-bold text-primary-dark mb-4 flex items-center">
                            <i class="fas fa-list-check mr-2"></i>Ringkasan Pendaftaran
                        </h5>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-700 font-medium">Nama Siswa</span>
                                <span class="text-primary-dark font-semibold" id="summary_nama">-</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-700 font-medium">NISN</span>
                                <span class="text-primary-dark font-semibold" id="summary_nisn">-</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-700 font-medium">Program Keahlian</span>
                                <span class="text-primary-dark font-semibold" id="summary_jurusan">-</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-700 font-medium">Biaya Pendaftaran</span>
                                <span class="text-primary-dark font-bold text-lg">Rp 100.000,-</span>
                            </div>
                        </div>
                    </div>
 
                    <!-- Warning Box -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-6 rounded-r-lg">
                        <h5 class="font-bold text-yellow-800 flex items-center mb-2">
                            <i class="fas fa-exclamation-triangle mr-2"></i>Konfirmasi Sebelum Submit
                        </h5>
                        <p class="text-yellow-700 mb-0">Pastikan semua data sudah benar. Setelah submit, data tidak dapat diubah. Simpan nomor pendaftaran yang akan diberikan setelah berhasil mendaftar.</p>
                    </div>
 
                    <button type="submit" class="btn-submit bg-gradient-to-r from-green-500 to-green-600 text-white w-full px-8 py-4 rounded-lg font-bold text-lg mt-6 hover:from-green-600 hover:to-green-700 transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
 
    <script>
        // Global variables
        let currentSection = 1;
        const totalSections = 4;
        const form = document.getElementById('registrationForm');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const progressPercent = document.getElementById('progressPercent');
 
        // Navigation buttons
        document.querySelectorAll('.btn-next').forEach(btn => {
            btn.addEventListener('click', nextSection);
        });
 
        document.querySelectorAll('.btn-prev').forEach(btn => {
            btn.addEventListener('click', prevSection);
        });
 
        // Navigation tabs
        document.querySelectorAll('.nav-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetStep = parseInt(this.getAttribute('data-step'));
                goToSection(targetStep);
            });
        });
 
        // Navigation functions
        function nextSection() {
            if (validateSection(currentSection)) {
                document.getElementById(`section-${currentSection}`).classList.remove('active', 'block');
                document.getElementById(`section-${currentSection}`).classList.add('hidden');
                currentSection++;
                document.getElementById(`section-${currentSection}`).classList.remove('hidden');
                document.getElementById(`section-${currentSection}`).classList.add('active', 'block');
                updateProgress();
                updateNavTabs();
                scrollToTop();
            }
        }
 
        function prevSection() {
            document.getElementById(`section-${currentSection}`).classList.remove('active', 'block');
            document.getElementById(`section-${currentSection}`).classList.add('hidden');
            currentSection--;
            document.getElementById(`section-${currentSection}`).classList.remove('hidden');
            document.getElementById(`section-${currentSection}`).classList.add('active', 'block');
            updateProgress();
            updateNavTabs();
            scrollToTop();
        }
 
        function goToSection(step) {
            if (step === currentSection) return;
 
            document.getElementById(`section-${currentSection}`).classList.remove('active', 'block');
            document.getElementById(`section-${currentSection}`).classList.add('hidden');
            document.getElementById(`section-${step}`).classList.remove('hidden');
            document.getElementById(`section-${step}`).classList.add('active', 'block');
 
            currentSection = step;
            updateProgress();
            updateNavTabs();
            scrollToTop();
        }
 
        function updateProgress() {
            const progress = (currentSection / totalSections) * 100;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `Langkah ${currentSection} dari ${totalSections}`;
            progressPercent.textContent = `${Math.round(progress)}%`;
        }
 
        function updateNavTabs() {
            document.querySelectorAll('.nav-btn').forEach((btn, index) => {
                const step = index + 1;
                if (step === currentSection) {
                    btn.classList.add('bg-white', 'text-primary-dark', 'shadow-lg');
                    btn.classList.remove('bg-transparent', 'text-white', 'hover:bg-white/20');
                } else {
                    btn.classList.remove('bg-white', 'text-primary-dark', 'shadow-lg');
                    btn.classList.add('bg-transparent', 'text-white', 'hover:bg-white/20');
                }
            });
        }
 
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
 
        // Validation
        function validateSection(section) {
            let isValid = true;
            const sectionElement = document.getElementById(`section-${section}`);
            const inputs = sectionElement.querySelectorAll('[required]');
 
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500', 'shake');
                    const feedback = input.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.classList.remove('hidden');
                    }
                    setTimeout(() => {
                        input.classList.remove('shake');
                    }, 500);
                } else {
                    input.classList.remove('border-red-500');
                    const feedback = input.nextElementSibling;
                    if (feedback && feedback.classList.contains('invalid-feedback')) {
                        feedback.classList.add('hidden');
                    }
                }
            });
 
            // Additional validation for NISN (must be 10 digits)
            if (section === 1) {
                const nisnInput = document.querySelector('input[name="nisn"]');
                if (nisnInput.value && !/^\d{10}$/.test(nisnInput.value)) {
                    isValid = false;
                    showToast('NISN harus 10 digit angka', 'error');
                    nisnInput.classList.add('border-red-500', 'shake');
                    setTimeout(() => nisnInput.classList.remove('shake'), 500);
                }
            }
 
            // Validate file uploads in section 3
            if (section === 3) {
                const requiredFiles = ['pas_foto', 'ijazah', 'skhun', 'akta', 'kk'];
                requiredFiles.forEach(fileId => {
                    const fileInput = document.getElementById(fileId);
                    const previewContainer = document.querySelector(`#${fileId}_preview_container`);
 
                    if (!fileInput.files || fileInput.files.length === 0) {
                        isValid = false;
                        fileInput.closest('.file-upload-container').classList.add('border-red-500');
                        showToast(`File ${fileId.replace('_', ' ')} wajib diupload`, 'error');
                    } else {
                        fileInput.closest('.file-upload-container').classList.remove('border-red-500');
                    }
                });
            }
 
            if (!isValid) {
                showToast('Silakan lengkapi semua field yang wajib diisi', 'error');
            }
 
            return isValid;
        }
 
        // File upload handlers
        function handleDragOver(e) {
            e.preventDefault();
            e.stopPropagation();
            const container = e.target.closest('.file-upload-container');
            if (container) {
                container.classList.add('drag-over');
            }
        }
 
        function handleDragLeave(e) {
            e.preventDefault();
            e.stopPropagation();
            const container = e.target.closest('.file-upload-container');
            if (container) {
                container.classList.remove('drag-over');
            }
        }
 
        function handleDrop(e, fileId) {
            e.preventDefault();
            e.stopPropagation();
 
            const container = e.target.closest('.file-upload-container');
            if (container) {
                container.classList.remove('drag-over');
            }
 
            if (e.dataTransfer.files.length) {
                document.getElementById(fileId).files = e.dataTransfer.files;
                handleFileSelect(document.getElementById(fileId), fileId);
            }
        }
 
        function handleFileSelect(input, fileId) {
            const file = input.files[0];
            if (!file) return;
 
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                showToast(`File ${file.name} terlalu besar! Maksimal 2MB`, 'error');
                input.value = '';
                return;
            }
 
            // Validate file type based on field
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
                showToast(`Format file ${file.name} tidak valid! Gunakan format yang sesuai.`, 'error');
                input.value = '';
                return;
            }
 
            // Show preview
            const previewContainer = document.querySelector(`#${fileId}_preview_container`);
            const fileNameElement = document.querySelector(`#${fileId}_name`);
            const fileSizeElement = document.querySelector(`#${fileId}_size`);
 
            fileNameElement.textContent = file.name;
            fileSizeElement.textContent = formatFileSize(file.size);
            previewContainer.classList.remove('hidden');
 
            // Image preview for images
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.querySelector(`#${fileId}_image`);
                    if (imagePreview) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }
                };
                reader.readAsDataURL(file);
            }
 
            showToast(`File ${file.name} berhasil diupload`, 'success');
 
            // Remove error border if any
            if (input.closest('.file-upload-container')) {
                input.closest('.file-upload-container').classList.remove('border-red-500');
            }
        }
        removeFile():
        // Trigger file input saat container diklik
        function triggerFileInput(fileId) {
            const input = document.getElementById(fileId);
            if (input) {
                input.click();
            }
        }
        function removeFile(fileId) {
            const input = document.getElementById(fileId);
            const previewContainer = document.querySelector(`#${fileId}_preview_container`);
            const imagePreview = document.querySelector(`#${fileId}_image`);
 
            input.value = '';
            previewContainer.classList.add('hidden');
            if (imagePreview) imagePreview.classList.add('hidden');
 
            showToast('File berhasil dihapus', 'success');
        }
 
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }
 
        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
 
            if (!validateForm()) {
                return;
            }
 
            if (!confirm('Apakah Anda yakin data sudah benar? Setelah submit, data tidak dapat diubah.')) {
                return;
            }
 
            // Show loading
            document.getElementById('loadingOverlay').classList.remove('hidden');
            document.querySelector('.btn-submit').disabled = true;
 
            // Update summary before submit
            updateSummary();
 
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                // For demo purposes - in real app, this would submit the form
                alert('Pendaftaran berhasil! Nomor pendaftaran Anda: BPM-2026-001234');
                document.getElementById('loadingOverlay').classList.add('hidden');
                form.reset();
 
                // Reset file previews
                document.querySelectorAll('.file-preview-container').forEach(container => {
                    container.classList.add('hidden');
                });
                document.querySelectorAll('.image-preview').forEach(img => {
                    img.classList.add('hidden');
                });
 
                // Reset summary
                document.getElementById('summary_nama').textContent = '-';
                document.getElementById('summary_nisn').textContent = '-';
                document.getElementById('summary_jurusan').textContent = '-';
 
                // Go back to first section
                goToSection(1);
 
            }, 1500);
        });
 
        function validateForm() {
            // Validate all sections
            for (let i = 1; i <= totalSections; i++) {
                if (!validateSection(i)) {
                    goToSection(i);
                    return false;
                }
            }
            return true;
        }
 
        function updateSummary() {
            document.getElementById('summary_nama').textContent = document.querySelector('input[name="nama_siswa"]').value || '-';
            document.getElementById('summary_nisn').textContent = document.querySelector('input[name="nisn"]').value || '-';
 
            const jurusan = document.querySelector('select[name="program_keahlian"]').value;
            const jurusanText = {
                'RPL': 'Rekayasa Perangkat Lunak',
                'TKJ': 'Teknik Komputer dan Jaringan',
                'DKV': 'Desain Komunikasi Visual',
                'BD': 'Bisnis Digital',
                'AK': 'Akuntansi'
            };
            document.getElementById('summary_jurusan').textContent = jurusanText[jurusan] || '-';
        }
 
        // Toast notifications
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toastNotification');
            const icon = toast.querySelector('i');
            const title = document.getElementById('toastTitle');
            const msg = document.getElementById('toastMessage');
 
            if (type === 'error') {
                toast.classList.remove('border-green-500');
                toast.classList.add('border-red-500');
                icon.className = 'fas fa-exclamation-circle text-red-500 text-2xl mr-3';
                title.textContent = 'Error!';
                title.classList.add('text-red-800');
                msg.classList.add('text-red-700');
            } else {
                toast.classList.remove('border-red-500');
                toast.classList.add('border-green-500');
                icon.className = 'fas fa-check-circle text-green-500 text-2xl mr-3';
                title.textContent = 'Sukses!';
                title.classList.remove('text-red-800');
                msg.classList.remove('text-red-700');
            }
 
            msg.textContent = message;
            toast.classList.remove('translate-x-full');
 
            setTimeout(() => {
                toast.classList.add('translate-x-full');
            }, 3000);
        }
 
        function closeToast() {
            document.getElementById('toastNotification').classList.add('translate-x-full');
        }
 
        // Auto-update summary on input change
        document.addEventListener('DOMContentLoaded', function() {
            const namaInput = document.querySelector('input[name="nama_siswa"]');
            const nisnInput = document.querySelector('input[name="nisn"]');
            const jurusanSelect = document.querySelector('select[name="program_keahlian"]');
 
            if (namaInput) {
                namaInput.addEventListener('input', function() {
                    document.getElementById('summary_nama').textContent = this.value || '-';
                });
            }
 
            if (nisnInput) {
                nisnInput.addEventListener('input', function() {
                    document.getElementById('summary_nisn').textContent = this.value || '-';
                });
            }
 
            if (jurusanSelect) {
                jurusanSelect.addEventListener('change', function() {
                    updateSummary();
                });
            }
        });
    </script>
</body>
</html>