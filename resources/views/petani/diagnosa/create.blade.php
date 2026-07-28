@extends('layouts.app')
@section('title', 'Diagnosa Penyakit')
@section('content')
<h3 class="mb-3">Diagnosa Penyakit Tanaman Jagung</h3>
<p class="text-muted">Centang gejala-gejala yang ditemukan pada tanaman jagung Anda, lalu klik "Diagnosa Sekarang".</p>

<div class="card p-4">
    <form method="POST" action="{{ route('petani.diagnosa.store') }}" id="formDiagnosa">
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

        <label class="form-label fw-bold">Gejala yang Ditemukan <span class="text-muted fw-normal">(maks. {{ $maxGejala }})</span></label>
        <p class="mb-2"><span id="gejalaCounter" class="badge bg-secondary">0 / {{ $maxGejala }} dipilih</span></p>

        {{-- Notifikasi info penyakit & jumlah gejala — muncul saat klik gejala pertama --}}
        <div id="notifPenyakit" class="alert alert-info alert-dismissible fade" role="alert" style="display:none;">
            <strong><i class="bi bi-info-circle"></i> Informasi Basis Pengetahuan</strong>
            <p class="mb-2 mt-1">Berikut jumlah gejala dari setiap penyakit dalam sistem. Maksimal gejala yang bisa dipilih adalah <strong>{{ $maxGejala }}</strong> (berdasarkan penyakit dengan gejala terbanyak).</p>
            <table class="table table-sm table-bordered mb-0 bg-white">
                <thead class="table-light">
                    <tr>
                        <th>Kode</th>
                        <th>Nama Penyakit</th>
                        <th class="text-center">Jumlah Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyakitGejala as $p)
                    <tr @if($p->gejalas_count == $maxGejala) class="table-warning fw-bold" @endif>
                        <td>{{ $p->kode_penyakit }}</td>
                        <td>{{ $p->nama_penyakit }}</td>
                        <td class="text-center">{{ $p->gejalas_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>

        <div class="row">
            @forelse($gejalas as $g)
                <div class="col-md-6 mb-2">
                    <div class="form-check">
                        <input type="checkbox" name="gejala[]" value="{{ $g->id }}" class="form-check-input gejala-checkbox" id="g{{ $g->id }}">
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const MAX_GEJALA = {{ $maxGejala }};
    const checkboxes = document.querySelectorAll('.gejala-checkbox');
    const counter = document.getElementById('gejalaCounter');
    const notif = document.getElementById('notifPenyakit');
    let notifShown = false;

    function updateState() {
        const checked = document.querySelectorAll('.gejala-checkbox:checked').length;
        counter.textContent = checked + ' / ' + MAX_GEJALA + ' dipilih';

        // Tampilkan notif saat pertama kali centang gejala
        if (checked >= 1 && !notifShown) {
            notifShown = true;
            notif.style.display = 'block';
            // Trigger reflow supaya animasi fade berjalan
            notif.offsetHeight;
            notif.classList.add('show');
        }

        if (checked >= MAX_GEJALA) {
            counter.className = 'badge bg-danger';
            checkboxes.forEach(function (cb) {
                if (!cb.checked) cb.disabled = true;
            });
        } else {
            counter.className = checked > 0 ? 'badge bg-primary' : 'badge bg-secondary';
            checkboxes.forEach(function (cb) {
                cb.disabled = false;
            });
        }
    }

    checkboxes.forEach(function (cb) {
        cb.addEventListener('change', updateState);
    });

    updateState();

    // Peringatan SweetAlert jika semua gejala dicentang
    document.getElementById('formDiagnosa').addEventListener('submit', function (e) {
        const total = document.querySelectorAll('.gejala-checkbox').length;
        const checkedCount = document.querySelectorAll('.gejala-checkbox:checked').length;

        if (total > 0 && checkedCount === total) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Gejala tidak boleh diceklis semua',
            });
        }
    });
});
</script>
@endpush

