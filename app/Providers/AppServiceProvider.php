<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Register rate limiters here
        // Custom review rate limiter (3 reviews per hour)
        RateLimiter::for('reviews', function ($request) {
            return Limit::perHour(3)->by($request->user()?->id ?: $request->ip());
        });
    }
}
