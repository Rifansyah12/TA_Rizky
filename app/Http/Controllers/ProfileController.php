<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class ProfileController extends Controller
{
    public function index()
    {
        $dataGuru = Guru::all();
    return view('profile', compact('dataGuru'));
}
}
