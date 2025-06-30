<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Polyclinic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PolyclinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polyclinics = Polyclinic::filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.polyclinic.index', ['title' => 'Daftar Obat', 'polyclinics' => $polyclinics]);
    }

    public function create()
    {
        return view('admin.polyclinic.create', ['title' => 'Tambah Poliklinik']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
        ]);

        Polyclinic::create($validated);

        return redirect()->route('admin.polyclinic.index')->with('success', 'Poliklinik berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $polyclinic = Polyclinic::findOrFail($id);
        return view('admin.polyclinic.edit', ['title' => 'Ubah Policlinic', 'polyclinic' => $polyclinic]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
        ]);

        $polyclinic = Polyclinic::findOrFail($id);
        $polyclinic->update($validated);
        return redirect()->route('admin.polyclinic.index')->with('success', 'Data poliklinik berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $polyclinic = Polyclinic::findOrFail($id);
        $polyclinic->delete();

        return redirect()->back()->with('success', 'Data Poliklinik berhasil dihapus!');
    }
}
