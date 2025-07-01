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

class CheckingupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // find checkup appointment from authenticated dokter with active status
        $checkupAppointment = CheckupSchedule::where('id_doctor', Auth::user()->id)
            ->where('status', true)
            ->first();

        // find checkup appointment from jadwal periksa
        $checkupAppointments = CheckupAppointment::where('id_checkup_schedule', $checkupAppointment->id)
            ->filter(request(['search']))
            ->oldest()
            ->paginate(10);

        return view('doctor.chekingup.index', [
            'title' => 'Periksa Pasien',
            'checkupAppointments' => $checkupAppointments
        ]);
    }

    public function periksa(string $id)
    {
        $checkupAppointment = CheckupAppointment::findOrFail($id);
        $medicines = Medicine::all();
        return view('doctor.chekingup.periksa', [
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
            'checkup_date' => ['required', 'date'],
            'note' => ['nullable'],
            'checkup_fee' => ['required', 'numeric', 'min:0'],
            'obats' => ['array'],
            'obats.*' => ['exists:medicines,id'],
        ]);

        $checkupAppointment = CheckupAppointment::findOrFail($id);

        $checkup = Checkup::create([
            'id_checkup_appointment' => $checkupAppointment->id,
            'checkup_date' => $validatedData['checkup_date'],
            'note' => $validatedData['note'],
            'checkup_fee' => $validatedData['checkup_fee'],
        ]);

        foreach ($validatedData['obats'] as $obatId) {
            CheckupDetail::create([
                'id_checkup' => $checkup->id,
                'id_medicine' => $obatId,
            ]);
        }
        return redirect()->route('doctor.chekingup.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $medicines = Medicine::all();
        $checkupAppointment = CheckupAppointment::findOrFail($id);
        return view('doctor.chekingup.edit', [
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
            'checkup_date' => ['required', 'date'],
            'note' => ['nullable'],
            'checkup_fee' => ['required', 'numeric', 'min:0'],
            'obats' => ['array'],
            'obats.*' => ['exists:medicines,id'],
        ]);

        $checkupAppointment = CheckupAppointment::findOrFail($id);

        $checkup = Checkup::where('id_checkup_appointment', $checkupAppointment->id)->first();
        $checkup->update([
            'checkup_date' => $validatedData['checkup_date'],
            'note' => $validatedData['catatan'],
            'checkup_fee' => $validatedData['checkup_fee'],
        ]);

        // Delete existing checkup detail 
        CheckupDetail::where('id_checkup', $checkup->id)->delete();

        // Create new checkup detail
        foreach ($validatedData['obats'] as $obatId) {
            CheckupDetail::create([
                'id_checkup' => $checkup->id,
                'id_medicine' => $obatId,
            ]);
        }
        return redirect()->route('doctor.chekingup.index')->with('success', 'Data pemeriksaan pasien berhasil disimpan!');
    }
}
