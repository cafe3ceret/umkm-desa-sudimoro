@extends('admin.layouts.sidebar')

@section('title', 'Potensi Manager')
@section('page_title', 'Potensi Manager')
@section('page_subtitle', 'Kelola data potensi desa')

@section('admin_content')

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Daftar Potensi</h2>
            <p class="text-gray-400 text-sm">{{ $potensis->count() }} data potensi</p>
        </div>
        <a href="{{ route('admin.potensis.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Potensi
        </a>
    </div>

    @if($potensis->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($potensis as $potensi)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        @if($potensi->image)
                            <img src="{{ Storage::url($potensi->image) }}" alt="{{ $potensi->title }}"
                                 class="h-12 w-20 object-cover rounded-lg">
                        @else
                            <div class="h-12 w-20 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $potensi->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs">
                        <p class="truncate">{{ $potensi->description }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.potensis.edit', $potensi) }}"
                               class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-150">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.potensis.destroy', $potensi) }}"
                                  onsubmit="return confirm('Hapus potensi ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors duration-150">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
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
    <div class="p-20 text-center">
        <p class="text-gray-500">Belum ada data potensi. <a href="{{ route('admin.potensis.create') }}" class="text-primary font-semibold hover:underline">Tambah sekarang</a></p>
    </div>
    @endif
</div>

@endsection
