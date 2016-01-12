<?php

namespace App\Blog;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'post_categories';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}
