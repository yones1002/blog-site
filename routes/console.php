<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('app:import-news-command')->hourly();
Schedule::command('app:import-categories-command')->hourly();
Schedule::command('app:category-content-generate')->everyMinute();
Schedule::command('app:faq-generate')->everyMinute();
Schedule::command('app:seo-generate')->everyMinute();
