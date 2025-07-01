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

        return view('doctor.medicine.index', ['title' => 'Daftar Obat', 'medicines' => $medicines]);
    }

    public function create()
    {
        return view('doctor.medicine.create', ['title' => 'Tambah Obat']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_name' => ['required', 'string', 'max:255'],
            'packaging' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        Medicine::create($validated);

        return redirect()->route('doctor.medicine.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('doctor.medicine.edit', ['title' => 'Ubah Obat', 'medicine' => $medicine]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'medicine_name' => ['required', 'string', 'max:255'],
            'packaging' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update($validated);
        return redirect()->route('doctor.medicine.index')->with('success', 'Obat berhasil diubah!');
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
