<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\BillingNotification;

class BillingController extends Controller
{
    /**
     * Display a listing of the billing records.
     */
    public function index(Request $request)
    {
        $query = Billing::with('patient');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $billings = $query->get()->map(function ($bill) {
            return [
                'id' => $bill->id,
                'invoice_no' => $bill->invoice_no,
                'amount' => (float) $bill->amount,
                'status' => $bill->status,
                'billing_date' => $bill->billing_date,
                'patient' => [
                    'name' => $bill->patient->name ?? 'Unknown',
                ],
            ];
        });

        return Inertia::render('Billing/Index', [
            'billings' => $billings,
            'filters' => [
                'status' => $request->status,
            ],
        ]);
    }

    /**
     * Update the billing status and send an email notification.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Paid,Unpaid,Pending',
        ]);

        $billing = Billing::with('patient')->findOrFail($id);
        $billing->update(['status' => $request->status]);

        // ✅ Send email if the patient has an email
        if ($billing->patient && $billing->patient->email) {
            Mail::to($billing->patient->email)->send(new BillingNotification($billing));
        }

        return redirect()->back()->with('success', 'Billing status updated and email sent.');
    }

    /**
     * Export the billing records to PDF.
     */
    public function exportPDF()
    {
        $billings = Billing::with('patient')->get();

        $pdf = Pdf::loadView('pdf.billings', compact('billings'));
        return $pdf->download('billing-summary.pdf');
    }
    // ✅ Show billing for the currently logged-in patient
public function patientIndex()
{
    $billings = Billing::with('appointment')
        ->where('patient_id', auth()->id())
        ->latest()
        ->get();

    return inertia('Patient/Billings', [
        'billings' => $billings,
    ]);
}

}
