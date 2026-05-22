<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-ai', function () {
    $gpt = new \App\Actions\GptAction("test");

    $res = $gpt->ask("یک متن کوتاه درباره Laravel بنویس");

    dd($res);
});
