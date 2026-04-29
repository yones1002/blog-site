<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogStats extends StatsOverviewWidget
{
    protected int | string | array $columnSpan = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('تعداد بلاگ‌ها', Blog::count()),
        ];
    }
}
