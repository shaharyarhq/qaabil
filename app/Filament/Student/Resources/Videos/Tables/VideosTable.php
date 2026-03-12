<?php

namespace App\Filament\Student\Resources\Videos\Tables;

use App\Enums\VideoStatus;
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
                // ImageColumn::make('thumbnail_url')
                //     ->label('Video Thumbnail')
                //     ->circular()
                //     ->imageSize(80)
                //     ->placeholder('---')
                //     ->state(function (?Model $record) {
                //         if (!$record->video_url) {
                //             return null;
                //         }
                //         $guid = $record->video_url;
                //         $thumbnailUrl = $record->thumbnail_url ?? 'thumbnail.jpg';
                //         $cdnHostName = config('filesystems.disks.bunny_stream.hostname');
                //         $url = "https://{$cdnHostName}/{$guid}/{$thumbnailUrl}";
                //         return $url;
                //     })
                //     ->searchable(),
                ImageColumn::make('thumbnail_url')
                    ->label('Video Thumbnail')
                    ->circular()
                    ->imageSize(80)
                    ->placeholder('---')
                    ->state(function (?Model $record) {
                        if (! $record->video_url) {
                            return null;
                        }

                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $record->video_url, $matches);
                        $videoId = $matches[1] ?? null;

                        if (! $videoId) {
                            return null;
                        }

                        // hqdefault.jpg = 480x360, mqdefault.jpg = 320x180, maxresdefault.jpg = 1280x720
                        return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
                    })
                    ->searchable(),
                TextColumn::make('title')
                    ->copyable(),
                TextColumn::make('course.name')
                    ->copyable(),
                TextColumn::make('chapter.name')
                    ->copyable(),
                TextColumn::make('objective.name')
                    ->copyable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        VideoStatus::APPROVED => 'success',
                        VideoStatus::PENDING => 'warning',
                        VideoStatus::REJECTED => 'danger',
                    }),
                TextColumn::make('approver.name')
                    ->label('Approved By')
                    ->placeholder('---')
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
