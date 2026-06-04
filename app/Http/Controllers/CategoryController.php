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

class CategoryController extends Controller
{
    use HasSearch;

    protected array $searchable = [
        'fa_name',
        'name',
    ];

    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $sort = $request->sort ?? 'newest';

        $categories = Category::query()->withCount('blogs')->Active()
            ->withCount('blogs')
            ->search($request->search)
            ->when($sort === 'popular', fn($q) => $q->oldest())
            ->when($sort === 'oldest', fn($q) => $q->orderByDesc('blogs_count'))
            ->when(!in_array($sort, ['popular', 'oldest']), fn($q) => $q->latest())
            ->paginate(15)
            ->withQueryString();

        $topAuthors = User::query()
            ->where('type', 'authors')
            ->withCount('blogs')
            ->orderByDesc('blogs_count')
            ->limit(6)
            ->get();

        $tags = Hashtag::query()
            ->Active()
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $totalBlogs = $categories->getCollection()->sum('blogs_count');

        return view('categories.index', compact('categories', 'topAuthors', 'tags', 'totalBlogs'));
    }

    public function show(Request $request, $slug): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $sort = $request->get('sort', 'newest');

        $category = Category::query()->where('slug', $slug)
            ->withCount('blogs')
            ->firstOrFail();

        $blogs = Blog::query()
            ->with(['user', 'category'])
            ->where('category_id', $category->id)
            ->Active()
            ->when($sort === 'popular', fn($q) => $q->orderByDesc('view'))
            ->when($sort === 'oldest', fn($q) => $q->oldest())
            ->paginate(10)->withQueryString();

        $latestBlog = Blog::query()
            ->with(['user', 'category'])
            ->where('category_id', $category->id)
            ->Active()
            ->latest()
            ->first();

        // authors with blogs count
        $authors = \App\Models\User::query()
            ->whereHas('blogs', function ($q) use ($category) {
                $q->where('category_id', $category->id);
            })
            ->withCount(['blogs' => function ($q) use ($category) {
                $q->where('category_id', $category->id);
            }])
            ->get();

        // related categories
        $relatedCategories = Category::query()
            ->active()
            ->where('id', '!=', $category->id)
            ->withCount('blogs')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $totalViews = Blog::query()->where('category_id', $category->id)->sum('view');

        $lastPostDate = Blog::query()->where('category_id', $category->id)->latest()->value('created_at');

        return view('categories.show', compact(
            'category',
            'blogs',
            'latestBlog',
            'authors',
            'relatedCategories',
            'totalViews',
            'lastPostDate'
        ));
    }
}
