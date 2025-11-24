<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

   protected $policies = [
    \App\Models\User::class => \App\Policies\UserPolicy::class,
    \App\Models\Client::class => \App\Policies\ClientPolicy::class,
];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
