@extends('layouts.app')
@section('title', 'Riwayat Diagnosa Saya')
@section('content')
<h3 class="mb-3">Riwayat Diagnosa Saya</h3>
<div class="card p-3">
    <table class="table table-hover">
        <thead><tr><th>Lahan</th><th>Hasil Penyakit</th><th>Persentase</th><th>Tanggal</th><th>Aksi</th></tr></thead>
        <tbody>
        @forelse($riwayats as $r)
            <tr>
                <td>{{ $r->dataLahan->nama_lahan ?? '-' }}</td>
                <td>{{ $r->penyakit->nama_penyakit ?? '-' }}</td>
                <td>{{ $r->persentase }}%</td>
                <td>{{ $r->tanggal_diagnosa->format('d M Y H:i') }}</td>
                <td><a href="{{ route('petani.diagnosa.hasil', $r) }}" class="btn btn-sm btn-outline-primary">Detail</a></td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">Belum ada riwayat diagnosa.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $riwayats->links() }}
</div>
@endsection
