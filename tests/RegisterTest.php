<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test registration page is loaded.
     *
     * @return void
     */
    public function testLoadRegisterPage()
    {
        $this->visit('/register')
            ->see('Register');
    }

    /**
     * Test a user is registered
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/register')
            ->type('My Name', 'name')
            ->type('name@name.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/');
    }
}
