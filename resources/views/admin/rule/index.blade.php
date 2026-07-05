@extends('layouts.app')
@section('title', 'Basis Aturan')
@section('content')
<h3 class="mb-3">Kelola Basis Aturan (Rule Base)</h3>
<p class="text-muted">Setiap penyakit memiliki kombinasi gejala sebagai aturan (rule) untuk proses forward chaining. Klik "Atur Gejala" untuk menentukan gejala apa saja yang menjadi ciri suatu penyakit.</p>

<div class="card p-3">
    <table class="table table-hover align-middle">
        <thead><tr><th>Kode</th><th>Nama Penyakit</th><th>Jumlah Gejala Rule</th><th width="150">Aksi</th></tr></thead>
        <tbody>
        @forelse($penyakits as $p)
            <tr>
                <td>{{ $p->kode_penyakit }}</td>
                <td>{{ $p->nama_penyakit }}</td>
                <td><span class="badge bg-success">{{ $p->gejalas->count() }} gejala</span></td>
                <td>
                    <a href="{{ route('admin.rule.edit', $p) }}" class="btn btn-sm btn-outline-primary">Atur Gejala</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada data penyakit. Tambahkan penyakit terlebih dahulu.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
