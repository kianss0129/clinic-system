<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF Facade

class ReportController extends Controller
{
    /**
     * Generate a PDF report for appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function appointmentPDF()
    {
        // Retrieve appointments (you can apply filters or conditions if needed)
        $appointments = Appointment::with(['patient', 'doctor'])->get();

        // Generate PDF
        $pdf = Pdf::loadView('reports.appointments', compact('appointments'));

        // Return PDF response for download
        return $pdf->download('appointments_report.pdf');
    }
}
