<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MakanMana!')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin-page.home') }}">MakanMana!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin-page/admin*') ? 'active' : '' }}" href="{{ route('admin-page.admin.index') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin-page/menu*') ? 'active' : '' }}" href="{{ route('admin-page.menu.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin-page/user*') ? 'active' : '' }}" href="{{ route('admin-page.user.index') }}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin-page/restoran*') ? 'active' : '' }}" href="{{ route('admin-page.restoran.index') }}">Restoran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
