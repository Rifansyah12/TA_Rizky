<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $siswa = Pendaftaran::where('status', 'diterima')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', "%$keyword%");
            })
            ->get();

        return view('admin.management_siswa.index', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:pendaftarans,nik',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp' => $request->no_hp,
            'status' => 'diterima' // default status
        ]);

        return redirect()->route('admin.management_siswa.index')->with('success', 'Siswa baru berhasil ditambahkan.');
    }

    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:pendaftarans,nik',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $siswa = Pendaftaran::findOrFail($id);
        $siswa->update([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:pendaftarans,nik',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        return redirect()->route('management_siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->delete();

        return redirect()->route('management_siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

}
   