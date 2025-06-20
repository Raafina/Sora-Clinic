<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\User;
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
            ->where('id_user_pasien', Auth::user()->id)
            ->with('dokter')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pasien.konsultasi.index', ['title' => 'Konsultasi', 'konsultasis' => $konsultasis]);
    }

    public function create()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.konsultasi.create', ['title' => 'Konsultasi Dokter', 'dokters' => $dokters]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user_dokter' => ['required', 'string', 'max:255', 'exists:users,id'],
            'subjek' => ['required', 'string', 'max:255'],
            'pertanyaan' => ['required', 'string', 'min:0'],
        ]);

        Konsultasi::create([
            'id_user_pasien' => Auth::user()->id,
            'id_user_dokter' => $validated['id_user_dokter'],
            'pertanyaan' => $validated['pertanyaan'],
            'subjek' => $validated['subjek'],
        ]);


        return redirect()->route('pasien.konsultasi.index')->with('success', 'Konsultasi berhasil ditambahkan!');
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
        $dokters = User::where('role', 'dokter')->get();
        $konsultasi = Konsultasi::findOrFail($id);
        return view('pasien.konsultasi.edit', ['title' => 'Ubah Konsultasi Dokter', 'konsultasi' => $konsultasi, 'dokters' => $dokters]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_user_dokter' => ['required', 'string', 'max:255', 'exists:users,id'],
            'subjek' => ['required', 'string', 'max:255'],
            'pertanyaan' => ['required', 'string', 'min:0'],
        ]);

        Konsultasi::findOrFail($id)->update([
            'id_user_pasien' => Auth::user()->id,
            'id_user_dokter' => $validated['id_user_dokter'],
            'pertanyaan' => $validated['pertanyaan'],
            'subjek' => $validated['subjek'],
        ]);

        return redirect()->route('pasien.konsultasi.index')->with('success', 'Konsultasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->delete();

        return redirect()->back()->with('success', 'Konsultasi berhasil dihapus!');
    }
}
