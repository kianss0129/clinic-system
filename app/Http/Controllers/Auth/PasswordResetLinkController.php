<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PasswordResetLinkController extends Controller
{
    /**
     * Show the forgot password form.
     */
    public function create()
    {
        return Inertia::render('Auth/ForgotPassword');
    }

    /**
     * Handle sending the password reset link via Laravel's default notification.
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Log::info('✅ Reset email sent to: ' . $request->email);
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
