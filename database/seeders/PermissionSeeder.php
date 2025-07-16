<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // List of permissions
        $permissions = [
            'edit medical records',
            'view medical records',
            'create medical records',
            'delete medical records',
        ];

        // Ensure Doctor role exists
        $doctorRole = Role::firstOrCreate(['name' => 'Doctor']);

        if (!$doctorRole) {
            $this->command->warn('❌ Doctor role not found.');
            return;
        }

        foreach ($permissions as $permName) {
            $permission = Permission::firstOrCreate(['name' => $permName]);

            if (!$doctorRole->hasPermissionTo($permission)) {
                $doctorRole->givePermissionTo($permission);
                $this->command->info("✅ Permission '{$permName}' assigned to Doctor role.");
            }
        }
    }
}
