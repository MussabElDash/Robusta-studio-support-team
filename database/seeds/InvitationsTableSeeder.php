<?php

use Illuminate\Database\Seeder;
use \App\Models\Invitation;

class InvitationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $invitations = [
            [
                'inviter_id' => 2,
                'invited_id' => 3,
                'invitable_id' => 2,
                'invitable_type' => 'Ticket'
            ], [
                'inviter_id' => 3,
                'invited_id' => 2,
                'invitable_id' => 1,
                'invitable_type' => 'Ticket'
            ]
        ];

        foreach ($invitations as $invitation) {
            Invitation::create($invitation);
        }
    }
}
