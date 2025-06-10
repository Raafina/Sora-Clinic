<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Http\Controllers\Controller;
use App\Models\JanjiPeriksa;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        //
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

    public function periksa(string $id)
    {
        return view('dokter.memeriksa.periksa', ['title' => 'Periksa Pasien',]);
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
