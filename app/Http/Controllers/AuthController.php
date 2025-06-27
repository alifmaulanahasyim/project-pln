<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Login admin
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->route('data');
        }

        // Login mahasiswa
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role === 'mahasiswa') {
                $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user->id)->first();
                session()->forget('url.intended');
                if ($mahasiswa && $mahasiswa->status === 'Diterima') {
                    return redirect()->route('laporan-harian.laporanharian.index');
                } else {
                    return redirect()->route('home');
                }
            }
            // Jika bukan mahasiswa, logout dan redirect ke home
            Auth::logout();
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['error' => 'Username/email atau password anda salah.']);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // Show Register Form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        session(['admin_id' => $admin->id]);

        return redirect()->route('data');
    }
    public function authenticated(Request $request, $user)
    {
        // Cek apakah user adalah mahasiswa
        if ($user->role === 'mahasiswa') {
            // Cari data mahasiswa berdasarkan user_id dan status "Diterima"
            $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user->id)
                ->where('status', 'Diterima')
                ->first();

            // Jika mahasiswa ditemukan dan statusnya "Diterima"
            if ($mahasiswa) {
                // Redirect ke halaman laporan harian
                return redirect()->route('laporan-harian.index');
            } else {
                // Jika belum diterima, bisa redirect ke halaman info atau dashboard
                return redirect()->route('home')->with('error', 'Akses laporan harian hanya untuk mahasiswa yang sudah diterima.');
            }
        }

        // Jika bukan mahasiswa, redirect ke halaman default (misal admin dashboard)
        return redirect()->intended(route('home'));
    }
}
