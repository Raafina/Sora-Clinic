<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestoreObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::filter(request(['search']))
            ->onlyTrashed()
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dokter.restore-obat.index', ['title' => 'Daftar Obat Terhapus', 'obats' => $obats]);
    }

    public function restore($id)
    {
        Obat::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('dokter.restore-obat.index')->with('success', 'Obat berhasil di-restore');
    }
}
