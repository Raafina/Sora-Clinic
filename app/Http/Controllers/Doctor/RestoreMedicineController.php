<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Medicine;
use App\Http\Controllers\Controller;

class RestoreMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::filter(request(['search']))
            ->onlyTrashed()
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dokter.restore-obat.index', ['title' => 'Daftar Obat Terhapus', 'medicines' => $medicines]);
    }

    public function restore($id)
    {
        Medicine::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('dokter.restore-obat.index')->with('success', 'Obat berhasil di-restore');
    }
}
