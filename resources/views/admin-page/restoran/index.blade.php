@extends('admin-page.layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Restoran</h1>
        <a href="{{ route('admin-page.restoran.create') }}" class="btn btn-primary mb-3">Tambah Restoran</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Restoran</th>
                    <th>Alamat</th>
                    <th>Link Maps</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restorans as $restoran)
                    <tr>
                        <td>{{ $restoran->id_restoran }}</td>
                        <td>{{ $restoran->nama_restoran }}</td>
                        <td>{{ $restoran->alamat }}</td>
                        <td>{{ $restoran->link_maps }}</td>
                        <td>
                            <a href="{{ route('admin-page.restoran.show', $restoran->id_restoran) }}"
                                class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin-page.restoran.edit', $restoran->id_restoran) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin-page.restoran.destroy', $restoran->id_restoran) }}" method="POST"
                                style="display:inline;">
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
