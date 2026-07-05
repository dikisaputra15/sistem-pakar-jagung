<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::orderBy('kode_gejala')->paginate(10);
        return view('admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_gejala' => 'required|string|max:20|unique:gejalas,kode_gejala',
            'nama_gejala' => 'required|string',
        ]);

        Gejala::create($validated);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', ['gejala' => $gejala]);
    }

    public function update(Request $request, Gejala $gejala)
    {
        $validated = $request->validate([
            'kode_gejala' => 'required|string|max:20|unique:gejalas,kode_gejala,' . $gejala->id,
            'nama_gejala' => 'required|string',
        ]);

        $gejala->update($validated);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}
