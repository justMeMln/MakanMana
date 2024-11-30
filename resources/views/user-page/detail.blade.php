@extends('user-page.layouts.app')

@section('title', 'Detail Menu')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $menu->url_gambar_menu }}" class="img-fluid rounded" alt="{{ $menu->nama_menu }}"
                    style="height: 500px; object-fit: cover; width: 100%;">
            </div>
            <div class="col-md-6">
                <h1>{{ $menu->nama_menu }}</h1>
                <p><strong>Kategori:</strong> {{ ucwords($menu->kategori_menu) }}</p>
                <p><strong>Harga:</strong> Rp{{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                <p><strong>Nama Restoran:</strong> {{ $menu->restoran->nama_restoran }}</p>
                <p><strong>Alamat Restoran:</strong> {{ $menu->restoran->alamat }}</p>
                <a href="{{ $menu->restoran->link_maps }}" target="_blank" class="btn btn-success">
                    Lihat Maps
                </a>
            </div>
        </div>
    </div>
@endsection
