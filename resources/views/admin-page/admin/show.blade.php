@extends('admin-page.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Admin</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Username: {{ $admin->username }}</h5>
        </div>
    </div>
    <a href="{{ route('admin-page.admin.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
