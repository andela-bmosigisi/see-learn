<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class VideoTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test that the video listing is displayed.
     *
     * @return void
     */
    public function testVideoListingPageIsLoaded()
    {
        $video = factory('Learn\Video')->create();

        $this->visit('/')
            ->see($video->category->name);
    }

    /**
     * Test that videos are successfully created.
     *
     * @return void
     */
    public function testUploadVideo()
    {
        $user = factory('Learn\User')->create();
        factory('Learn\Category')->create();
        $this->actingAs($user)
            ->visit('/videos/add')
            ->type('Arbitrary Title', 'title')
            ->type('https://www.youtube.com/watch?v=XpqqjU7u5Yc', 'link')
            ->type('This video is for testing', 'description')
            ->press('Add')
            ->see('Arbitrary Title');
    }

    /**
     * Test video upload without category is redirected
     * to the right route.
     *
     * @return void
     */
    public function testUploadWithoutCategory()
    {
        $user = factory('Learn\User')->create();
        $this->actingAs($user)
            ->visit('/videos/add')
            ->type('myCat', 'name')
            ->type('This is a category description', 'description')
            ->press('Add')
            ->visit('/videos/add')
            ->type('Arbitrary Title', 'title')
            ->type('https://www.youtube.com/watch?v=XpqqjU7u5Yc', 'link')
            ->type('This video is for testing', 'description')
            ->press('Add')
            ->see('Arbitrary Title');
    }

    /**
     * Test that guests cannot upload a video.
     *
     * @return void
     */
    public function testGuestUploadVideoFails()
    {
        $this->visit('/videos/add')
            ->seePageIs('/login');
    }

    /**
     * Test that videos can be viewed.
     *
     * @return void
     */
    public function testVideoIsLoaded()
    {
        $video = factory('Learn\Video')
            ->create(['title' => 'Test Video']);

        $this->visit('/videos/'.$video->id)
            ->see('Test Video');
    }

    /**
     * Test that an existing video can be edited.
     *
     * @return void
     */
    public function testVideosAreEditable()
    {
        $user = factory('Learn\User')->create();
        $video = factory('Learn\Video')
            ->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->visit('/videos/edit/'.$video->id)
            ->type('This Changed', 'description')
            ->press('Edit')
            ->see('This Changed');
    }

    /**
     * Test that a video can be deleted.
     *
     * @return void
     */
    public function testVideosCanBeDeleted()
    {
        $user = factory('Learn\User')->create();
        $video = factory('Learn\Video')
            ->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->visit('/videos/'.$video->id)
            ->click('Delete')
            ->see('Video deleted successfully.');
    }

    /**
     * Test that viewing a non-existing video is impossible.
     *
     * @return void
     */
    public function testOnlyExistingVideosAreViewable()
    {
        $this->visit('/videos/999')
            ->see('Video not found.');
    }
}
