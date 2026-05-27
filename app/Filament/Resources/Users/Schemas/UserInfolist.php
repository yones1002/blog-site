<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('نام'),

                TextEntry::make('email')
                    ->label('ایمیل'),

                TextEntry::make('type')
                    ->label('نوع کاربر'),

                TextEntry::make('email_verified_at')
                    ->label('تایید ایمیل')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('created_at')
                    ->label('ساخته شده در')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخرین بروزرسانی')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
