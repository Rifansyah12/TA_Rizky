<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $dataGuru = Guru::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', "%$keyword%");
        })->get();

        return view('admin.management_guru.index', compact('dataGuru'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|string|unique:gurus,nip',
            'mapel' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $data = $request->all();

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/foto_guru'), $filename);
        $data['foto'] = $filename;
    }

    Guru::create($data);
        return redirect()->route('management_guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nip' => 'required|string|unique:gurus,nip,' . $guru->id,
            'mapel' => 'required|string',
            'no_hp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($guru->foto && file_exists(public_path('uploads/foto_guru/' . $guru->foto))) {
                unlink(public_path('uploads/foto_guru/' . $guru->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/foto_guru'), $filename);
            $data['foto'] = $filename;
        }

        $guru->update($data);

        return redirect()->route('management_guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('management_guru.index')->with('success', 'Data guru berhasil dihapus.');
    }

}
