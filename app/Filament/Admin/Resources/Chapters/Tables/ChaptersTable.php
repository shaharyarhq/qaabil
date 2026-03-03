<?php

namespace App\Filament\Admin\Resources\Chapters\Tables;

use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ChaptersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('course.name')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                CreatedAtFilter::make(),
                UpdatedAtFilter::make(),
                SelectFilter::make('course')
                    ->relationship('course', 'name'),
            ])
            ->recordActions([
                // ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
