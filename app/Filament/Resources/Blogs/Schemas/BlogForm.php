<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\Blog;
use App\Models\Category;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->label('عنوان')->required(),

                TextInput::make('slug')->label('اسلاگ')->required(),

                Select::make('type')
                    ->label('نوع')
                    ->options(['article' => 'مقاله', 'news' => 'خبر'])
                    ->required(),

                RichEditor::make('short_detail')
                    ->label('توضیحات کوتاه')
                    ->columnSpanFull(),

                RichEditor::make('long_detail')
                    ->label('توضیحات کامل')
                    ->columnSpanFull(),

                Repeater::make('link')
                    ->label('لینک‌ها')
                    ->default([])
                    ->schema([
                        TextInput::make('aparat')->label('آپارات'),
                        TextInput::make('youtube')->label('یوتیوب'),
                        TextInput::make('voice')->label('صدا'),
                        TextInput::make('twitter')->label('توییتر'),
                    ])
                    ->columns(2),

                FileUpload::make('cover')->label('کاور'),

                FileUpload::make('mini_cover')->label('کاور کوچک'),

                Section::make('SEO')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('seo')
                            ->label('سئو')
                            ->default([])
                            ->schema([
                                TextInput::make('meta_title')->label('عنوان متا')->maxLength(60),

                                Textarea::make('meta_description')
                                    ->label('توضیحات متا')
                                    ->maxLength(160),

                                TextInput::make('meta_keywords')->label('کلمات کلیدی'),

                                TextInput::make('canonical_url')
                                    ->label('کنونیکال')
                                    ->url(),

                                Select::make('robots')
                                    ->label('روبات‌ها')
                                    ->options([
                                        'index,follow' => 'index, follow',
                                        'noindex,follow' => 'noindex, follow',
                                        'index,nofollow' => 'index, nofollow',
                                        'noindex,nofollow' => 'noindex, nofollow',
                                    ])
                                    ->default('index,follow'),

                                TextInput::make('og_title')->label('OG عنوان'),

                                Textarea::make('og_description')->label('OG توضیحات'),

                                FileUpload::make('og_image')->label('OG تصویر'),

                                TextInput::make('twitter_title')->label('توییتر عنوان'),

                                Textarea::make('twitter_description')->label('توییتر توضیحات'),

                                FileUpload::make('twitter_image')->label('توییتر تصویر'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->addActionLabel('افزودن سئو'),
                    ]),

                Select::make('status')
                    ->label('وضعیت')
                    ->options(['active' => 'فعال', 'inactive' => 'غیرفعال'])
                    ->default('active')
                    ->required(),

                Section::make('FAQ')
                    ->label('سوالات متداول')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('faq')
                            ->label('FAQ')
                            ->default([])
                            ->schema([
                                TextInput::make('question')->label('سوال')->required(),

                                Textarea::make('answer')->label('پاسخ')->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('افزودن پاسخ')
                            ->reorderable()
                            ->collapsible(),
                    ]),

                TextInput::make('created_by')
                    ->label('ایجاد شده توسط')
                    ->required()
                    ->default('گروه تولید محتوا'),

                Select::make('category_id')
                    ->label('دسته‌بندی')
                    ->options(
                        Category::query()->pluck('fa_name', 'id')
                    )
                    ->required(),

                TextInput::make('view')
                    ->label('بازدید')
                    ->required()
                    ->numeric()
                    ->default(0),

                Select::make('parent_id')
                    ->label('والد')
                    ->options(
                        collect([0 => 'بدون والد'])
                            ->merge(Blog::query()->pluck('title', 'id'))
                    )
                    ->default(0),

                DateTimePicker::make('share_time')
                    ->label('زمان انتشار'),

                TextInput::make('videos')
                    ->label('ویدیوها'),

                Select::make('lang')
                    ->label('زبان')
                    ->options(['fa' => 'فارسی', 'en' => 'انگلیسی', 'other' => 'سایر'])
                    ->default('en')
                    ->required(),

                Select::make('author_id')
                    ->label('نویسنده')
                    ->relationship(
                        'user',
                        'name',
                        fn ($query) => $query->where('type', 'authors')
                    )
            ]);
    }
}
