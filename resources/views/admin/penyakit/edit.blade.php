@extends('layouts.app')
@section('title', 'Edit Penyakit')
@section('content')
<h3 class="mb-3">Edit Penyakit</h3>
<div class="card p-4">
    <form method="POST" action="{{ route('admin.penyakit.update', $penyakit) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Kode Penyakit</label>
            <input type="text" name="kode_penyakit" class="form-control" value="{{ old('kode_penyakit', $penyakit->kode_penyakit) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penyakit</label>
            <input type="text" name="nama_penyakit" class="form-control" value="{{ old('nama_penyakit', $penyakit->nama_penyakit) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $penyakit->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Rekomendasi Penanganan</label>
            <textarea name="rekomendasi" class="form-control" rows="4" required>{{ old('rekomendasi', $penyakit->rekomendasi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.penyakit.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
