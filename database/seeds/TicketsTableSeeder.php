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
            ], [
                'name' => 'Not claimed Department 1',
                'description' => 'Not claimed ticket Department 1 admin can see it in the tickets pool and Agents & supervisors of Department 1',
                'creator_id' => 1,
                'department_id'=>1,
                'customer_id'=>1,
            ], [
                'name' => 'Not claimed Department 2',
                'description' => 'Not claimed ticket Department 2 admin can see and Agents & supervisors of Department 2',
                'creator_id' => 1,
                'department_id'=>2,
                'customer_id'=>1,
            ]
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }

    }
}
