@extends('layouts.app')
@section('title', 'Atur Basis Aturan')
@section('content')
<h3 class="mb-3">Atur Gejala untuk Penyakit: {{ $penyakit->nama_penyakit }}</h3>
<p class="text-muted">Centang gejala-gejala yang menjadi rule/ciri dari penyakit <strong>{{ $penyakit->nama_penyakit }}</strong>. Proses forward chaining akan mencocokkan gejala yang dipilih petani dengan rule ini.</p>

<div class="card p-4">
    <form method="POST" action="{{ route('admin.rule.update', $penyakit) }}">
        @csrf @method('PUT')

        <div class="row">
            @foreach($gejalas as $g)
                <div class="col-md-6 mb-2">
                    <div class="form-check">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id }}" class="form-check-input" id="g{{ $g->id }}"
                            {{ in_array($g->id, $gejalaTerpilih) ? 'checked' : '' }}>
                        <label class="form-check-label" for="g{{ $g->id }}">
                            <strong>{{ $g->kode_gejala }}</strong> - {{ $g->nama_gejala }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        @if($gejalas->isEmpty())
            <p class="text-muted">Belum ada data gejala. Tambahkan gejala terlebih dahulu di menu Kelola Gejala.</p>
        @endif

        <button type="submit" class="btn btn-success mt-3">Simpan Basis Aturan</button>
        <a href="{{ route('admin.rule.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
