<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\PlansService;
use App\Services\InstitutionsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('user', function () {
            return new UserService();
        });

        $this->app->singleton('institution', function () {
            return new InstitutionsService();
        });

        $this->app->singleton('plans', function () {
            return new PlansService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
