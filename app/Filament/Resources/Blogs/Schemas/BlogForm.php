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
use Tiptap\Editor;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('type')
                    ->options(['article' => 'Article', 'news' => 'News'])
                    ->required(),
                RichEditor::make('short_detail')
                    ->columnSpanFull(),
                RichEditor::make('long_detail')
                    ->columnSpanFull(),
                Repeater::make('link')
                    ->default([])
                    ->schema([
                        TextInput::make('aparat'),
                        TextInput::make('youtube'),
                        TextInput::make('voice'),
                        TextInput::make('twitter'),
                    ])
                    ->columns(2),
                FileUpload::make('cover'),
                FileUpload::make('mini_cover'),
                Section::make('SEO')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('seo')
                            ->default([])
                            ->schema([
                                TextInput::make('meta_title')
                                    ->maxLength(60),

                                Textarea::make('meta_description')
                                    ->maxLength(160),

                                TextInput::make('meta_keywords'),

                                TextInput::make('canonical_url')
                                    ->url(),

                                Select::make('robots')
                                    ->options([
                                        'index,follow' => 'index, follow',
                                        'noindex,follow' => 'noindex, follow',
                                        'index,nofollow' => 'index, nofollow',
                                        'noindex,nofollow' => 'noindex, nofollow',
                                    ])
                                    ->default('index,follow'),

                                TextInput::make('og_title'),
                                Textarea::make('og_description'),
                                FileUpload::make('og_image'),

                                TextInput::make('twitter_title'),
                                Textarea::make('twitter_description'),
                                FileUpload::make('twitter_image'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->addActionLabel('Add SEO Data'),
                    ]),
                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->default('active')
                    ->required(),
                Section::make('FAQ')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('faq')
                            ->default([])
                            ->schema([
                                TextInput::make('question')
                                    ->required(),
                                Textarea::make('answer')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('add answer')
                            ->reorderable()
                            ->collapsible(),
                    ]),
                TextInput::make('created_by')
                    ->required()
                    ->default('Content Team'),
                Select::make('category_id')
                    ->options(
                        Category::query()
                            ->pluck('name', 'id')
                    )
                    ->required(),
                TextInput::make('view')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('parent_id')
                    ->options(
                        collect([0 => 'without parent'])
                            ->merge(Blog::query()->pluck('title', 'id')))
                    ->default(0),

                DateTimePicker::make('share_time'),
                TextInput::make('videos'),
                Select::make('lang')
                    ->options(['fa' => 'Fa', 'en' => 'En', 'other' => 'Other'])
                    ->default('en')
                    ->required(),
                Select::make('author_id')
                    ->relationship(
                        'user',
                        'name',
                        fn ($query) => $query->whereNotNull('name')
                    ),
            ]);
    }
}
