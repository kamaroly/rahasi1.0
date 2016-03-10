<?php

namespace Rahasi\Listeners;

use DB;
use Rahasi\Models\User;
use Rahasi\Models\ApiKey;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Rahasi\Repositories\ApiKeyRepository;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ApiKeyRepository $apiKeyRepo)
    {
        $this->apiKeyRepo = $apiKeyRepo;
    }

    /**
     * Handle the event.
     *
     * @param  sentinel.user.registered  $event
     * @return void
     */
    public function handle($user)
    {
        $testKey = $this->apiKeyRepo->generateKey($user->id,'test');
        $this->apiKeyRepo->generateKey($user->id,'live');

        // Also generate for the test environment
        DB::setDefaultConnection('test');

        // Register for testing
        $user = $user->toArray();
        $user['permissions'] = !empty($user['permissions'])?$user['permissions']:null;
      
        User::unguard();
        User::create($user);
        // Generating the key
        ApiKey::where('user_id', $user['id']) ->update($testKey->toArray());
    }



}
