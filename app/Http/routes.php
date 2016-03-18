<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'PagesController@home');
Route::get('services', 'PagesController@services');
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@postContact');

Route::get('blog/{categorySlug?}', 'BlogController@showBlog');
Route::get('blog/posts/{slug}', 'BlogController@showPost');
Route::get('archives/post/{id}', 'BlogController@archivedPost');

Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', ['middleware' => 'auth', 'uses' => 'Auth\AuthController@getLogout']);
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'PagesController@dashboard');

        Route::get('users', 'UsersController@index');
        Route::post('users', 'UsersController@register');
        Route::get('users/{id}/edit', 'UsersController@edit');
        Route::post('users/{id}', 'UsersController@update');
        Route::delete('users/{id}', 'UsersController@delete');

        Route::get('blog/categories', 'PostCategoriesController@index');
        Route::post('blog/categories', 'PostCategoriesController@store');
        Route::get('blog/categories/{id}/edit', 'PostCategoriesController@edit');
        Route::post('blog/categories/{id}', 'PostCategoriesController@update');
        Route::delete('blog/categories/{id}', 'PostCategoriesController@delete');

        Route::post('users/{userId}/blog/categories/{categoryId}/posts', 'PostsController@store');
        Route::get('blog/categories/{categoryId}/posts', 'PostsController@categoryPostsIndex');

        Route::get('posts/{id}/edit', 'PostsController@edit');
        Route::post('posts/{id}', 'PostsController@update');
        Route::delete('posts/{id}', 'PostsController@delete');
        Route::post('posts/{id}/publish', 'PostsController@setPublishedStatus');
        Route::post('posts/{id}/reassign', 'PostsController@setCategory');

        Route::post('api/posts/{id}/tags', 'PostsController@setTags');
        Route::get('api/posts/{id}/tags', 'PostsController@getTags');

        Route::post('api/blog/images', 'BlogImageUploadsController@storeImage');

        Route::get('api/analytics/most-visited', 'AnalyticsController@mostVisited');
        Route::get('api/analytics/referrers', 'AnalyticsController@referrers');
        Route::get('api/analytics/pageviews', 'AnalyticsController@pageviews');
        Route::get('api/analytics/article-count', 'AnalyticsController@articleCount');
    });

    Route::group(['middleware' => 'guest', 'namespace' => ''], function () {

    });
});
