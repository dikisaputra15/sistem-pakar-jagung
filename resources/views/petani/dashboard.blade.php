@extends('layouts.app')
@section('title', 'Dashboard Petani')
@section('content')
<h3 class="mb-4">Selamat Datang, {{ auth()->user()->name }}</h3>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-3 text-center">
            <div class="fs-3 fw-bold text-success">{{ $totalLahan }}</div>
            <div>Data Lahan Saya</div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="{{ route('petani.diagnosa.create') }}" class="card p-3 text-center text-decoration-none">
            <i class="bi bi-clipboard2-pulse fs-2 text-success"></i>
            <div>Mulai Diagnosa Baru</div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('petani.diagnosa.riwayat') }}" class="card p-3 text-center text-decoration-none">
            <i class="bi bi-clock-history fs-2 text-success"></i>
            <div>Riwayat Diagnosa Saya</div>
        </a>
    </div>
</div>

<div class="card p-3">
    <h5>Diagnosa Terbaru</h5>
    <table class="table table-sm">
        <thead><tr><th>Penyakit</th><th>Persentase</th><th>Tanggal</th></tr></thead>
        <tbody>
        @forelse($riwayat as $r)
            <tr>
                <td>{{ $r->penyakit->nama_penyakit ?? '-' }}</td>
                <td>{{ $r->persentase }}%</td>
                <td>{{ $r->tanggal_diagnosa->format('d M Y H:i') }}</td>
            </tr>
        @empty
            <tr><td colspan="3" class="text-center text-muted">Belum pernah melakukan diagnosa.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
