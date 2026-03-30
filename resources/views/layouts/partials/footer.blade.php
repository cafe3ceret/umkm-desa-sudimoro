@php
    use Illuminate\Support\Facades\Storage;
    $footerSetting = isset($setting) ? $setting : \App\Models\SiteSetting::getSetting();
@endphp
<footer class="bg-gradient-to-br from-gray-900 to-blue-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <!-- Column 1: Logo & Address -->
            <div>
                <div class="flex items-center gap-3 mb-6">
                    @if($footerSetting->logo)
                        <img src="{{ Storage::url($footerSetting->logo) }}" alt="Logo"
                            class="h-11 md:h-12 lg:h-14 w-auto object-contain mb-3">
                    @else
                        <div
                            class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <span class="text-white font-black text-xl">U</span>
                        </div>
                    @endif
                    <div>
                        <h3 class="font-bold text-xl">{{ $footerSetting->village_name }}</h3>
                        <p class="text-blue-300 text-sm">UMKM Digital Desa</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    {{ $footerSetting->address ?? 'Desa Sudimoro, Kec. Musuk, Kab. Boyolali, Jawa Tengah' }}
                </p>
                @if($footerSetting->phone)
                    <p class="mt-3 text-gray-400 text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        {{ $footerSetting->phone }}
                    </p>
                @endif
            </div>

            <!-- Column 2: Menu Links -->
            <div>
                <h4 class="font-bold text-lg mb-6 text-white">Menu</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200 text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span> Beranda
                        </a></li>
                    <li><a href="{{ route('potensi') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200 text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span> Potensi UMKM
                        </a></li>
                    <li><a href="{{ route('umkm') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200 text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span> Produk UMKM
                        </a></li>
                    <li><a href="{{ route('map') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-200 text-sm flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span> Peta Lokasi
                        </a></li>
                </ul>
            </div>

            <!-- Column 3: Contact -->
            <div>
                <h4 class="font-bold text-lg mb-6 text-white">Hubungi Kami</h4>
                @if($footerSetting->email)
                    <a href="mailto:{{ $footerSetting->email }}"
                        class="flex items-center gap-3 text-gray-400 hover:text-white transition-colors duration-200 mb-4">
                        <div class="w-9 h-9 rounded-xl bg-blue-800/50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-sm">{{ $footerSetting->email }}</span>
                    </a>
                @endif
                <div class="mt-6">
                    <p class="text-gray-500 text-xs mb-3">Ikuti Kami</p>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/photo.php?fbid=400979828336995&set=a.151204379981209&type=3&mibextid=rS40aB7S9Ucbxw6v"
                            class="w-9 h-9 rounded-xl bg-blue-800/50 hover:bg-blue-600 flex items-center justify-center transition-all duration-200">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/sudimoropemdes?igsh=MWZ2OW04enhreXcyMg=="
                            class="w-9 h-9 rounded-xl bg-blue-800/50 hover:bg-pink-600 flex items-center justify-center transition-all duration-200">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ $footerSetting->village_name }}. Hak cipta dilindungi.
            </p>
            <p class="text-gray-600 text-xs">
                Dibangun dengan ❤️ untuk kemajuan desa
            </p>
        </div>
    </div>
</footer>