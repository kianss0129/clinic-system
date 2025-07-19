<?php

namespace App\Providers;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Support\Facades\Password;

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
    Inertia::share([
        'auth' => fn () => [
            'user' => Auth::user() ? Auth::user()->load('roles') : null,
            'csrf_token' => csrf_token(),
        ],
    ]);
}
}