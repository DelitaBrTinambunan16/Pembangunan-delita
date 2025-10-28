<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ✅ Tampilkan halaman login
    public function index()
    {
        return view('auth.login');
    }

    // ✅ Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // minimal 1 huruf kapital
            ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        // ✅ Arahkan ke dashboard setelah login sukses
       return redirect()->route('dashboard.admin')->with('success', 'Selamat datang, '.$user->name);
    }

    // ✅ Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // ✅ Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/'
            ],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ✅ Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
