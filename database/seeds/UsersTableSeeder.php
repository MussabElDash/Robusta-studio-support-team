<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
        DB::table('users')->delete();
        $users = [
            [
                'name' => 'Mussab ElDash',
                'email' => 'mussab@admin.com',
                'password' => 'mussab',
                'password_confirmation' => 'mussab',
                'role' => 'Admin',
                'gender' => true
            ], [
                'name' => 'Mussab ElDash',
                'email' => 'mussab@super.com',
                'password' => 'mussab',
                'password_confirmation' => 'mussab',
                'role' => 'Supervisor',
                'gender' => true,
            ], [
                'name' => 'Mussab ElDash',
                'email' => 'mussab@agent.com',
                'password' => 'mussab',
                'password_confirmation' => 'mussab',
                'role' => 'Agent',
                'gender' => true
            ]
        ];

        foreach ($users as $user) {
            $user = User::create($user);
            if ($user->hasErrors()) {
                echo json_encode($user->getErrors()) . "\n";
            }
        }
    }
}
