@extends('layouts.app')
@section('title', 'Tambah Gejala')
@section('content')
<h3 class="mb-3">Tambah Gejala</h3>
<div class="card p-4">
    <form method="POST" action="{{ route('admin.gejala.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kode Gejala</label>
            <input type="text" name="kode_gejala" class="form-control" placeholder="Contoh: G01" value="{{ old('kode_gejala') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Gejala</label>
            <textarea name="nama_gejala" class="form-control" rows="3" required>{{ old('nama_gejala') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.gejala.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
