<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;

class DoctorController extends Controller
{
    // Show appointments for the doctor
    public function appointments()
    {
        $appointments = Appointment::where('doctor_id', auth()->user()->id)->get();
        return view('doctor.appointments', compact('appointments'));
    }

    // Show medical records for the doctor
    public function medicalRecords()
    {
        $medicalRecords = MedicalRecord::where('doctor_id', auth()->user()->id)->get();
        return view('doctor.medical_records', compact('medicalRecords'));
    }
}
