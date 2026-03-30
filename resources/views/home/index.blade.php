@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Website resmi UMKM Desa Sudimoro Boyolali - Mendukung Produk Lokal Menuju Pasar Digital')

@section('content')

<!-- ====== HERO SLIDER ====== -->
<section class="hero-section relative h-screen min-h-[600px] overflow-hidden" x-data="heroSlider()">

    <!-- Slide Images / Gradient Backgrounds -->
    @if($sliders->count() > 0)
        @foreach($sliders as $index => $slider)
        <div class="absolute inset-0 transition-all duration-1000 ease-in-out"
             :class="currentSlide === {{ $index }} ? 'opacity-100 scale-100' : 'opacity-0 scale-105'">
            @if($slider->image)
                <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->title }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full" style="background: linear-gradient(135deg, #1e3a8a 0%, #1D4ED8 40%, #3B82F6 70%, #60a5fa 100%);">
                    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.3) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.2) 0%, transparent 40%);"></div>
                </div>
            @endif
        </div>
        @endforeach
    @else
        <div class="absolute inset-0" style="background: linear-gradient(135deg, #1e3a8a 0%, #1D4ED8 40%, #3B82F6 70%, #60a5fa 100%);">
            <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.3) 0%, transparent 50%);"></div>
        </div>
    @endif

    <!-- Blue Overlay -->
    <div class="absolute inset-0 bg-blue-900/50 z-10"></div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 right-0 z-10 overflow-hidden">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L1440 120L1440 60C1080 0 720 80 360 40L0 0L0 120Z" fill="white"/>
        </svg>
    </div>

    <!-- Hero Content -->
    <div class="relative z-20 h-full flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl">
                @if($sliders->count() > 0)
                    @foreach($sliders as $index => $slider)
                    <div x-show="currentSlide === {{ $index }}"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 translate-y-8"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full px-4 py-2 mb-6">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="text-white text-sm font-medium">Website UMKM Desa Sudimoro</span>
                        </div>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                            {{ $slider->title }}
                        </h1>
                    </div>
                    @endforeach
                @else
                    <div>
                        <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full px-4 py-2 mb-6">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="text-white text-sm font-medium">Website UMKM Desa Sudimoro</span>
                        </div>
                        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                            Website UMKM<br>Desa Sudimoro
                        </h1>
                    </div>
                @endif
                <p class="text-blue-100 text-xl md:text-2xl mb-10 leading-relaxed">
                    Mendukung Produk Lokal Menuju Pasar Digital
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('umkm') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary font-bold rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Lihat UMKM
                    </a>
                    <a href="{{ route('potensi') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-2xl hover:bg-white hover:text-primary transition-all duration-300">
                        Potensi Desa
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Dots -->
    @if($sliders->count() > 1)
    <div class="absolute bottom-28 left-1/2 -translate-x-1/2 z-20 flex gap-2">
        @foreach($sliders as $index => $slider)
        <button @click="goToSlide({{ $index }})"
                :class="currentSlide === {{ $index }} ? 'w-8 bg-white' : 'w-2 bg-white/50'"
                class="h-2 rounded-full transition-all duration-300"></button>
        @endforeach
    </div>
    @endif

    <!-- Slide Navigation Arrows -->
    @if($sliders->count() > 1)
    <button @click="prevSlide()" class="absolute left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center text-white hover:bg-white/30 transition-all duration-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="nextSlide()" class="absolute right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center text-white hover:bg-white/30 transition-all duration-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
    @endif
</section>

<!-- ====== STATS SECTION ====== -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $stats = [
                    ['value' => $potensis->count() . '+', 'label' => 'Bidang Potensi', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                    ['value' => $products->count() . '+', 'label' => 'Produk UMKM', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                    ['value' => '1', 'label' => 'Desa Digital', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['value' => '100%', 'label' => 'Produk Lokal', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                ];
            @endphp
            @foreach($stats as $stat)
            <div class="aos-fade-up text-center p-6 rounded-2xl bg-gradient-to-br from-blue-50 to-white border border-blue-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                    </svg>
                </div>
                <div class="text-3xl font-extrabold text-primary mb-1">{{ $stat['value'] }}</div>
                <div class="text-gray-500 text-sm font-medium">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ====== POTENSI SECTION ====== -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 aos-fade-up">
            <span class="inline-block px-4 py-2 bg-blue-100 text-primary font-semibold text-sm rounded-full mb-4">Potensi Desa</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Potensi UMKM Desa</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Berbagai potensi unggulan yang dimiliki Desa Sudimoro dan siap untuk dikembangkan bersama</p>
        </div>

        @if($potensis->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($potensis as $potensi)
            <div class="aos-fade-up group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center overflow-hidden relative">
                    @if($potensi->image)
                        <img src="{{ Storage::url($potensi->image) }}" alt="{{ $potensi->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors duration-200">{{ $potensi->title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">{{ $potensi->description }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 aos-fade-up">
            <a href="{{ route('potensi') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white font-bold rounded-2xl hover:bg-primary-dark hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                Lihat Semua Potensi
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- ====== PRODUK UNGGULAN ====== -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 aos-fade-up">
            <span class="inline-block px-4 py-2 bg-blue-100 text-primary font-semibold text-sm rounded-full mb-4">Produk Lokal</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Produk Unggulan UMKM Lokal</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Temukan berbagai produk berkualitas tinggi dari para pelaku UMKM Desa Sudimoro</p>
        </div>

        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="aos-fade-up group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <!-- Product Image -->
                <div class="relative h-52 overflow-hidden">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    @endif
                    <!-- Badge -->
                    <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">UMKM</span>
                </div>

                <!-- Product Info -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors duration-200">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5 line-clamp-2">{{ $product->description }}</p>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <a href="{{ route('umkm') }}"
                           class="flex-1 text-center px-4 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-all duration-200">
                            Lihat Selengkapnya
                        </a>
                        @if($product->whatsapp)
                        <a href="https://wa.me/{{ $product->whatsapp }}" target="_blank"
                           class="px-3 py-2.5 bg-green-50 text-green-600 rounded-xl hover:bg-green-100 transition-all duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 aos-fade-up">
            <a href="{{ route('umkm') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white font-bold rounded-2xl hover:bg-primary-dark hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- ====== CTA SECTION ====== -->
<section class="py-20 bg-gradient-to-br from-primary to-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="aos-fade-up">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6">Bergabung Bersama Kami</h2>
            <p class="text-blue-100 text-xl mb-10">Temukan lokasi strategis dan potensi Desa Sudimoro yang menunggu untuk dikembangkan</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('map') }}" class="px-8 py-4 bg-white text-primary font-bold rounded-2xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    Lihat Peta Lokasi
                </a>
                <a href="{{ route('umkm') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-2xl hover:bg-white hover:text-primary transition-all duration-300">
                    Jelajahi UMKM
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function heroSlider() {
    return {
        currentSlide: 0,
        totalSlides: {{ $sliders->count() > 0 ? $sliders->count() : 1 }},
        autoSlideInterval: null,

        init() {
            if (this.totalSlides > 1) {
                this.startAutoSlide();
            }
        },

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.nextSlide();
            }, 5000);
        },

        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        },

        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        },

        goToSlide(index) {
            clearInterval(this.autoSlideInterval);
            this.currentSlide = index;
            this.startAutoSlide();
        }
    }
}
</script>
@endpush
