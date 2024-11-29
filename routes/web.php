<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// ===========================
// ROUTES UNTUK HALAMAN ADMIN
// ===========================
Route::prefix('admin')->middleware('auth')->name('admin-page.')->group(function () {
    // Halaman utama admin
    Route::get('/', function () {
        return view('admin-page.home-admin');
    })->name('home'); // Nama route: admin-page.home

    // Resource routes untuk menu
    Route::resource('menu', MenuController::class)->names([
        'index' => 'menu.index',
        'create' => 'menu.create',
        'store' => 'menu.store',
        'show' => 'menu.show',
        'edit' => 'menu.edit',
        'update' => 'menu.update',
        'destroy' => 'menu.destroy',
    ]);

    // Resource routes untuk admin
    Route::resource('admin', AdminController::class)->names([
        'index' => 'admin.index',
        'create' => 'admin.create',
        'store' => 'admin.store',
        'show' => 'admin.show',
        'edit' => 'admin.edit',
        'update' => 'admin.update',
        'destroy' => 'admin.destroy',
    ]);

    // Resource routes untuk restoran
    Route::resource('restoran', RestoranController::class)->names([
        'index' => 'restoran.index',
        'create' => 'restoran.create',
        'store' => 'restoran.store',
        'show' => 'restoran.show',
        'edit' => 'restoran.edit',
        'update' => 'restoran.update',
        'destroy' => 'restoran.destroy',
    ]);

    // Resource routes untuk user
    Route::resource('user', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
});

// ==========================
// ROUTES UNTUK HALAMAN USER
// ==========================
Route::prefix('/')->name('user.')->group(function () {
    // Halaman beranda (memerlukan autentikasi)
    Route::get('/', [UserController::class, 'home'])->name('home')->middleware('auth');

    Route::get('/menu/{id}', [MenuController::class, 'showdetail'])->name('menu.showdetail');

    // Halaman tentang (bebas diakses)
    Route::get('/about', [UserController::class, 'about'])->name('about');

    // Halaman pencarian (bebas diakses)
    Route::get('/search', [MenuController::class, 'search'])->name('search');

    // Halaman profil (memerlukan autentikasi)
    Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

    // Logout (hanya bisa diakses jika login)
    Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

    // Halaman login (bebas diakses)
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginStore'])->name('login.store');

    // Halaman registrasi (bebas diakses)
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');

    // Halaman detail menu (bebas diakses)
    Route::get('/menu/{id}', [UserController::class, 'showMenu'])->name('menu.show');
});
