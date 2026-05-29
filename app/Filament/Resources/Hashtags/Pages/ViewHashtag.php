<?php

namespace App\Filament\Resources\Hashtags\Pages;

use App\Filament\Resources\Hashtags\HashtagResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHashtag extends ViewRecord
{
    protected static string $resource = HashtagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
