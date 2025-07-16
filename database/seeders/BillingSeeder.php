<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billing;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Str;

class BillingSeeder extends Seeder
{
    public function run(): void
    {
        $patients = User::role('Patient')->get();
        $appointments = Appointment::all();

        foreach (range(1, 10) as $i) {
            $patient = $patients->random();
            $appointment = $appointments->random();

            Billing::create([
                'invoice_no' => 'INV-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'patient_id' => $patient->id,
                'appointment_id' => $appointment->id,
                'amount' => rand(500, 5000),
                'status' => collect(['Paid', 'Unpaid'])->random(),
                'billing_date' => now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
