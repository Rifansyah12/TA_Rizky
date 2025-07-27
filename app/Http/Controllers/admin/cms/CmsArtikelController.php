<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class CmsArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::query();

        if ($request->q) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        $artikels = $query->latest()->get();

        return view('admin.cms.artikel.index', compact('artikels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()->back()->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }
}
