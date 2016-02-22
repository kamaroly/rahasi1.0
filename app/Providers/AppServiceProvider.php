<?php

namespace Rahasi\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Rahasi\Repositories\ApiKeyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('sentinel.user.registered','\Rahasi\Listeners\UserRegisteredListener@handle', 10);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }
}
