@extends('admin-page.layouts.app2')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Card Kelola Admin -->
        <div class="col">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="icon mb-3 text-primary">
                        <i class="bi bi-person-badge display-4"></i>
                    </div>
                    <h5 class="card-title">Kelola Admin</h5>
                    <p class="card-text">Kelola data admin di sistem dengan mudah.</p>
                    <a href="{{ route('admin-page.admin.index') }}" class="btn btn-primary">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Card Kelola Menu -->
        <div class="col">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="icon mb-3 text-success">
                        <i class="bi bi-card-list display-4"></i>
                    </div>
                    <h5 class="card-title">Kelola Menu</h5>
                    <p class="card-text">Atur dan tambahkan menu baru ke dalam sistem.</p>
                    <a href="{{ route('admin-page.menu.index') }}" class="btn btn-success">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Card Kelola User -->
        <div class="col">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="icon mb-3 text-warning">
                        <i class="bi bi-people display-4"></i>
                    </div>
                    <h5 class="card-title">Kelola User</h5>
                    <p class="card-text">Pantau dan kelola pengguna aplikasi.</p>
                    <a href="{{ route('admin-page.user.index') }}" class="btn btn-warning">Kelola</a>
                </div>
            </div>
        </div>

        <!-- Card Kelola Restoran -->
        <div class="col">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="icon mb-3 text-danger">
                        <i class="bi bi-shop display-4"></i>
                    </div>
                    <h5 class="card-title">Kelola Restoran</h5>
                    <p class="card-text">Tambah dan atur informasi restoran.</p>
                    <a href="{{ route('admin-page.restoran.index') }}" class="btn btn-danger">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
