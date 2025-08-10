<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class DashboardadminController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $totalPendaftar = Pendaftaran::count();
        $sudahDikonfirmasi = Pendaftaran::where('status', 'diterima')->count();

        return view('admin.dashboard', compact(
            'totalPendaftar',
            'sudahDikonfirmasi'
        ));
    }
}