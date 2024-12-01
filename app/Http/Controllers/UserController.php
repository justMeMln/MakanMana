<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $makananBerat = Menu::where('kategori_menu', 'Makanan Berat')->get();
        $makananRingan = Menu::where('kategori_menu', 'Makanan Ringan')->get();
        $minuman = Menu::where('kategori_menu', 'Minuman')->get();

        return view('user-page.home', compact('makananBerat', 'makananRingan', 'minuman'));
    }

    // Menampilkan semua data user
    public function index()
    {
        $users = User::all(); // Ambil semua data user dari tabel 'user'
        return view('admin-page.user.index', compact('users'));
    }

    // Menampilkan halaman tambah user
    public function create()
    {
        return view('admin-page.user.create');
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'password' => 'required|string|min:6',
        ]);

        // Hash password sebelum menyimpan
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin-page.user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan detail user berdasarkan ID
    public function show($id_menu)
    {
        // Cari pengguna berdasarkan id_menu
        $user = User::findOrFail($id_menu);
        return view('admin-page.user.show', compact('user'));
    }

    public function edit($id_menu)
    {
        // Cari pengguna berdasarkan id_menu
        $user = User::findOrFail($id_menu);
        return view('admin-page.user.edit', compact('user'));
    }

    public function destroy($id_menu)
    {
        // Cari pengguna berdasarkan id_menu
        $user = User::findOrFail($id_menu);
        $user->delete();
        return redirect()->route('admin-page.user.index')->with('success', 'Pengguna berhasil dihapus');
    }

    // Memperbarui data user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . $id,
            'password' => 'nullable|string|min:6', // Password optional saat edit
        ]);

        $user = User::findOrFail($id);

        // Hanya hash password jika diisi
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin-page.user.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus user berdasarkan ID

    public function showMenu($id)
    {
        // Ambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Kirim data menu ke view
        return view('user-page.detail', compact('menu'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $menus = Menu::where('nama_menu', 'LIKE', "%{$keyword}%")->get();
        return view('user-page.search', compact('menus', 'keyword'));
    }

    public function profile()
    {
        $user = Auth::user(); // Dapatkan data pengguna yang sedang login
        return view('user-page.profile', compact('user'));
    }

    public function login()
    {
        return view('user-page.login');
    }

    public function showRegisterForm()
    {
        return view('user-page.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Simpan waktu login awal
            session(['last_activity' => now()->timestamp]);

            if (str_contains(strtolower($request->username), 'admin')) {
                return redirect()->route('admin-page.home'); // Redirect ke halaman admin
            }

            return redirect()->route('user.home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login')->with('success', 'Anda telah berhasil logout.');
    }


}
