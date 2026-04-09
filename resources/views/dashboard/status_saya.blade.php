<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pendaftaran - SMK BPM</title>
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
                        50: '#eff6ff',
                        100: '#dbeafe',
                        200: '#bfdbfe',
                        300: '#93c5fd',
                        400: '#60a5fa',
                        500: '#3b82f6',
                        600: '#2563eb',
                        700: '#1d4ed8',
                        800: '#1e40af',
                        900: '#1e3a8a',
                        dark: '#0b1120'
                    },
                    secondary: {
                        50: '#f8fafc',
                        100: '#f1f5f9',
                        200: '#e2e8f0',
                        300: '#cbd5e1',
                        400: '#94a3b8',
                        500: '#64748b',
                        600: '#475569',
                        700: '#334155',
                        800: '#1e293b',
                        900: '#0f172a'
                    }
                },
                animation: {
                    'fade-in': 'fadeIn 0.5s ease-in-out',
                    'slide-in': 'slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1)',
                    'shake': 'shake 0.5s'
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0', transform: 'translateY(-10px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' }
                    },
                    slideIn: {
                        '0%': { opacity: '0', transform: 'translateX(-20px)' },
                        '100%': { opacity: '1', transform: 'translateX(0)' }
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
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
            <button id="dark-mode-toggle" class="p-2 rounded-lg text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition" aria-label="Toggle dark mode">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline"></i>
            </button>

            <!-- Profile Dropdown Container -->
            <div class="relative" id="profileDropdown">
                <!-- Profile Button (Trigger) -->
                <button onclick="toggleProfileDropdown()" class="flex items-center gap-2 focus:outline-none">
                    <i class="fas fa-user-circle text-2xl text-gray-600 dark:text-gray-300"></i>
                    <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down text-xs text-gray-500 dark:text-gray-400"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 z-50">
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-primary-600 dark:text-primary-400"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <a href="{{ route('dashboard.siswa') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                        <a href="{{ route('pendaftaran.status') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-file-alt mr-2"></i>Status Pendaftaran
                        </a>
                        <hr class="my-2 border-gray-200 dark:border-gray-700">
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            <span class="sr-only">Toggle menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="current-color" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Home</a>
            <a href="{{ route('tentang_sekolah') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">Informasi</a>
            <a href="{{ route('dashboard.siswa') }}" class="block py-3 px-4 text-base font-medium text-gray-900 dark:text-white border-l-4 border-primary-700 dark:border-primary-500 bg-primary-50 dark:bg-primary-900/20 rounded-r-lg">Pendaftaran</a>
        </div>
    </div>
</header>

<!-- Main Container -->
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary-800 via-primary-600 to-primary-500 p-8 text-white">
            <div class="text-center">
                <h1 class="text-3xl font-bold mb-2">
                    <i class="fas fa-check-circle mr-3"></i>
                    Status Pendaftaran
                </h1>
                <p class="text-lg opacity-95">Tahun Ajaran 2026/2027</p>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-6 mx-8 my-6 rounded-r-lg animate-fade-in">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
                <div class="flex-1">
                    <h4 class="font-bold text-green-800">Pendaftaran Berhasil!</h4>
                    <p class="text-green-700 mt-1" id="successMessage">{!! session('success') !!}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Info Message -->
        @if(session('info'))
        <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mx-8 my-6 rounded-r-lg animate-fade-in">
            <div class="flex items-center">
                <i class="fas fa-info-circle text-blue-500 text-2xl mr-3"></i>
                <div class="flex-1">
                    <h4 class="font-bold text-blue-800">Informasi</h4>
                    <p class="text-blue-700 mt-1">{!! session('info') !!}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Pendaftaran Details -->
        @if($pendaftaran)
        <div class="px-8 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Pendaftaran -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-id-card text-blue-600 text-xl mr-3"></i>
                        <h3 class="font-bold text-blue-800">Nomor Pendaftaran</h3>
                    </div>
                    <p class="text-2xl font-bold text-blue-900">{{ $pendaftaran->nomor_pendaftaran }}</p>
                    <p class="text-sm text-blue-600 mt-1">Gunakan nomor ini untuk cek status kelulusan</p>
                </div>

                <!-- Status Pendaftaran -->
                <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-clock text-green-600 text-xl mr-3"></i>
                        <h3 class="font-bold text-green-800">Status Pendaftaran</h3>
                    </div>
                    <p class="text-lg font-semibold text-green-900">{{ ucfirst($pendaftaran->status_pendaftaran) }}</p>
                    <p class="text-sm text-green-600 mt-1">
                        Didaftar pada: 
                        {{ optional($pendaftaran->submitted_at ?? $pendaftaran->created_at)->format('d M Y, H:i') ?? '-' }}
                    </p>
                </div>
            </div>

            <!-- Data Diri -->
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user mr-2 text-primary-600"></i>
                    Data Diri Siswa
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><strong>Nama Lengkap:</strong> {{ $pendaftaran->nama_lengkap }}</div>
                        <div><strong>NISN:</strong> {{ $pendaftaran->nisn }}</div>
                        <div><strong>NIK:</strong> {{ $pendaftaran->nik }}</div>
                        <div><strong>No. KK:</strong> {{ $pendaftaran->no_kk }}</div>
                        <div><strong>Tempat Lahir:</strong> {{ $pendaftaran->tempat_lahir }}</div>
                        <div><strong>Tanggal Lahir:</strong> {{ $pendaftaran->tanggal_lahir->format('d M Y') }}</div>
                        <div><strong>Jenis Kelamin:</strong> {{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                        <div><strong>Agama:</strong> {{ $pendaftaran->agama }}</div>
                        <div><strong>No. HP:</strong> {{ $pendaftaran->no_hp }}</div>
                        <div><strong>Alamat:</strong> {{ $pendaftaran->alamat_lengkap }}</div>
                        <div><strong>Jurusan:</strong> {{ $pendaftaran->jurusan }}</div>
                        <div><strong>Asal Sekolah:</strong> {{ $pendaftaran->asal_sekolah }}</div>
                    </div>
                </div>
            </div>

            <!-- Data Orang Tua -->
            @if($pendaftaran->orangTua)
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-users mr-2 text-primary-600"></i>
                    Data Orang Tua
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Ayah -->
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-2">Data Ayah</h4>
                            <div class="space-y-1 text-sm">
                                <div><strong>Nama:</strong> {{ $pendaftaran->orangTua->nama_ayah }}</div>
                                <div><strong>NIK:</strong> {{ $pendaftaran->orangTua->nik_ayah }}</div>
                                <div><strong>Pekerjaan:</strong> {{ $pendaftaran->orangTua->pekerjaan_ayah }}</div>
                                <div><strong>Pendidikan:</strong> {{ $pendaftaran->orangTua->pendidikan_ayah }}</div>
                                <div><strong>No. HP:</strong> {{ $pendaftaran->orangTua->no_hp_ayah }}</div>
                            </div>
                        </div>
                        <!-- Ibu -->
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-2">Data Ibu</h4>
                            <div class="space-y-1 text-sm">
                                <div><strong>Nama:</strong> {{ $pendaftaran->orangTua->nama_ibu }}</div>
                                <div><strong>NIK:</strong> {{ $pendaftaran->orangTua->nik_ibu }}</div>
                                <div><strong>Pekerjaan:</strong> {{ $pendaftaran->orangTua->pekerjaan_ibu }}</div>
                                <div><strong>Pendidikan:</strong> {{ $pendaftaran->orangTua->pendidikan_ibu }}</div>
                                <div><strong>No. HP:</strong> {{ $pendaftaran->orangTua->no_hp_ibu }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Data Wali -->
            @if($pendaftaran->wali)
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user-shield mr-2 text-primary-600"></i>
                    Data Wali
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="space-y-1 text-sm">
                        <div><strong>Nama:</strong> {{ $pendaftaran->wali->nama_wali }}</div>
                        <div><strong>Pekerjaan:</strong> {{ $pendaftaran->wali->pekerjaan_wali }}</div>
                        <div><strong>No. HP:</strong> {{ $pendaftaran->wali->no_hp_wali }}</div>
                        <div><strong>Hubungan:</strong> {{ $pendaftaran->wali->hubungan_wali }}</div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Dokumen -->
            @if($pendaftaran->dokumens->count() > 0)
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-file mr-2 text-primary-600"></i>
                    Dokumen yang Diupload
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($pendaftaran->dokumens as $dokumen)
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border">
                            <div class="flex items-center">
                                <i class="fas fa-file-{{ $dokumen->jenis_dokumen == 'bukti_transfer' ? 'image' : 'pdf' }} text-gray-600 mr-3"></i>
                                <div>
                                    <div class="font-medium">{{ ucfirst(str_replace('_', ' ', $dokumen->jenis_dokumen)) }}</div>
                                    <div class="text-sm text-gray-500">{{ $dokumen->status_dokumen }}</div>
                                </div>
                            </div>
                            <a href="{{ Storage::url($dokumen->file_path) }}" target="_blank" class="text-primary-600 hover:text-primary-800">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Pembayaran -->
            @if($pendaftaran->pembayaran)
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-credit-card mr-2 text-primary-600"></i>
                    Data Pembayaran
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><strong>Bank Transfer:</strong> {{ $pendaftaran->pembayaran->bank_transfer }}</div>
                        <div><strong>Tanggal Transfer:</strong> {{ $pendaftaran->pembayaran->tanggal_transfer->format('d M Y') }}</div>
                        <div><strong>Status Pembayaran:</strong> {{ ucfirst($pendaftaran->pembayaran->status_pembayaran) }}</div>
                        <div><strong>Tanggal Upload:</strong> {{ $pendaftaran->pembayaran->tanggal_upload->format('d M Y, H:i') }}</div>
                    </div>
                    @if($pendaftaran->pembayaran->bukti_pembayaran_path)
                    <div class="mt-4">
                        <a href="{{ Storage::url($pendaftaran->pembayaran->bukti_pembayaran_path) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            <i class="fas fa-eye mr-2"></i>Lihat Bukti Transfer
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('dashboard.siswa') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
                </a>
                <button onclick="window.print()" class="px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                    <i class="fas fa-print mr-2"></i>Cetak Data
                </button>
            </div>
        </div>
        @else
        <div class="px-8 py-12 text-center">
            <i class="fas fa-exclamation-triangle text-yellow-500 text-6xl mb-4"></i>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Data Pendaftaran Tidak Ditemukan</h3>
            <p class="text-gray-600 mb-6">Anda belum melakukan pendaftaran siswa baru.</p>
            <a href="{{ route('dashboard.siswa') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                <i class="fas fa-plus mr-2"></i>Mulai Pendaftaran
            </a>
        </div>
        @endif
    </div>
</div>

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ duration: 600, easing: 'ease-in-out', once: true, offset: 50 });
});

// Toggle Profile Dropdown
function toggleProfileDropdown() {
    const menu = document.getElementById('profileMenu');
    menu.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('profileDropdown');
    const menu = document.getElementById('profileMenu');
    
    if (dropdown && !dropdown.contains(event.target)) {
        menu.classList.add('hidden');
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const menu = document.getElementById('profileMenu');
        if (menu) menu.classList.add('hidden');
    }
});

// Dark mode toggle
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

// Mobile menu
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

    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            mobileMenuButton.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />';
        });
    });
}
</script>
</body>
</html>