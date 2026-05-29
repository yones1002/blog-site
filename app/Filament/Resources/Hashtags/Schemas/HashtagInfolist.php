<?php

namespace App\Filament\Resources\Hashtags\Schemas;

use App\Models\Hashtag;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HashtagInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('fa_name'),
                TextEntry::make('slug'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('fa_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Hashtag $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
