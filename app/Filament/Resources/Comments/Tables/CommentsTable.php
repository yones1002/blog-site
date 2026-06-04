<?php

namespace App\Filament\Resources\Comments\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label('نام')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('ایمیل')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('content')
                    ->label('محتوا')
                    ->limit(40)
                    ->wrap(),

                IconColumn::make('approved')
                    ->label('تایید')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('pinned')
                    ->label('پین')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('model_type')
                    ->label('مدل')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاریخ')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('approved')
                    ->label('تایید شده'),

                TernaryFilter::make('pinned')
                    ->label('پین شده'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                    BulkAction::make('approve')
                        ->label('تایید')
                        ->action(fn ($records) => $records->each->update(['approved' => true]))
                        ->color('success')
                        ->requiresConfirmation(),

                    BulkAction::make('unapprove')
                        ->label('رد')
                        ->action(fn ($records) => $records->each->update(['approved' => false]))
                        ->color('danger')
                        ->requiresConfirmation(),

                    BulkAction::make('pin')
                        ->label('پین کردن')
                        ->action(fn ($records) => $records->each->update(['pinned' => true]))
                        ->color('warning')
                        ->requiresConfirmation(),
                ]),
            ]);
    }
}
