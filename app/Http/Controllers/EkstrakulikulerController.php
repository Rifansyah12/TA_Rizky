<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        return view('ekstrakulikuler'); // akan menampilkan views/profile.blade.php
    }
}
