<?php

namespace App\Filament\Admin\Resources\Videos\Tables;

use App\Filament\Moderator\Resources\Videos\Tables\VideosTable as VTable;
use Filament\Tables\Table;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        // return $table
        //     ->columns([
        //         TextColumn::make('course_id')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('section_id')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('chapter_id')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('objective_id')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('title')
        //             ->searchable(),
        //         TextColumn::make('video_url')
        //             ->searchable(),
        //         TextColumn::make('thumbnail_url')
        //             ->searchable(),
        //         TextColumn::make('status')
        //             ->badge()
        //             ->searchable(),
        //         TextColumn::make('approved_by')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('created_by')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('updated_by')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('created_at')
        //             ->dateTime()
        //             ->sortable()
        //             ->toggleable(isToggledHiddenByDefault: true),
        //         TextColumn::make('updated_at')
        //             ->dateTime()
        //             ->sortable()
        //             ->toggleable(isToggledHiddenByDefault: true),
        //     ])
        //     ->filters([
        //         //
        //     ])
        //     ->recordActions([
        //         ViewAction::make(),
        //         // EditAction::make(),
        //     ])
        //     ->toolbarActions([
        //         BulkActionGroup::make([
        //             DeleteBulkAction::make(),
        //         ]),
        //     ]);

        return VTable::configure($table);
    }
}
