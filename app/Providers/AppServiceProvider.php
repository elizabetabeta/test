<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::if('Admin', function() {
            return Auth::user()->hasRole('Admin');
        });
        \Blade::if('Moderator', function() {
            return Auth::user()->hasRole('Moderator');
        });
        \Blade::if('User', function() {
            return Auth::user()->hasRole('User');
        });
    }
}
