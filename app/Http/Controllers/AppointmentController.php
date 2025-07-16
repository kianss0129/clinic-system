<?php

namespace App\Http\Controllers;

use App\Notifications\AppointmentCreated;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Doctor')) {
            $appointments = Appointment::with('patient')
                ->where('doctor_id', $user->id)
                ->orderBy('appointment_date', 'asc')
                ->get();

            return Inertia::render('Doctor/Appointments', ['appointments' => $appointments]);
        }

        if ($user->hasRole('Patient')) {
            $appointments = Appointment::with('doctor')
                ->where('patient_id', $user->id)
                ->orderBy('appointment_date', 'asc')
                ->get();

            return Inertia::render('Patient/Appointments', ['appointments' => $appointments]);
        }

        // Admin & Super Admin
        $appointments = Appointment::with(['patient', 'doctor'])
            ->orderBy('appointment_date', 'asc')
            ->get();

        return Inertia::render('Appointments/Index', ['appointments' => $appointments]);
    }

    public function create()
    {
        $patients = User::role('Patient')->get();
        $doctors = User::role('Doctor')->get();

        return Inertia::render('Appointments/Create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
        ]);

        $appointment = Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'Pending',
        ]);

        // Notify patient
        $appointment->patient->notify(new AppointmentCreated($appointment));

        return redirect()->route('appointments.index')->with('success', 'Appointment created.');
    }

    public function edit(Appointment $appointment)
    {
        $patients = User::role('Patient')->get();
        $doctors = User::role('Doctor')->get();

        return Inertia::render('Appointments/Edit', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $appointment->update([
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted.');
    }

    // ✅ NEW METHOD: Confirm appointment
    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (!auth()->user()->hasRole('Doctor') || $appointment->doctor_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $appointment->update(['status' => 'confirmed']);

        return back()->with('success', '✅ Appointment confirmed successfully.');
    }
}
