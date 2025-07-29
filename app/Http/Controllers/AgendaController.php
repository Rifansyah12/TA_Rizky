<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
     public function index()
    {
        $agendas = Agenda::latest()->take(3)->get(); 
        return view('agenda', compact('agendas')); // akan menampilkan views/profile.blade.php
    }
}
