<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientBillingController extends Controller
{
    public function index()
    {
        return Inertia::render('Patient/Billings');
    }
}
