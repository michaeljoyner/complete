<?php

namespace App\Http\Controllers;

use App\Blog\Post;
use App\Blog\PostCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function showBlog($categorySlug = null)
    {
        if($categorySlug) {
            $category = PostCategory::findBySlug($categorySlug);
            $posts = $category->posts()->where('published', 1)->latest()->simplePaginate(10);
            $filters = PostCategory::where('slug', '<>', $categorySlug)->get();
        } else {
            $category = $this->makeDefaultCategory();
            $posts = Post::where('published', 1)->latest()->simplePaginate(10);
            $filters = PostCategory::all();
        }

        return view('front.blog.index')->with(compact('category', 'posts', 'filters'));
    }

    public function showPost($slug)
    {
        $post = Post::findBySlug($slug);

        return view('front.blog.post')->with(compact('post'));
    }

    public function archivedPost($id)
    {
        $post = Post::where('archive_id', $id)->firstOrFail();

        return view('front.blog.post')->with(compact('post'));
    }

    private function makeDefaultCategory()
    {
        $category = new \stdClass();
        $category->name = 'All Posts';
        return $category;
    }
}
