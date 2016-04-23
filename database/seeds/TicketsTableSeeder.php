<?php

use Illuminate\Database\Seeder;
use \App\Models\Ticket;
class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tickets')->delete();
        $tickets = [
            [
                'name' => 'ay 7aga',
                'description' => '7agat keteer',
                'creator_id' => 1,
                'department_id'=>1,
                'customer_id'=>1,
                'assigned_to'=>3,
            ], [
                'name' => 'ay 7aga',
                'description' => '7agat keteer',
                'creator_id' => 1,
                'department_id'=>1,
                'customer_id'=>1,
                'assigned_to'=>3,
            ]
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }

    }
}
