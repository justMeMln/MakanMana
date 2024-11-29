@extends('user-page.layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Akun Baru</h1>

    <!-- Tampilkan Pesan Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.register.store') }}" method="POST" class="border p-4 shadow-sm rounded">
        @csrf

        <!-- Input Nama Lengkap -->
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input
                type="text"
                class="form-control @error('nama_lengkap') is-invalid @enderror"
                id="nama_lengkap"
                name="nama_lengkap"
                placeholder="Masukkan nama lengkap Anda"
                value="{{ old('nama_lengkap') }}"
                required>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
                type="text"
                class="form-control @error('username') is-invalid @enderror"
                id="username"
                name="username"
                placeholder="Masukkan username unik Anda"
                value="{{ old('username') }}"
                required>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Konfirmasi Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input
                type="password"
                class="form-control"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Masukkan ulang password"
                required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>

    <!-- Link ke Halaman Login -->
    <div class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('user.login') }}">Masuk di sini</a>.
    </div>
</div>
@endsection
