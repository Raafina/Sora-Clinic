<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\JanjiPeriksa;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class MemeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // find jadwal periksa from authenticated dokter with active status
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::user()->id)
            ->where('status', true)
            ->first();

        // find janji periksa from jadwal periksa
        $janjiPeriksas = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)
            ->filter(request(['search']))
            ->latest()
            ->paginate(10);

        return view('dokter.memeriksa.index', [
            'title' => 'Periksa Pasien',
            'janjiPeriksas' => $janjiPeriksas
        ]);
    }

    public function periksa(string $id)
    {
        $janjiPeriksa = JanjiPeriksa::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.memeriksa.periksa', [
            'title' => 'Periksa Pasien',
            'janjiPeriksa' => $janjiPeriksa,
            'obats' => $obats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $validatedData = $request->validate([
            'tgl_periksa' => ['required', 'date'],
            'catatan' => ['nullable'],
            'biaya_periksa' => ['required', 'numeric', 'min:0'],
            'obats' => ['array'],
            'obats.*' => ['exists:obats,id'],
        ]);

        $janjiPeriksa = JanjiPeriksa::findOrFail($id);

        $periksa = Periksa::create([
            'id_janji_periksa' => $janjiPeriksa->id,
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $validatedData['biaya_periksa'],
        ]);

        foreach ($validatedData['obats'] as $obatId) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $obatId,
            ]);
        }
        return redirect()->route('dokter.memeriksa.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan.');
    }

    public function edit(Request $request, string $id)
    {
        $obats = Obat::all();
        $janjiPeriksa = JanjiPeriksa::findOrFail($id);
        return view('dokter.memeriksa.edit', [
            'obats' => $obats,
            'janjiPeriksa' => $janjiPeriksa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'tgl_periksa' => ['required', 'date'],
            'catatan' => ['nullable'],
            'biaya_periksa' => ['required', 'numeric', 'min:0'],
            'obats' => ['array'],
            'obats.*' => ['exists:obats,id'],
        ]);

        $janjiPeriksa = JanjiPeriksa::findOrFail($id);

        $periksa = Periksa::where('id_janji_periksa', $janjiPeriksa->id)->first();
        $periksa->update([
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $validatedData['biaya_periksa'],
        ]);

        // Delete existing detail periksa
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Create new detail periksa
        foreach ($validatedData['obats'] as $obatId) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $obatId,
            ]);
        }
        return redirect()->route('dokter.memeriksa.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
