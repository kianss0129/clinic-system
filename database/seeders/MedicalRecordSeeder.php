<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class MedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        $appointments = Appointment::all();

        if ($appointments->isEmpty()) {
            $this->command->warn('No appointments found. Seeder skipped.');
            return;
        }

        foreach ($appointments as $appointment) {
            MedicalRecord::create([
                'patient_id' => $appointment->patient_id,
                'doctor_id' => $appointment->doctor_id,
                'appointment_id' => $appointment->id,
                'diagnosis' => fake()->randomElement([
                    'Hypertension',
                    'Diabetes Mellitus',
                    'Migraine',
                    'Asthma',
                    'Tuberculosis',
                    'Pneumonia',
                ]),
                'notes' => fake()->paragraph(),
                'record_date' => Carbon::parse($appointment->appointment_date)->toDateString(),
            ]);
        }

        $this->command->info('✅ Created medical records for each appointment.');
    }
}
