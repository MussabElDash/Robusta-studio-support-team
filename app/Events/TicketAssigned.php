<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Notification;
use Log;

class TicketAssigned extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $notification;
    /**
     * Create a new event instance.
     */
    public function __construct($actor_id, $recipient_id, $notifiable_id, $notifiable_type)
    {
        $notification = Notification::create([
                                                'actor_id' => $actor_id,
                                                'css_class' => 'fa-users text-aqua',
                                                'recipient_id' => $recipient_id,
                                                'notifiable_id' => $notifiable_id,
                                                'notifiable_type' => $notifiable_type,
                                                'seen' => false,
                                            ]);
        // $notification->text = $notification->text();
        // Log::info("notifiaction ");
        // Log::info($notification);
        $this->notification = $notification;
        // Log::info($this->notification);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        Log::info("\n\nin broadcastOn\n\n");
        Log::info($this->notification);

        return ['user'];
    }

    /**
     * Get the broadcast event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'ticket-assigned';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['message' => $this->notification->text(),
                'parameters' => $this->notification
            ];
    }
}
