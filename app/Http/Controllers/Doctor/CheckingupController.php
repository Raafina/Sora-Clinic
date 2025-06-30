<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\CheckupSchedule;
use App\Models\Medicine;
use App\Models\CheckupDetail;
use App\Models\CheckupAppointment;
use App\Models\Checkup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class CheckingupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // find checkup appointment from authenticated dokter with active status
        $checkupAppointment = CheckupSchedule::where('id_dokter', Auth::user()->id)
            ->where('status', true)
            ->first();

        // find checkup appointment from jadwal periksa
        $checkupAppointments = CheckupAppointment::where('id_jadwal_periksa', $checkupAppointment->id)
            ->filter(request(['search']))
            ->oldest()
            ->paginate(10);

        return view('dokter.memeriksa.index', [
            'title' => 'Periksa Pasien',
            'checkupAppointments' => $checkupAppointments
        ]);
    }

    public function periksa(string $id)
    {
        $checkupAppointment = CheckupAppointment::findOrFail($id);
        $medicines = Medicine::all();
        return view('dokter.memeriksa.periksa', [
            'title' => 'Periksa Pasien',
            'checkupAppointment' => $checkupAppointment,
            'medicines' => $medicines
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
            'obats.*' => ['exists:medicines,id'],
        ]);

        $checkupAppointment = CheckupAppointment::findOrFail($id);

        $checkup = Checkup::create([
            'id_janji_periksa' => $checkupAppointment->id,
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $validatedData['biaya_periksa'],
        ]);

        foreach ($validatedData['obats'] as $obatId) {
            CheckupDetail::create([
                'id_periksa' => $checkup->id,
                'id_obat' => $obatId,
            ]);
        }
        return redirect()->route('dokter.memeriksa.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan.');
    }

    public function edit(string $id)
    {
        $medicines = Medicine::all();
        $checkupAppointment = CheckupAppointment::findOrFail($id);
        return view('dokter.memeriksa.edit', [
            'medicines' => $medicines,
            'checkupAppointment' => $checkupAppointment
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
            'obats.*' => ['exists:medicines,id'],
        ]);

        $checkupAppointment = CheckupAppointment::findOrFail($id);

        $checkup = Checkup::where('id_janji_periksa', $checkupAppointment->id)->first();
        $checkup->update([
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $validatedData['biaya_periksa'],
        ]);

        // Delete existing checkup detail 
        CheckupDetail::where('id_periksa', $checkup->id)->delete();

        // Create new checkup detail
        foreach ($validatedData['obats'] as $obatId) {
            CheckupDetail::create([
                'id_periksa' => $checkup->id,
                'id_obat' => $obatId,
            ]);
        }
        return redirect()->route('dokter.memeriksa.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan.');
    }
}
