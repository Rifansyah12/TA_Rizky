<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    // Form tampil untuk pengguna
        public function index()
    {
        return view('pendaftaran.index');
    }
    public function create()
    {
        return view('pendaftaran.index'); // ganti sesuai view-mu jika perlu
    }

    // Simpan data dari form
    public function store(Request $request)
    {
        $request->validate([
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

        Pendaftaran::create($request->all());

        return redirect()->route('pendaftaran.store')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
