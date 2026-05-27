<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MenuInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')->label('عنوان منو'),

                TextEntry::make('url')
                    ->label('لینک')
                    ->placeholder('-'),

                TextEntry::make('type')
                    ->label('نوع منو')
                    ->badge(),

                TextEntry::make('sort')
                    ->label('ترتیب نمایش')
                    ->numeric(),

                TextEntry::make('parent_id')
                    ->label('منوی والد')
                    ->numeric()
                    ->placeholder('-'),

                IconEntry::make('active')
                    ->label('وضعیت فعال')
                    ->boolean(),

                TextEntry::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخرین بروزرسانی')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
