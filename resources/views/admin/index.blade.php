@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Tambah Admin</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->username }}</td>
                <td>
                    <a href="{{ route('admin.show', $admin->username) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.edit', $admin->username) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.destroy', $admin->username) }}" method="POST" style="display:inline;">
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
