<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
     public function index()
    {
        return view('kegiatan'); // akan menampilkan views/profile.blade.php
    }
}
