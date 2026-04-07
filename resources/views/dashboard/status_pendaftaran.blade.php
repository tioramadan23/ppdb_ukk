<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan - SMK BPM</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                colors: {
                    midnight: { 900: '#0F172A', 800: '#1E293B', 700: '#334155' },
                    navy: { 400: '#818CF8', 500: '#6366F1', 600: '#4F46E5', 700: '#4338CA' },
                    success: { 400: '#34D399', 500: '#10B981', 600: '#059669' },
                    warning: { 400: '#FBBF24', 500: '#F59E0B', 600: '#D97706' },
                    danger: { 400: '#F87171', 500: '#EF4444', 600: '#DC2626' }
                },
                animation: {
                    'fade-in': 'fadeIn 0.6s ease-out',
                    'slide-up': 'slideUp 0.7s ease-out',
                    'bounce-in': 'bounceIn 0.8s ease-out',
                    'pulse-glow': 'pulseGlow 2s infinite',
                    'confetti': 'confetti 3s linear infinite'
                },
                keyframes: {
                    fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                    slideUp: { '0%': { opacity: '0', transform: 'translateY(40px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    bounceIn: { '0%': { opacity: '0', transform: 'scale(0.3)' }, '50%': { opacity: '1', transform: 'scale(1.05)' }, '70%': { transform: 'scale(0.9)' }, '100%': { transform: 'scale(1)' } },
                    pulseGlow: { '0%, 100%': { boxShadow: '0 0 20px rgba(99, 102, 241, 0.5)' }, '50%': { boxShadow: '0 0 40px rgba(99, 102, 241, 0.8)' } },
                    confetti: { '0%': { transform: 'translateY(-100vh) rotate(0deg)', opacity: '1' }, '100%': { transform: 'translateY(100vh) rotate(720deg)', opacity: '0' } }
                }
            }
        }
    }
    </script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #312E81 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
            pointer-events: none;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .glass-card {
            background: rgba(30, 41, 59, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .status-lulus {
            background: linear-gradient(135deg, #10B981 0%, #059669 50%, #047857 100%);
            box-shadow: 0 0 60px rgba(16, 185, 129, 0.5), inset 0 0 30px rgba(255, 255, 255, 0.1);
        }
        
        .status-proses {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 50%, #B45309 100%);
            box-shadow: 0 0 60px rgba(245, 158, 11, 0.5), inset 0 0 30px rgba(255, 255, 255, 0.1);
        }
        
        .status-tolak {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 50%, #B91C1C 100%);
            box-shadow: 0 0 60px rgba(239, 68, 68, 0.5), inset 0 0 30px rgba(255, 255, 255, 0.1);
        }
        
        .confetti {
            position: fixed;
            width: 12px;
            height: 12px;
            top: -20px;
            z-index: 9999;
            animation: confetti 3s linear forwards;
        }
        
        .info-card {
            background: linear-gradient(145deg, rgba(79, 70, 229, 0.1) 0%, rgba(15, 23, 42, 0.6) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.2);
        }
        
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3), 0 0 20px rgba(99, 102, 241, 0.2);
        }
        
        .btn-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }
        
        @media print {
            body { background: white !important; }
            .glass-card { background: white !important; border: 1px solid #ddd !important; box-shadow: none !important; }
            nav, footer, button, .no-print { display: none !important; }
            #resultCard { display: block !important; box-shadow: none !important; }
            .status-lulus, .status-proses, .status-tolak { 
                background: #fff !important; 
                border: 2px solid #333 !important; 
                box-shadow: none !important; 
                color: #000 !important;
            }
        }
    </style>
</head>
<body class="text-white">

    <!-- Navbar -->
    <nav class="glass-card sticky top-0 z-50 border-b border-navy-500/30">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-navy rounded-xl flex items-center justify-center shadow-lg pulse-glow">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-xl" style="background:linear-gradient(90deg,#6366F1,#06B6D4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">SMK BPM</h1>
                    <p class="text-xs text-gray-400 tracking-wider">PENGUMUMAN PPDB 2026/2027</p>
                </div>
            </div>
            <a href="#" class="text-sm text-gray-400 hover:text-white transition btn-hover px-4 py-2 rounded-lg">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative py-16 lg:py-24">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-navy-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <div class="inline-block mb-6 animate-bounce-in">
                <div class="w-20 h-20 bg-gradient-navy rounded-2xl flex items-center justify-center shadow-lg mx-auto mb-4">
                    <i class="fas fa-search text-white text-3xl"></i>
                </div>
            </div>
            
            <h2 class="text-4xl lg:text-6xl font-black mb-6 animate-slide-up" style="background: linear-gradient(135deg, #6366F1, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Cek Hasil Pendaftaran
            </h2>
            <p class="text-gray-300 text-lg mb-10 max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.2s">
                Masukkan <span class="text-navy-400 font-semibold">Nomor Pendaftaran</span> atau <span class="text-navy-400 font-semibold">NISN</span> untuk melihat status kelulusan Anda
            </p>
            
            <!-- Search Box -->
            <div class="glass-card p-3 rounded-3xl max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.3s">
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-500 text-lg"></i>
                        <input type="text" id="searchInput" 
                            placeholder="Masukkan No. Pendaftaran atau NISN" 
                            class="w-full bg-midnight-800/70 border border-navy-500/40 rounded-2xl pl-14 pr-5 py-5 text-white text-lg placeholder-gray-500 focus:outline-none input-glow transition"
                            onkeyup="handleSearch(event)">
                    </div>
                    <button onclick="checkStatus()" class="bg-gradient-navy px-10 py-5 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-navy-500/40 transition whitespace-nowrap btn-hover">
                        <i class="fas fa-search mr-2"></i>Cek Sekarang
                    </button>
                </div>
            </div>
            
            <!-- Quick Tips -->
            <div class="mt-8 flex flex-wrap justify-center gap-4 text-sm text-gray-400 animate-slide-up" style="animation-delay: 0.4s">
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-full">
                    <i class="fas fa-info-circle text-navy-400"></i>
                    <span>Contoh: <span class="text-white font-mono">BPM-2026-001234</span></span>
                </div>
                <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-full">
                    <i class="fas fa-id-card text-navy-400"></i>
                    <span>atau NISN: <span class="text-white font-mono">0061234567</span></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading -->
    <div id="loading" class="hidden max-w-4xl mx-auto px-4 py-16 text-center">
        <div class="relative inline-block">
            <div class="w-20 h-20 border-4 border-navy-500/30 border-t-navy-500 rounded-full animate-spin"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-graduation-cap text-navy-400 text-2xl animate-pulse"></i>
            </div>
        </div>
        <p class="text-gray-400 mt-6 text-lg">Memuat data pendaftaran Anda...</p>
        <p class="text-gray-500 text-sm mt-2">Mohon tunggu sebentar</p>
    </div>

    <!-- Result Card -->
    <div id="resultCard" class="hidden max-w-5xl mx-auto px-4 pb-16">
        <div class="glass-card rounded-3xl overflow-hidden animate-slide-up shadow-2xl">
            <!-- Status Header -->
            <div id="statusHeader" class="p-10 text-center status-lulus relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-white/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                        <i id="statusIcon" class="fas fa-check-circle text-5xl"></i>
                    </div>
                    <h3 id="statusTitle" class="text-4xl font-black mb-3">SELAMAT! ANDA LULUS</h3>
                    <p id="statusDesc" class="text-white/90 text-xl">Selamat bergabung di SMK BPM</p>
                </div>
            </div>
            
            <!-- Student Info -->
            <div class="p-8">
                <!-- Student Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-navy-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user text-navy-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">Nama Lengkap</span>
                        </div>
                        <p id="studentName" class="text-lg font-bold text-white">-</p>
                    </div>
                    
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-navy-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-file-alt text-navy-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">No. Pendaftaran</span>
                        </div>
                        <p id="studentNo" class="text-lg font-bold text-white font-mono">-</p>
                    </div>
                    
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-navy-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-id-card text-navy-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">NISN</span>
                        </div>
                        <p id="studentNisn" class="text-lg font-bold text-white font-mono">-</p>
                    </div>
                    
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-navy-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-navy-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">Program Keahlian</span>
                        </div>
                        <p id="studentMajor" class="text-lg font-bold text-white">-</p>
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-success-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-success-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">Tanggal Pengumuman</span>
                        </div>
                        <p id="announceDate" class="text-lg font-bold text-white">-</p>
                    </div>
                    
                    <div class="info-card rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-purple-500/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-shield-alt text-purple-400"></i>
                            </div>
                            <span class="text-gray-400 text-sm">Status Pendaftaran</span>
                        </div>
                        <p id="registrationStatus" class="text-lg font-bold text-white">-</p>
                    </div>
                </div>
                
                <!-- Info Box -->
                <div id="infoBox" class="bg-navy-500/10 border border-navy-500/30 rounded-2xl p-6 mb-8">
                    <h4 class="font-bold text-lg mb-4 flex items-center">
                        <i class="fas fa-info-circle text-navy-400 mr-3 text-xl"></i>
                        Informasi Selanjutnya
                    </h4>
                    <ul id="infoList" class="space-y-3 text-gray-300">
                        <!-- Populated by JS -->
                    </ul>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <button onclick="printResult()" class="bg-white/10 hover:bg-white/20 px-8 py-4 rounded-2xl font-bold transition flex items-center gap-3 btn-hover">
                        <i class="fas fa-print text-xl"></i>
                        <span>Cetak Hasil</span>
                    </button>
                    <a href="https://wa.me/6281234567890" class="bg-success-500 hover:bg-success-600 px-8 py-4 rounded-2xl font-bold transition flex items-center gap-3 btn-hover">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Hubungi Panitia</span>
                    </a>
                    <a href="mailto:ppdb@smkbpm.sch.id" class="bg-navy-500 hover:bg-navy-600 px-8 py-4 rounded-2xl font-bold transition flex items-center gap-3 btn-hover">
                        <i class="fas fa-envelope text-xl"></i>
                        <span>Email Panitia</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Back Button -->
        <div class="text-center mt-10">
            <button onclick="resetSearch()" class="text-gray-400 hover:text-white transition flex items-center gap-3 mx-auto text-lg btn-hover px-6 py-3 rounded-xl">
                <i class="fas fa-arrow-left"></i>
                <span>Cek Pendaftaran Lain</span>
            </button>
        </div>
    </div>

    <!-- Error State -->
    <div id="errorCard" class="hidden max-w-lg mx-auto px-4 pb-16">
        <div class="glass-card rounded-3xl p-10 text-center animate-slide-up">
            <div class="w-24 h-24 bg-danger-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-exclamation-circle text-danger-400 text-5xl"></i>
            </div>
            <h3 class="text-2xl font-bold mb-3">Data Tidak Ditemukan</h3>
            <p id="errorMsg" class="text-gray-400 mb-8 text-lg">Nomor pendaftaran atau NISN yang Anda masukkan tidak terdaftar dalam sistem kami.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button onclick="resetSearch()" class="bg-navy-500 hover:bg-navy-600 px-8 py-4 rounded-2xl font-bold transition btn-hover">
                    <i class="fas fa-redo mr-2"></i>Coba Lagi
                </button>
                <a href="tel:+6281234567890" class="bg-white/10 hover:bg-white/20 px-8 py-4 rounded-2xl font-bold transition btn-hover">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="glass-card border-t border-navy-500/30 mt-auto">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-navy rounded-xl flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold">SMK BPM</p>
                        <p class="text-sm text-gray-400">© 2026 Panitia PPDB. All rights reserved.</p>
                    </div>
                </div>
                <div class="flex items-center gap-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-navy-400 transition">Bantuan</a>
                    <a href="#" class="hover:text-navy-400 transition">Kontak</a>
                    <a href="#" class="hover:text-navy-400 transition">FAQ</a>
                    <a href="#" class="hover:text-navy-400 transition">Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Data Mockup dengan info lengkap
        const dataPendaftar = {
            'BPM-2026-001234': {
                nama: 'Ahmad Rizki Pratama',
                no: 'BPM-2026-001234',
                nisn: '0061234567',
                jurusan: 'Rekayasa Perangkat Lunak (RPL)',
                tanggal: '20 Januari 2026',
                status: 'lulus',
                statusReg: 'Aktif',
                info: [
                    '📅 Lakukan daftar ulang pada 25-30 Januari 2026',
                    '📄 Bring dokumen asli untuk verifikasi',
                    '💰 Bayar biaya pendaftaran ulang Rp 500.000',
                    '🏫 Laporan diri: 1 Februari 2026, 07:00 WIB'
                ]
            },
            '0061234567': {
                nama: 'Ahmad Rizki Pratama',
                no: 'BPM-2026-001234',
                nisn: '0061234567',
                jurusan: 'Rekayasa Perangkat Lunak (RPL)',
                tanggal: '20 Januari 2026',
                status: 'lulus',
                statusReg: 'Aktif',
                info: [
                    '📅 Lakukan daftar ulang pada 25-30 Januari 2026',
                    '📄 Bring dokumen asli untuk verifikasi',
                    '💰 Bayar biaya pendaftaran ulang Rp 500.000',
                    '🏫 Laporan diri: 1 Februari 2026, 07:00 WIB'
                ]
            },
            'BPM-2026-001235': {
                nama: 'Dewi Lestari',
                no: 'BPM-2026-001235',
                nisn: '0062345678',
                jurusan: 'Desain Komunikasi Visual (DKV)',
                tanggal: '20 Januari 2026',
                status: 'proses',
                statusReg: 'Dalam Verifikasi',
                info: [
                    '⏳ Berkas sedang diverifikasi oleh panitia',
                    '📧 Hasil akan diumumkan dalam 3-5 hari kerja',
                    '📱 Pantau status ini secara berkala',
                    '📞 Hubungi panitia jika ada pertanyaan'
                ]
            },
            'BPM-2026-001236': {
                nama: 'Muhammad Fajar',
                no: 'BPM-2026-001236',
                nisn: '0063456789',
                jurusan: 'Teknik Komputer & Jaringan (TKJ)',
                tanggal: '20 Januari 2026',
                status: 'tolak',
                statusReg: 'Tidak Lengkap',
                info: [
                    '❌ Berkas tidak lengkap atau tidak valid',
                    '📄 Silakan lengkapi berkas dan daftar ulang',
                    '📞 Hubungi panitia untuk informasi lebih lanjut',
                    '🔄 Batas waktu perbaikan: 25 Januari 2026'
                ]
            }
        };

        function handleSearch(event) {
            if (event.key === 'Enter') checkStatus();
        }

        function checkStatus() {
            const input = document.getElementById('searchInput').value.trim();
            if (!input) {
                showToast('Masukkan nomor pendaftaran atau NISN', 'error');
                return;
            }

            document.getElementById('resultCard').classList.add('hidden');
            document.getElementById('errorCard').classList.add('hidden');
            document.getElementById('loading').classList.remove('hidden');

            setTimeout(() => {
                const data = dataPendaftar[input];
                document.getElementById('loading').classList.add('hidden');

                if (data) {
                    showResult(data);
                } else {
                    showError();
                }
            }, 2000);
        }

        function showResult(data) {
            const header = document.getElementById('statusHeader');
            const title = document.getElementById('statusTitle');
            const desc = document.getElementById('statusDesc');
            const icon = document.getElementById('statusIcon');

            // Reset classes
            header.className = 'p-10 text-center rounded-t-3xl relative overflow-hidden';

            if (data.status === 'lulus') {
                header.classList.add('status-lulus');
                title.textContent = '🎉 SELAMAT! ANDA LULUS';
                desc.textContent = 'Selamat bergabung di SMK BPM';
                icon.className = 'fas fa-check-circle text-5xl';
                createConfetti();
            } else if (data.status === 'proses') {
                header.classList.add('status-proses');
                title.textContent = '⏳ SEDANG DIPROSES';
                desc.textContent = 'Berkas Anda sedang diverifikasi';
                icon.className = 'fas fa-clock text-5xl';
            } else {
                header.classList.add('status-tolak');
                title.textContent = '❌ MOHON MAAF';
                desc.textContent = 'Pendaftaran Anda belum dapat diproses';
                icon.className = 'fas fa-times-circle text-5xl';
            }

            // Fill student info
            document.getElementById('studentName').textContent = data.nama;
            document.getElementById('studentNo').textContent = data.no;
            document.getElementById('studentNisn').textContent = data.nisn;
            document.getElementById('studentMajor').textContent = data.jurusan;
            document.getElementById('announceDate').textContent = data.tanggal;
            document.getElementById('registrationStatus').textContent = data.statusReg;

            // Info list
            document.getElementById('infoList').innerHTML = data.info.map(i => 
                `<li class="flex items-start gap-3"><i class="fas fa-check-circle text-navy-400 mt-1"></i><span>${i}</span></li>`
            ).join('');

            document.getElementById('resultCard').classList.remove('hidden');
        }

        function showError() {
            document.getElementById('errorCard').classList.remove('hidden');
        }

        function resetSearch() {
            document.getElementById('searchInput').value = '';
            document.getElementById('resultCard').classList.add('hidden');
            document.getElementById('errorCard').classList.add('hidden');
        }

        function printResult() {
            window.print();
            showToast('Mencetak hasil...', 'success');
        }

        function createConfetti() {
            const colors = ['#10B981', '#6366F1', '#8B5CF6', '#06B6D4', '#F59E0B', '#EC4899'];
            for (let i = 0; i < 80; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                    confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                    confetti.style.width = (Math.random() * 10 + 8) + 'px';
                    confetti.style.height = confetti.style.width;
                    document.body.appendChild(confetti);
                    setTimeout(() => confetti.remove(), 4000);
                }, i * 30);
            }
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 z-[999] glass-card rounded-2xl p-5 min-w-[350px] shadow-2xl flex items-center gap-4 animate-slide-up`;
            toast.innerHTML = `
                <div class="w-12 h-12 rounded-xl ${type === 'success' ? 'bg-success-500/20' : 'bg-danger-500/20'} flex items-center justify-center flex-shrink-0">
                    <i class="fas ${type === 'success' ? 'fa-check text-success-400' : 'fa-exclamation text-danger-400'} text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-white">${type === 'success' ? 'Berhasil' : 'Error'}</p>
                    <p class="text-sm text-gray-400">${message}</p>
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(400px)';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
</body>
</html>