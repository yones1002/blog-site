<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('نام')
                    ->required(),

                TextInput::make('email')
                    ->label('ایمیل')
                    ->email()
                    ->required(),

                Select::make('type')
                    ->label('نوع کاربر')
                    ->options([
                        'authors' => 'نویسنده',
                        'member' => 'عضو',
                        'admin' => 'ادمین',
                    ])
                    ->default('member')
                    ->required(),

                DateTimePicker::make('email_verified_at')
                    ->label('تایید ایمیل'),

                TextInput::make('password')
                    ->label('رمز عبور')
                    ->password()
                    ->required(),
            ]);
    }
}
