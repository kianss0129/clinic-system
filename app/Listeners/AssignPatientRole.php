<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered; // ✅ Correct event
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Permission\Models\Role;

class AssignPatientRole implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Make sure the role exists to avoid crashing
        if (!Role::where('name', 'Patient')->exists()) {
            \Log::warning('❌ Patient role missing — cannot assign to user ID ' . $event->user->id);
            return;
        }

        // Assign the Patient role to the newly registered user
        $user = $event->user;
        $user->assignRole('Patient');
    }
}
