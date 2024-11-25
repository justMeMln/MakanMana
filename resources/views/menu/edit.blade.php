@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Menu</h1>
    <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" required>
        </div>
        <div class="mb-3">
            <label for="harga_menu" class="form-label">Harga Menu</label>
            <input type="number" name="harga_menu" class="form-control" value="{{ $menu->harga_menu }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_menu" class="form-label">Kategori Menu</label>
            <select name="kategori_menu" class="form-select" required>
                <option value="Makanan Berat" {{ $menu->kategori_menu == 'Makanan Berat' ? 'selected' : '' }}>Makanan Berat</option>
                <option value="Makanan Ringan" {{ $menu->kategori_menu == 'Makanan Ringan' ? 'selected' : '' }}>Makanan Ringan</option>
                <option value="Minuman" {{ $menu->kategori_menu == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="url_gambar_menu" class="form-label">URL Gambar Menu</label>
            <input type="url" name="url_gambar_menu" class="form-control" value="{{ $menu->url_gambar_menu }}" required>
        </div>
        <div class="mb-3">
            <label for="id_restoran" class="form-label">ID Restoran</label>
            <input type="number" name="id_restoran" class="form-control" value="{{ $menu->id_restoran }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
