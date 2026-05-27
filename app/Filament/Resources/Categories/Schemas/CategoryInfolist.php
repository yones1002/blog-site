<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')->label('نام'),

                TextEntry::make('fa_name')->label('نام فارسی'),

                TextEntry::make('slug')->label('اسلاگ'),

                TextEntry::make('type')->label('نوع'),

                TextEntry::make('parent_id')->label('والد')->numeric(),

                TextEntry::make('description')
                    ->label('توضیحات انگلیسی')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('fa_description')
                    ->label('توضیحات فارسی')
                    ->placeholder('-')
                    ->columnSpanFull(),

                ImageEntry::make('image')->label('تصویر')->placeholder('-'),

                TextEntry::make('created_at')
                    ->label('ساخته شده در')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخرین بروزرسانی')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
