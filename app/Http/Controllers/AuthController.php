<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
