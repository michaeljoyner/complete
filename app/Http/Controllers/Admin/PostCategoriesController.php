<?php

namespace App\Http\Controllers\Admin;

use App\Blog\PostCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostCategoriesController extends Controller
{

    public function index()
    {
        $categories = PostCategory::all();

        return view('admin.blog.categories.index')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $category = PostCategory::create($request->only(['name', 'description']));

        return redirect('admin/blog/categories/'.$category->id.'/posts');
    }

    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);

        return view('admin.blog.categories.edit')->with(compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = PostCategory::findOrFail($id);
        $category->update($request->only(['name', 'description']));

        return redirect('admin/blog/categories/'.$category->id.'/posts');
    }

    public function delete($id)
    {
        $category = PostCategory::findOrFail($id);
        $id = $category->id;
        $category->delete();

        return redirect('admin/blog/categories/'.$id.'/posts');
    }
}
