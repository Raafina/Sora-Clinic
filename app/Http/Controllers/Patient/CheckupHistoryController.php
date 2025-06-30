<?php

namespace App\Http\Controllers\Patient;

use App\Models\CheckupAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckupHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkupAppointments = CheckupAppointment::where('id_pasien', Auth::user()->id)->paginate(10);
        return view('pasien.riwayat-periksa.index', [
            'title' => 'Riwayat Periksa',
            'checkupAppointments' => $checkupAppointments
        ]);
    }
    public function detail($id)
    {
        $checkupAppointment = CheckupAppointment::with(['checkupSchedule.doctor'])->findOrFail($id);
        return view('pasien.riwayat-periksa.detail', [
            'title' => 'Riwayat Periksa',
            'checkupAppointment' => $checkupAppointment
        ]);
    }

    public function riwayat($id)
    {
        $checkupAppointment = CheckupAppointment::with(['checkupSchedule.doctor'])->findOrFail($id);
        return view('pasien.riwayat-periksa.riwayat', [
            'title' => 'Riwayat Periksa',
            'checkupAppointment' => $checkupAppointment
        ]);
    }
}
