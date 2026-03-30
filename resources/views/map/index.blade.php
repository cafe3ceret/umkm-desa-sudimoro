@extends('layouts.app')

@section('title', 'Peta Lokasi')
@section('meta_description', 'Peta lokasi Desa Sudimoro Boyolali Jawa Tengah')

@section('content')

    <!-- Page Header -->
    <div class="pt-20 bg-gradient-to-br from-primary to-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <span class="inline-block px-4 py-2 bg-white/20 text-white font-semibold text-sm rounded-full mb-4">Lokasi
                    Kami</span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">Peta Lokasi</h1>
                <p class="text-blue-100 text-xl max-w-2xl mx-auto">Lokasi Desa Sudimoro, Teras, Boyolali, Jawa Tengah</p>
            </div>
        </div>
        <div class="overflow-hidden">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 60L1440 60L1440 20C1080 -10 720 50 360 10L0 0L0 60Z" fill="white" />
            </svg>
        </div>
    </div>

    <!-- Map Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Address Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="aos-fade-up bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Alamat</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $setting->address ?? 'Desa Sudimoro, Kec. Teras, Kab. Boyolali, Jawa Tengah' }}
                    </p>
                </div>

                <div class="aos-fade-up bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Telepon</h3>
                    <p class="text-gray-600 text-sm">{{ $setting->phone ?? '+6282247082583' }}</p>
                </div>

                <div class="aos-fade-up bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600 text-sm">{{ $setting->email ?? 'pemerintahsudimoro2005@gmail.com' }}</p>
                </div>
            </div>

            <!-- Google Maps Embed -->
            <div class="aos-fade-up rounded-3xl overflow-hidden shadow-2xl border border-gray-200">
                <div class="bg-primary px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-white font-semibold">Lokasi Desa Sudimoro, Teras, Boyolali</span>
                    </div>
                    <a href="https://maps.google.com/?q=Sudimoro+Teras+Boyolali" target="_blank"
                        class="text-white/70 hover:text-white text-xs font-medium flex items-center gap-1 transition-colors">
                        Buka Maps
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
                <div class="relative" style="height: 520px;">
                    <iframe src="https://www.google.com/maps?q=Sudimoro%20Teras%20Boyolali&output=embed" width="100%"
                        height="100%" style="border:0; position:absolute; inset:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Desa Sudimoro, Teras, Boyolali">
                    </iframe>
                </div>
            </div>

            <!-- Direction Button -->
            <div class="text-center mt-8 aos-fade-up">
                <a href="https://maps.google.com/?q=Sudimoro+Teras+Boyolali" target="_blank"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold rounded-2xl hover:bg-primary-dark hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </section>

@endsection