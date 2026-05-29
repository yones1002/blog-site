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

class CategoryController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $search = $request->search;
        $sort = $request->sort ?? 'newest';

        $categories = Category::query()->withCount('blogs')->Active()->withCount('blogs')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('fa_name', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            });

        // SORT
        if ($sort === 'oldest') {
            $categories->oldest();
        } elseif ($sort === 'popular') {
            $categories->orderByDesc('blogs_count');
        } else {
            $categories->latest();
        }

        $categories = $categories
            ->paginate(15)
            ->withQueryString();

        // TOP AUTHORS (max 6)
        $topAuthors = User::query()
            ->where('type', 'author')
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

        return view('categories.index', compact('categories', 'topAuthors', 'tags','totalBlogs'));
    }

    public function show(Request $request, $slug): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $sort = $request->get('sort', 'newest');

        $category = Category::query()->where('slug', $slug)
            ->withCount('blogs')
            ->firstOrFail();

        $blogsQuery = Blog::query()
            ->with(['user', 'category'])
            ->where('category_id', $category->id)
            ->Active();

        // sorting
        if ($sort === 'popular') {
            $blogsQuery->orderByDesc('view');
        } elseif ($sort === 'oldest') {
            $blogsQuery->orderBy('created_at');
        } else {
            $blogsQuery->latest();
        }

        $blogs = $blogsQuery->paginate(10)->withQueryString();

        // featured blog (اولین مقاله)
        $featuredBlog = Blog::query()
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

        // stats
        $totalViews = Blog::query()->where('category_id', $category->id)->sum('view');

        $lastPostDate = Blog::query()->where('category_id', $category->id)->latest()->value('created_at');

        return view('categories.show', compact(
            'category',
            'blogs',
            'featuredBlog',
            'authors',
            'relatedCategories',
            'totalViews',
            'lastPostDate'
        ));
    }
}
