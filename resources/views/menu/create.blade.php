@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Menu</h1>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga_menu" class="form-label">Harga Menu</label>
            <input type="number" name="harga_menu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori_menu" class="form-label">Kategori Menu</label>
            <select name="kategori_menu" class="form-select" required>
                <option value="Makanan Berat">Makanan Berat</option>
                <option value="Makanan Ringan">Makanan Ringan</option>
                <option value="Minuman">Minuman</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="url_gambar_menu" class="form-label">URL Gambar Menu</label>
            <input type="url" name="url_gambar_menu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_restoran" class="form-label">ID Restoran</label>
            <input type="number" name="id_restoran" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
