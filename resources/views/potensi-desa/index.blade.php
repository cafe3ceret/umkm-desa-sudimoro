@extends('layouts.app')

@section('title', 'Potensi Desa Sudimoro')
@section('meta_description', 'Seluruh potensi unggulan Desa Sudimoro, Teras, Boyolali — kerajinan, pertanian, wisata dan lebih banyak.')

@section('content')

<!-- Page Header -->
<div class="pt-20 bg-gradient-to-br from-primary to-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <span class="inline-block px-4 py-2 bg-white/20 text-white font-semibold text-sm rounded-full mb-4">Potensi Desa</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">Potensi Desa Sudimoro</h1>
            <p class="text-blue-100 text-xl max-w-2xl mx-auto">
                Berbagai potensi unggulan desa yang siap dikembangkan dan dipromosikan menuju pasar yang lebih luas
            </p>
        </div>
    </div>
    <div class="overflow-hidden">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 60L1440 60L1440 20C1080 -10 720 50 360 10L0 0L0 60Z" fill="white"/>
        </svg>
    </div>
</div>

<!-- Content -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($potensis->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($potensis as $potensi)
            <div class="aos-fade-up group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <!-- Image -->
                <div class="relative h-52 overflow-hidden bg-gradient-to-br from-blue-100 to-blue-200">
                    @if($potensi->image)
                        <img src="{{ Storage::url($potensi->image) }}" alt="{{ $potensi->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    @endif
                    <!-- Overlay gradient on hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-200">
                        {{ $potensi->title }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">
                        {{ $potensi->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <!-- Empty state -->
        <div class="text-center py-24">
            <div class="w-24 h-24 rounded-3xl bg-blue-50 flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum ada data potensi</h3>
            <p class="text-gray-400 max-w-md mx-auto">Data potensi desa sedang dalam proses pengisian. Silakan kunjungi kembali.</p>
        </div>
        @endif

    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gradient-to-br from-primary to-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white mb-4">Tertarik dengan potensi kami?</h2>
        <p class="text-blue-100 text-lg mb-8">Temukan produk UMKM unggulan Desa Sudimoro</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('umkm') }}" class="px-8 py-4 bg-white text-primary font-bold rounded-2xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                Lihat Produk UMKM
            </a>
            <a href="{{ route('map') }}" class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-2xl hover:bg-white hover:text-primary transition-all duration-300">
                Peta Lokasi
            </a>
        </div>
    </div>
</section>

@endsection
