<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pasien.auth.register', ['title' => 'Daftar Pasien']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class, 'max:5'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'max:20'],
            'no_hp' => ['required', 'string', 'max:20', 'unique:' . User::class],
        ]);

        $currentMonth = date('Ym');
        $patientCount = User::where('no_rm', 'like', $currentMonth . '%')->count();

        $year = date('Y');
        $month = date('m');
        $no_rm = "{$year}{$month} - " . ($patientCount + 1);

        $request->merge([
            'role' => 'pasien',
            'no_rm' => $no_rm,
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $no_rm,
            'role' => 'pasien',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
