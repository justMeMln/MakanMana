<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:user',
            'password' => 'required|string',
            'nama_lengkap' => 'required|string',
            'preferensi_menu' => 'nullable|string',
        ]);

        $validated['password'] = md5($validated['password']); // Enkripsi password
        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show($username)
    {
        $user = User::findOrFail($username);
        return view('user.show', compact('user'));
    }

    public function edit($username)
    {
        $user = User::findOrFail($username);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $validated = $request->validate([
            'password' => 'required|string',
            'nama_lengkap' => 'required|string',
            'preferensi_menu' => 'nullable|string',
        ]);

        $validated['password'] = md5($validated['password']); // Enkripsi password
        $user = User::findOrFail($username);
        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($username)
    {
        $user = User::findOrFail($username);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
