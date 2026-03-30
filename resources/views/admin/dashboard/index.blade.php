@extends('admin.layouts.sidebar')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan data & statistik website')

@section('admin_content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <span class="text-3xl font-extrabold text-primary">{{ $stats['sliders'] }}</span>
        </div>
        <h3 class="font-semibold text-gray-700">Total Slider</h3>
        <p class="text-gray-400 text-sm mt-1">Slide aktif di hero section</p>
        <a href="{{ route('admin.sliders.index') }}" class="inline-flex items-center gap-1 text-primary text-sm font-medium mt-3 hover:underline">
            Kelola <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <span class="text-3xl font-extrabold text-green-600">{{ $stats['potensis'] }}</span>
        </div>
        <h3 class="font-semibold text-gray-700">Total Potensi</h3>
        <p class="text-gray-400 text-sm mt-1">Bidang potensi desa</p>
        <a href="{{ route('admin.potensis.index') }}" class="inline-flex items-center gap-1 text-green-600 text-sm font-medium mt-3 hover:underline">
            Kelola <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <span class="text-3xl font-extrabold text-purple-600">{{ $stats['products'] }}</span>
        </div>
        <h3 class="font-semibold text-gray-700">Total Produk</h3>
        <p class="text-gray-400 text-sm mt-1">Produk UMKM aktif</p>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1 text-purple-600 text-sm font-medium mt-3 hover:underline">
            Kelola <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
    <h2 class="text-lg font-bold text-gray-900 mb-5">Aksi Cepat</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('admin.sliders.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-primary hover:bg-blue-50 transition-all duration-200 group">
            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
                <svg class="w-5 h-5 text-primary group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <span class="text-sm font-semibold text-gray-700 text-center">Tambah Slider</span>
        </a>
        <a href="{{ route('admin.potensis.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all duration-200 group">
            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-500 group-hover:text-white transition-all">
                <svg class="w-5 h-5 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <span class="text-sm font-semibold text-gray-700 text-center">Tambah Potensi</span>
        </a>
        <a href="{{ route('admin.products.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-purple-500 hover:bg-purple-50 transition-all duration-200 group">
            <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-all">
                <svg class="w-5 h-5 text-purple-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <span class="text-sm font-semibold text-gray-700 text-center">Tambah Produk</span>
        </a>
        <a href="{{ route('admin.settings.index') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-orange-500 hover:bg-orange-50 transition-all duration-200 group">
            <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-all">
                <svg class="w-5 h-5 text-orange-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <span class="text-sm font-semibold text-gray-700 text-center">Pengaturan</span>
        </a>
    </div>
</div>

<!-- Welcome Card -->
<div class="bg-gradient-to-br from-primary to-blue-600 rounded-2xl p-8 text-white">
    <div class="flex flex-col md:flex-row items-center gap-6">
        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center flex-shrink-0">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-xl font-bold mb-2">Selamat datang, {{ Auth::user()->name }}! 👋</h3>
            <p class="text-blue-100">Kelola konten website UMKM Desa Sudimoro dari sini. Gunakan menu sidebar untuk mengatur slider, potensi, produk, dan pengaturan website.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank"
           class="flex-shrink-0 px-6 py-3 bg-white text-primary font-bold rounded-xl hover:shadow-xl transition-all duration-200">
            Lihat Website
        </a>
    </div>
</div>

@endsection
