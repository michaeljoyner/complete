<?php

namespace App\Blog;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'tags';

    protected $fillable = ['tag'];

    protected $sluggable = [
        'build_from' => 'tag',
        'save_to' => 'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
