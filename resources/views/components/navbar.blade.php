{{-- Navbar --}}
<header class="sticky top-0 z-50 border-b border-gray-200 dark:border-gray-800 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-sm">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex-shrink-0 text-xl font-bold">
            <span class="font-bold text-gray-800 dark:text-gray-200">SMK</span>
            <span class="text-blue-800 dark:text-blue-400">BPM</span>
        </a>
        
        {{-- Desktop Navigation --}}
        <nav class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm font-medium">
                <li>
                    <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white font-semibold' : '' }}" 
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white {{ request()->routeIs('tentang_sekolah') ? 'text-gray-900 dark:text-white font-semibold' : '' }}" 
                       href="{{ route('tentang_sekolah') }}">
                        Tentang Sekolah
                    </a>
                </li>
                <li>
                    <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white {{ request()->routeIs('informasi') ? 'text-gray-900 dark:text-white font-semibold' : '' }}" 
                       href="{{ route('informasi') }}">
                        Informasi
                    </a>
                </li>
                <li>
                    <a class="text-gray-600 transition hover:text-gray-800 dark:text-gray-300 dark:hover:text-white {{ request()->routeIs('pendaftaran.create') ? 'text-gray-900 dark:text-white font-semibold' : '' }}" 
                       href="{{ route('pendaftaran.create') }}">
                        Pendaftaran
                    </a>
                </li>
            </ul>
        </nav>
        
        {{-- Right Side: Dark Mode + Auth Section --}}
        <div class="hidden sm:flex items-center gap-3">
            
            {{-- Dark Mode Toggle (untuk semua user) --}}
            <button id="dark-mode-toggle" class="p-2 rounded-lg text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition" aria-label="Toggle dark mode">
                <i class="fas fa-moon dark:hidden"></i>
                <i class="fas fa-sun hidden dark:inline"></i>
            </button>
            
            {{-- KONDISI 1: User Sudah Login --}}
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

                    {{-- Dropdown Menu --}}
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 z-50">
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            <span class="inline-block mt-1 px-2 py-0.5 text-xs font-medium bg-primary-100 text-primary-700 rounded-full">
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </div>

                        <div class="py-2">
                            <a href="{{ route('pendaftaran.status') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <i class="fas fa-clipboard-list w-5 text-primary-600"></i>
                                <span class="ml-3">Status Pendaftaran</span>
                            </a>

                            @if(!\App\Models\Pendaftaran::where('user_id', Auth::id())->exists())
                            <a href="{{ route('pendaftaran.create') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <i class="fas fa-edit w-5 text-blue-600"></i>
                                <span class="ml-3">Isi Pendaftaran</span>
                            </a>
                            @endif

                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <i class="fas fa-tachometer-alt w-5 text-green-600"></i>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700"></div>

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
            
            {{-- KONDISI 2: User Belum Login --}}
            @else
                <div class="flex items-center gap-2">
                    <a href="{{ route('registrasi') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 transition">
                        Registrasi
                    </a>
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition">
                        Login
                    </a>
                </div>
            @endauth
        </div>
        
        {{-- Mobile Menu Button --}}
        <button id="mobile-menu-button" class="md:hidden p-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('home') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Home</a>
            <a href="{{ route('tentang_sekolah') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('tentang_sekolah') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Tentang Sekolah</a>
            <a href="{{ route('informasi') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('informasi') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Informasi</a>
            <a href="{{ route('pendaftaran.create') }}" class="block py-3 px-4 text-base font-medium {{ request()->routeIs('pendaftaran.create') ? 'text-gray-900 dark:text-white border-l-4 border-blue-700 dark:border-blue-500 bg-blue-50 dark:bg-blue-900/20 rounded-r-lg' : 'text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800' }}">Pendaftaran</a>
        </div>
    </div>
</header>

{{-- Script untuk toggle dropdown & mobile menu --}}
@push('scripts')
<script>
    function toggleProfileDropdown() {
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('hidden');
    }
    
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profileDropdown');
        const menu = document.getElementById('profileMenu');
        if (dropdown && !dropdown.contains(e.target)) {
            menu?.classList.add('hidden');
        }
    });
</script>
@endpush
{{-- End Navbar --}}