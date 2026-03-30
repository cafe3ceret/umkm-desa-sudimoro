@extends('admin.layouts.sidebar')

@section('title', 'Tambah Potensi Desa')
@section('page_title', 'Tambah Potensi Desa')
@section('page_subtitle', 'Buat data potensi desa baru')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Form Tambah Potensi</h2>
            <p class="text-gray-400 text-sm mt-1">Isi data potensi desa dengan lengkap</p>
        </div>

        <form method="POST" action="{{ route('admin.potensi-desa.store') }}"
              enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Potensi <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="Contoh: Kerajinan Tangan Bambu">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="5"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm resize-none"
                          placeholder="Tuliskan deskripsi lengkap potensi desa ini...">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0"
                       class="w-32 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="0">
                <p class="text-gray-400 text-xs mt-1">Angka kecil = tampil lebih dulu</p>
            </div>

            <!-- Image Upload with Preview -->
            <div x-data="{ preview: null, isDragging: false }">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Foto Potensi
                    <span class="font-normal text-gray-400">(Maks. 4MB — Auto resize ke 1200px)</span>
                </label>

                <!-- Drop Zone -->
                <label for="image"
                       class="relative block cursor-pointer"
                       @dragover.prevent="isDragging = true"
                       @dragleave.prevent="isDragging = false"
                       @drop.prevent="
                           isDragging = false;
                           const file = $event.dataTransfer.files[0];
                           if (file) {
                               $refs.imageInput.files = $event.dataTransfer.files;
                               preview = URL.createObjectURL(file);
                           }">
                    <!-- Preview -->
                    <div x-show="preview" class="mb-3">
                        <img :src="preview" class="w-full max-h-56 object-cover rounded-xl border border-gray-200">
                    </div>

                    <!-- Upload area -->
                    <div :class="isDragging ? 'border-primary bg-blue-50' : 'border-gray-200 hover:border-primary hover:bg-blue-50/30'"
                         class="border-2 border-dashed rounded-xl p-8 text-center transition-all duration-200">
                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm text-gray-500">
                            <span class="font-semibold text-primary">Klik untuk pilih</span> atau drag & drop
                        </p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP</p>
                    </div>
                </label>

                <input type="file" id="image" name="image" x-ref="imageInput" accept="image/*" class="hidden"
                       @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                        class="px-7 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg shadow-blue-200 transition-all duration-200">
                    Simpan Potensi
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
