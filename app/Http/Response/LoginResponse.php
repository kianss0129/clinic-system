<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->hasRole('Super Admin')) {
            return redirect()->intended('/dashboard');
        }

        if ($user->hasRole('Admin')) {
            return redirect()->intended('/dashboard');
        }

        if ($user->hasRole('Doctor')) {
            return redirect()->intended('/dashboard');
        }

        if ($user->hasRole('Patient')) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->intended('/');
    }
}
