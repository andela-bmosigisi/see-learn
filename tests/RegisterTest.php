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
            ->see('Create Account');
    }

    /**
     * Test a user is registered
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/register')
            ->type('username', 'username')
            ->type('password', 'password')
            ->type('password', 'confirmPassword')
            ->press('Register')
            ->see('successful');
    }
}
