<?php

namespace App\Listeners;

use Log;
use App\Events\TicketAssigned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Helpers;

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
    public function handle($event)
    {
        // Log::info("\n\nin listener\n\n");
        // Log::info($event->notification);
        // Log::info("&&&&");
        // Log::info(Helpers::getUser());
        // Log::info("\n\n GOT A NOTIFICATION \n\n" . $event->notification);
    }
}
