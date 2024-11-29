@extends('user-page.layouts.app')

@section('title', 'Detail Menu')

@section('content')
<div class="container">
    <h1>{{ $menu->nama }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $menu->nama }}</h5>
            <p class="card-text">Harga: Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
            <p class="card-text">Kategori: {{ $menu->kategori }}</p>
            <p class="card-text">{{ $menu->deskripsi }}</p>
            <img src="{{ asset('images/'.$menu->gambar) }}" class="img-fluid" alt="{{ $menu->nama }}">
        </div>
    </div>
    <a href="{{ route('user.home') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
