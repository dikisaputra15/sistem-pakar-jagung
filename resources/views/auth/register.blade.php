@extends('layouts.app')
@section('title', 'Registrasi Petani')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 mt-4">
            <h4 class="mb-3 text-center">Registrasi Petani</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Daftar</button>
            </form>
            <p class="text-center mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</div>
@endsection
