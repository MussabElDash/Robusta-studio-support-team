<?php

class LoginTest extends TestCase
{
    public function testLoginPost()
    {
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
            '_token' => csrf_token()
        ]);
        $this->followRedirects();
        $this->seePageIs('/home');
        $this->assertPageLoaded('/home');
        $this->assertNotNull(Auth::user());
    }
}
