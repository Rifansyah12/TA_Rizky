<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->q) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        $prestasis = $query->latest()->get();

        return view('admin.cms.prestasi.index', compact('prestasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi', 'tanggal');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return back()->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi', 'tanggal');

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return back()->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
