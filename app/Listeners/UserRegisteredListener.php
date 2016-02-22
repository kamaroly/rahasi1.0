<?php

namespace Rahasi\Listeners;

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
        $this->apiKeyRepo->generateKey($user->id,'test');
        $this->apiKeyRepo->generateKey($user->id,'live');
    }
}
