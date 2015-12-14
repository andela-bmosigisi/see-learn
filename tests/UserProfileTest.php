<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserProfileTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test that the user data is loaded.
     *
     * @return void
     */
    public function testUserDataIsLoaded()
    {
        $user = factory('Learn\User')->create();

        $this->actingAs($user)
            ->visit('/dashboard')
            ->see($user->email);
    }

    /**
     * Test logged in user is redirected to dashboard.
     *
     * @return void
     */
    public function testAuthenticatedUserIsRedirected()
    {
        $user = factory('Learn\User')->create();

        $this->actingAs($user)
            ->visit('/login')
            ->seePageIs('/dashboard');
    }

    /**
     * Test that only logged in users view the dashboard.
     *
     * @return void
     */
    public function testOnlyAuthenticatedUsersViewProfile()
    {
        $this->visit('/dashboard')
            ->seePageIs('/login');
    }

    /**
     * Test that a user can update his profile.
     *
     * @return void
     */
    public function testUserCanEditProfile()
    {
        $user = factory('Learn\User')->create();
        $absolutePathToFile = __DIR__.'/../resources/assets/beatles_face.jpg';

        $this->actingAs($user)
            ->visit('/users/edit/'.$user->id)
            ->attach($absolutePathToFile, 'avatar')
            ->type('testing@test.com', 'email')
            ->press('Update')
            ->see('testing@test.com');
    }
}
