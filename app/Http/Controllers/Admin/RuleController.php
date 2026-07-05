<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::with('gejalas')->orderBy('kode_penyakit')->get();
        $gejalas = Gejala::orderBy('kode_gejala')->get();

        return view('admin.rule.index', compact('penyakits', 'gejalas'));
    }

    public function edit(Penyakit $penyakit)
    {
        $gejalas = Gejala::orderBy('kode_gejala')->get();
        $gejalaTerpilih = $penyakit->gejalas->pluck('id')->toArray();

        return view('admin.rule.edit', compact('penyakit', 'gejalas', 'gejalaTerpilih'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'gejala' => 'nullable|array',
            'gejala.*' => 'exists:gejalas,id',
        ]);

        // sync basis aturan: gejala mana saja yang menjadi rule penyakit ini
        $penyakit->gejalas()->sync($request->input('gejala', []));

        return redirect()->route('admin.rule.index')
            ->with('success', "Basis aturan untuk penyakit {$penyakit->nama_penyakit} berhasil diperbarui.");
    }
}
