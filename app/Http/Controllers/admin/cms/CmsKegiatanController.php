<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Update data teks
        $kegiatan->judul = $validated['judul'];
        $kegiatan->deskripsi = $validated['deskripsi'];
        $kegiatan->tanggal = $validated['tanggal'];

        // Cek dan simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama (optional)
            if ($kegiatan->foto && Storage::exists($kegiatan->foto)) {
                Storage::delete($kegiatan->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('kegiatan', 'public');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->save();

        return redirect()->route('cms.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Jika ada foto, bisa tambahkan penghapusan file dari storage juga, opsional
        if ($kegiatan->foto && Storage::exists($kegiatan->foto)) {
            Storage::delete($kegiatan->foto);
        }

        $kegiatan->delete();

        return redirect()->route('cms.kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus.');
    }


}