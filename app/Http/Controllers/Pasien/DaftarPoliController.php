<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dokters = Dokter::filter(request(['search']))->latest()->paginate(4)->withQueryString();

        return view('pasien.daftar-poli.index', ['title' => 'Daftar Poli']);
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
