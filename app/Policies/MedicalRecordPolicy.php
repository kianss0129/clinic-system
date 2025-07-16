<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MedicalRecord;

class MedicalRecordPolicy
{
    /**
     * Determine whether the user can view or edit the record.
     */
    public function view(User $user, MedicalRecord $record): bool
    {
        return $user->hasRole('Doctor') && $user->id === $record->doctor_id;
    }

    public function update(User $user, MedicalRecord $record): bool
    {
        return $this->view($user, $record);
    }

    public function edit(User $user, MedicalRecord $record): bool
    {
        return $this->view($user, $record);
    }

    public function delete(User $user, MedicalRecord $record): bool
    {
        return $this->view($user, $record);
    }
}
