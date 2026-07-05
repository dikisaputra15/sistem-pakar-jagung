@extends('layouts.app')
@section('title', 'Kelola Penyakit')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Kelola Data Penyakit</h3>
    <a href="{{ route('admin.penyakit.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Penyakit</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead><tr><th>Kode</th><th>Nama Penyakit</th><th>Rekomendasi</th><th width="150">Aksi</th></tr></thead>
        <tbody>
        @forelse($penyakits as $p)
            <tr>
                <td>{{ $p->kode_penyakit }}</td>
                <td>{{ $p->nama_penyakit }}</td>
                <td>{{ \Illuminate\Support\Str::limit($p->rekomendasi, 60) }}</td>
                <td>
                    <a href="{{ route('admin.penyakit.edit', $p) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="{{ route('admin.penyakit.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus penyakit ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada data penyakit.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $penyakits->links() }}
</div>
@endsection
