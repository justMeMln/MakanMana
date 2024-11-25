@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pengguna</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Username: {{ $user->username }}</h5>
            <p class="card-text">Nama Lengkap: {{ $user->nama_lengkap }}</p>
            <p class="card-text">Preferensi Menu: {{ $user->preferensi_menu }}</p>
        </div>
    </div>
    <a href="{{ route('user.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
