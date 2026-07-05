<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\DataLahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataLahanController extends Controller
{
    public function index()
    {
        $lahans = Auth::user()->dataLahans()->latest()->paginate(10);
        return view('petani.lahan.index', compact('lahans'));
    }

    public function create()
    {
        return view('petani.lahan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lahan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0.01',
            'jenis_bibit' => 'nullable|string|max:255',
            'tanggal_tanam' => 'nullable|date',
        ]);

        $validated['user_id'] = Auth::id();
        DataLahan::create($validated);

        return redirect()->route('petani.lahan.index')->with('success', 'Data lahan berhasil disimpan.');
    }

    public function edit(DataLahan $lahan)
    {
        abort_if($lahan->user_id !== Auth::id(), 403);
        return view('petani.lahan.edit', compact('lahan'));
    }

    public function update(Request $request, DataLahan $lahan)
    {
        abort_if($lahan->user_id !== Auth::id(), 403);

        $validated = $request->validate([
            'nama_lahan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0.01',
            'jenis_bibit' => 'nullable|string|max:255',
            'tanggal_tanam' => 'nullable|date',
        ]);

        $lahan->update($validated);

        return redirect()->route('petani.lahan.index')->with('success', 'Data lahan berhasil diperbarui.');
    }

    public function destroy(DataLahan $lahan)
    {
        abort_if($lahan->user_id !== Auth::id(), 403);
        $lahan->delete();

        return redirect()->route('petani.lahan.index')->with('success', 'Data lahan berhasil dihapus.');
    }
}
