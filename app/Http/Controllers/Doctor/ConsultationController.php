<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::filter(request(['search']))
            ->where('id_user_dokter', Auth::user()->id)
            ->with('pasien')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('doctor.consultation.index', ['title' => 'Konsultasi', 'consultations' => $consultations]);
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
        $consultation = Consultation::findOrFail($id);
        return view('doctor.consultation.edit', ['title' => 'Ubah Konsultasi Dokter', 'consultation' => $consultation]);
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
            'jawaban' => ['required', 'string', 'min:0'],
        ]);

        Consultation::findOrFail($id)->update([
            'id_user_pasien' => $request->id_user_pasien,
            'id_user_dokter' => $validated['id_user_dokter'],
            'pertanyaan' => $validated['pertanyaan'],
            'subjek' => $validated['subjek'],
            'jawaban' => $validated['jawaban'],
        ]);

        return redirect()->route('doctor.consultation.index')->with('success', 'Konsultasi berhasil dijawab!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsultasi = Consultation::findOrFail($id);
        $konsultasi->delete();

        return redirect()->back()->with('success', 'Konsultasi berhasil dihapus!');
    }
}
