@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Preferensi Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nama_lengkap }}</td>
                <td>{{ $user->preferensi_menu }}</td>
                <td>
                    <a href="{{ route('user.show', $user->username) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('user.edit', $user->username) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $user->username) }}" method="POST" style="display:inline;">
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
