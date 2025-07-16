<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function appointments()
    {
        // Example: Fetch patient appointments
        return view('patient.appointments');
    }
}
