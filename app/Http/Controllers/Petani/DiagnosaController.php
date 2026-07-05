<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\RiwayatDiagnosa;
use App\Services\ForwardChainingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function create()
    {
        $gejalas = Gejala::orderBy('kode_gejala')->get();
        $lahans = Auth::user()->dataLahans;

        return view('petani.diagnosa.create', compact('gejalas', 'lahans'));
    }

    public function store(Request $request, ForwardChainingService $forwardChaining)
    {
        $request->validate([
            'gejala' => 'required|array|min:1',
            'gejala.*' => 'exists:gejalas,id',
            'data_lahan_id' => 'nullable|exists:data_lahans,id',
        ]);

        $hasil = $forwardChaining->diagnosa($request->gejala);

        if (empty($hasil)) {
            return back()
                ->withInput()
                ->with('error', 'Gejala yang dipilih belum cocok dengan basis pengetahuan penyakit manapun. Silakan hubungi admin/penyuluh.');
        }

        $terbaik = $hasil[0];

        $riwayat = RiwayatDiagnosa::create([
            'user_id' => Auth::id(),
            'data_lahan_id' => $request->data_lahan_id,
            'penyakit_id' => $terbaik['penyakit']->id,
            'persentase' => $terbaik['persentase'],
            'tanggal_diagnosa' => now(),
        ]);

        $riwayat->gejalas()->attach($request->gejala);

        return redirect()->route('petani.diagnosa.hasil', $riwayat->id);
    }

    public function hasil(RiwayatDiagnosa $riwayat)
    {
        abort_if($riwayat->user_id !== Auth::id(), 403);
        $riwayat->load('penyakit', 'gejalas', 'dataLahan');

        return view('petani.diagnosa.hasil', compact('riwayat'));
    }

    public function riwayat()
    {
        $riwayats = Auth::user()->riwayatDiagnosas()
            ->with('penyakit', 'dataLahan')
            ->latest('tanggal_diagnosa')
            ->paginate(10);

        return view('petani.diagnosa.riwayat', compact('riwayats'));
    }
}
