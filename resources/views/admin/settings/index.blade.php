@extends('admin.layouts.sidebar')

@section('title', 'Site Settings')
@section('page_title', 'Site Settings')
@section('page_subtitle', 'Pengaturan informasi website desa')

@section('admin_content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Pengaturan Website</h2>
            <p class="text-gray-400 text-sm mt-1">Data ini akan ditampilkan di navbar, footer, dan halaman peta</p>
        </div>

        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf @method('PUT')

            <div>
                <label for="village_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Desa / Website <span class="text-red-500">*</span></label>
                <input type="text" id="village_name" name="village_name" value="{{ old('village_name', $setting->village_name) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="UMKM Desa Sudimoro">
                @error('village_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                <textarea id="address" name="address" rows="3"
                          class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm resize-none"
                          placeholder="Desa Sudimoro, Kec. Musuk, Kab. Boyolali, Jawa Tengah 57381">{{ old('address', $setting->address) }}</textarea>
                @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Kontak</label>
                <input type="email" id="email" name="email" value="{{ old('email', $setting->email) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="info@desasudimoro.desa.id">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-200 text-sm"
                       placeholder="+62 812-3456-7890">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            @include('admin.partials.image-upload', ['name' => 'logo', 'label' => 'Logo Desa', 'current' => $setting->logo])

            <div class="pt-2">
                <button type="submit"
                        class="px-8 py-3 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg transition-all duration-200">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
