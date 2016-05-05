<?php

use App\Models\User;

class AgentTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $user = new User([
            'name' => 'Mussab',
            'email' => 'mussab14@gmail.com',
            'password' => 'mussab',
            'password_confirmation' => 'mussab',
            'role' => 'Admin'
        ]);
        $this->be($user);
    }

    public function testregisterAgentTest()
    {
        $user = new User([
            'name' => 'Mussab',
            'email' => 'mussab14@gmail.com',
            'password' => 'mussab',
            'password_confirmation' => 'mussab',
            'role' => 'Admin'
        ]);
        $this->assertNotNull($user);
        $this->assertNotNull(Auth::user());
    }
}
