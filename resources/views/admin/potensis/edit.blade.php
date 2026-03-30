@extends('admin.layouts.sidebar')

@section('title', 'Edit Potensi')
@section('page_title', 'Edit Potensi')
@section('page_subtitle', 'Ubah data potensi desa')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Form Edit Potensi</h2>
        </div>

        <form method="POST" action="{{ route('admin.potensis.update', $potensi) }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Potensi <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $potensi->title) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm resize-none">{{ old('description', $potensi->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $potensi->order) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
            </div>

            @include('admin.partials.image-upload', ['name' => 'image', 'label' => 'Gambar Potensi', 'current' => $potensi->image])

            <div class="flex gap-4 pt-2">
                <button type="submit"
                        class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg transition-all duration-200">
                    Perbarui Potensi
                </button>
                <a href="{{ route('admin.potensis.index') }}"
                   class="px-8 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
