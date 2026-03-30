<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::orderBy('order')->get();
        return view('admin.potensis.index', compact('potensis'));
    }

    public function create()
    {
        return view('admin.potensis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potensis', 'public');
        }

        Potensi::create($data);

        return redirect()->route('admin.potensis.index')->with('success', 'Potensi berhasil ditambahkan.');
    }

    public function edit(Potensi $potensi)
    {
        return view('admin.potensis.edit', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);

        if ($request->hasFile('image')) {
            if ($potensi->image) {
                Storage::disk('public')->delete($potensi->image);
            }
            $data['image'] = $request->file('image')->store('potensis', 'public');
        }

        $potensi->update($data);

        return redirect()->route('admin.potensis.index')->with('success', 'Potensi berhasil diperbarui.');
    }

    public function destroy(Potensi $potensi)
    {
        if ($potensi->image) {
            Storage::disk('public')->delete($potensi->image);
        }
        $potensi->delete();

        return redirect()->route('admin.potensis.index')->with('success', 'Potensi berhasil dihapus.');
    }
}
