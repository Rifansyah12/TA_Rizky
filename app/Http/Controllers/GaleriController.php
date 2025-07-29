<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->take(3)->get(); 
        return view('galeri', compact('galeris')); // perbaikan di sini
    }
}
