<?php

namespace App\Blog;

use App\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'posts';

    protected $fillable = [
        'post_category_id',
        'title',
        'description',
        'body',
        'published_at',
        'published',
        'archive_id',
        'is_archive'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function attachTo(PostCategory $category)
    {
        $this->post_category_id = $category->id;
        return $this->save();
    }

    public function setPublishedStatus($publish)
    {
        if($publish && is_null($this->published_at)) {
            $this->published_at = Carbon::now();
        }

        $this->published = $publish;
        $this->save();

        return $this->published;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function syncTags($tagIds)
    {
        return $this->tags()->sync($tagIds);
    }

    public function setTagsFromArray($tags)
    {
        $tagIds = collect($tags)->map(function($tag) {
            return $this->findOrCreateTag($tag)->id;
        })->toArray();

        $this->syncTags($tagIds);
    }

    protected function findOrCreateTag($tagName)
    {
        $foundTag = Tag::where('tag', $tagName)->first();
        if($foundTag) {
            return $foundTag;
        }
        return Tag::create(['tag' => $tagName]);
    }
}
