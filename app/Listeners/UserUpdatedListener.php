<?php

namespace Rahasi\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Rahasi\Repositories\ApiKeyRepository;
use Rahasi\Models\User;
use Rahasi\Models\ApiKey;

class UserUpdatedListener
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

        $user = $user->toArray();
        $user['permissions'] = !empty($user['permissions'])?$user['permissions']:null;
        // update user for testing
        User::unguard();
        User::find($user['id']) ->update($user);

        // Update key
        ApiKey::unguard();
        if(!ApiKey::where('user_id', $user['id']) ->update($testKey->toArray())){
            ApiKey::create($testKey->toArray());
        }
    }
}
