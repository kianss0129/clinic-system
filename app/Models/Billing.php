<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Billing extends Model
{
    // 🔧 Explicitly specify the table name
    protected $table = 'billing';

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'amount',
        'status',
        'billing_date',
        'invoice_no',
    ];

    // ✅ Ensure numeric amount
    protected $casts = [
        'amount' => 'float',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
