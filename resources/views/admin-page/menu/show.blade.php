@extends('admin-page.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Menu</h1>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $menu->nama_menu }}</h2>
            <p class="card-text">Harga: Rp{{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
            <p class="card-text">Kategori: {{ $menu->kategori_menu }}</p>
            <p class="card-text">Restoran: {{ $menu->restoran->nama_restoran }}</p>
            <img src="{{ $menu->url_gambar_menu }}" class="img-fluid" alt="Gambar Menu">
        </div>
    </div>
    <a href="{{ route('admin-page.menu.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
