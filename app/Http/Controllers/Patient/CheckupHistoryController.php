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
        return view('patient.checkup_history.index', [
            'title' => 'Riwayat Periksa',
            'checkupAppointments' => $checkupAppointments
        ]);
    }
    public function detail($id)
    {
        $checkupAppointment = CheckupAppointment::with(['checkupSchedule.doctor'])->findOrFail($id);
        return view('patient.checkup_history.detail', [
            'title' => 'Riwayat Periksa',
            'checkupAppointment' => $checkupAppointment
        ]);
    }

    public function riwayat($id)
    {
        $checkupAppointment = CheckupAppointment::with(['checkupSchedule.doctor'])->findOrFail($id);
        return view('patient.checkup_history.history', [
            'title' => 'Riwayat Periksa',
            'checkupAppointment' => $checkupAppointment
        ]);
    }
}
