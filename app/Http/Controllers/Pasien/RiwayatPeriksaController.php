<?php

namespace App\Http\Controllers\Pasien;

use App\Models\User;
use App\Models\JanjiPeriksa;
use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RiwayatPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $janjiPeriksas = JanjiPeriksa::where('id_pasien', Auth::user()->id)->get();
        return view('pasien.riwayat-periksa.index', [
            'title' => 'Riwayat Periksa',
            'janjiPeriksas' => $janjiPeriksas
        ]);
    }

    public function riwayat($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['jadwalPeriksas.dokter'])->findOrFail($id);
        return view('pasien.riwayat-periksa.riwayat', [
            'title' => 'Riwayat Periksa',
            'janjiPeriksa' => $janjiPeriksa
        ]);
    }

    public function detail($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['jadwalPeriksas.dokter'])->findOrFail($id);
        return view('pasien.riwayat-periksa.detail', [
            'title' => 'Riwayat Periksa',
            'janjiPeriksa' => $janjiPeriksa
        ]);
    }
}
