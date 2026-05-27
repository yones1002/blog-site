<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class BlogController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $query = Blog::query()->active()->latest()
            ->when(request('search'), function ($q) {
                $search = request('search');
                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('short_detail', 'like', "%{$search}%");
                });
            });
        $blogs = $query->paginate(15);

        $categories = Category::query()->withCount('blogs')->where('status','active')->latest()->limit(8)->get();

        $favorites = Blog::query()->with(['category','user'])->Active()->orderby('view','ASC')->latest()->limit(5)->get();

        return view('blog.index', compact('blogs','categories','favorites'));
    }
}
