@extends('user-page.layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Login</h1>

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

    <!-- Tampilkan Pesan Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user.login.store') }}" method="POST" class="border p-4 shadow-sm rounded">
        @csrf

        <!-- Input Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
                type="text"
                class="form-control @error('username') is-invalid @enderror"
                id="username"
                name="username"
                placeholder="Masukkan username Anda"
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
                placeholder="Masukkan password Anda"
                required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <!-- Link ke Halaman Daftar -->
    <div class="text-center mt-3">
        Belum punya akun? <a href="{{ route('user.register') }}">Daftar di sini</a>.
    </div>
</div>
@endsection
