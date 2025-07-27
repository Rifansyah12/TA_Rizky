<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class CmsKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::query();

        if ($request->q) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        $kegiatans = $query->latest()->get();

        return view('admin.cms.kegiatan.index', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi', 'tanggal');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        Kegiatan::create($data);

        return back()->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'deskripsi', 'tanggal');

        if ($request->hasFile('foto')) {
            if ($kegiatan->foto && file_exists(public_path('storage/' . $kegiatan->foto))) {
                unlink(public_path('storage/' . $kegiatan->foto));
            }
            $data['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        $kegiatan->update($data);

        return back()->with('success', 'Kegiatan berhasil diperbarui.');
    }


}
