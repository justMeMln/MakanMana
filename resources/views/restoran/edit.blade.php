@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Restoran</h1>
    <form action="{{ route('restoran.update', $restoran->id_restoran) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_restoran" class="form-label">Nama Restoran</label>
            <input type="text" name="nama_restoran" class="form-control" value="{{ $restoran->nama_restoran }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $restoran->alamat }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
