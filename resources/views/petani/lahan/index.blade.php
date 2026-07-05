@extends('layouts.app')
@section('title', 'Data Lahan Saya')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Lahan Saya</h3>
    <a href="{{ route('petani.lahan.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Lahan</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead><tr><th>Nama Lahan</th><th>Lokasi</th><th>Luas (Ha)</th><th>Jenis Bibit</th><th width="150">Aksi</th></tr></thead>
        <tbody>
        @forelse($lahans as $l)
            <tr>
                <td>{{ $l->nama_lahan }}</td>
                <td>{{ $l->lokasi }}</td>
                <td>{{ $l->luas_lahan }}</td>
                <td>{{ $l->jenis_bibit ?? '-' }}</td>
                <td>
                    <a href="{{ route('petani.lahan.edit', $l) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="{{ route('petani.lahan.destroy', $l) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data lahan ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">Belum ada data lahan.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $lahans->links() }}
</div>
@endsection
