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

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'newest');

        $query = Blog::query()->with(['category', 'user'])->Active();

        // search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('short_detail', 'like', "%{$search}%");
            });
        }

        // sorting
        if ($sort === 'popular') {
            $query->orderByDesc('view');
        } elseif ($sort === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        $blogs = $query->paginate(15)->withQueryString();

        $categories = Category::query()->withCount('blogs')->Active()->latest()->limit(8)->get();

        $favorites = Blog::query()->with(['category', 'user'])->Active()->orderByDesc('view')->latest()->limit(5)->get();

        $tags = Hashtag::query()->Active()->inRandomOrder()->limit(6)->get();

        return view('blog.index', compact(
            'blogs',
            'categories',
            'favorites',
            'tags'
        ));
    }

    public function show($type,$slug): \Illuminate\Contracts\View\View
    {
        $blog = Blog::query()->active()->where('type',$type)->where('slug',$slug)->first();
        if (!$blog) {
            abort(404);
        }
        $blog->increment('view');
        $categories = Category::query()->withCount('blogs')->where('status','active')->latest()->limit(8)->get();

        $favorites = Blog::query()->with(['category','user'])->Active()->orderby('view','ASC')->latest()->limit(5)->get();

        $relatedBlogs = Blog::with(['category', 'user'])->active()->where('category_id', $blog->category_id)->where('id', '!=', $blog->id)
            ->latest()
            ->limit(4)
            ->get();

        if ($relatedBlogs->isEmpty()) {
            $relatedBlogs = Blog::with(['category', 'user'])->active()->where('id', '!=', $blog->id)->latest()
                ->limit(4)
                ->get();
        }

        $prevBlog = Blog::query()->Active()->where('id', '<', $blog->id)->latest('id')->first();

        $nextBlog = Blog::query()->Active()->where('id', '>', $blog->id)->oldest('id')->first();

        $tagIds = DB::table('model_has_hashtag')->where('model_type', Blog::class)->inRandomOrder()->limit(6)->pluck('hashtags_id');
        $relatedTags = Hashtag::query()->whereIn('id', $tagIds)->get();

        return view('blog.show', compact('blog','categories','favorites','relatedBlogs','prevBlog','nextBlog','relatedTags'));
    }
}
