<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Prestasi; 


class WelcomeController extends Controller
{
    public function index()
{
    $dataGuru = Guru::all();
    $galeris = Galeri::latest()->take(6)->get();
    $prestasis = Prestasi::latest()->take(3)->get(); 

    return view('welcome', compact('dataGuru', 'galeris',));
}
}

