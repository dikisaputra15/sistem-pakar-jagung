@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<h3 class="mb-4">Dashboard Admin</h3>
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="fs-3 fw-bold text-success">{{ $totalGejala }}</div>
            <div>Total Gejala</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="fs-3 fw-bold text-success">{{ $totalPenyakit }}</div>
            <div>Total Penyakit</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="fs-3 fw-bold text-success">{{ $totalPetani }}</div>
            <div>Total Petani</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <div class="fs-3 fw-bold text-success">{{ $totalDiagnosa }}</div>
            <div>Total Diagnosa</div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3"><a href="{{ route('admin.gejala.index') }}" class="btn btn-outline-success w-100 mb-2">Kelola Gejala</a></div>
    <div class="col-md-3"><a href="{{ route('admin.penyakit.index') }}" class="btn btn-outline-success w-100 mb-2">Kelola Penyakit</a></div>
    <div class="col-md-3"><a href="{{ route('admin.rule.index') }}" class="btn btn-outline-success w-100 mb-2">Kelola Basis Aturan</a></div>
    <div class="col-md-3"><a href="{{ route('admin.riwayat.index') }}" class="btn btn-outline-success w-100 mb-2">Riwayat Diagnosa</a></div>
</div>

<div class="card p-3">
    <h5>Diagnosa Terbaru</h5>
    <table class="table table-sm">
        <thead><tr><th>Petani</th><th>Penyakit</th><th>Persentase</th><th>Tanggal</th></tr></thead>
        <tbody>
        @forelse($diagnosaTerbaru as $d)
            <tr>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->penyakit->nama_penyakit ?? '-' }}</td>
                <td>{{ $d->persentase }}%</td>
                <td>{{ $d->tanggal_diagnosa->format('d M Y H:i') }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada data diagnosa.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
