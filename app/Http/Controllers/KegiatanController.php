<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
     public function index()
    {
        $kegiatans = Kegiatan::latest()->take(3)->get(); 
        return view('kegiatan', compact('kegiatans')); // akan menampilkan views/profile.blade.php
    }
}
