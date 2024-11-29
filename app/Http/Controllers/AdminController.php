<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin-page.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin-page.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:admin',
            'password' => 'required|string',
        ]);

        $validated['password'] = md5($validated['password']); // Enkripsi password
        Admin::create($validated);

        return redirect()->route('admin-page.admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function show($username)
    {
        $admin = Admin::findOrFail($username);
        return view('admin-page.admin.show', compact('admin'));
    }

    public function edit($username)
    {
        $admin = Admin::findOrFail($username);
        return view('admin-page.admin.edit', compact('admin'));
    }

    public function update(Request $request, $username)
    {
        $validated = $request->validate([
            'password' => 'required|string',
        ]);

        $validated['password'] = md5($validated['password']); // Enkripsi password
        $admin = Admin::findOrFail($username);
        $admin->update($validated);

        return redirect()->route('admin-page.admin.index')->with('success', 'Admin berhasil diperbarui');
    }

    public function destroy($username)
    {
        $admin = Admin::findOrFail($username);
        $admin->delete();

        return redirect()->route('admin-page.admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
