<?php

namespace Rahasi\Providers;

use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Rahasi\Models\User;
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
        Event::listen('sentinel.user.updated','\Rahasi\Listeners\UserUpdatedListener@handle', 10);
        
        // Changing default database 
        $keyName = Config::get('apiguard.keyName', 'X-Authorization');
        // Extract key
        if ($apiKey = request()->header($keyName)) {
            $key = (new ApiKeyRepository(new ApiKey,new User))->getByKey($apiKey); 
            DB::setDefaultConnection('test');
        }

      
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
