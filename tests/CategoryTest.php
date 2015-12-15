<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test that categories are loaded.
     *
     * @return void
     */
    public function testCategoriesAreLoaded()
    {
        $category = factory('Learn\Category')->create();
        $video = factory('Learn\Video')
            ->create(['category_id' => $category->id]);

        $this->visit('/categories/'.$category->id)
            ->see($video->title);
    }

    /**
     * Test that categories can be made.
     *
     * @return void
     */
    public function testCategoriesAreAdded()
    {
        $user = factory('Learn\User')->create();

        $this->actingAs($user)
            ->visit('/categories/add')
            ->type('Test', 'name')
            ->type('A test category', 'description')
            ->press('Add')
            ->see('A test category');
    }

    /**
     * Test that category descriptions are editable.
     *
     * @return void
     */
    public function testEditCategory()
    {
        $category = factory('Learn\Category')->create();

        $this->actingAs($category->user)
            ->visit('/categories/edit/'.$category->id)
            ->type('New Description', 'description')
            ->press('Update')
            ->see('New Description');
    }

    /**
     * Test that only owners of categories can edit them.
     *
     * @return void
     */
    public function testEditIsForCategoryOwners()
    {
        $user = factory('Learn\User')->create();
        $category = factory('Learn\Category')->create();

        $this->actingAs($user)
            ->visit('/categories/edit/'.$category->id)
            ->see('Sorry, you did not create that category.');
    }
}
