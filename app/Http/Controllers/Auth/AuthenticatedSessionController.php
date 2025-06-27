<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'mahasiswa') {
                $mahasiswa = \App\Models\Mahasiswa::where('user_id', $user->id)->first();
                if ($mahasiswa && $mahasiswa->status === 'Diterima') {
                    return redirect()->route('laporan-harian.laporanharian.index');
                } else {
                    // Pending/Ditolak ke home
                    return redirect()->route('home');
                }
            }
            // Default redirect for non-mahasiswa
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 🔁 Redirect to login page after logout
        return redirect()->route('login');
    }
}
