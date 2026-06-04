<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Placeholder::make('blog')
                ->label('مربوط به')
                ->content(fn ($record) => $record?->commentable?->title ?? '-'),
            TextInput::make('name')
                ->label('نام')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('ایمیل')
                ->email()
                ->maxLength(255),

            Textarea::make('content')
                ->label('محتوا')
                ->required()
                ->rows(4)
                ->columnSpanFull(),

            Toggle::make('approved')
                ->label('تایید شده'),

            Toggle::make('pinned')
                ->label('پین شده'),
        ]);
    }
}
