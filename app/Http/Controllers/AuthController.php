<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pasien;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminLoginView()
    {
        return view('admin/auth/login', ['title' => 'Login Admin']);
    }

    public function pasienLoginView()
    {
        return view('pasien/auth/login', ['title' => 'Login Pasien']);
    }

    public function pasienRegisterView()
    {
        return view('pasien/auth/register', ['title' => 'Daftar Pasien']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pasienRegisterStore(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|max:255',
            'no_hp' => 'required|max:255|unique:patients',
        ]);

        $lastPasien = Pasien::withTrashed()->latest('id')->first();

        $urut = $lastPasien ? $lastPasien->id + 1 : 1;

        $year = date('Y');
        $month = date('m');

        $validated['no_rm'] = "{$year}{$month}-{$urut}";
        $validated['role'] = 'pasien';

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        Pasien::create([
            'user_id' => $user->id,
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'no_ktp' => $validated['no_ktp'],
            'no_hp' => $validated['no_hp'],
            'no_rm' => $validated['no_rm'],
        ]);


        return redirect('/')->with('success', 'Register berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
