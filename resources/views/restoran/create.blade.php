@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Restoran</h1>
    <form action="{{ route('restoran.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_restoran" class="form-label">Nama Restoran</label>
            <input type="text" name="nama_restoran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
