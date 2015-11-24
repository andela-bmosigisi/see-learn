<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
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
        $this->assertEquals(200, $response->status());
        $this->assertEquals('auth.login', $response->original->name());
    }

    /**
     * Test that user is actually logged in.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory('Burayan\User')->make();
        $this->visit('login')
            ->type($user->email, 'email')
            ->password('password', 'password')
            ->click('Login')
            ->see('Dashboard');
    }
}
