<?php

namespace App\Http\Controllers\Admin;

use App\Blog\PostCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Spatie\LaravelAnalytics\LaravelAnalyticsFacade;

class PagesController extends Controller
{
    public function dashboard()
    {
        $totalVisitors = LaravelAnalyticsFacade::getVisitorsAndPageViews(30)->reduce(function($carry, $day) {
            return $day['visitors'] + $carry;
        }, 0);

        $categories = PostCategory::with(['posts' => function($query) {
            $query->where('published', 1);
        }])->get();

        return view('admin.pages.dashboard')->with(compact('categories', 'totalVisitors'));
    }
}
