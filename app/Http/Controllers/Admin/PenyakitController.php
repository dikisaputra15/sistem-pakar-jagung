<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::orderBy('kode_penyakit')->paginate(10);
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('admin.penyakit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_penyakit' => 'required|string|max:20|unique:penyakits,kode_penyakit',
            'nama_penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'rekomendasi' => 'required|string',
        ]);

        Penyakit::create($validated);

        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function edit(Penyakit $penyakit)
    {
        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $validated = $request->validate([
            'kode_penyakit' => 'required|string|max:20|unique:penyakits,kode_penyakit,' . $penyakit->id,
            'nama_penyakit' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'rekomendasi' => 'required|string',
        ]);

        $penyakit->update($validated);

        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil dihapus.');
    }
}
