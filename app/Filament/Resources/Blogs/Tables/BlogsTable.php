<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
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

                SelectColumn::make('type')
                    ->label('نوع')
                    ->options([
                        'news' => 'خبری',
                        'article' => 'متنی',
                    ]),

                TextColumn::make('category.fa_name')
                    ->label('دسته‌بندی')
                    ->searchable(),

                SelectColumn::make('status')
                    ->label('وضعیت')
                    ->options([
                        'active' => 'فعال',
                        'inactive' => 'غیرفعال',
                    ]),

                TextColumn::make('share_time')
                    ->label('زمان انتشار')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('lang')
                    ->label('زبان')
                    ->badge(),

                TextColumn::make('user.name')
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
