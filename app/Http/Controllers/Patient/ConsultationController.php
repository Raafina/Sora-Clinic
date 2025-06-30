<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::filter(request(['search']))
            ->where('id_user_pasien', Auth::user()->id)
            ->with('dokter')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pasien.konsultasi.index', ['title' => 'Konsultasi', 'consultations' => $consultations]);
    }

    public function create()
    {
        $doctors = User::where('role', 'dokter')->get();
        return view('pasien.konsultasi.create', ['title' => 'Konsultasi Dokter', 'doctors' => $doctors]);
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

        Consultation::create([
            'id_user_pasien' => Auth::user()->id,
            'id_user_dokter' => $validated['id_user_dokter'],
            'pertanyaan' => $validated['pertanyaan'],
            'subjek' => $validated['subjek'],
        ]);

        return redirect()->route('pasien.konsultasi.index')->with('success', 'Konsultasi berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $doctors = User::where('role', 'dokter')->get();
        $consultation = Consultation::findOrFail($id);
        return view('pasien.konsultasi.edit', ['title' => 'Ubah Konsultasi Dokter', 'consultation' => $consultation, 'doctors' => $doctors]);
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

        Consultation::findOrFail($id)->update([
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
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return redirect()->back()->with('success', 'Konsultasi berhasil dihapus!');
    }
}
