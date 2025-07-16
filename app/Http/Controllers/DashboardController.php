<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function redirect()
    {
        $user = auth()->user();

        if ($user->hasRole('Super Admin') || $user->hasRole('Admin')) {
            return redirect()->route('admin.appointments');
        } elseif ($user->hasRole('Doctor')) {
            return redirect()->route('doctor.appointments');
        } elseif ($user->hasRole('Patient')) {
            return redirect()->route('patient.appointments');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
