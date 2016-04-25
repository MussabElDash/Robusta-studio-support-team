<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(LabelsTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(InvitationsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);




    }
}
