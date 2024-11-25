@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>
    <form action="{{ route('user.update', $user->username) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="{{ $user->nama_lengkap }}" required>
        </div>
        <div class="mb-3">
            <label for="preferensi_menu" class="form-label">Preferensi Menu</label>
            <input type="text" name="preferensi_menu" class="form-control" value="{{ $user->preferensi_menu }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
