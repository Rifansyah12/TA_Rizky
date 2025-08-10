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

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            // Hapus validasi pertanyaan_ai_1 sampai 4
        ]);

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
            // Hapus simpanan pertanyaan_ai_1 sampai 4
        ]);

        // Hapus juga bagian analisis kesiapan dan pesan

        return redirect()->route('pendaftaran.store')->with('success', 'Pendaftaran berhasil dikirim!');
    }

}

