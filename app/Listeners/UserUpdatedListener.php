<?php

namespace Rahasi\Listeners;

use DB;
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
        // Register for testing
        User::where('id', $user->id) ->update($user->toArray());
        ApiKey::where('user_id', $user->id) ->update($testKey->toArray());
    }



}
