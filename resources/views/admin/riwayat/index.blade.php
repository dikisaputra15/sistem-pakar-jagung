@extends('layouts.app')
@section('title', 'Riwayat Diagnosa')
@section('content')
<h3 class="mb-3">Riwayat Diagnosa Petani</h3>

<div class="card p-3 mb-3">
    <form method="GET" class="row g-2">
        <div class="col-md-3">
            <input type="text" name="nama_petani" class="form-control" placeholder="Cari nama petani" value="{{ request('nama_petani') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_dari" class="form-control" value="{{ request('tanggal_dari') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_sampai" class="form-control" value="{{ request('tanggal_sampai') }}">
        </div>
        <div class="col-md-3">
            <button class="btn btn-success w-100">Filter</button>
        </div>
    </form>
</div>

<div class="card p-3">
    <table class="table table-hover">
        <thead><tr><th>Petani</th><th>Lahan</th><th>Hasil Penyakit</th><th>Persentase</th><th>Tanggal</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse($riwayats as $r)
            <tr>
                <td>{{ $r->user->name }}</td>
                <td>{{ $r->dataLahan->nama_lahan ?? '-' }}</td>
                <td>{{ $r->penyakit->nama_penyakit ?? '-' }}</td>
                <td>{{ $r->persentase }}%</td>
                <td>{{ $r->tanggal_diagnosa->format('d M Y H:i') }}</td>
                <td><a href="{{ route('admin.riwayat.show', $r) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada riwayat diagnosa.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $riwayats->links() }}
</div>
@endsection
