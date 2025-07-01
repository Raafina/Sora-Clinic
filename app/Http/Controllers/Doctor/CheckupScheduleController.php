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
            ->where('id_dokter', Auth::user()->id)
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
            'hari' => ['required', 'string', 'max:10'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
        ]);

        if (CheckupSchedule::where('id_dokter', Auth::user()->id)->where(
            'hari',
            $validated['hari']
        )->where(
            'jam_mulai',
            $validated['jam_mulai']
        )->where(
            'jam_selesai',
            $validated['jam_selesai']
        )->exists()) {
            return back()->withInput()->with('error', 'Jadwal periksa sudah ada');
        }

        CheckupSchedule::create([
            'id_dokter' => Auth::user()->id,
            'hari' => $validated['hari'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
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
            CheckupSchedule::where('id_dokter', Auth::user()->id)->update(['status' => false]);

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
