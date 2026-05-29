<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

/*
 * HOME PAGE
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * BLOG PAGE
 */
Route::group(['prefix' => 'blog'], function () {
    Route::get('/',[BlogController::class,'index'])->name('blogs.index');
    Route::get('/{type}/{slug}',[BlogController::class,'show'])->name('blogs.show');
});
