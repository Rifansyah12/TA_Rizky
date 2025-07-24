<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        return view('prestasi'); // akan menampilkan views/profile.blade.php
    }
}
