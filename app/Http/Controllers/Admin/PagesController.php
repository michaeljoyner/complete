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
        $stats = LaravelAnalyticsFacade::getVisitorsAndPageViews(30);
        $totalVisitors = $stats->reduce(function($carry, $day) {
            return $day['visitors'] + $carry;
        }, 0);
        $labels = $stats->map(function ($day) {
            return $day['date']->format('m-d');
        })->toJson();
        $pageViews = $stats->map(function ($day) {
            return $day['pageViews'];
        })->toJson();
        $visitors = $stats->map(function ($day) {
            return $day['visitors'];
        })->toJson();
        $cats = $this->getArticleStats();

        $categories = PostCategory::with(['posts' => function($query) {
            $query->where('published', 1);
        }])->get();
//        dd($stats);
        return view('admin.pages.dashboard')->with(compact('stats', 'labels', 'visitors', 'pageViews', 'cats', 'categories', 'totalVisitors'));
    }

    private function getArticleStats()
    {
        $categories = PostCategory::all();

        $colours = [
            'recipes'  => '#3ED893',
            'articles' => '#89E2B1'
        ];

        return $categories->map(function ($category) use ($colours) {
            return [
                'value'     => $category->posts->count(),
                'color'     => array_key_exists(strtolower($category->name), $colours) ? $colours[strtolower($category->name)] : '#93F9B9',
                'highlight' => '#1D976C',
                'label'     => $category->name
            ];
        })->toJson();
    }
}
