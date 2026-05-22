<?php

namespace App\Filament\Moderator\Resources\Videos\Tables;

use App\Enums\VideoStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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
                TextColumn::make('section.name')
                    ->copyable(),
                TextColumn::make('chapter.name')
                    ->copyable(),
                TextColumn::make('objective.name')
                    ->copyable(),
                TextColumn::make('creator.name')
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
                //
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
                Action::make('update_status')
                    ->color('success')
                    ->icon(Heroicon::ArrowUpTray)
                    ->modalWidth(Width::Small)
                    ->schema(fn (Model $record) => [
                        Select::make('status')
                            ->options(VideoStatus::class)
                            ->preload(false)
                            ->required()
                            ->default($record->status),
                    ])
                    ->action(function (Model $record, array $data) {
                        $record->status = $data['status'];
                        $record->approved_by = filament()->auth()->user()->id;
                        $record->save();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
