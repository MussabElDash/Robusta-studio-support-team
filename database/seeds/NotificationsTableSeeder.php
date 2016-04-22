<?php

use Illuminate\Database\Seeder;
use \App\Models\Notification;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $notifications = [
            [
                'actor_id' => 1,
                'recipient_id' => 2,
                'object_id'=>1,
                'object_type' => 'ticket',
                'seen' => false

            ], [
                'actor_id' => 2,
                'recipient_id' => 3,
                'object_id'=>2,
                'object_type' => 'ticket',
                'seen' => false
            ]
        ];

        foreach ($notifications as $notification) {
            Notification::create($notification);
        }
    }
}
