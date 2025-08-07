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
        // dd($request->all());
        // Validasi data
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
            'pertanyaan_ai_1' => 'required|string',
            'pertanyaan_ai_2' => 'required|string',
            'pertanyaan_ai_3' => 'required|string',
            'pertanyaan_ai_4' => 'required|string',
        ]);

        // Simpan data ke database
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
        'pertanyaan_ai_1' => $request->pertanyaan_ai_1,
        'pertanyaan_ai_2' => $request->pertanyaan_ai_2,
        'pertanyaan_ai_3' => $request->pertanyaan_ai_3,
        'pertanyaan_ai_4' => $request->pertanyaan_ai_4,
    ]);


        // Hitung usia
        $tanggalLahir = new \Carbon\Carbon($request->tanggal_lahir);
        $usia = $tanggalLahir->diffInYears(now());

        // Analisis kesiapan
        $jawaban1 = $request->pertanyaan_ai_1;
        $jawaban2 = $request->pertanyaan_ai_2;
        $jawaban3 = $request->pertanyaan_ai_3;
        $jawaban4 = $request->pertanyaan_ai_4;

        if ($usia >= 4 && $jawaban1 === 'Ya' && $jawaban2 === 'Ya' && $jawaban3 === 'Ya' && $jawaban4 === 'Ya') {
            $pesan = "Anak Anda siap masuk RA tahun ini.";
        } else {
            $pesan = "Perlu dipertimbangkan kembali. Anak mungkin belum siap sepenuhnya.";
        }

         return redirect()->route('pendaftaran.store')->with('success', 'Pendaftaran berhasil dikirim!');
    }


}

