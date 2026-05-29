<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class HomeController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        // article
        $articles = Blog::query()->where('type','article')->with(['category','user'])->Active()->latest()->limit(6)->get();
        // favorite
        $favorites = Blog::query()->with(['category','user'])->Active()->orderby('view','ASC')->latest()->limit(5)->get();
        // categories
        $categories = Category::query()->Active()->latest()->limit(4)->get();
        //author
        $authors = User::query()->where('type','author')->latest()->limit(6)->get();

        return view('Home', compact('articles','favorites','categories','authors'));
    }
}
