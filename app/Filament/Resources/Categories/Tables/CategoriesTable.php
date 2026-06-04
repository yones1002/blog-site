<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('تصویر'),
                TextColumn::make('name')
                    ->label('نام')
                    ->searchable(),

                TextColumn::make('fa_name')
                    ->label('نام فارسی')
                    ->searchable(),

                TextColumn::make('slug')
                    ->label('اسلاگ')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('نوع')
                    ->searchable(),

                SelectColumn::make('status')
                    ->label('وضعیت')
                    ->options([
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
                    ]),

                TextColumn::make('created_at')
                    ->label('ساخته شده در')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('آخرین بروزرسانی')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('activate')
                        ->label('فعال‌سازی')
                        ->action(fn ($records) => $records->each->update(['status' => 'active']))
                        ->color('success')
                        ->requiresConfirmation(),

                    BulkAction::make('deactivate')
                        ->label('غیرفعال کردن')
                        ->action(fn ($records) => $records->each->update(['status' => 'inactive']))
                        ->color('danger')
                        ->requiresConfirmation(),
                ]),
            ]);
    }
}
