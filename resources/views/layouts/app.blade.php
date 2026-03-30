<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website resmi UMKM Desa Sudimoro - Mendukung Produk Lokal Menuju Pasar Digital')">
    <title>@yield('title', 'UMKM Desa Sudimoro') | {{ $setting->village_name ?? 'UMKM Desa Sudimoro' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                        'primary-light': '#3B82F6',
                        'primary-dark': '#1e40af',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Page Loader */
        #page-loader {
            position: fixed; inset: 0; z-index: 9999;
            background: linear-gradient(135deg, #1D4ED8, #3B82F6);
            display: flex; align-items: center; justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #page-loader.hidden { opacity: 0; visibility: hidden; }
        .loader-ring {
            width: 56px; height: 56px;
            border: 4px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Navbar transition */
        #navbar {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #navbar.scrolled {
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 24px rgba(29,78,216,0.10);
        }
        #navbar.transparent { background: transparent; }

        /* Animate on scroll */
        .aos-fade-up {
            opacity: 0; transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .aos-fade-up.visible {
            opacity: 1; transform: translateY(0);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased" x-data="{ mobileMenu: false }">

    <!-- ====== PAGE LOADER ====== -->
    <div id="page-loader">
        <div class="text-center">
            <div class="loader-ring mx-auto mb-4"></div>
            <p class="text-white font-semibold text-lg tracking-wide">UMKM Desa Sudimoro</p>
        </div>
    </div>

    <!-- ====== NAVBAR ====== -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                @php
                    use Illuminate\Support\Facades\Storage;
                    $navSetting = isset($setting) ? $setting : \App\Models\SiteSetting::getSetting();
                @endphp
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    @if($navSetting->logo)
                        <img src="{{ Storage::url($navSetting->logo) }}" alt="Logo" class="h-9 md:h-10 lg:h-11 w-auto object-contain">
                    @else
                        <div class="h-9 w-9 md:h-10 md:w-10 lg:h-11 lg:w-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-lg">
                            <span class="text-white font-black text-lg">U</span>
                        </div>
                    @endif
                    <div>
                        <span id="nav-title" class="font-bold text-lg leading-tight block text-white transition-colors duration-300">UMKM</span>
                        <span id="nav-subtitle" class="text-xs leading-tight block text-blue-100 transition-colors duration-300">Desa Sudimoro</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-1" id="desktop-nav">
                    <a href="{{ route('home') }}"
                       class="nav-link px-4 py-2 rounded-xl font-semibold text-sm transition-all duration-200 text-white hover:bg-white/20 {{ request()->routeIs('home') ? 'bg-white/20' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('potensi') }}"
                       class="nav-link px-4 py-2 rounded-xl font-semibold text-sm transition-all duration-200 text-white hover:bg-white/20 {{ request()->routeIs('potensi') ? 'bg-white/20' : '' }}">
                        Potensi
                    </a>
                    <a href="{{ route('umkm') }}"
                       class="nav-link px-4 py-2 rounded-xl font-semibold text-sm transition-all duration-200 text-white hover:bg-white/20 {{ request()->routeIs('umkm') ? 'bg-white/20' : '' }}">
                        UMKM
                    </a>
                    <a href="{{ route('map') }}"
                       class="nav-link px-4 py-2 rounded-xl font-semibold text-sm transition-all duration-200 text-white hover:bg-white/20 {{ request()->routeIs('map') ? 'bg-white/20' : '' }}">
                        Peta
                    </a>

                </div>

                <!-- Mobile Hamburger -->
                <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-xl" id="hamburger-btn">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <template x-if="!mobileMenu">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </template>
                        <template x-if="mobileMenu">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </template>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="md:hidden pb-4" id="mobile-nav">
                <div class="bg-white rounded-2xl shadow-2xl p-4 space-y-1">
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-semibold text-sm text-gray-700 hover:bg-blue-50 hover:text-primary transition-all {{ request()->routeIs('home') ? 'bg-blue-50 text-primary' : '' }}">Beranda</a>
                    <a href="{{ route('potensi') }}" class="block px-4 py-3 rounded-xl font-semibold text-sm text-gray-700 hover:bg-blue-50 hover:text-primary transition-all {{ request()->routeIs('potensi') ? 'bg-blue-50 text-primary' : '' }}">Potensi</a>
                    <a href="{{ route('umkm') }}" class="block px-4 py-3 rounded-xl font-semibold text-sm text-gray-700 hover:bg-blue-50 hover:text-primary transition-all {{ request()->routeIs('umkm') ? 'bg-blue-50 text-primary' : '' }}">UMKM</a>
                    <a href="{{ route('map') }}" class="block px-4 py-3 rounded-xl font-semibold text-sm text-gray-700 hover:bg-blue-50 hover:text-primary transition-all {{ request()->routeIs('map') ? 'bg-blue-50 text-primary' : '' }}">Peta</a>

                </div>
            </div>
        </div>
    </nav>

    <!-- ====== MAIN CONTENT ====== -->
    <main>
        @yield('content')
    </main>

    <!-- ====== FOOTER ====== -->
    @include('layouts.partials.footer')

    <!-- ====== SCRIPTS ====== -->
    <script>
        // Page Loader
        window.addEventListener('load', () => {
            const loader = document.getElementById('page-loader');
            setTimeout(() => loader.classList.add('hidden'), 600);
        });

        // Smart Navbar
        const navbar = document.getElementById('navbar');
        const navLinks = document.querySelectorAll('.nav-link');
        const navTitle = document.getElementById('nav-title');
        const navSubtitle = document.getElementById('nav-subtitle');
        const isHeroPage = {{ request()->routeIs('home') ? 'true' : 'false' }};

        function updateNavbar() {
            const scrollY = window.scrollY;
            const heroSection = document.querySelector('.hero-section');
            const heroHeight = heroSection ? heroSection.offsetHeight : 0;

            if (isHeroPage && scrollY < heroHeight - 80) {
                navbar.classList.add('transparent');
                navbar.classList.remove('scrolled');
                navLinks.forEach(l => {
                    l.style.color = 'white';
                });
                navTitle.style.color = 'white';
                navSubtitle.style.color = 'rgb(191 219 254)';
            } else {
                navbar.classList.remove('transparent');
                navbar.classList.add('scrolled');
                navLinks.forEach(l => {
                    l.style.color = '#1D4ED8';
                });
                navTitle.style.color = '#111827';
                navSubtitle.style.color = '#6B7280';
            }
        }

        if (!isHeroPage) {
            navbar.classList.remove('transparent');
            navbar.classList.add('scrolled');
            navLinks.forEach(l => { l.style.color = '#1D4ED8'; });
            navTitle.style.color = '#111827';
            navSubtitle.style.color = '#6B7280';
        }

        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar();

        // Animate on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.aos-fade-up').forEach(el => observer.observe(el));
    </script>
    @stack('scripts')
</body>
</html>
