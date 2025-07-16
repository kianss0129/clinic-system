<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $patients = User::role('Patient')->get();
        $doctors = User::role('Doctor')->get();

        if ($patients->isEmpty() || $doctors->isEmpty()) {
            $this->command->warn('No patients or doctors found. Seeder skipped.');
            return;
        }

        foreach ($doctors as $doctor) {
            // Create up to 5 appointments per doctor with random patients
            foreach (range(1, 5) as $i) {
                $patient = $patients->random();

                Appointment::create([
                    'doctor_id'        => $doctor->id,
                    'patient_id'       => $patient->id,
                    'appointment_date' => Carbon::now()->subDays(rand(1, 60)),
                    'status'           => 'confirmed', // You can change default status as needed
                ]);
            }
        }

        $this->command->info('✅ Created appointments for doctors and patients.');
    }
}
