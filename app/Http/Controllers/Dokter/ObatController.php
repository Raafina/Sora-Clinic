<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dokter.obat.index', ['title' => 'Daftar Obat', 'obats' => $obats]);
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

        Obat::create($validated);

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil ditambahkan!');
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
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', ['title' => 'Ubah Obat', 'obat' => $obat]);
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

        $obat = Obat::findOrFail($id);
        $obat->update($validated);
        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->back()->with('success', 'Obat berhasil dihapus!');
    }
}
