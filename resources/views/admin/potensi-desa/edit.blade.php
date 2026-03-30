@extends('admin.layouts.sidebar')

@section('title', 'Edit Potensi Desa')
@section('page_title', 'Edit Potensi Desa')
@section('page_subtitle', 'Perbarui data potensi desa')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Edit: {{ $potensiDesa->title }}</h2>
            <p class="text-gray-400 text-sm mt-1">Perbarui informasi potensi desa</p>
        </div>

        <form method="POST" action="{{ route('admin.potensi-desa.update', $potensiDesa) }}"
              enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Potensi <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title', $potensiDesa->title) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="5"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm resize-none">{{ old('description', $potensiDesa->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $potensiDesa->order) }}" min="0"
                       class="w-32 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
            </div>

            <!-- Current Image + Upload New -->
            <div x-data="{ preview: null }">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Foto Potensi
                    <span class="font-normal text-gray-400">(Kosongkan = tidak ganti foto)</span>
                </label>

                @if($potensiDesa->image)
                <div class="mb-4">
                    <p class="text-xs text-gray-400 mb-2 font-medium uppercase tracking-wider">Foto Saat Ini</p>
                    <img src="{{ Storage::url($potensiDesa->image) }}" alt="{{ $potensiDesa->title }}"
                         class="w-full max-h-52 object-cover rounded-xl border border-gray-200">
                </div>
                @endif

                <!-- New Image Preview -->
                <div x-show="preview" class="mb-3">
                    <p class="text-xs text-gray-400 mb-2 font-medium uppercase tracking-wider">Foto Baru</p>
                    <img :src="preview" class="w-full max-h-52 object-cover rounded-xl border border-primary/30 ring-2 ring-primary/20">
                </div>

                <label for="image" class="block cursor-pointer">
                    <div class="border-2 border-dashed border-gray-200 hover:border-primary hover:bg-blue-50/30 rounded-xl p-6 text-center transition-all duration-200">
                        <svg class="w-7 h-7 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm text-gray-500"><span class="font-semibold text-primary">Pilih foto baru</span></p>
                        <p class="text-xs text-gray-400 mt-0.5">PNG, JPG, WEBP — Maks. 4MB</p>
                    </div>
                </label>
                <input type="file" id="image" name="image" accept="image/*" class="hidden"
                       @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                        class="px-7 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg shadow-blue-200 transition-all duration-200">
                    Update Potensi
                </button>
                <a href="{{ route('admin.potensi-desa.index') }}"
                   class="px-6 py-3 text-gray-600 border border-gray-200 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
