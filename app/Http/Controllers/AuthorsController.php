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
        $search = $request->get('search');

        $authorsQuery = User::query()
            ->where('type', 'authors')
            ->withCount('blogs')
            ->with('latestBlogs');

        if ($search) {
            $authorsQuery->where('name', 'like', "%{$search}%");
        }

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
        $totalAuthors = User::query()->where('type', 'authors')->count();

        $totalArticles = Blog::query()->latest()->count();

        $totalViews = Blog::query()->sum('view');

        $avgArticles = $totalAuthors > 0
            ? round($totalArticles / $totalAuthors, 1)
            : 0;

        return view('authors.index', compact(
            'authors',
            'totalAuthors',
            'totalArticles',
            'totalViews',
            'avgArticles'
        ));
    }

    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $author = User::query()
            ->where('type', 'authors')
            ->where('id', $id)
            ->withCount('blogs')
            ->firstOrFail();

        $blogs = $author->blogs()
            ->with('category')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $latestBlogs = Blog::query()->with(['category', 'user'])->Active()->limit(5)->get();

        $authors = User::query()
            ->where('type', 'authors')
            ->withCount('blogs')
            ->with('latestBlogs')->limit(8)
            ->get();

        return view('authors.show', compact('author', 'blogs', 'latestBlogs','authors'));
    }
}
