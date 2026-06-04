<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Schemas\Schema;

class CommentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Placeholder::make('blog')
                ->label('مربوط به بلاگ ')
                ->content(fn ($record) => $record?->commentable?->title ?? '-'),
            TextEntry::make('name')
                ->label('نام'),

            TextEntry::make('email')
                ->label('ایمیل'),

            TextEntry::make('content')
                ->label('محتوا')
                ->columnSpanFull(),

            IconEntry::make('approved')
                ->label('تایید شده')
                ->boolean(),

            IconEntry::make('pinned')
                ->label('پین شده')
                ->boolean(),

            TextEntry::make('created_at')
                ->label('تاریخ ایجاد')
                ->dateTime(),

            TextEntry::make('deleted_at')
                ->label('حذف شده در')
                ->dateTime(),
        ]);
    }
}
