<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CmsEkstrakurikulerController extends Controller
{
        public function index(Request $request)
        {
            $query = Ekstrakurikuler::query();

            if ($request->q) {
                $query->where('nama', 'like', '%' . $request->q . '%');
            }

            $items = $query->latest()->get();

            return view('admin.cms.ekstrakurikuler.index', compact('items'));
        }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('nama', 'deskripsi');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return back()->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('nama', 'deskripsi');

        if ($request->hasFile('foto')) {
            if ($ekstrakurikuler->foto) {
                Storage::disk('public')->delete($ekstrakurikuler->foto);
            }

            $data['foto'] = $request->file('foto')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($data);

        return back()->with('success', 'Data berhasil diperbarui.');
    }

        public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return back()->with('success', 'Galeri berhasil dihapus.');
    }

}