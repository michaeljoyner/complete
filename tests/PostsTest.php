<?php
use App\Blog\Post;
use App\Blog\PostCategory;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/14/15
 * Time: 9:09 AM
 */
class PostsTest extends TestCase
{
    use DatabaseTransactions, AsLoggedInUser;

    /**
     * @test
     */
    public function a_user_can_post_to_a_category()
    {
        $this->withoutMiddleware();
        $user = User::first();
        $category = factory(PostCategory::class)->create();

        $response = $this->call('POST', '/admin/users/'.$user->id.'/blog/categories/'.$category->id.'/posts', [
            'title' => 'My First Blog Post'
        ]);
        $this->assertEquals(302, $response->status());

        $this->seeInDatabase('posts', [
            'user_id' => $user->id,
            'post_category_id' => $category->id,
            'title' => 'My First Blog Post'
        ]);
    }

    /**
     * @test
     */
    public function a_posts_title_description_and_body_can_be_edited()
    {
        $post = factory(Post::class)->create();

        $this->visit('/admin/posts/'.$post->id.'/edit')
            ->type('An Edited Title', 'title')
            ->type('A new description', 'description')
            ->type('A sexy body', 'body')
            ->press('Save Changes')
            ->seeInDatabase('posts', [
                'id' => $post->id,
                'title' => 'An Edited Title',
                'description' => 'A new description',
                'body' => 'A sexy body'
            ]);
    }

    /**
     * @test
     */
    public function a_post_can_be_deleted()
    {
        $post = factory(Post::class)->create();

        $this->withoutMiddleware();
        $response = $this->call('DELETE', '/admin/posts/'.$post->id);

        $this->assertEquals(302, $response->status());

        $this->notSeeInDatabase('posts', [
            'id' => $post->id
        ]);
    }

    /**
     * @test
     */
    public function a_posts_published_status_can_be_toggled_via_api_endpoint()
    {
        $post = factory(Post::class)->create();
        $this->assertEquals(0, $post->published, 'post should be unpublished');

        $this->withoutMiddleware();
        $response = $this->call('POST', '/admin/posts/'.$post->id.'/publish', [
            'publish' => true
        ]);
        $this->assertEquals(200, $response->status());
        $this->assertEquals(1, Post::findOrFail($post->id)->published, 'post should now be published');
    }

    /**
     * @test
     */
    public function a_post_that_is_not_published_has_a_null_value_for_published_at()
    {
        $post = factory(Post::class)->create();
        $this->assertEquals(0, $post->published, 'post should not be published');
        $this->assertNull($post->published_at, 'published_at should be null');
    }

    /**
     * @test
     */
    public function a_posts_published_at_date_is_set_when_it_is_first_published()
    {
        $post = factory(Post::class)->create();

        $post->setPublishedStatus(true);

        $this->assertEquals(Carbon::now()->toFormattedDateString(), Post::findOrFail($post->id)->published_at->toFormattedDateString());
    }




}