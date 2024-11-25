<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Tampilkan semua menu
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        // Form untuk membuat menu baru
        return view('menu.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data menu baru
        $validated = $request->validate([
            'nama_menu' => 'required|string',
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required|in:Makanan Berat,Makanan Ringan,Minuman',
            'url_gambar_menu' => 'required|url',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function show($id)
    {
        // Tampilkan detail menu
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        // Form untuk mengedit menu
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data menu
        $validated = $request->validate([
            'nama_menu' => 'required|string',
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required|in:Makanan Berat,Makanan Ringan,Minuman',
            'url_gambar_menu' => 'required|url',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus menu
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
