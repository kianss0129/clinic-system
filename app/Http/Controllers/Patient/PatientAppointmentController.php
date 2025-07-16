<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->where('patient_id', auth()->id())
            ->get();

        return Inertia::render('Patient/ViewAppointments', [
            'appointments' => $appointments
        ]);
    }

    public function create()
    {
        $doctors = User::role('Doctor')->get();

        return Inertia::render('Patient/BookAppointment', [
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
        ]);

        Appointment::create([
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'Pending',
        ]);

        return redirect()->route('patient.appointments.index')
                         ->with('success', 'Appointment booked successfully.');
    }
}
