<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Hashtag;
use App\Models\Menu;
use App\Models\User;
use App\Traits\HasSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class BlogController extends Controller
{
    use HasSearch;

    protected array $searchable = [
        'title',
        'short_detail',
    ];
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'newest');

        $blogs = Blog::query()->with(['category', 'user'])->Active()->search($request->search)
            ->when($sort === 'popular', fn($q) => $q->orderByDesc('view'))
            ->when($sort === 'oldest', fn($q) => $q->oldest())
            ->when(!in_array($sort, ['popular','oldest']), fn($q) => $q->latest())
            ->paginate(15)->withQueryString();

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
        $blog = Blog::query()->active()
            ->with(['hashtags', 'user'])
            ->whereType($type)
            ->whereSlug($slug)
            ->firstOrFail();
        $blog->increment('view');

        $categories = Category::query()->withCount('blogs')->where('status','active')->latest()->limit(8)->get();

        $otherBlog = $this->other($blog);

        $tags = $this->tags();

        $comments = Comment::query()->where('model_id', $blog->id)
            ->where('model_type', Blog::class)
            ->orderByDesc('pinned')
            ->latest()
            ->get();

        return view('blog.show', compact(
            'blog',
            'categories',
            'otherBlog',
            'tags',
            'comments',
        ));
    }

    protected function other(Blog $blog): array
    {
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

        return [
            'relatedBlogs' => $relatedBlogs,
            'prevBlog' => $prevBlog,
            'nextBlog' => $nextBlog,
        ];
    }

    public function tags(): \Illuminate\Database\Eloquent\Collection
    {
        $tagIds = DB::table('model_has_hashtag')
            ->where('model_type', Blog::class)
            ->inRandomOrder()->limit(6)
            ->pluck('hashtags_id');

        return Hashtag::query()->whereIn('id', $tagIds)->get();
    }
}
