<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
     public function index()
    {
        return view('agenda'); // akan menampilkan views/profile.blade.php
    }
}
