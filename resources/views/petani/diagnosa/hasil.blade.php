@extends('layouts.app')
@section('title', 'Hasil Diagnosa')
@section('content')
<h3 class="mb-3">Hasil Diagnosa</h3>

<div class="card p-4 mb-3">
    <h5>Gejala yang Anda Pilih</h5>
    <ul>
        @foreach($riwayat->gejalas as $g)
            <li>{{ $g->nama_gejala }}</li>
        @endforeach
    </ul>
</div>

@if($riwayat->penyakit)
<div class="card p-4 border-success">
    <h4 class="text-success">{{ $riwayat->penyakit->nama_penyakit }}</h4>
    <div class="mb-2">
        <span class="badge bg-success fs-6">Tingkat Keyakinan: {{ $riwayat->persentase }}%</span>
    </div>
    <p><strong>Deskripsi:</strong> {{ $riwayat->penyakit->deskripsi }}</p>
    <hr>
    <h5>Rekomendasi Penanganan</h5>
    <p>{{ $riwayat->penyakit->rekomendasi }}</p>
</div>
@else
<div class="alert alert-warning">Tidak ditemukan penyakit yang cocok dengan gejala yang dipilih.</div>
@endif

<div class="mt-3">
    <a href="{{ route('petani.diagnosa.create') }}" class="btn btn-success">Diagnosa Lagi</a>
    <a href="{{ route('petani.diagnosa.riwayat') }}" class="btn btn-outline-secondary">Lihat Riwayat</a>
</div>
@endsection
