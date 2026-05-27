<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
    $this::command('app:import-news-command')->hourly();
    $this::command('app:import-categories-command')->hourly();
    $this::command('app:category-content-generate')->everyMinute();
    $this::command('app:faq-generate')->everyMinute();
    $this::command('app:seo-generate')->everyMinute();
})->purpose('Display an inspiring quote');
