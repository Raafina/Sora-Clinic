<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Http\Controllers\Controller;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dokter.obat.index', ['title' => 'Daftar Obat', 'medicines' => $medicines]);
    }

    public function create()
    {
        return view('dokter.obat.create', ['title' => 'Tambah Obat']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
        ]);

        Medicine::create($validated);

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('dokter.obat.edit', ['title' => 'Ubah Obat', 'medicine' => $medicine]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_obat' => ['required', 'string', 'max:255'],
            'kemasan' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update($validated);
        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->back()->with('success', 'Obat berhasil dihapus!');
    }
}
