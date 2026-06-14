<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Mengautentikasi pengguna
    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Autentikasi pengguna
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil, flash pesan sukses
            session()->flash('success', 'Login berhasil!');
            return redirect()->route('music.index'); 
        }

//         if (Auth::attempt($request->only('email', 'password'))) {

//     $request->session()->regenerate();

//     session()->flash('success', 'Login berhasil!');
//     return redirect()->route('music.index');
// }

// Mencegah Session Fixation Attack, yaitu penyerang memanfaatkan ID session lama yang sudah diketahui.
    
        // Jika gagal, flash pesan error
        session()->flash('error', 'Email atau password salah.');
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menglogout pengguna
    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Anda telah berhasil logout.');
        return redirect()->route('login'); // Arahkan ke halaman login
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menyimpan data registrasi pengguna baru
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan data pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login pengguna setelah registrasi
        Auth::login($user);
        session()->flash('success', 'Registrasi berhasil! Selamat datang.');
        
        return redirect()->route('music.index'); 
    }
}