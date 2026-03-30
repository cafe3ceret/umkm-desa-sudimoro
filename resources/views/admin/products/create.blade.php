@extends('admin.layouts.sidebar')

@section('title', 'Tambah Produk')
@section('page_title', 'Tambah Produk')
@section('page_subtitle', 'Data produk UMKM baru')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Form Tambah Produk</h2>
        </div>

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="Contoh: Keripik Singkong Original">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm resize-none"
                          placeholder="Deskripsi singkat tentang produk">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
                <div class="flex items-center">
                    <span class="px-4 py-3 bg-gray-50 border border-r-0 border-gray-200 rounded-l-xl text-gray-500 text-sm font-medium">+62</span>
                    <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                           class="flex-1 px-4 py-3 border border-gray-200 rounded-r-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                           placeholder="6281234567890 (tanpa +)">
                </div>
                <p class="text-gray-400 text-xs mt-1">Format: 628xxxxxxxxxx (tanpa tanda + atau spasi)</p>
                @error('whatsapp') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            @include('admin.partials.image-upload', ['name' => 'image', 'label' => 'Foto Produk'])

            <div class="flex gap-4 pt-2">
                <button type="submit"
                        class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg transition-all duration-200">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}"
                   class="px-8 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
