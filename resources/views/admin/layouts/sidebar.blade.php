<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin UMKM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link.active, .sidebar-link:hover {
            background: rgba(255,255,255,0.15);
            padding-left: 1.5rem;
        }
        .sidebar-link.active { background: rgba(255,255,255,0.2); }
    </style>
    @stack('styles')
</head>
<body class="h-full bg-gray-100 antialiased" x-data="{ sidebarOpen: false }">

<div class="flex h-full min-h-screen">

    <!-- ====== SIDEBAR ====== -->
    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-20 lg:hidden"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
    </div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed lg:static lg:translate-x-0 inset-y-0 left-0 z-30 w-64 flex-shrink-0 transition-transform duration-300 ease-in-out"
           style="background: linear-gradient(180deg, #1e40af 0%, #1D4ED8 50%, #2563eb 100%);">

        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            @php
                use Illuminate\Support\Facades\Storage;
                $sidebarSetting = \App\Models\SiteSetting::getSetting();
            @endphp
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3">
                @if($sidebarSetting->logo)
                    <img src="{{ Storage::url($sidebarSetting->logo) }}" alt="Logo" class="h-9 md:h-10 w-auto object-contain">
                @else
                    <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-white/20 flex items-center justify-center">
                        <span class="text-white font-black text-lg">U</span>
                    </div>
                @endif
                <div>
                    <div class="text-white font-bold text-sm leading-tight">Desa Sudimoro</div>
                    <div class="text-blue-200 text-xs">Admin Panel</div>
                </div>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-1 flex-1 overflow-y-auto">
            <div class="text-blue-300 text-xs font-semibold uppercase tracking-wider px-4 py-2 mb-2">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            <div class="text-blue-300 text-xs font-semibold uppercase tracking-wider px-4 py-2 mt-4 mb-2">Konten</div>

            <a href="{{ route('admin.sliders.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Slider Manager
            </a>

            <a href="{{ route('admin.potensis.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.potensis*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                Potensi Manager
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Produk UMKM
            </a>

            <div class="text-blue-300 text-xs font-semibold uppercase tracking-wider px-4 py-2 mt-4 mb-2">Pengaturan</div>

            <a href="{{ route('admin.settings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Site Settings
            </a>
        </nav>

        <!-- User Info -->
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-3 py-3 rounded-xl bg-white/10">
                <div class="w-9 h-9 rounded-full bg-white/30 flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white font-semibold text-sm truncate">{{ Auth::user()->name }}</div>
                    <div class="text-blue-200 text-xs truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- ====== MAIN CONTENT ====== -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 shadow-sm flex-shrink-0">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-xl text-gray-500 hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900">@yield('page_title', 'Dashboard')</h1>
                        <p class="text-gray-400 text-xs">@yield('page_subtitle', 'Selamat datang di panel admin')</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank"
                       class="hidden md:flex items-center gap-2 px-4 py-2 text-sm text-gray-600 border border-gray-200 rounded-xl hover:border-primary hover:text-primary transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Lihat Website
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 border border-red-200 rounded-xl hover:bg-red-50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="mx-6 mt-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3" x-data="{ show: true }" x-show="show">
            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
            <button @click="show = false" class="ml-auto text-green-400 hover:text-green-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl flex items-center gap-3" x-data="{ show: true }" x-show="show">
            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-sm font-medium">{{ session('error') }}</span>
            <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('admin_content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
