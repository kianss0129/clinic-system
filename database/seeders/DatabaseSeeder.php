<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders in order
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AppointmentSeeder::class,       // appointments first
            MedicalRecordSeeder::class,     // medical records next
            PermissionSeeder::class,
            BillingSeeder::class,
        ]);
    }
}
