@extends('layouts.app')
@section('title', 'Diagnosa Penyakit')
@section('content')
<h3 class="mb-3">Diagnosa Penyakit Tanaman Jagung</h3>
<p class="text-muted">Centang gejala-gejala yang ditemukan pada tanaman jagung Anda, lalu klik "Diagnosa Sekarang".</p>

<div class="card p-4">
    <form method="POST" action="{{ route('petani.diagnosa.store') }}">
        @csrf

        @if($lahans->isNotEmpty())
        <div class="mb-3">
            <label class="form-label">Pilih Lahan (opsional)</label>
            <select name="data_lahan_id" class="form-select">
                <option value="">-- Tanpa Lahan Spesifik --</option>
                @foreach($lahans as $l)
                    <option value="{{ $l->id }}">{{ $l->nama_lahan }} - {{ $l->lokasi }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <label class="form-label fw-bold">Gejala yang Ditemukan</label>
        <div class="row">
            @forelse($gejalas as $g)
                <div class="col-md-6 mb-2">
                    <div class="form-check">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id }}" class="form-check-input" id="g{{ $g->id }}">
                        <label class="form-check-label" for="g{{ $g->id }}">{{ $g->nama_gejala }}</label>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada data gejala. Silakan hubungi admin.</p>
            @endforelse
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-search"></i> Diagnosa Sekarang</button>
    </form>
</div>
@endsection
