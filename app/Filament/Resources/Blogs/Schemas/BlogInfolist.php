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
                TextEntry::make('title')->label('عنوان'),

                TextEntry::make('slug')->label('اسلاگ'),

                TextEntry::make('type')->label('نوع'),

                TextEntry::make('short_detail')
                    ->label('توضیحات کوتاه')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('long_detail')
                    ->label('توضیحات کامل')
                    ->placeholder('-')
                    ->columnSpanFull(),

                ImageEntry::make('cover')->label('کاور'),

                ImageEntry::make('mini_cover')->label('کاور کوچک'),

                RepeatableEntry::make('seo')
                    ->label('سئو')
                    ->schema([
                        TextEntry::make('meta_title')->label('عنوان متا'),

                        TextEntry::make('meta_description')->label('توضیحات متا'),

                        TextEntry::make('meta_keywords')->label('کلمات کلیدی'),

                        TextEntry::make('robots')->label('روبات‌ها'),

                        TextEntry::make('og_title')->label('OG عنوان'),

                        TextEntry::make('twitter_title')->label('توییتر عنوان'),
                    ])
                    ->columns(2),

                TextEntry::make('status')->label('وضعیت')->badge(),

                RepeatableEntry::make('faq')
                    ->label('سوالات متداول')
                    ->schema([
                        TextEntry::make('question')->label('سوال'),

                        TextEntry::make('answer')->label('پاسخ'),
                    ])
                    ->columns(2),

                TextEntry::make('created_by')->label('ایجاد شده توسط'),

                TextEntry::make('category.name')
                    ->label('دسته‌بندی')
                    ->placeholder('-'),

                TextEntry::make('view')->label('بازدید')->numeric(),

                TextEntry::make('parent_id')->label('والد')->numeric(),

                TextEntry::make('share_time')
                    ->label('زمان انتشار')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('videos')->label('ویدیوها')->placeholder('-'),

                TextEntry::make('lang')->label('زبان')->badge(),

                TextEntry::make('author_id')->label('نویسنده'),

                TextEntry::make('deleted_at')
                    ->label('حذف شده در')
                    ->dateTime()
                    ->visible(fn (Blog $record): bool => $record->trashed()),
            ]);
    }
}
