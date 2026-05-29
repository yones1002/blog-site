<?php

namespace App\Filament\Resources\Hashtags\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HashtagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('fa_name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->default('inactive')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('fa_description')
                    ->columnSpanFull(),
                TextInput::make('json'),
                FileUpload::make('image')
                    ->image(),
                Select::make('blogs')
                    ->label('مقالات')
                    ->multiple()
                    ->relationship('blogs', 'title')
                    ->searchable()
            ]);
    }
}
