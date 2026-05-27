<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->required()
                ->label('عنوان منو'),

            TextInput::make('url')
                ->label('لینک'),

            Select::make('type')
                ->options([
                    'header' => 'هدر',
                    'footer' => 'فوتر',
                ])
                ->required()
                ->label('محل نمایش'),

            Select::make('parent_id')
                ->label('منوی والد')
                ->options(Menu::pluck('title', 'id'))
                ->searchable(),

            Toggle::make('active')
                ->label('فعال / غیرفعال'),

            TextInput::make('sort')
                ->numeric()
                ->default(0)
                ->label('ترتیب نمایش'),
        ]);
    }
}
