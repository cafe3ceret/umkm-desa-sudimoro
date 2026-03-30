<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $potensis = PotensiDesa::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.potensi-desa.index', compact('potensis'));
    }

    public function create()
    {
        return view('admin.potensi-desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'order'       => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->processImage($request->file('image'));
        }

        PotensiDesa::create($data);

        return redirect()->route('admin.potensi-desa.index')
            ->with('success', 'Potensi Desa berhasil ditambahkan.');
    }

    public function show(PotensiDesa $potensiDesa)
    {
        return redirect()->route('admin.potensi-desa.index');
    }

    public function edit(PotensiDesa $potensiDesa)
    {
        return view('admin.potensi-desa.edit', compact('potensiDesa'));
    }

    public function update(Request $request, PotensiDesa $potensiDesa)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'order'       => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($potensiDesa->image) {
                Storage::disk('public')->delete($potensiDesa->image);
            }
            $data['image'] = $this->processImage($request->file('image'));
        }

        $potensiDesa->update($data);

        return redirect()->route('admin.potensi-desa.index')
            ->with('success', 'Potensi Desa berhasil diperbarui.');
    }

    public function destroy(PotensiDesa $potensiDesa)
    {
        if ($potensiDesa->image) {
            Storage::disk('public')->delete($potensiDesa->image);
        }
        $potensiDesa->delete();

        return redirect()->route('admin.potensi-desa.index')
            ->with('success', 'Potensi Desa berhasil dihapus.');
    }

    /**
     * Process and resize uploaded image using Intervention Image v4.
     * Max width 1200px, keep aspect ratio, quality 80%.
     */
    private function processImage($file): string
    {
        $manager  = new ImageManager(new Driver());
        $image    = $manager->read($file->getRealPath());

        // Resize only if wider than 1200px
        if ($image->width() > 1200) {
            $image->scaleDown(width: 1200);
        }

        // Encode as JPEG with quality 80
        $encoded  = $image->toJpeg(quality: 80);
        $filename = 'potensi/' . uniqid('pd_') . '.jpg';

        Storage::disk('public')->put($filename, $encoded);

        return $filename;
    }
}
