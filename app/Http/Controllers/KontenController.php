<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function index()
    {
        // Contoh data dummy
        $konten = [
            [
                'judul' => 'Manfaat Belajar di RA Arisalah',
                'kategori' => 'Artikel',
                'penulis' => 'Admin',
                'tanggal' => '2025-07-26',
            ],
            [
                'judul' => 'Kegiatan Outbond Anak-anak',
                'kategori' => 'Berita',
                'penulis' => 'Ustadzah Laila',
                'tanggal' => '2025-07-20',
            ],
        ];

        return view('admin.cms.layouts', compact('konten'));
    }
}
