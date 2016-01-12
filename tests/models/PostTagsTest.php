<?php
use App\Blog\Post;
use App\Blog\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 12/29/15
 * Time: 11:26 PM
 */
class PostTagsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function a_tag_can_be_associated_with_a_post()
    {
        $post = factory(Post::class)->create();
        $tag = factory(Tag::class)->create();

        $post->tags()->attach($tag->id);

        $this->assertEquals($tag->tag, $post->tags->first()->tag);
    }

    /**
     * @test
     */
    public function a_group_of_tags_can_be_synced_to_a_model()
    {
        $tagIds = $this->getIdsOfCreatedTags(5);
        $post = factory(Post::class)->create();

        $post->syncTags($tagIds);

        $this->assertCount(5, $post->tags);
    }

    /**
     * @test
     */
    public function syncing_tags_overrides_old_ones()
    {
        $tagIds1 = $this->getIdsOfCreatedTags(3);
        $tagIds2 = $this->getIdsOfCreatedTags(3);
        $post = factory(Post::class)->create();

        $post->syncTags($tagIds1);
        $oldTags = $post->tags;

        $post->syncTags($tagIds2);
        $post = Post::findOrFail($post->id); //refresh post instance
        $newTags = $post->tags;
        $this->assertFalse($newTags->contains($oldTags->last()));
        $this->assertFalse($newTags->contains($oldTags->first()));
        $this->assertCount(3, $newTags);
    }

    /**
     * @test
     */
    public function given_an_array_of_tag_names_a_post_can_create_new_tags_and_sync_with_given_tags()
    {
        $tag = factory(Tag::class)->create(['tag' => 'mooztag']);
        $post = factory(Post::class)->create();

        $post->setTagsFromArray(['mooztag', 'new tag']);

        $this->assertCount(2, $post->tags);
        $this->assertCount(2, Tag::all());
        $this->seeInDatabase('tags', [
            'tag' => 'new tag'
        ]);
    }

    private function getIdsOfCreatedTags($number)
    {
        return factory(Tag::class, $number)->create()->map(function($tag) {
            return $tag->id;
        })->toArray();
    }

}