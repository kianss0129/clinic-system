<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicalRecordController extends Controller
{
    /*──────────────────────────────────────────────────────────────
    | 1) LIST
    ──────────────────────────────────────────────────────────────*/
    public function index()
    {
        $user = auth()->user();

        // Doctors see only their accepted / confirmed patients
        if ($user->hasRole('Doctor')) {
            $allowedPatientIds = Appointment::where('doctor_id', $user->id)
                ->whereIn('status', ['accepted', 'confirmed'])
                ->pluck('patient_id');

            $records = MedicalRecord::with(['patient', 'doctor'])
                ->where('doctor_id', $user->id)
                ->whereIn('patient_id', $allowedPatientIds)
                ->get();
        } else {
            // Admins & Super Admins see everything
            $records = MedicalRecord::with(['patient', 'doctor'])->get();
        }

        return Inertia::render('MedicalRecords/Index', compact('records'));
    }

    /*──────────────────────────────────────────────────────────────
    | 2) CREATE  (form data)
    ──────────────────────────────────────────────────────────────*/
    public function create()
    {
        // Patients this doctor is allowed to treat
        $patients = User::whereIn(
                'id',
                Appointment::where('doctor_id', auth()->id())
                    ->whereIn('status', ['accepted', 'confirmed'])
                    ->pluck('patient_id')
            )->get();

        $doctors = User::role('Doctor')->get();

        // Only this doctor’s accepted / confirmed appointments
        $appointments = Appointment::with(['patient', 'doctor'])
            ->where('doctor_id', auth()->id())
            ->whereIn('status', ['accepted', 'confirmed'])
            ->get();

        return Inertia::render('MedicalRecords/Create', compact('patients', 'doctors', 'appointments'));
    }

    /*──────────────────────────────────────────────────────────────
    | 3) STORE
    ──────────────────────────────────────────────────────────────*/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id'     => ['required', 'exists:users,id'],
            'doctor_id'      => ['required', 'exists:users,id'],
            'appointment_id' => ['required', 'exists:appointments,id'],
            'diagnosis'      => ['required', 'string'],
            'notes'          => ['nullable', 'string'],
            'record_date'    => ['required', 'date'],
        ]);

        MedicalRecord::create($validated);

        return redirect()
            ->route('doctor.records.index')
            ->with('success', '✅ Medical record created successfully.');
    }

    /*──────────────────────────────────────────────────────────────
    | 4) EDIT  (form data)
    ──────────────────────────────────────────────────────────────*/
    public function edit(MedicalRecord $medicalRecord)
    {
        $patients = User::whereIn(
                'id',
                Appointment::where('doctor_id', auth()->id())
                    ->whereIn('status', ['accepted', 'confirmed'])
                    ->pluck('patient_id')
            )->get();

        $doctors = User::role('Doctor')->get();

        $appointments = Appointment::with(['patient', 'doctor'])
            ->where('doctor_id', auth()->id())
            ->whereIn('status', ['accepted', 'confirmed'])
            ->get();

        return Inertia::render('MedicalRecords/Edit', compact('medicalRecord', 'patients', 'doctors', 'appointments'));
    }

    /*──────────────────────────────────────────────────────────────
    | 5) UPDATE
    ──────────────────────────────────────────────────────────────*/
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $validated = $request->validate([
            'diagnosis'   => ['required', 'string'],
            'notes'       => ['nullable', 'string'],
            'record_date' => ['required', 'date'],
        ]);

        $medicalRecord->update($validated);

        $route = auth()->user()->hasRole('Doctor')
            ? 'doctor.records.index'
            : 'medical-records.index';

        return redirect()
            ->route($route)
            ->with('success', '✅ Medical record updated successfully.');
    }

    /*──────────────────────────────────────────────────────────────
    | 6) DELETE
    ──────────────────────────────────────────────────────────────*/
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();

        return back()->with('success', '🗑️ Medical record deleted successfully.');
    }
}
