<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        App::setLocale('fa');
        View::composer('*', function ($view) {

            $menus = Menu::active()->orderBy('sort')->whereType('header')->get();
            $news = Blog::query()->with(['category','user'])->Active()->latest()->limit(5)->get();
            $slider = Blog::query()->with(['category','user'])->Active()->latest()->first();

            $view->with([
                'menus' => $menus,
                'news' => $news,
                'slider' => $slider,
            ]);
        });
        Paginator::useTailwind();
    }
}
