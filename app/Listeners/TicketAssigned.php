<?php

namespace App\Listeners;

use Log;
use App\Events\TicketAssigned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketAssigned
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  TicketAssigned  $event
     * @return void
     */
    public function handle(TicketAssigned $event)
    {
        //
        Log::info("\n\n GOT A NOTIFICATION \n\n" . $event->notification);
    }
}
