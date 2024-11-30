@extends('admin-page.layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <a href="{{ route('admin-page.user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>
                            <a href="{{ route('admin-page.user.show', $user->id_user) }}"
                                class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('admin-page.user.edit', $user->id_user) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin-page.user.destroy', $user->id_user) }}" method="POST"
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
