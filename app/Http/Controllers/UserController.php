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

    public function index()
    {
        // Ambil semua pengguna dari database
        $users = User::all();

        // Kirim data pengguna ke view
        return view('admin-page.user.index', compact('users'));
    }

    public function showMenu($id)
    {
        // Ambil data menu berdasarkan ID
        $menu = Menu::findOrFail($id);

        // Kirim data menu ke view
        return view('user-page.detail', compact('menu'));
    }


    public function about()
    {
        return view('user-page.about');
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

            // Cek jika username mengandung "admin"
            if (str_contains(strtolower($request->username), 'admin')) {
                return redirect()->route('admin-page.home'); // Redirect ke halaman admin
            }

            // Redirect ke halaman user biasa
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


