<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\CheckupAppointment;
use App\Models\CheckupSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckupAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $doctors = User::with([
            'checkupSchedules' => function ($query) {
                $query->where('status', true);
            },
        ])
            ->where('role', 'dokter')
            ->get();

        return view('patient.checkup_register.index', [
            'title' => 'Daftar Poli',
            'no_rm' => $no_rm,
            'doctors' => $doctors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_doctor' => ['required', 'exists:users,id'],
            'complaint' => ['required'],
        ]);

        $checkupSchedule = CheckupSchedule::where('id_doctor', $request->id_doctor)
            ->where('status', true)
            ->first();

        if (!$checkupSchedule) {
            return Redirect::route('patient.checkup_register.index')
                ->with('error', 'Jadwal periksa untuk dokter ini tidak tersedia atau tidak aktif.');
        }

        $appointmentTotal = CheckupAppointment::where('id_checkup_schedule', $checkupSchedule->id)->count();
        $queue = $appointmentTotal + 1;

        CheckupAppointment::create([
            'id_patient' => Auth::user()->id,
            'id_checkup_schedule' => $checkupSchedule->id,
            'complaint' => $request->complaint,
            'queue_number' => $queue
        ]);

        return Redirect::route('patient.checkup_register.index')
            ->with('success', 'Jadwal periksa berhasil ditambahkan');
    }
}
