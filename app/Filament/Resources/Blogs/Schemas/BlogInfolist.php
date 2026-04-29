<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\Blog;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('type'),
                TextEntry::make('short_detail')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('long_detail')
                    ->placeholder('-')
                    ->columnSpanFull(),
                RepeatableEntry::make('link')
                    ->schema([
                        TextEntry::make('aparat'),
                        TextEntry::make('youtube'),
                        TextEntry::make('voice'),
                        TextEntry::make('twitter'),
                    ])
                    ->columns(2),
                ImageEntry::make('cover'),
                ImageEntry::make('mini_cover'),
                RepeatableEntry::make('seo')
                    ->schema([
                        TextEntry::make('meta_title'),
                        TextEntry::make('meta_description'),
                        TextEntry::make('meta_keywords'),
                        TextEntry::make('robots'),
                        TextEntry::make('og_title'),
                        TextEntry::make('twitter_title'),
                    ])
                    ->columns(2),
                TextEntry::make('time')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('show')
                    ->placeholder('-'),
                RepeatableEntry::make('faq')
                    ->schema([
                        TextEntry::make('question'),
                        TextEntry::make('answer'),
                    ])
                    ->columns(2),
                TextEntry::make('created_by'),
                TextEntry::make('category.name')
                    ->label('Category')
                    ->placeholder('-'),
                TextEntry::make('view')
                    ->numeric(),
                TextEntry::make('likes')
                    ->numeric(),
                TextEntry::make('parent_id')
                    ->numeric(),
                TextEntry::make('share_time')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('videos')
                    ->placeholder('-'),
                TextEntry::make('lang')
                    ->badge(),
                TextEntry::make('author_id'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Blog $record): bool => $record->trashed()),
            ]);
    }
}
