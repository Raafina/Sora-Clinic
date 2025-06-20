<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsultasis = Konsultasi::filter(request(['search']))
            ->where('id_user_dokter', Auth::user()->id)
            ->with('pasien')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dokter.konsultasi.index', ['title' => 'Konsultasi', 'konsultasis' => $konsultasis]);
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
        $konsultasi = Konsultasi::findOrFail($id);
        return view('dokter.konsultasi.edit', ['title' => 'Ubah Konsultasi Dokter', 'konsultasi' => $konsultasi]);
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
