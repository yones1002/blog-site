<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class AuthorsController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $sort = $request->get('sort', 'newest');

        $authorsQuery = User::query()
            ->where('type', 'author')
            ->withCount('blogs');

        // sorting
        if ($sort === 'popular') {
            $authorsQuery->withSum('blogs', 'view')
                ->orderByDesc('blogs_sum_view');
        } elseif ($sort === 'articles') {
            $authorsQuery->orderByDesc('blogs_count');
        } else {
            $authorsQuery->latest();
        }

        $authors = $authorsQuery
            ->paginate(12)
            ->withQueryString();

        // stats
        $totalAuthors = User::query()->where('type', 'author')->count();

        $totalArticles = Blog::query()->where('type', 'article')->count();

        $totalViews = Blog::query()->sum('view');

        $avgArticles = $totalAuthors > 0
            ? round($totalArticles / $totalAuthors, 1)
            : 0;

        $latestBlogs = Blog::query()->latest()->limit(3)->get();

        return view('authors.index', compact(
            'authors',
            'totalAuthors',
            'totalArticles',
            'totalViews',
            'avgArticles',
            'latestBlogs'
        ));
    }
}
