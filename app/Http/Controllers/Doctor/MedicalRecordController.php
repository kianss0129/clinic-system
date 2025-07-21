<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function create($patientId)
    {
        $patient = User::findOrFail($patientId);
        return Inertia::render('Doctor/AddMedicalRecord', [
            'patient' => $patient,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $record = MedicalRecord::create([
            'patient_id' => $validated['patient_id'],
            'doctor_id' => Auth::id(),
            'diagnosis' => $validated['diagnosis'],
            'notes' => $validated['notes'],
            'record_date' => now(),
        ]);

        return redirect()->route('patient.medical-records', $validated['patient_id'])
                         ->with('success', 'Medical record added and redirected to patient’s view.');
    }
}
