<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restoran;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $menus = Menu::where('nama_menu', 'LIKE', "%{$keyword}%")
            ->orWhereHas('restoran', function ($query) use ($keyword) {
                $query->where('nama_restoran', 'LIKE', "%{$keyword}%");
            })
            ->get();

        return view('user-page.search', compact('menus'));
    }

    public function index()
    {
        $menus = Menu::with('restoran')->paginate(50); // Pagination 10 data per halaman
        return view('admin-page.menu.index', compact('menus'));
    }

    public function create()
    {
        $restorans = Restoran::all(); // Daftar restoran untuk dropdown
        return view('admin-page.menu.create', compact('restorans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga_menu' => 'required|integer|min:0',
            'kategori_menu' => 'required|in:Makanan Berat,Makanan Ringan,Minuman',
            'url_gambar_menu' => 'required|active_url',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        Menu::create($validated);

        return redirect()->route('admin-page.menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show($id)
    {
        $menu = Menu::with('restoran')->findOrFail($id); // Pastikan eager loading hanya untuk restoran
        return view('admin-page.menu.show', compact('menu'));
    }

    public function showdetail($id)
    {
        $menu = Menu::with('restoran')->findOrFail($id);
        return view('user-page.menu.detail', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $restorans = Restoran::all(); // Ambil semua restoran untuk dropdown
        return view('admin-page.menu.edit', compact('menu', 'restorans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga_menu' => 'required|integer|min:0',
            'kategori_menu' => 'required|in:Makanan Berat,Makanan Ringan,Minuman',
            'url_gambar_menu' => 'required|active_url',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);

        return redirect()->route('admin-page.menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin-page.menu.index')->with('success', 'Menu berhasil dihapus!');
    }

}
