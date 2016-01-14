<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Post;
use App\Blog\PostCategory;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use stdClass;

class PostsController extends Controller
{

    public function categoryPostsIndex($categoryId)
    {
        $category = PostCategory::findOrFail($categoryId);
        $otherCategories = PostCategory::where('id', '<>', $category->id)->get();
        $posts = $category->posts()->latest()->paginate(10);

        return view('admin.posts.index')->with(compact('category', 'posts', 'otherCategories'));
    }

    public function store($userId, $categoryId, Request $request)
    {
        $post = User::findOrFail($userId)->storePost($request->all(), $categoryId);

        return redirect('admin/posts/'.$post->id.'/edit');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit')->with(compact('post'));
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('admin/blog/categories/'.$post->category->id.'/posts');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $category = $post->category;
        $post->delete();

        return redirect('admin/blog/categories/'.$category->id.'/posts');
    }

    public function setPublishedStatus($id, Request $request)
    {
        $status = Post::findOrFail($id)->setPublishedStatus($request->publish);

        return response()->json(['published' => $status]);
    }

    public function setTags($id, Request $request)
    {
        $post = Post::findOrFail($id);

        $post->setTagsFromArray($request->tags);

        return response()->json(['tags' => $post->tags->pluck('tag')]);
    }

    public function setCategory($id, Request $request)
    {
        $category = PostCategory::findOrFail($request->new_category_id);
        Post::findOrFail($id)->attachTo($category);

        return redirect('admin/blog/categories/'.$category->id.'/posts');
    }

    public function getTags($id)
    {
        $tags = Post::with('tags')->findOrFail($id)->tags->pluck('tag')->toArray();
        return response()->json(['tags' => $tags]);
    }
}
