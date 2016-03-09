<?php

namespace Rahasi\Listeners;

use DB;
use Rahasi\Models\User;
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
        User::unguard();
        User::create($user->toArray());
        // Generating the key
        ApiKey::where('user_id', $user->id) ->update($testKey->toArray());
    }



}
