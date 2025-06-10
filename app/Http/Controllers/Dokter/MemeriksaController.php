<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get jadwal periksa where id_dokter is authenticated user  and status is true/active
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::user()->id)
            ->where('status', true)
            ->first();

        // get janji periksa list where jadwal periksa
        $janjiPeriksa = JadwalPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)
            ->get();

        return view('dokter.jadwal-periksa.index', ['title' => 'Janji Periksa', 'janjiPeriksa' => $janjiPeriksa]);
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create', ['title' => 'Tambah Jadwal Periksa']);
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

        if (JadwalPeriksa::where('id_dokter', Auth::user()->id)->where(
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

        JadwalPeriksa::create([
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
        // see jadwal periksa depending on id
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        // if jadwal periksa id is true, then false it
        if (!$jadwalPeriksa->status) {
            $jadwalPeriksa->update(['status' => true]);

            // change status except in jadwalPeriksa to false
            JadwalPeriksa::where('id_dokter', Auth::user()->id)->update(['status' => false]);
            $jadwalPeriksa->save();
            return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Status jadwal periksa berhasil diubah');
        }

        // if jadwal periksa id is false, then false it
        $jadwalPeriksa->status = false;
        $jadwalPeriksa->save();
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Status jadwal periksa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
