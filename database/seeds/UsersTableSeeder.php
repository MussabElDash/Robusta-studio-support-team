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
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => 'Admin',
                'gender' => true,
            ], [

                'name' => 'Super User',
                'email' => 'super@super.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => 'Supervisor',
                'gender' => true,
            ], [
                'name' => 'Agent User',
                'email' => 'agent@agent.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => 'Agent',
                'gender' => true,
            ]
        ];

        User::passConfirm();
        foreach ($users as $user) {
            $user = User::create($user);
            if ($user->hasErrors()) {
                echo json_encode($user->getErrors()) . "\n";
            }
        }
    }
}
