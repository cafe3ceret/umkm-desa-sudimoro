{{-- Reusable image upload field --}}
@props(['name' => 'image', 'label' => 'Gambar', 'current' => null])

<div x-data="imageUpload()" class="space-y-3">
    <label class="block text-sm font-semibold text-gray-700">{{ $label }}</label>

    <!-- Current Image Preview -->
    @if($current)
    <div class="relative inline-block">
        <img src="{{ Storage::url($current) }}" alt="Current" class="h-32 w-auto rounded-xl object-cover border border-gray-200">
        <span class="absolute top-2 right-2 bg-white/80 text-gray-600 text-xs px-2 py-1 rounded-lg">Gambar Saat Ini</span>
    </div>
    @endif

    <!-- Upload Area -->
    <div class="relative">
        <input type="file" id="{{ $name }}" name="{{ $name }}" accept="image/*"
               @change="previewImage($event)"
               class="hidden">
        <label for="{{ $name }}"
               class="flex flex-col items-center gap-3 p-8 border-2 border-dashed border-gray-300 rounded-2xl cursor-pointer hover:border-primary hover:bg-blue-50 transition-all duration-200">
            <div x-show="!preview" class="text-center">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-gray-600 font-medium text-sm">Klik untuk upload gambar</p>
                <p class="text-gray-400 text-xs mt-1">PNG, JPG, WEBP (Max. 2MB)</p>
            </div>
            <img x-show="preview" :src="preview" class="h-40 object-contain rounded-xl" x-cloak>
        </label>
    </div>
    @error($name)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

@push('scripts')
<script>
function imageUpload() {
    return {
        preview: null,
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => { this.preview = e.target.result; };
                reader.readAsDataURL(file);
            }
        }
    }
}
</script>
@endpush
