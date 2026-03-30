@extends('layouts.app')

@section('title', 'Potensi UMKM')
@section('meta_description', 'Potensi UMKM unggulan Desa Sudimoro Boyolali')

@section('content')

<!-- Page Header -->
<div class="pt-20 bg-gradient-to-br from-primary to-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <span class="inline-block px-4 py-2 bg-white/20 text-white font-semibold text-sm rounded-full mb-4">Desa Sudimoro</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">Potensi UMKM</h1>
            <p class="text-blue-100 text-xl max-w-2xl mx-auto">Mengenal lebih dalam potensi dan keunggulan yang dimiliki Desa Sudimoro</p>
        </div>
    </div>
    <div class="overflow-hidden">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 60L1440 60L1440 20C1080 -10 720 50 360 10L0 0L0 60Z" fill="white"/>
        </svg>
    </div>
</div>

<!-- Potensi Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($potensis->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($potensis as $potensi)
            <div class="aos-fade-up group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="h-52 overflow-hidden relative">
                    @if($potensi->image)
                        <img src="{{ Storage::url($potensi->image) }}" alt="{{ $potensi->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-200">{{ $potensi->title }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $potensi->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <p class="text-gray-500 text-lg">Belum ada data potensi.</p>
        </div>
        @endif
    </div>
</section>

@endsection
