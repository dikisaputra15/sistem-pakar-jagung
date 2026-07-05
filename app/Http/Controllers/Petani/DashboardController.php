<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLahan = Auth::user()->dataLahans()->count();
        $riwayat = Auth::user()->riwayatDiagnosas()
            ->with('penyakit')
            ->latest('tanggal_diagnosa')
            ->take(5)
            ->get();

        return view('petani.dashboard', compact('totalLahan', 'riwayat'));
    }
}
