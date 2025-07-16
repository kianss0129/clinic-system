<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    // Add all required fields for mass assignment
    protected $fillable = [
        'medical_record_id',
        'patient_id',
        'doctor_id',
        'medicine_name',
        'dosage',
        'instructions',
        'medications',
        'prescribed_date',
    ];

    /**
     * Relationship: Prescription belongs to a medical record.
     */
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    /**
     * Relationship: Prescription belongs to a patient (User).
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Relationship: Prescription belongs to a doctor (User).
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
