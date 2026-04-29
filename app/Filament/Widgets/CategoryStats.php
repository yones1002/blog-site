<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryStats extends StatsOverviewWidget
{
    protected int | string | array $columnSpan = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('تعداد دسته بندی ها', Category::count()),
        ];
    }
}
