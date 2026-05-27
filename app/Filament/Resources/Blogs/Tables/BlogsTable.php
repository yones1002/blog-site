<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_url')
                ->label('کاور')
                    ->disk('public')
                    ->size(70)
                    ->square()
                    ->checkFileExistence(false),

                TextColumn::make('title')
                    ->label('عنوان')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('نوع')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('وضعیت')
                    ->badge(),

                TextColumn::make('category.fa_name')
                    ->label('دسته‌بندی')
                    ->searchable(),

                TextColumn::make('share_time')
                    ->label('زمان انتشار')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('lang')
                    ->label('زبان')
                    ->badge(),

                TextColumn::make('author_id')
                    ->label('نویسنده')
                    ->searchable(),

                TextColumn::make('deleted_at')
                    ->label('حذف شده در')
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
                ]),
            ]);
    }
}
