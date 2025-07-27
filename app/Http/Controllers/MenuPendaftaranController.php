<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuPendaftaranController extends Controller
{
     public function index()
    {
        return view('menupendaftaran'); // akan menampilkan views/profile.blade.php
    }
}
