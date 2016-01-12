<?php
use App\Blog\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 1/5/16
 * Time: 11:08 AM
 */
class PostTagControllerTest extends TestCase
{
    use DatabaseTransactions, AsLoggedInUser;

    /**
     * @test
     */
    public function a_posts_tags_can_be_synced_by_posting_to_an_api_endpoint()
    {
        $post = factory(Post::class)->create();
        $this->withoutMiddleware();

        $response = $this->call('POST', '/admin/api/posts/'.$post->id.'/tags', [
            'tags' => ['health', 'wealth', 'stealth']
        ]);

        $this->assertEquals(200, $response->status());

        $post = Post::findOrFail($post->id);

        $this->assertEquals(['health', 'wealth', 'stealth'], $post->tags->pluck('tag')->toArray());
    }

    /**
     * @test
     */
    public function a_posts_tags_can_be_fetched_via_api_endpoint()
    {
        $post = factory(Post::class)->create();
        $post->setTagsFromArray(['health', 'wealth', 'stealth']);

        $response = $this->call('GET', '/admin/api/posts/'.$post->id.'/tags');
        $this->assertEquals(200, $response->status());

        $this->assertEquals(['health', 'wealth', 'stealth'], json_decode($response->getContent(), true)['tags']);
    }
}