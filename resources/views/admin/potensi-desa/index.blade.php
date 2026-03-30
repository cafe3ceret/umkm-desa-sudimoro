@extends('admin.layouts.sidebar')

@section('title', 'Potensi Desa')
@section('page_title', 'Potensi Desa')
@section('page_subtitle', 'Kelola data potensi desa')

@section('admin_content')

<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Daftar Potensi Desa</h2>
            <p class="text-gray-400 text-sm mt-1">{{ $potensis->count() }} data terdaftar</p>
        </div>
        <a href="{{ route('admin.potensi-desa.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white font-bold rounded-xl hover:bg-primary-dark shadow-lg shadow-blue-200 transition-all duration-200 hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Potensi
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if($potensis->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider w-10">#</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider w-20">Foto</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider hidden md:table-cell">Deskripsi</th>
                        <th class="text-left px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider hidden sm:table-cell">Tanggal</th>
                        <th class="text-right px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($potensis as $i => $potensi)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-6 py-4 text-gray-400 text-sm font-medium">{{ $i + 1 }}</td>
                        <td class="px-6 py-4">
                            @if($potensi->image)
                                <img src="{{ Storage::url($potensi->image) }}" alt="{{ $potensi->title }}"
                                     class="w-16 h-12 object-cover rounded-xl shadow-sm group-hover:shadow-md transition-shadow">
                            @else
                                <div class="w-16 h-12 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900 text-sm">{{ $potensi->title }}</span>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <p class="text-gray-500 text-sm max-w-xs truncate">{{ $potensi->description }}</p>
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            <span class="text-gray-400 text-xs">{{ $potensi->created_at->format('d M Y') }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.potensi-desa.edit', $potensi) }}"
                                   class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.potensi-desa.destroy', $potensi) }}"
                                      onsubmit="return confirm('Hapus potensi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 rounded-2xl bg-blue-50 flex items-center justify-center mx-auto mb-5">
                <svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada data potensi</h3>
            <p class="text-gray-400 text-sm mb-6">Mulai tambahkan potensi desa pertama Anda</p>
            <a href="{{ route('admin.potensi-desa.create') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Potensi
            </a>
        </div>
        @endif
    </div>
</div>

@endsection
