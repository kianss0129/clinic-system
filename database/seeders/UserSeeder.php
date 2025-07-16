<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->createUser(
            name: 'Clinic Admin',
            email: 'admin@clinic.com',
            password: 'admin123',
            role: 'Admin'
        );

        $this->createUser(
            name: 'Dr. Kissel',
            email: 'doctor@clinic.com',
            password: 'doctor123',
            role: 'Doctor'
        );

        $this->createUser(
            name: 'Adrian Yalung',
            email: 'patient@clinic.com',
            password: 'Adrian123',
            role: 'Patient'
        );

        $this->createUser(
            name: 'Jerome Lacson',
            email: 'jerome@example.com',
            password: 'jerome123',
            role: 'Patient'
        );

        $this->createUser(
            name: 'Super Admin',
            email: 'superadmin@clinic.com',
            password: 'superadmin123',
            role: 'Super Admin'
        );

        // ✅ New Patients
        $this->createUser(
            name: 'Bien Mariano',
            email: 'bien@clinic.com',
            password: 'bien123',
            role: 'Patient'
        );

        $this->createUser(
            name: 'Sharmaine Mancera',
            email: 'sharmaine@clinic.com',
            password: 'sharmaine123',
            role: 'Patient'
        );

        $this->createUser(
            name: 'Zhyrus John Michael',
            email: 'zhyrus@clinic.com',
            password: 'zhyrus123',
            role: 'Patient'
        );

        // ✅ New Doctors (Random names)
        $this->createUser(
            name: 'Dr. Julian Cruz',
            email: 'julian@clinic.com',
            password: 'julian123',
            role: 'Doctor'
        );

        $this->createUser(
            name: 'Dr. Maria Santos',
            email: 'maria@clinic.com',
            password: 'maria123',
            role: 'Doctor'
        );

        $this->createUser(
            name: 'Dr. Carlos Rivera',
            email: 'carlos@clinic.com',
            password: 'carlos123',
            role: 'Doctor'
        );

        $this->createUser(
            name: 'Dr. Angela Reyes',
            email: 'angela@clinic.com',
            password: 'angela123',
            role: 'Doctor'
        );
    }

    protected function createUser(string $name, string $email, string $password, string $role)
    {
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );

        if (!$user->hasRole($role)) {
            $user->assignRole($role);
            echo "Assigned role {$role} to {$email}\n";
        }
    }
}
