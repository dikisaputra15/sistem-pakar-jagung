<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosa;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGejala = Gejala::count();
        $totalPenyakit = Penyakit::count();
        $totalPetani = User::where('role', 'petani')->count();
        $totalDiagnosa = RiwayatDiagnosa::count();
        $diagnosaTerbaru = RiwayatDiagnosa::with(['user', 'penyakit'])
            ->latest('tanggal_diagnosa')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalGejala', 'totalPenyakit', 'totalPetani', 'totalDiagnosa', 'diagnosaTerbaru'
        ));
    }
}
