<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatDiagnosa;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = RiwayatDiagnosa::with(['user', 'penyakit', 'dataLahan']);

        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_diagnosa', '>=', $request->tanggal_dari);
        }

        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('tanggal_diagnosa', '<=', $request->tanggal_sampai);
        }

        if ($request->filled('nama_petani')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->nama_petani . '%');
            });
        }

        $riwayats = $query->latest('tanggal_diagnosa')->paginate(15)->withQueryString();

        return view('admin.riwayat.index', compact('riwayats'));
    }

    public function show(RiwayatDiagnosa $riwayat)
    {
        $riwayat->load(['user', 'penyakit', 'dataLahan', 'gejalas']);
        return view('admin.riwayat.show', compact('riwayat'));
    }
}
