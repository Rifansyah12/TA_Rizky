<?php

namespace App\Http\Controllers;

use App\Models\KelasJadwal;
use Illuminate\Http\Request;

class KelasJadwalController extends Controller
{
    public function index()
    {
        $data = KelasJadwal::all();
        return view('admin.management_kelas_jadwal.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'wali_kelas' => 'required',
        ]);

        KelasJadwal::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'wali_kelas' => 'required',
        ]);

        $jadwal = KelasJadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = KelasJadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
