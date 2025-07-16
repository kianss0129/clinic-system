<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConfirmablePasswordController extends Controller
{
    public function show()
    {
        return Inertia::render('Auth/ConfirmPassword');
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);

        session(['auth.password_confirmed_at' => time()]);

        return redirect()->intended('/dashboard');
    }
}
