<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MedicalRecordCreatedNotification;

class MedicalRecordController extends Controller
{
   public function index()
{
    if (auth()->user()->hasRole('Patient')) {
        $medicalRecords = MedicalRecord::with('doctor')
            ->where('patient_id', auth()->id())
            ->latest()
            ->get();
    } else {
        $medicalRecords = MedicalRecord::with('doctor')
            ->latest()
            ->get();
    }

    return inertia('Patient/Records', [
        'medicalRecords' => $medicalRecords,
    ]);
}


    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $record = MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'diagnosis' => $request->diagnosis,
            'notes' => $request->notes,
        ]);

        // Notify the patient
        $patient = User::find($request->patient_id);
        Notification::route('mail', $patient->email)
            ->notify(new MedicalRecordCreatedNotification($record));

        return redirect()->route('doctor.medical-records')
            ->with('success', 'Medical record added and patient notified.');
    }
}
