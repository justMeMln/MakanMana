@extends('admin-page.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Restoran</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $restoran->nama_restoran }}</h5>
            <p class="card-text">Alamat: {{ $restoran->alamat }}</p>
        </div>
    </div>

    <h2>Daftar Menu</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Menu</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($restoran->menus as $menu)
            <tr>
                <td>{{ $menu->id_menu }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>{{ $menu->harga_menu }}</td>
                <td>{{ $menu->kategori_menu }}</td>
                <td>
                    <a href="{{ route('admin-page.menu.show', $menu->id_menu) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada menu untuk restoran ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin-page.restoran.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
