<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ... existing head content ... -->
    <!-- Untuk CSRF token & base URL di JavaScript -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    
    <!-- ... existing head content ... -->
  <title>Admin PPDB - SMK BPM</title>
  
  <!-- Dependencies -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Tailwind Configuration -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
          colors: {
            midnight: { 50:'#F0F4F8', 100:'#D9E2EC', 200:'#BCCCDC', 300:'#9FB3C8', 400:'#82A4B9', 500:'#65859A', 600:'#4A6572', 700:'#344955', 800:'#232F34', 900:'#1A1F2C', 950:'#0F172A' },
            navy: { 50:'#EEF2FF', 100:'#E0E7FF', 200:'#C7D2FE', 300:'#A5B4FC', 400:'#818CF8', 500:'#6366F1', 600:'#4F46E5', 700:'#4338CA', 800:'#3730A3', 900:'#312E81' },
            accent: { cyan:'#06B6D4', purple:'#8B5CF6', emerald:'#10B981', amber:'#F59E0B', rose:'#F43F5E' }
          },
          boxShadow: { glass:'0 8px 32px rgba(0,0,0,0.2)', glow:'0 0 20px rgba(99,102,241,0.25)', card:'0 4px 20px rgba(15,23,42,0.3)' },
          animation: { 'fade-in':'fadeIn 0.3s ease-out', 'slide-up':'slideUp 0.4s ease-out' },
          keyframes: {
            fadeIn:{ '0%':{opacity:'0'}, '100%':{opacity:'1'} },
            slideUp:{ '0%':{opacity:'0',transform:'translateY(12px)'}, '100%':{opacity:'1',transform:'translateY(0)'} }
          }
        }
      }
    }
  </script>

  <style>
    /* Base */
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: linear-gradient(135deg, #0F172A 0%, #1A1F2C 100%); color: #E2E8F0; }
    ::-webkit-scrollbar { width:8px; height:8px; }
    ::-webkit-scrollbar-track { background:#1E293B; border-radius:999px; }
    ::-webkit-scrollbar-thumb { background:linear-gradient(180deg, #4F46E5, #6366F1); border-radius:999px; }

    /* Glass & Card */
    .glass { background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(12px); border: 1px solid rgba(99, 102, 241, 0.15); }
    .card { background: linear-gradient(145deg, #1E293B 0%, #0F172A 100%); border: 1px solid rgba(99, 102, 241, 0.15); border-radius: 1rem; transition: all 0.3s cubic-bezier(0.4,0,0.2,1); }
    .card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(79, 70, 229, 0.15); border-color: rgba(99, 102, 241, 0.3); }

    /* Buttons */
    .btn { position:relative; overflow:hidden; transition: all 0.2s ease; }
    .btn-primary { background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%); color: white; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(99, 102, 241, 0.4); }
    .btn-glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.15); color: #E2E8F0; }
    .btn-glass:hover { background: rgba(255,255,255,0.12); transform: translateY(-1px); }
    .btn-success { background: linear-gradient(135deg, #059669 0%, #10B981 100%); color: white; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); }
    .btn-danger { background: linear-gradient(135deg, #DC2626 0%, #EF4444 100%); color: white; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3); }

    /* Status Badges */
    .badge { display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.35rem 0.8rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
    .badge-pending { background: rgba(245, 158, 11, 0.15); color: #FBBF24; border: 1px solid rgba(245, 158, 11, 0.3); }
    .badge-approved { background: rgba(16, 185, 129, 0.15); color: #34D399; border: 1px solid rgba(16, 185, 129, 0.3); }
    .badge-rejected { background: rgba(239, 68, 68, 0.15); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.3); }

    /* Table */
    .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
    .data-table th { background: linear-gradient(135deg, #312E81 0%, #1E3A8A 100%); color: white; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.9rem 1rem; text-align: left; }
    .data-table th:first-child { border-radius: 0.75rem 0 0 0; } .data-table th:last-child { border-radius: 0 0.75rem 0 0; }
    .data-table td { padding: 0.9rem 1rem; border-bottom: 1px solid rgba(99, 102, 241, 0.1); color: #CBD5E1; transition: all 0.2s; }
    .data-table tbody tr:hover td { background: rgba(79, 70, 229, 0.08); color: #F8FAFC; }

    /* Inputs & Nav */
    .input-field { background: rgba(15, 23, 42, 0.6); border: 1px solid rgba(99, 102, 241, 0.2); color: #E2E8F0; transition: all 0.2s; }
    .input-field:focus { outline: none; border-color: #6366F1; box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15); background: rgba(15, 23, 42, 0.8); }
    .select-field { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right 0.5rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; padding-right: 2.5rem; }
    .select-field option { background: #1E293B; }
    .nav-item { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; border-radius: 0.75rem; color: #94A3B8; font-weight: 500; transition: all 0.2s; cursor: pointer; }
    .nav-item:hover { background: rgba(99, 102, 241, 0.1); color: #E2E8F0; }
    .nav-item.active { background: rgba(79, 70, 229, 0.15); color: #E2E8F0; border: 1px solid rgba(99, 102, 241, 0.3); position: relative; }
    .nav-item.active::before { content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 3px; height: 60%; background: linear-gradient(180deg, #4F46E5, #6366F1); border-radius: 0 999px 999px 0; }

    /* Page Transitions */
    .page-view { display: none; opacity: 0; transform: translateY(8px); transition: all 0.3s ease; }
    .page-view.active { display: block; opacity: 1; transform: translateY(0); animation: slideUp 0.4s ease-out; }

    /* Modal */
    .modal { display: none; position: fixed; inset: 0; z-index: 100; align-items: center; justify-content: center; }
    .modal.active { display: flex; }
    .modal-overlay { position: absolute; inset: 0; background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(4px); }
    .modal-box { position: relative; background: linear-gradient(145deg, #1E293B 0%, #0F172A 100%); border: 1px solid rgba(99, 102, 241, 0.2); border-radius: 1.25rem; box-shadow: 0 25px 60px rgba(0,0,0,0.5); max-width: 90%; max-height: 85vh; overflow: hidden; animation: slideUp 0.3s ease-out; }

    /* Progress & Tabs */
    .progress-bg { height: 6px; background: rgba(99, 102, 241, 0.2); border-radius: 999px; overflow: hidden; }
    .progress-fill { height: 100%; border-radius: inherit; transition: width 0.5s ease; background: linear-gradient(90deg, #4F46E5, #6366F1, #8B5CF6); background-size: 200% 100%; animation: shimmer 2s infinite; }
    @keyframes shimmer { 0% { background-position: 100% 0; } 100% { background-position: -100% 0; } }
    .tab-container { display: flex; gap: 0.5rem; padding: 0.4rem; background: rgba(15, 23, 42, 0.6); border-radius: 0.75rem; overflow-x: auto; }
    .tab-btn { padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.85rem; color: #94A3B8; transition: all 0.2s; cursor: pointer; white-space: nowrap; }
    .tab-btn.active { background: #6366F1; color: white; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3); }
    .tab-content { display: none; }
    .tab-content.active { display: block; animation: fadeIn 0.3s ease; }

    .stat-number { font-size: 2rem; font-weight: 800; background: linear-gradient(135deg, #6366F1, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  </style>
</head>
<body class="min-h-screen flex flex-col">

  <!-- Toast Notification -->
  <div id="toast" class="fixed top-5 right-5 z-[999] transform translate-x-full transition-transform duration-300">
    <div class="glass rounded-xl p-4 min-w-[320px] shadow-glass flex items-start gap-3">
      <div id="toastIcon" class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-emerald-400"></i></div>
      <div class="flex-1"><h4 id="toastTitle" class="font-semibold text-white">Sukses</h4><p id="toastMsg" class="text-sm text-gray-400">Operasi berhasil</p></div>
      <button onclick="hideToast()" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div id="loader" class="fixed inset-0 z-[999] bg-midnight-950/90 backdrop-blur-sm hidden flex items-center justify-center">
    <div class="text-center">
      <div class="w-14 h-14 border-4 border-navy-500/30 border-t-navy-500 rounded-full animate-spin mx-auto mb-3"></div>
      <p class="text-white font-medium">Memproses...</p>
    </div>
  </div>

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 glass z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="h-16 flex items-center px-5 border-b border-navy-500/20">
      <div class="flex items-center gap-2.5">
        <div class="w-9 h-9 bg-gradient-navy rounded-lg flex items-center justify-center shadow-glow"><i class="fas fa-graduation-cap text-white"></i></div>
        <div><h1 class="font-bold text-lg gradient-text" style="background:linear-gradient(90deg,#4F46E5,#06B6D4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">SMK BPM</h1><p class="text-[10px] text-gray-500 tracking-wider">ADMIN PANEL</p></div>
      </div>
    </div>
    <nav class="p-3 space-y-1 overflow-y-auto h-[calc(100%-4rem)]">
      <div class="px-3 py-2"><p class="text-[10px] font-semibold text-gray-600 uppercase tracking-widest">Menu Utama</p></div>
      <a href="#" class="nav-item active" onclick="switchPage('dashboard')" id="nav-dashboard"><i class="fas fa-users w-5 text-center"></i><span>Data Pendaftar</span><span class="ml-auto bg-navy-500/20 text-navy-300 text-xs px-2 py-0.5 rounded-full" id="nav-count">0</span></a>
      <a href="#" class="nav-item" onclick="switchPage('stats')" id="nav-stats"><i class="fas fa-chart-line w-5 text-center"></i><span>Statistik</span></a>
      <div class="mt-4 pt-4 border-t border-navy-500/20">
        <a href="#" class="nav-item text-rose-400 hover:text-rose-300"><i class="fas fa-sign-out-alt w-5 text-center"></i><span>Logout</span></a>
      </div>
    </nav>
  </aside>
  <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden" onclick="toggleSidebar()"></div>

  <!-- Main Content -->
  <main class="flex-1 lg:ml-64 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="sticky top-0 z-20 glass border-b border-navy-500/20">
      <div class="px-4 lg:px-6 h-16 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <button onclick="toggleSidebar()" class="lg:hidden btn-glass w-9 h-9 rounded-lg flex items-center justify-center"><i class="fas fa-bars"></i></button>
          <div id="pageHeader">
            <h2 class="text-lg font-bold text-white" id="pageTitle">Dashboard</h2>
            <p class="text-xs text-gray-400" id="pageSub">Kelola data pendaftar PPDB</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <div class="hidden md:flex relative">
            <input type="text" id="searchInput" placeholder="Cari nama, NISN..." class="input-field w-56 pl-9 pr-4 py-2 rounded-lg text-sm" onkeyup="searchData()">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-xs"></i>
          </div>
         
        </div>
      </div>

    </header>

    <!-- Pages Container -->
    <div class="flex-1 p-4 lg:p-6">
      <!-- PAGE 1: DASHBOARD -->
      <div id="page-dashboard" class="page-view active space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <div class="card p-5"><div class="flex justify-between items-start mb-3"><div><p class="text-gray-400 text-xs font-medium uppercase">Total Pendaftar</p><p class="stat-number mt-1" id="stat-total">0</p></div><div class="w-10 h-10 bg-gradient-navy rounded-lg flex items-center justify-center shadow-glow"><i class="fas fa-users text-white"></i></div></div><div class="progress-bg"><div class="progress-fill" style="width:100%"></div></div></div>
          <div class="card p-5"><div class="flex justify-between items-start mb-3"><div><p class="text-gray-400 text-xs font-medium uppercase">Menunggu</p><p class="stat-number mt-1 text-amber-400" id="stat-pending">0</p></div><div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-clock text-amber-400"></i></div></div><div class="progress-bg"><div class="progress-fill" id="prog-pending" style="width:0%;background:linear-gradient(90deg,#F59E0B,#FBBF24)"></div></div></div>
          <div class="card p-5"><div class="flex justify-between items-start mb-3"><div><p class="text-gray-400 text-xs font-medium uppercase">Diterima</p><p class="stat-number mt-1 text-emerald-400" id="stat-approved">0</p></div><div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-check-circle text-emerald-400"></i></div></div><div class="progress-bg"><div class="progress-fill" id="prog-approved" style="width:0%;background:linear-gradient(90deg,#059669,#10B981)"></div></div></div>
          <div class="card p-5"><div class="flex justify-between items-start mb-3"><div><p class="text-gray-400 text-xs font-medium uppercase">Ditolak</p><p class="stat-number mt-1 text-rose-400" id="stat-rejected">0</p></div><div class="w-10 h-10 bg-rose-500/20 rounded-lg flex items-center justify-center"><i class="fas fa-times-circle text-rose-400"></i></div></div><div class="progress-bg"><div class="progress-fill" id="prog-rejected" style="width:0%;background:linear-gradient(90deg,#DC2626,#EF4444)"></div></div></div>
        </div>

        <!-- Filters & Actions -->
        <div class="card p-4">
          <div class="flex flex-col lg:flex-row justify-between gap-4">
            <div class="flex flex-wrap gap-2">
              <select id="filterStatus" onchange="applyFilters()" class="input-field select-field px-3 py-2 rounded-lg text-sm"><option value="all">Semua Status</option><option value="submit">Menunggu</option><option value="diverifikasi">Diterima</option><option value="rejected">Ditolak</option></select>
              <select id="filterJurusan" onchange="applyFilters()" class="input-field select-field px-3 py-2 rounded-lg text-sm"><option value="all">Semua Jurusan</option><option value="RPL">RPL</option><option value="TKJ">TKJ</option><option value="DKV">DKV</option><option value="BD">Bisnis Digital</option><option value="AK">Akuntansi</option></select>
              <button onclick="resetFilters()" class="btn-glass px-3 py-2 rounded-lg text-sm"><i class="fas fa-filter mr-1.5"></i>Reset</button>
            </div>
            <div class="flex gap-2">
              <button onclick="openBulk()" id="btnBulk" class="btn-primary px-4 py-2 rounded-lg text-sm font-medium opacity-50 cursor-not-allowed" disabled><i class="fas fa-layer-group mr-1.5"></i>Bulk Action <span id="sel-count" class="ml-1 bg-white/20 px-1.5 py-0.5 rounded text-xs">0</span></button>
              <button onclick="exportData()" class="btn-glass px-3 py-2 rounded-lg text-sm"><i class="fas fa-file-export mr-1.5"></i>Export</button>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="card overflow-hidden">
          <div class="overflow-x-auto">
            <table class="data-table">
              <thead>
                <tr>
                  <th class="w-12 text-center"><input type="checkbox" id="selectAll" onchange="toggleSelectAll()" class="accent-navy-500"></th>
                  <th>No. Pendaftaran</th>
                  <th>Nama Siswa</th>
                  <th>Jurusan</th>
                  <th>Asal Sekolah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="tableBody"></tbody>
            </table>
          </div>
          <div id="emptyState" class="hidden py-12 text-center">
            <div class="w-16 h-16 bg-navy-500/10 rounded-full flex items-center justify-center mx-auto mb-3"><i class="fas fa-search text-navy-400 text-2xl"></i></div>
            <p class="text-gray-400">Tidak ada data yang cocok</p>
          </div>
          <div class="px-4 py-3 border-t border-navy-500/20 flex justify-between items-center text-sm text-gray-400">
            <span id="showingInfo">Menampilkan 0 data</span>
            <div class="flex gap-1" id="pagination"></div>
          </div>
        </div>
      </div>

      <!-- PAGE 2: STATISTICS -->
      <div id="page-stats" class="page-view space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
          <div>
            <h3 class="text-xl font-bold text-white">Analitik PPDB</h3>
            <p class="text-sm text-gray-400">Insight data pendaftar tahun ajaran 2026/2027</p>
          </div>
          <div class="flex gap-2">
            <select id="statsPeriod" onchange="updateStatsCharts()" class="input-field select-field px-3 py-2 rounded-lg text-sm"><option value="all">Semua Waktu</option><option value="month">Bulan Ini</option></select>
            <button onclick="exportStats()" class="btn-primary px-4 py-2 rounded-lg text-sm"><i class="fas fa-download mr-1.5"></i>Export</button>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <div class="card p-5"><p class="text-gray-400 text-xs font-medium uppercase mb-2">Total Pendaftar</p><p class="stat-number" id="statTotal">0</p></div>
          <div class="card p-5"><p class="text-gray-400 text-xs font-medium uppercase mb-2">Rasio Diterima</p><p class="stat-number" id="statRatio">0%</p></div>
          <div class="card p-5"><p class="text-gray-400 text-xs font-medium uppercase mb-2">Waktu Proses</p><p class="stat-number" id="statTime">0h</p></div>
          <div class="card p-5"><p class="text-gray-400 text-xs font-medium uppercase mb-2">Kelengkapan Berkas</p><p class="stat-number" id="statFiles">0%</p></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="card p-5"><h4 class="font-semibold mb-4"><i class="fas fa-chart-line text-navy-400 mr-2"></i>Trend Pendaftaran</h4><canvas id="chartTrend" height="180"></canvas></div>
          <div class="card p-5"><h4 class="font-semibold mb-4"><i class="fas fa-chart-pie text-navy-400 mr-2"></i>Distribusi Jurusan</h4><canvas id="chartJurusan" height="180"></canvas></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <div class="card p-5"><h4 class="font-semibold mb-4"><i class="fas fa-tasks text-navy-400 mr-2"></i>Status Seleksi</h4><canvas id="chartStatus" height="160"></canvas></div>
          <div class="card p-5 lg:col-span-2"><h4 class="font-semibold mb-4"><i class="fas fa-school text-navy-400 mr-2"></i>Top 5 Asal Sekolah</h4><div id="topSchools" class="space-y-4"></div></div>
        </div>
      </div>
    </div>
  </main>

  <!-- Modals -->
  <div id="modalDetail" class="modal"><div class="modal-overlay" onclick="closeModal('modalDetail')"></div><div class="modal-box w-full max-w-4xl mx-4"><div class="bg-gradient-navy px-6 py-4 flex justify-between items-center"><div class="flex items-center gap-3"><div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><i class="fas fa-user-graduate text-white text-xl"></i></div><div><h3 class="text-lg font-bold text-white" id="mName">-</h3><p class="text-xs text-gray-300" id="mNo">-</p></div></div><button onclick="closeModal('modalDetail')" class="btn-glass w-8 h-8 rounded-lg flex items-center justify-center"><i class="fas fa-times"></i></button></div><div class="p-6 overflow-y-auto max-h-[70vh]">
    <div class="flex gap-2 mb-4"><span id="mStatus" class="badge"></span></div>
    <div class="tab-container mb-5"><button class="tab-btn active" onclick="switchTab(this, 'tab-diri')">Data Diri</button><button class="tab-btn" onclick="switchTab(this, 'tab-ortu')">Orang Tua</button><button class="tab-btn" onclick="switchTab(this, 'tab-berkas')">Berkas</button></div>
    <div id="tab-diri" class="tab-content active grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">NISN</p><p class="font-medium" id="mNisn">-</p></div>
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">NIK</p><p class="font-medium" id="mNik">-</p></div>
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">TTL</p><p class="font-medium" id="mTtl">-</p></div>
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Jenis Kelamin</p><p class="font-medium" id="mJk">-</p></div>
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">No. HP</p><p class="font-medium" id="mHp">-</p></div>
      <div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Asal Sekolah</p><p class="font-medium" id="mSekolah">-</p></div>
      <div class="bg-white/5 rounded-lg p-3 md:col-span-2"><p class="text-xs text-gray-500">Alamat</p><p class="font-medium" id="mAlamat">-</p></div>
    </div>
    <div id="tab-ortu" class="tab-content space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4"><div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Nama Ayah</p><p class="font-medium" id="mAyah">-</p></div><div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Pekerjaan Ayah</p><p class="font-medium" id="mKerjaAyah">-</p></div><div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Nama Ibu</p><p class="font-medium" id="mIbu">-</p></div><div class="bg-white/5 rounded-lg p-3"><p class="text-xs text-gray-500">Pekerjaan Ibu</p><p class="font-medium" id="mKerjaIbu">-</p></div></div>
    </div>
    <div id="tab-berkas" class="tab-content"><div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition"><i class="fas fa-image text-2xl text-navy-400 mb-2"></i><p class="text-sm">Pas Foto</p></div>
      <div class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition"><i class="fas fa-file-alt text-2xl text-navy-400 mb-2"></i><p class="text-sm">Ijazah</p></div>
      <div class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition"><i class="fas fa-id-card text-2xl text-navy-400 mb-2"></i><p class="text-sm">KK</p></div>
      <div class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition"><i class="fas fa-receipt text-2xl text-emerald-400 mb-2"></i><p class="text-sm">Bukti Bayar</p></div>
    </div></div>
    <div class="mt-6 flex justify-end gap-3"><button onclick="closeModal('modalDetail')" class="btn-glass px-5 py-2 rounded-lg">Tutup</button><button id="btnReject" onclick="openModal('modalReject')" class="btn-danger px-5 py-2 rounded-lg hidden"><i class="fas fa-times mr-1.5"></i>Tolak</button><button id="btnApprove" onclick="approve()" class="btn-success px-5 py-2 rounded-lg hidden"><i class="fas fa-check mr-1.5"></i>Terima</button></div>
  </div></div></div>

  <div id="modalReject" class="modal"><div class="modal-overlay" onclick="closeModal('modalReject')"></div><div class="modal-box w-full max-w-md mx-4 p-6"><div class="text-center mb-4"><div class="w-14 h-14 bg-rose-500/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="fas fa-times-circle text-rose-400 text-2xl"></i></div><h3 class="text-lg font-bold text-white">Tolak Pendaftaran</h3></div><textarea id="reason" class="input-field w-full rounded-lg p-3 text-sm mb-4" rows="3" placeholder="Alasan penolakan..."></textarea><div class="flex gap-3"><button onclick="closeModal('modalReject')" class="btn-glass flex-1 py-2 rounded-lg">Batal</button><button onclick="submitReject()" class="btn-danger flex-1 py-2 rounded-lg">Konfirmasi</button></div></div></div>

  <div id="modalBulk" class="modal"><div class="modal-overlay" onclick="closeModal('modalBulk')"></div><div class="modal-box w-full max-w-md mx-4 p-6"><h3 class="text-lg font-bold text-white mb-4">Bulk Action</h3><p class="text-sm text-gray-400 mb-4">Terapkan aksi ke <span class="text-navy-400 font-bold" id="bulkCount">0</span> data terpilih</p><div class="space-y-3"><button onclick="bulkApprove()" class="btn-success w-full py-2.5 rounded-lg"><i class="fas fa-check mr-2"></i>Terima Semua</button><button onclick="bulkReject()" class="btn-danger w-full py-2.5 rounded-lg"><i class="fas fa-times mr-2"></i>Tolak Semua</button><button onclick="bulkExport()" class="btn-primary w-full py-2.5 rounded-lg"><i class="fas fa-file-export mr-2"></i>Export Terpilih</button></div><button onclick="closeModal('modalBulk')" class="btn-glass w-full mt-3 py-2 rounded-lg">Tutup</button></div></div>

  <!-- JavaScript -->
  <script>
    // ================= CONFIG =================
const BASE_URL = document.querySelector('meta[name="base-url"]')?.content || '';
const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content || '';

// ================= STATE =================
let dataPendaftar = [];
let pagination = { current_page: 1, last_page: 1, total: 0, per_page: 10 };
let currentPendaftar = null;
let charts = {};
let selectedIds = [];

// ================= INIT =================
document.addEventListener('DOMContentLoaded', () => {
    fetchDataPendaftar(); // Panggil API saat web pertama kali dibuka
    
    // Setup event listener untuk pencarian (Debounce agar tidak spam API)
    let timeout;
    document.getElementById('searchInput')?.addEventListener('input', (e) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            fetchDataPendaftar({ search: e.target.value, page: 1 });
        }, 500); 
    });

    // Tutup dropdown profile jika klik di luar
    document.addEventListener('click', e => {
        const pm = document.getElementById('profileMenu');
        if (pm && !pm.contains(e.target) && !e.target.closest('[onclick="toggleProfile()"]')) pm.classList.add('hidden');
    });
});

// ================= 1. API: AMBIL DATA TABEL =================
async function fetchDataPendaftar(params = {}) {
    try {
        showLoader();
        const url = new URL(`${BASE_URL}/admin/pendaftarans/data`); // Sesuaikan dengan route web.php kamu
        
        // Ambil value dari filter jika tidak ada parameter khusus
        const search = params.search !== undefined ? params.search : document.getElementById('searchInput').value;
        const status = document.getElementById('filterStatus').value;
        const jurusan = document.getElementById('filterJurusan').value;
        const page = params.page || pagination.current_page;

        if(search) url.searchParams.append('search', search);
        if(status && status !== 'all') url.searchParams.append('status', status);
        if(jurusan && jurusan !== 'all') url.searchParams.append('jurusan', jurusan);
        url.searchParams.append('page', page);
        
        const response = await fetch(url.toString(), {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        });
        
        if (!response.ok) throw new Error('Gagal mengambil data');
        
        const result = await response.json();
        dataPendaftar = result.data;
        pagination = result.pagination;
        
        renderTable();
        updateStats(result.stats); // Update card statistik
        
    } catch (error) {
        console.error('Fetch error:', error);
        showToast('Gagal memuat data pendaftar', 'error');
    } finally {
        hideLoader();
    }
}

// ================= 2. API: AMBIL DETAIL (MODAL) =================
async function viewDetail(id) {
    try {
        showLoader();
        const response = await fetch(`${BASE_URL}/admin/pendaftarans/${id}`, {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        });
        
        if (!response.ok) throw new Error('Gagal mengambil detail');
        const detail = await response.json();
        currentPendaftar = detail;

        // Render Data Diri
        document.getElementById('mName').textContent = detail.nama_lengkap;
        document.getElementById('mNo').textContent = detail.no_pendaftaran;
        document.getElementById('mNisn').textContent = detail.nisn;
        document.getElementById('mNik').textContent = detail.nik;
        document.getElementById('mTtl').textContent = `${detail.tempat_lahir}, ${detail.tanggal_lahir}`;
        document.getElementById('mJk').textContent = detail.jenis_kelamin;
        document.getElementById('mHp').textContent = detail.no_hp;
        document.getElementById('mSekolah').textContent = detail.asal_sekolah;
        document.getElementById('mAlamat').textContent = detail.alamat;

        // Render Status Badge
        const badgeClass = detail.status === 'draft' ? 'badge-pending' : (detail.status === 'diverifikasi' ? 'badge-approved' : (detail.status === 'rejected' ? 'badge-rejected' : 'badge-pending'));
        const iconClass = detail.status === 'diverifikasi' ? 'check' : (detail.status === 'rejected' ? 'times' : 'clock');
        const textStatus = detail.status === 'draft' || detail.status === 'submit' ? 'Menunggu' : (detail.status === 'diverifikasi' ? 'Diterima' : 'Ditolak');
        
        document.getElementById('mStatus').className = `badge ${badgeClass}`;
        document.getElementById('mStatus').innerHTML = `<i class="fas fa-${iconClass}"></i> ${textStatus}`;

        // Render Orang Tua
        if(detail.orang_tua) {
            document.getElementById('mAyah').textContent = detail.orang_tua.nama_ayah || '-';
            document.getElementById('mKerjaAyah').textContent = detail.orang_tua.pekerjaan_ayah || '-';
            document.getElementById('mIbu').textContent = detail.orang_tua.nama_ibu || '-';
            document.getElementById('mKerjaIbu').textContent = detail.orang_tua.pekerjaan_ibu || '-';
        }

        // Render Berkas (Loop dokumen)
        const tabBerkas = document.getElementById('tab-berkas');
        if(detail.dokumen && detail.dokumen.length > 0) {
            let htmlBerkas = '<div class="grid grid-cols-2 md:grid-cols-4 gap-4">';
            detail.dokumen.forEach(d => {
                htmlBerkas += `
                <a href="${d.url}" target="_blank" class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition block">
                    <i class="fas fa-file-alt text-2xl text-navy-400 mb-2"></i>
                    <p class="text-sm capitalize">${d.jenis.replace('_', ' ')}</p>
                </a>`;
            });
            // Tambah Bukti Pembayaran jika ada
            if(detail.pembayaran && detail.pembayaran.bukti_url) {
                htmlBerkas += `
                <a href="${detail.pembayaran.bukti_url}" target="_blank" class="bg-white/5 rounded-lg p-4 text-center cursor-pointer hover:bg-white/10 transition block">
                    <i class="fas fa-receipt text-2xl text-emerald-400 mb-2"></i>
                    <p class="text-sm">Bukti Pembayaran</p>
                    <p class="text-xs text-gray-400 mt-1">${detail.pembayaran.bank}</p>
                </a>`;
            }
            htmlBerkas += '</div>';
            tabBerkas.innerHTML = htmlBerkas;
        } else {
            tabBerkas.innerHTML = '<p class="text-center text-gray-400 py-4">Belum ada berkas yang diunggah.</p>';
        }

        // Atur Tombol Action
        const ba = document.getElementById('btnApprove'), br = document.getElementById('btnReject');
        const isPending = detail.status === 'submit' || detail.status === 'draft';
        ba.classList.toggle('hidden', !isPending);
        br.classList.toggle('hidden', !isPending);

        openModal('modalDetail');
    } catch (error) {
        showToast('Gagal memuat detail pendaftar', 'error');
    } finally {
        hideLoader();
    }
}

// ================= 3. API: UPDATE STATUS =================
async function executeUpdateStatus(id, status, keterangan = '') {
    try {
        showLoader();
        const response = await fetch(`${BASE_URL}/admin/pendaftarans/${id}/status`, { // Pastikan route sesuai
            method: 'PATCH', // atau POST jika route di web.php menggunakan post
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ status: status, keterangan: keterangan })
        });
        
        if (!response.ok) throw new Error('Gagal update status');
        const result = await response.json();
        
        showToast(result.message || 'Status berhasil diperbarui');
        closeModal('modalDetail');
        closeModal('modalReject');
        
        fetchDataPendaftar(); // Refresh Data Tabel
    } catch (error) {
        showToast('Terjadi kesalahan', 'error');
    } finally {
        hideLoader();
    }
}

// Handler Tombol Action
function approve() { if(currentPendaftar) executeUpdateStatus(currentPendaftar.id, 'diverifikasi'); }
function quickApprove(id) { if(confirm('Terima pendaftar ini?')) executeUpdateStatus(id, 'diverifikasi'); }
function openReject(id) { 
    if(id) currentPendaftar = { id: id }; // Set dummy ID jika dari tabel
    document.getElementById('reason').value = ''; 
    openModal('modalReject'); 
}
function submitReject() { 
    const r = document.getElementById('reason').value.trim(); 
    if(!r) return showToast('Isi alasan penolakan', 'error'); 
    executeUpdateStatus(currentPendaftar.id, 'rejected', r); 
}

// ================= RENDER UI FUNGSI =================
function renderTable() {
    const tb = document.getElementById('tableBody');
    const es = document.getElementById('emptyState');
    
    if (!dataPendaftar || dataPendaftar.length === 0) { 
        tb.innerHTML = ''; es.classList.remove('hidden'); updatePagUI(); return; 
    }
    
    es.classList.add('hidden');
    tb.innerHTML = dataPendaftar.map(d => {
        const bgStatus = d.status === 'draft' || d.status === 'submit' ? 'pending' : (d.status === 'diverifikasi' ? 'approved' : 'rejected');
        const iconStatus = d.status === 'diverifikasi' ? 'check' : (d.status === 'rejected' ? 'times' : 'clock');
        const txtStatus = d.status === 'draft' || d.status === 'submit' ? 'Menunggu' : (d.status === 'diverifikasi' ? 'Diterima' : 'Ditolak');
        const inisial = d.nama ? d.nama.split(' ').map(x=>x[0]).join('').slice(0,2).toUpperCase() : 'NN';

        return `
        <tr>
            <td class="text-center"><input type="checkbox" ${selectedIds.includes(d.id)?'checked':''} onchange="toggleSel(${d.id})" class="accent-navy-500"></td>
            <td class="font-mono text-xs text-navy-400 bg-navy-500/10 px-2 py-1 rounded w-fit">${d.no}</td>
            <td>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-navy rounded-lg flex items-center justify-center text-xs font-bold text-white">${inisial}</div>
                    <div><p class="font-medium text-sm text-white">${d.nama}</p><p class="text-xs text-gray-500">${d.nisn}</p></div>
                </div>
            </td>
            <td><span class="text-xs bg-navy-500/10 text-navy-300 px-2 py-1 rounded">${d.jurusan}</span></td>
            <td class="text-sm">${d.sekolah}</td>
            <td class="text-sm text-gray-400">${d.tanggal}</td>
            <td><span class="badge badge-${bgStatus}"><i class="fas fa-${iconStatus}"></i>${txtStatus}</span></td>
            <td class="text-center">
                <div class="flex justify-center gap-1">
                    <button onclick="viewDetail(${d.id})" class="btn-glass w-7 h-7 rounded flex items-center justify-center hover:text-navy-300"><i class="fas fa-eye text-xs"></i></button>
                    ${(d.status === 'submit' || d.status === 'draft') ? `<button onclick="quickApprove(${d.id})" class="btn-success w-7 h-7 rounded flex items-center justify-center"><i class="fas fa-check text-xs"></i></button><button onclick="openReject(${d.id})" class="btn-danger w-7 h-7 rounded flex items-center justify-center"><i class="fas fa-times text-xs"></i></button>` : ''}
                </div>
            </td>
        </tr>`
    }).join('');
    updatePagUI();
}

function updateStats(backendStats) {
    if(!backendStats) return;
    const { total, pending, approved, rejected } = backendStats;
    document.getElementById('stat-total').textContent = total; 
    document.getElementById('stat-pending').textContent = pending;
    document.getElementById('stat-approved').textContent = approved; 
    document.getElementById('stat-rejected').textContent = rejected;
    document.getElementById('nav-count').textContent = pending;
    
    document.getElementById('prog-pending').style.width = `${total ? (pending/total)*100 : 0}%`;
    document.getElementById('prog-approved').style.width = `${total ? (approved/total)*100 : 0}%`;
    document.getElementById('prog-rejected').style.width = `${total ? (rejected/total)*100 : 0}%`;
}

function updatePagUI() {
    document.getElementById('showingInfo').textContent = `Menampilkan halaman ${pagination.current_page} dari ${pagination.last_page} (${pagination.total} Total Data)`;
    const pg = document.getElementById('pagination'); 
    pg.innerHTML = '';
    
    for(let i = 1; i <= pagination.last_page; i++) {
        const b = document.createElement('button'); 
        b.textContent = i; 
        b.className = `w-8 h-8 rounded-lg text-sm transition ${i === pagination.current_page ? 'bg-navy-500 text-white shadow-glow' : 'btn-glass hover:text-white'}`;
        b.onclick = () => { fetchDataPendaftar({ page: i }); window.scrollTo({top:0,behavior:'smooth'}); };
        pg.appendChild(b);
    }
}

// Fitur Tambahan UI
function applyFilters() { fetchDataPendaftar({ page: 1 }); }
function resetFilters() { 
    document.getElementById('searchInput').value = ''; 
    document.getElementById('filterStatus').value = 'all'; 
    document.getElementById('filterJurusan').value = 'all'; 
    fetchDataPendaftar({ page: 1 }); 
}
function toggleSel(id) { selectedIds = selectedIds.includes(id) ? selectedIds.filter(i=>i!==id) : [...selectedIds, id]; updateBulkBtn(); }
function toggleSelectAll() { const all = document.getElementById('selectAll').checked; selectedIds = all ? dataPendaftar.map(d=>d.id) : []; updateBulkBtn(); renderTable(); }
function updateBulkBtn() { const c = document.getElementById('sel-count'), b = document.getElementById('btnBulk'); c.textContent = selectedIds.length; b.disabled = !selectedIds.length; b.classList.toggle('opacity-50', !selectedIds.length); b.classList.toggle('cursor-not-allowed', !selectedIds.length); }
function openBulk() { if(!selectedIds.length) return showToast('Pilih data dulu','error'); document.getElementById('bulkCount').textContent = selectedIds.length; openModal('modalBulk'); }
function exportData() { window.location.href = `${BASE_URL}/admin/pendaftarans/export?status=${document.getElementById('filterStatus').value}`; }

// Helper Modal & Tab
function switchTab(btn, id) { document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active')); document.querySelectorAll('.tab-content').forEach(c=>c.classList.remove('active')); btn.classList.add('active'); document.getElementById(id).classList.add('active'); }
function switchPage(pg) { document.querySelectorAll('.page-view').forEach(p => p.classList.remove('active')); document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active')); document.getElementById(`page-${pg}`).classList.add('active'); document.getElementById(`nav-${pg}`).classList.add('active'); }
function toggleSidebar() { document.getElementById('sidebar').classList.toggle('-translate-x-full'); document.getElementById('sidebarOverlay').classList.toggle('hidden'); }
function openModal(id) { document.getElementById(id).classList.add('active'); document.body.style.overflow='hidden'; }
function closeModal(id) { document.getElementById(id).classList.remove('active'); document.body.style.overflow=''; }
function showLoader() { document.getElementById('loader').classList.remove('hidden'); }
function hideLoader() { document.getElementById('loader').classList.add('hidden'); }
function showToast(msg, type='success') { const t = document.getElementById('toast'), ic = document.getElementById('toastIcon'), ti = document.getElementById('toastTitle'), ms = document.getElementById('toastMsg'); ic.className = `w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 ${type==='success'?'bg-emerald-500/20':'bg-rose-500/20'}`; ic.innerHTML = `<i class="fas fa-${type==='success'?'check':'exclamation'} ${type==='success'?'text-emerald-400':'text-rose-400'}"></i>`; ti.textContent = type==='success'?'Sukses':'Error'; ms.textContent = msg; t.classList.remove('translate-x-full'); setTimeout(()=>t.classList.add('translate-x-full'), 3000); }
  </script>

</body>
</html>  