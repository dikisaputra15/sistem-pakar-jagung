@extends('layouts.app')
@section('title', 'Edit Data Lahan')
@section('content')
<h3 class="mb-3">Edit Data Lahan</h3>
<div class="card p-4">
    <form method="POST" action="{{ route('petani.lahan.update', $lahan) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Lahan</label>
            <input type="text" name="nama_lahan" class="form-control" value="{{ old('nama_lahan', $lahan->nama_lahan) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $lahan->lokasi) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Luas Lahan (Ha)</label>
            <input type="number" step="0.01" name="luas_lahan" class="form-control" value="{{ old('luas_lahan', $lahan->luas_lahan) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Bibit</label>
            <input type="text" name="jenis_bibit" class="form-control" value="{{ old('jenis_bibit', $lahan->jenis_bibit) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Tanam</label>
            <input type="date" name="tanggal_tanam" class="form-control" value="{{ old('tanggal_tanam', optional($lahan->tanggal_tanam)->format('Y-m-d')) }}">
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('petani.lahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
