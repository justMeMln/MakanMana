@extends('admin-page.layouts.app')


@section('content')
<div class="container">
    <h1>Daftar Menu</h1>
    <a href="{{ route('admin-page.menu.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id_menu }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>{{ $menu->harga_menu }}</td>
                <td>{{ $menu->kategori_menu }}</td>
                <td>
                    <a href="{{ route('admin-page.menu.show', $menu->id_menu) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin-page.menu.edit', $menu->id_menu) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin-page.menu.destroy', $menu->id_menu) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
