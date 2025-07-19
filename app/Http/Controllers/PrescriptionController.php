<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use App\Models\Prescription;
use App\Models\MedicalRecord;
use App\Models\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PrescriptionController extends Controller
{
    /** ✅ STEP 3: Show latest prescription per patient for doctors, all for admins */
    public function index()
    {
        $doctor = auth()->user();

        $latestPrescriptions = $doctor->hasRole('Doctor')
            ? Prescription::with(['patient', 'medicalRecord'])
                ->where('doctor_id', $doctor->id)
                ->orderBy('prescribed_date', 'desc')
                ->get()
                ->unique('patient_id') // ✅ show only the latest per patient
            : Prescription::with(['patient', 'doctor'])->latest()->get();

        return Inertia::render('Prescriptions/Index', [
            'prescriptions' => $latestPrescriptions,
        ]);
    }

    /** ✅ STEP 2: Show ONLY the latest prescription for a given medical record (doctor‑side). */
    public function latestByMedicalRecord($medicalRecordId)
    {
        $user = auth()->user();

        $latestPrescription = Prescription::where('medical_record_id', $medicalRecordId)
            ->where('doctor_id', $user->id)
            ->latest('created_at')
            ->with(['patient', 'doctor', 'medicalRecord'])
            ->firstOrFail();

        return Inertia::render('Prescriptions/Show', [
            'prescription' => $latestPrescription,
        ]);
    }

    /** Show “Add Prescription” form. */
    public function create()
    {
        $records = MedicalRecord::with(['patient', 'doctor'])->get();

        return Inertia::render('Prescriptions/Create', compact('records'));
    }

    /** Store a new prescription and auto‑create billing. */
    public function store(Request $request)
    {
        $request->validate([
            'medical_record_id' => 'required|exists:medical_records,id',
            'medicine_name'     => 'required|string|max:255',
            'dosage'            => 'required|string|max:255',
            'instructions'      => 'nullable|string',
            'medications'       => 'required|string',
            'prescribed_date'   => 'required|date',
        ]);

        $medicalRecord = MedicalRecord::with('patient')->findOrFail($request->medical_record_id);

        $prescription = Prescription::create([
            'medical_record_id' => $medicalRecord->id,
            'patient_id'        => $medicalRecord->patient_id,
            'doctor_id'         => auth()->id(),
            'medicine_name'     => $request->medicine_name,
            'dosage'            => $request->dosage,
            'instructions'      => $request->instructions,
            'medications'       => $request->medications,
            'prescribed_date'   => $request->prescribed_date,
        ]);

        Billing::create([
            'patient_id'     => $medicalRecord->patient_id,
            'appointment_id' => $medicalRecord->appointment_id ?? null,
            'amount'         => 500.00,
            'status'         => 'Unpaid',
            'billing_date'   => now(),
            'invoice_no'     => 'INV-' . strtoupper(Str::random(6)),
        ]);

        return redirect()
            ->route('doctor.prescriptions.index')
            ->with('success', '✅ Prescription and billing created successfully.');
    }

    /** Delete a prescription. */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return redirect()
            ->route('doctor.prescriptions.index')
            ->with('success', '🗑️ Prescription deleted successfully.');
    }
 public function patientPrescriptions()
{
    $prescriptions = Prescription::with(['doctor', 'medicalRecord'])
        ->where('patient_id', Auth::id())
        ->latest()
        ->get();

    return inertia('Patient/Prescriptions', [ // ✅ this must match the actual .vue file path
        'prescriptions' => $prescriptions
    ]);
}
}
    