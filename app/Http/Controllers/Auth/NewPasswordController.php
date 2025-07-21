<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
use Illuminate\Support\Facades\Log;
>>>>>>> 589a8be438392415337ae1288d8ce1280d106ff1
use Inertia\Inertia;

class NewPasswordController extends Controller
{
    /**
     * Show the password reset form with token + email.
     */
    public function create(Request $request)
    {
        return Inertia::render('Auth/ResetPassword', [
            'token' => $request->route('token'),
            'email' => $request->email,
        ]);
    }

    /**
     * Handle the password reset request.
     */
    public function store(Request $request)
    {
        Log::info('🔁 Reset Password Data:', $request->all());

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
