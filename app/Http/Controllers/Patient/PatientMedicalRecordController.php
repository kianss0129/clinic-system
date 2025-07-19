<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PatientMedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecords = MedicalRecord::with(['doctor:id,name,email', 'prescriptions'])
            ->where('patient_id', Auth::id())
            ->latest('record_date')
            ->get();

        return Inertia::render('Patient/MedicalRecords', [
            'medicalRecords' => $medicalRecords,
        ]);
    }
}
