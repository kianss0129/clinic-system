<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Billing;

class AdminController extends Controller
{
    /**
     * Display the admin appointments view.
     *
     * @return View
     */
    public function appointments(): View
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get(); // Optional eager loading
        return view('admin.appointments', compact('appointments'));
    }

    /**
     * Display the admin medical records view.
     *
     * @return View
     */
    public function medicalRecords(): View
    {
        $medicalRecords = MedicalRecord::with(['patient', 'doctor'])->get(); // Optional eager loading
        return view('admin.medical-records', compact('medicalRecords'));
    }

    /**
     * Display the admin billing view.
     *
     * @return View
     */
    public function billing(): View
    {
        $billings = Billing::with(['appointment', 'patient'])->get(); // Optional eager loading
        return view('admin.billing', compact('billings'));
    }
}
