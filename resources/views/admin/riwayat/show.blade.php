@extends('layouts.app')
@section('title', 'Detail Riwayat Diagnosa')
@section('content')
<h3 class="mb-3">Detail Riwayat Diagnosa</h3>
<div class="card p-4">
    <p><strong>Petani:</strong> {{ $riwayat->user->name }}</p>
    <p><strong>Lahan:</strong> {{ $riwayat->dataLahan->nama_lahan ?? '-' }}</p>
    <p><strong>Tanggal:</strong> {{ $riwayat->tanggal_diagnosa->format('d M Y H:i') }}</p>
    <hr>
    <h5>Gejala yang Dipilih</h5>
    <ul>
        @foreach($riwayat->gejalas as $g)
            <li>{{ $g->kode_gejala }} - {{ $g->nama_gejala }}</li>
        @endforeach
    </ul>
    <hr>
    <h5>Hasil Diagnosa</h5>
    <p><strong>Penyakit:</strong> {{ $riwayat->penyakit->nama_penyakit ?? 'Tidak diketahui' }} ({{ $riwayat->persentase }}% kecocokan)</p>
    <p><strong>Deskripsi:</strong> {{ $riwayat->penyakit->deskripsi ?? '-' }}</p>
    <p><strong>Rekomendasi:</strong> {{ $riwayat->penyakit->rekomendasi ?? '-' }}</p>
    <a href="{{ route('admin.riwayat.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
