<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('نام')
                    ->required(),

                TextInput::make('fa_name')
                    ->label('نام فارسی')
                    ->required(),

                TextInput::make('slug')
                    ->label('اسلاگ')
                    ->required(),

                TextInput::make('type')
                    ->label('نوع')
                    ->required(),

                TextInput::make('parent_id')
                    ->label('والد')
                    ->required()
                    ->numeric()
                    ->default(0),

                Textarea::make('description')
                    ->label('توضیحات انگلیسی')
                    ->columnSpanFull(),

                Textarea::make('fa_description')
                    ->label('توضیحات فارسی')
                    ->columnSpanFull(),

                TextInput::make('json')
                    ->label('JSON'),

                FileUpload::make('image')
                    ->label('تصویر'),
            ]);
    }
}
