<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->take(3)->get(); 
        return view('ekstrakulikuler', compact('ekstrakurikulers')); // perbaikan di sini
    }
}
