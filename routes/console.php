<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
    $this::command('app:import-news-command')->hourly();
    $this::command('app:faq-generate')->hourly();
    $this::command('app:seo-generate')->hourly();
})->purpose('Display an inspiring quote');
