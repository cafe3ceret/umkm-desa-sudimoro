@extends('admin.layouts.sidebar')

@section('title', 'Edit Slider')
@section('page_title', 'Edit Slider')
@section('page_subtitle', 'Ubah slide hero section')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Form Edit Slider</h2>
        </div>

        <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Judul Slider <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title', $slider->title) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $slider->order) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm">
                @error('order') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer" x-data="{ checked: {{ $slider->is_active ? 'true' : 'false' }} }">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" x-model="checked" {{ $slider->is_active ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    <span class="ml-3 text-sm font-semibold text-gray-700">Slider Aktif</span>
                </label>
            </div>

            @include('admin.partials.image-upload', ['name' => 'image', 'label' => 'Gambar Slider', 'current' => $slider->image])

            <div class="flex gap-4 pt-2">
                <button type="submit"
                        class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg transition-all duration-200">
                    Perbarui Slider
                </button>
                <a href="{{ route('admin.sliders.index') }}"
                   class="px-8 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
