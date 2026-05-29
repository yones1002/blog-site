<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

/*
 * HOME PAGE
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * BLOGS PAGE
 */
Route::group(['prefix' => 'blog'], function () {
    Route::get('/',[BlogController::class,'index'])->name('blogs.index');
    Route::get('/{type}/{slug}',[BlogController::class,'show'])->name('blogs.show');
});

/*
 * CATEGORIES PAGE
 */
Route::group(['prefix' => 'categories'], function () {
    Route::get('/',[CategoryController::class,'index'])->name('category.index');
    Route::get('/{slug}',[CategoryController::class,'show'])->name('category.show');
});

/*
 * AUTHORS PAGE
 */
Route::group(['prefix' => 'authors'], function () {
    Route::get('/',[AuthorsController::class,'index'])->name('author.index');
    Route::get('/{id}',[AuthorsController::class,'show'])->name('author.show');
});
