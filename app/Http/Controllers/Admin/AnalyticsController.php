<?php

namespace App\Http\Controllers\Admin;

use App\Blog\PostCategory;
use Colors\RandomColor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Spatie\LaravelAnalytics\LaravelAnalyticsFacade;

class AnalyticsController extends Controller
{
    public function pageviews()
    {
        $stats = LaravelAnalyticsFacade::getVisitorsAndPageViews(30);
        $colours = RandomColor::many(4, ['hue' => 'green']);

        return response()->json([
            'labels'   => $stats->map(function ($day) {
                return $day['date']->format('m-d');
            })->toArray(),
            'datasets' => [
                [
                    "fillColor"     => $colours[0],
                    "highlightFill" => $colours[1],
                    "data"          => $stats->pluck('pageViews')
                ],
                [
                    "fillColor"     => $colours[2],
                    "highlightFill" => $colours[3],
                    "data"          => $stats->pluck('visitors')
                ]
            ]
        ]);
    }

    public function mostVisited()
    {
        $topPages = LaravelAnalyticsFacade::getMostVisitedPages(30, 5);
        $colours = RandomColor::many(10, array(
            'hue' => 'yellow'
        ));
        $values = $topPages->map(function ($page, $index) use ($colours) {
            return [
                'value'     => $page['pageViews'],
                "color"     => $colours[$index * 2],
                "highlight" => $colours[$index * 2 + 1],
                'label'     => $page['url']
            ];
        });

        return response()->json($values->toArray());
    }

    public function referrers()
    {
        $referrers = LaravelAnalyticsFacade::getTopReferrers(90, 5);

        $colours = RandomColor::many(10, array(
            'hue' => 'green'
        ));

        $values = $referrers->map(function ($page, $index) use ($colours) {
            return [
                'value'     => $page['pageViews'],
                "color"     => $colours[$index * 2],
                "highlight" => $colours[$index * 2 + 1],
                'label'     => $page['url']
            ];
        });

        return response()->json($values->toArray());
    }

    public function articleCount()
    {
        $categories = PostCategory::all();

        $colours = RandomColor::many($categories->count(), ['hue' => 'blue']);

        return $categories->map(function ($category, $index) use ($colours) {
            return [
                'value'     => $category->posts->count(),
                'color'     => $colours[$index],
                'highlight' => '#1D976C',
                'label'     => $category->name
            ];
        })->toArray();
    }
}
