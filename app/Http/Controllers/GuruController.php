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

        Guru::create($request->all());
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $guru->update($request->all());
        return redirect()->route('management_guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('management_guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
