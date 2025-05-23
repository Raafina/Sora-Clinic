<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pasien.auth.login', ['title' => 'Login Pasien']);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'dokter') {
                return redirect()->intended('/dokter/jadwal-periksa');
            } elseif ($user->role === 'pasien') {
                return redirect()->intended('/pasien/daftar-poli');
            } else {
                Auth::logout();
                return back()->with('loginError', 'Login gagal! Email atau Kata Sandi salah.')->withInput();
            }
        }

        return back()->with('loginError', 'Login gagal! Email atau Kata Sandi salah.')->withInput();
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
