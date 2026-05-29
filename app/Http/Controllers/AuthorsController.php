<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Menu;
use App\Models\User;
use App\Traits\HasSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class AuthorsController extends Controller
{
    use HasSearch;
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $sort = $request->get('sort', 'newest');

        $authorsQuery = User::query()
            ->Authors()
            ->withCount('blogs')
            ->with('latestBlogs')
            ->search($request->search)
            ->when($sort === 'popular', fn($q) => $q->withSum('blogs', 'view')->orderByDesc('blogs_sum_view'))
            ->when($sort === 'articles', fn($q) => $q->orderByDesc('blogs_count'))
            ->when(!in_array($sort, ['popular', 'articles']), fn($q) => $q->latest());

        $authors = $authorsQuery
            ->paginate(12)
            ->withQueryString();

        $totalAuthors = User::query()->Authors()->count();

        $totalArticles = Blog::query()->latest()->count();

        $totalViews = Blog::query()->sum('view');

        $avgArticles = $totalAuthors > 0 ? round($totalArticles / $totalAuthors, 1) : 0;

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
            ->Authors()
            ->where('id', $id)
            ->withCount('blogs')
            ->firstOrFail();

        $blogs = $author->blogs()
            ->with('category')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $latestBlogs = Blog::query()->with(['category', 'user'])->Active()->limit(5)->get();

        $otherAuthor = User::query()
            ->Authors()
            ->withCount('blogs')
            ->with('latestBlogs')->limit(8)
            ->get();

        return view('authors.show', compact('author', 'blogs', 'latestBlogs', 'otherAuthor'));
    }
}
