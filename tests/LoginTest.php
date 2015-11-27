<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test login page is loaded.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
            ->see('email');
    }

    /**
     * Test that post to /login occurs.
     *
     * @return void
     */
    public function testLoginPost()
    {
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'testing@testing.com',
            'password' => 'testing',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(302, $response->status());
    }

    /**
     * Test that user is actually logged in.
     *
     * @return void
     */
    public function testLogin()
    {
        Session::start();
        $user = factory('Learn\User')->create();
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('password', 'password')
            ->press('Login')
            ->see('Marketing');
    }
}
