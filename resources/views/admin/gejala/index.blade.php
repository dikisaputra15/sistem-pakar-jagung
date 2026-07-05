@extends('layouts.app')
@section('title', 'Kelola Gejala')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Kelola Data Gejala</h3>
    <a href="{{ route('admin.gejala.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Gejala</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead><tr><th>Kode</th><th>Nama Gejala</th><th width="150">Aksi</th></tr></thead>
        <tbody>
        @forelse($gejalas as $g)
            <tr>
                <td>{{ $g->kode_gejala }}</td>
                <td>{{ $g->nama_gejala }}</td>
                <td>
                    <a href="{{ route('admin.gejala.edit', $g) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="{{ route('admin.gejala.destroy', $g) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus gejala ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" class="text-center text-muted">Belum ada data gejala.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $gejalas->links() }}
</div>
@endsection
