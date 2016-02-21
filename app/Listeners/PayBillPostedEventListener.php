<?php

namespace Rahasi\Listeners;

use Rahasi\Events\PayBillPostedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayBillPostedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PayBillPostedEvent  $event
     * @return void
     */
    public function handle(PayBillPostedEvent $event)
    {
        //
    }
}
