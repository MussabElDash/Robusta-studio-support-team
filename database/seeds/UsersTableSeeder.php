<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table('users')->delete();
        $users = [
            [
                'name' => 'Mussab ElDash',
                'email' => 'mussab@admin.com',
                'password' => Hash::make('mussab'),
                'role' => 'Admin',
                'gender' => true,
                'slug'=>'x'
            ],[
                'name' => 'Mussab ElDash',
                'email' => 'mussab@super.com',
                'password' => Hash::make('mussab'),
                'role' => 'Supervisor',
                'gender' => true,
                'slug'=>'y'

            ],[
                'name' => 'Mussab ElDash',
                'email' => 'mussab@agent.com',
                'password' => Hash::make('mussab'),
                'role' => 'Agent',
                'gender' => true,
                'slug'=>'z'

            ]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
