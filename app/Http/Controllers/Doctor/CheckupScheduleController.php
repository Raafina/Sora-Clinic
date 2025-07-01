<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\CheckupSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckupScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalPeriksas = CheckupSchedule::filter(request(['search']))
            ->where('id_doctor', Auth::user()->id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('doctor.checkup_schedule.index', ['title' => 'Jadwal Periksa', 'jadwalPeriksas' => $jadwalPeriksas]);
    }

    public function create()
    {
        return view('doctor.checkup_schedule.create', ['title' => 'Tambah Jadwal Periksa']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => ['required', 'string', 'max:10'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
        ]);

        if (CheckupSchedule::where('id_doctor', Auth::user()->id)->where(
            'day',
            $validated['day']
        )->where(
            'start_time',
            $validated['start_time']
        )->where(
            'end_time',
            $validated['end_time']
        )->exists()) {
            return back()->withInput()->with('error', 'Jadwal periksa sudah ada');
        }

        CheckupSchedule::create([
            'id_doctor' => Auth::user()->id,
            'day' => $validated['day'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'status' => false
        ]);

        return redirect('/dokter/jadwal-periksa')->with('success', 'Jadwal periksa berhasil ditambahkan');
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
        // find id $jadwalPeriksa
        $jadwalPeriksa = CheckupSchedule::findOrFail($id);

        // if $jadwalPeriksa is non active, then active it
        if (!$jadwalPeriksa->status) {
            // change status except in $jadwalPeriksa to false
            CheckupSchedule::where('id_doctor', Auth::user()->id)->update(['status' => false]);

            // change status jadwalPeriksa to true 
            $jadwalPeriksa->update(['status' => true]);

            $jadwalPeriksa->save();
            return redirect()->route('doctor.checkup_schedule.index')->with('success', 'Status jadwal periksa berhasil diubah!');
        }

        // if $jadwalPeriksa is active, then false it
        $jadwalPeriksa->status = false;
        $jadwalPeriksa->save();
        return redirect()->route('doctor.checkup_schedule.index')->with('success', 'Status jadwal periksa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
