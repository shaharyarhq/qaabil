<?php

namespace App\Filament\Student\Resources\Videos\Tables;

use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail_url')
                    ->label('Video Thumbnail')
                    ->circular()
                    ->imageSize(80)
                    ->state(function (?Model $record) {
                        $guid = $record->video_url;
                        $cdnHostName = config('filesystems.disks.bunny_stream.hostname');
                        $url = "https://{$cdnHostName}/{$guid}/{$record->thumbnail_url}";
                        return $url;
                    })
                    ->searchable(),
                TextColumn::make('course.name')
                    ->copyable(),
                TextColumn::make('chapter.name')
                    ->copyable(),
                TextColumn::make('objective.name')
                    ->copyable(),
                TextColumn::make('title')
                    ->copyable(),
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
                SelectFilter::make('chapter')
                    ->relationship('chapter', 'name'),
                SelectFilter::make('objective')
                    ->relationship('objective', 'name'),
            ])
            ->recordActions([
                // ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
