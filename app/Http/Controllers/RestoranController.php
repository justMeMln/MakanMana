<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;

class RestoranController extends Controller
{
    public function index()
    {
        $restorans = Restoran::all();
        return view('restoran.index', compact('restorans'));
    }

    public function create()
    {
        return view('restoran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_restoran' => 'required|string',
            'alamat' => 'required|string',
        ]);

        Restoran::create($validated);

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil ditambahkan');
    }

    public function show($id)
    {
        $restoran = Restoran::findOrFail($id);
        return view('restoran.show', compact('restoran'));
    }

    public function edit($id)
    {
        $restoran = Restoran::findOrFail($id);
        return view('restoran.edit', compact('restoran'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_restoran' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $restoran = Restoran::findOrFail($id);
        $restoran->update($validated);

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $restoran = Restoran::findOrFail($id);
        $restoran->delete();

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil dihapus');
    }
}
