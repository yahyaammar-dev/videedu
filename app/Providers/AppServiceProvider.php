<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('app.name', config('app.name'));
        Inertia::share('errors', function(){
            return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages(): (
                Object.keys(null)) ;
        });
        Inertia::share('successMessage', function(){
            return Session::get('successMessage') ? Session::get('successMessage'): null ;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
