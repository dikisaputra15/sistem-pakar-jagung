@extends('layouts.app')
@section('title', 'Edit Gejala')
@section('content')
<h3 class="mb-3">Edit Gejala</h3>
<div class="card p-4">
    <form method="POST" action="{{ route('admin.gejala.update', $gejala) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Kode Gejala</label>
            <input type="text" name="kode_gejala" class="form-control" value="{{ old('kode_gejala', $gejala->kode_gejala) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Gejala</label>
            <textarea name="nama_gejala" class="form-control" rows="3" required>{{ old('nama_gejala', $gejala->nama_gejala) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.gejala.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
