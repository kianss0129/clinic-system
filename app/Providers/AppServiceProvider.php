<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ✅ Fix for role-based access (Spatie)
        $this->app->bind('role', RoleMiddleware::class);

        // ✅ Fix for forgot-password broker error
        $this->app->bind('auth.password', function () {
            return Password::broker();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ✅ Share auth user and CSRF token with Inertia
        Inertia::share([
            'auth' => fn () => [
                'user' => Auth::user() ? Auth::user()->load('roles') : null,
                'csrf_token' => csrf_token(),
            ],
        ]);

        // ✅ Custom CAPTCHA validator using NoCaptcha package
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            return NoCaptcha::verifyResponse($value);
        });

        Validator::replacer('captcha', function ($message, $attribute) {
            return 'reCAPTCHA verification failed. Please try again.';
        });
    }
}
