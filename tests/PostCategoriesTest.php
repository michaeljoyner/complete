<?php
use App\Blog\PostCategory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/19/15
 * Time: 7:21 PM
 */
class PostCategoriesTest extends TestCase
{

    use DatabaseTransactions, AsLoggedInUser;

    /**
     * @test
     */
    public function a_new_category_can_be_created()
    {
        $this->withoutMiddleware();

        $response = $this->call('POST', '/admin/blog/categories', [
            'name' => 'Recipes',
            'description' => 'Scrumptious recipes for a complete lifestyle'
        ]);

        $this->assertEquals(302, $response->status());
        $this->seeInDatabase('post_categories', [
            'name' => 'Recipes',
            'description' => 'Scrumptious recipes for a complete lifestyle'
        ]);
    }

    /**
     * @test
     */
    public function a_category_name_and_description_can_be_edited()
    {
        $category = factory(PostCategory::class)->create();

        $this->visit('/admin/blog/categories/'.$category->id.'/edit')
            ->type('Musings', 'name')
            ->type('My myopic musings', 'description')
            ->press('Save Changes')
            ->seeInDatabase('post_categories', [
                'id' => $category->id,
                'name' => 'Musings',
                'description' => 'My myopic musings'
            ]);
    }

    /**
     * @test
     */
    public function a_category_can_be_deleted()
    {
        $category = factory(PostCategory::class)->create();
        $this->withoutMiddleware();

        $response = $this->call('DELETE', '/admin/blog/categories/'.$category->id);

        $this->assertEquals(302, $response->status());
        $this->notSeeInDatabase('post_categories', [
            'id' => $category->id
        ]);

    }

}