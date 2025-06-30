<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Polyclinic;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::where('role', 'dokter')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.doctor.index', ['title' => 'Daftar Obat', 'doctors' => $doctors]);
    }

    public function create()
    {
        $polyclinics = Polyclinic::all();
        return view('admin.doctor.create', ['title' => 'Tambah Obat', 'polyclinics' => $polyclinics]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'id_poli' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'role' => 'dokter',
            'nama' => $validated['nama'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'id_poli' => $validated['id_poli'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.doctor.index')->with('success', 'Dokter berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $polyclinics = Polyclinic::all();
        $doctor = User::findOrFail($id);
        return view('admin.doctor.edit', ['title' => 'Ubah Dokter', 'doctor' => $doctor, 'polyclinics' => $polyclinics]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->ignore($id),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->ignore($id),
            ],
            'id_poli' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($id),
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $doctor = User::findOrFail($id);
        $doctor->update($validated);
        return redirect()->route('admin.doctor.index')->with('success', 'Data dokter berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = User::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('success', 'Data dokter berhasil dihapus!');
    }
}
