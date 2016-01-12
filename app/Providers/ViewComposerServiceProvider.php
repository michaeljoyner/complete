<?php

namespace App\Providers;

use App\Blog\PostCategory;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.partials.navbar', function ($view) {
            $postCategories = PostCategory::all();

            return $view->with(compact('postCategories'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
