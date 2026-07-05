@extends('layouts.app')
@section('title', 'Tambah Data Lahan')
@section('content')
<h3 class="mb-3">Tambah Data Lahan</h3>
<div class="card p-4">
    <form method="POST" action="{{ route('petani.lahan.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Lahan</label>
            <input type="text" name="nama_lahan" class="form-control" value="{{ old('nama_lahan') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Luas Lahan (Ha)</label>
            <input type="number" step="0.01" name="luas_lahan" class="form-control" value="{{ old('luas_lahan') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Bibit</label>
            <input type="text" name="jenis_bibit" class="form-control" value="{{ old('jenis_bibit') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Tanam</label>
            <input type="date" name="tanggal_tanam" class="form-control" value="{{ old('tanggal_tanam') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('petani.lahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
