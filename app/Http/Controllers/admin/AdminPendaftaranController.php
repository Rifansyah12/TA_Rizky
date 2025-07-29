<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminPendaftaranController extends Controller
{
    public function index()
    {
        $data = Pendaftaran::all(); // Ambil semua data dari tabel pendaftarans
        return view('admin.kelola_pendaftaran.index' , compact('data'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        if ($request->aksi == 'terima') {
            $pendaftar->status = 'diterima';
        } elseif ($request->aksi == 'tolak') {
            $pendaftar->status = 'ditolak';
        }

        $pendaftar->save();

        return redirect()->route('admin.kelola_pendaftaran.index')->with('success', 'Status pendaftaran berhasil diperbarui.');
    }


}
