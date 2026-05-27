<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        //header menus
        $menus = Menu::query()->Active()->orderby('sort','ASC')->whereType('header')->get();
        //sub header
        $news = Blog::query()->with('category')->Active()->latest()->limit(5)->get();
        //slider
        $slider = Blog::query()->with('category')->Active()->latest()->first();


        return view('Home', compact('menus','news','slider'));
    }
}
