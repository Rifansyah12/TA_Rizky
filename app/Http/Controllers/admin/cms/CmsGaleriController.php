<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class CmsGaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('q')) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        $galeris = $query->latest()->get();

        return view('admin.cms.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        Galeri::create($data);

        return back()->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return back()->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}
