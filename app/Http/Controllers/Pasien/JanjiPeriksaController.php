<?php

namespace App\Http\Controllers\Pasien;

use App\Models\User;
use App\Models\JanjiPeriksa;
use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JanjiPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $dokters = User::with([
            'jadwalPeriksas' => function ($query) {
                $query->where('status', true);
            },
        ])
            ->where('role', 'dokter')
            ->get();

        return view('pasien.daftar-poli.index', [
            'title' => 'Daftar Poli',
            'no_rm' => $no_rm,
            'dokters' => $dokters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => ['required', 'exists:users,id'],
            'keluhan' => ['required'],
        ]);

        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', $request->id_dokter)
            ->where('status', true)
            ->first();

        if (!$jadwalPeriksa) {
            return Redirect::route('pasien.daftar-poli.index')
                ->with('error', 'Jadwal periksa untuk dokter ini tidak tersedia atau tidak aktif.');
        }

        $jumlahJanji = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)->count();
        $noAntrian = $jumlahJanji + 1;

        JanjiPeriksa::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal_periksa' => $jadwalPeriksa->id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian
        ]);

        return Redirect::route('pasien.daftar-poli.index')
            ->with('success', 'Jadwal periksa berhasil ditambahkan');
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
    // public function destroy(Dokter $dokter)
    // {
    //     Dokter::destroy($dokter->id);
    //     return redirect('admin/dokter')->with('success', 'Dokter berhasil dihapus');
    // }
}
