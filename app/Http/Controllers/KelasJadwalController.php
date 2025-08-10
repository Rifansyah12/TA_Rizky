<?php

namespace App\Http\Controllers;

use App\Models\KelasJadwal;
use App\Models\Guru; 
use Illuminate\Http\Request;

class KelasJadwalController extends Controller
{
    public function index()
    {
        $data = KelasJadwal::with('guru')->get();
        $gurus = Guru::all(); // ambil semua guru
        return view('admin.management_kelas_jadwal.index', compact('data','gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'guru_id' => 'required|exists:gurus,id',
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
            'guru_id' => 'required|exists:gurus,id',
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
