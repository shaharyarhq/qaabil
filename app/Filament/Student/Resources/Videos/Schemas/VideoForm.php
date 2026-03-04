<?php

namespace App\Filament\Student\Resources\Videos\Schemas;

use App\Enums\VideoStatus;
use App\Services\BunnyStreamService;
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->required(),

                Select::make('chapter_id')
                    ->label('Chapter')
                    ->relationship(
                        'chapter',
                        'name',
                        fn($query, Get $get) => $query->where('course_id', $get('course_id'))
                    )
                    ->required(),

                Select::make('objective_id')
                    ->label('Objective')
                    ->relationship(
                        'objective',
                        'name',
                        fn($query, Get $get) => $query->where('chapter_id', $get('chapter_id')) // filter by selected chapter
                    )
                    ->required(),

                Select::make('status')
                    ->disabled()
                    ->visibleOn(Operation::Edit)
                    ->options(VideoStatus::class),

                Section::make('Video')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([

                        Group::make([

                            FileUpload::make('video_url')
                                ->label('Upload Video')
                                ->acceptedFileTypes(['video/*'])
                                ->visibility('public')
                                ->preserveFilenames()
                                ->previewable(false)
                                ->nullable()
                                ->dehydrateStateUsing(function (?Model $record, $state) {
                                    if ($record?->video_url) {
                                        return $record->video_url;
                                    }
                                    return $state;
                                })
                                ->saveUploadedFileUsing(function ($file, $record) {

                                    $bunny = app(BunnyStreamService::class);

                                    //  Create video object
                                    $guid = $bunny->createVideo(
                                        $file->getClientOriginalName()
                                    );

                                    //  Upload file
                                    $bunny->uploadVideo(
                                        $guid,
                                        $file->getRealPath()
                                    );

                                    //  Delete old video if replacing
                                    if ($record?->video_url) {
                                        $bunny->deleteVideo($record->video_url);
                                    }

                                    // Cleanup temp file
                                    $file->delete();

                                    Notification::make()
                                        ->title('Video uploaded successfully')
                                        ->success()
                                        ->send();

                                    return $guid;
                                }),

                            FileUpload::make('thumbnail_url')
                                ->label('Upload Thumbnail')
                                ->image()
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                ->visibility('public')
                                ->previewable(true)
                                ->nullable()
                                ->visible(fn(?Model $record) => filled($record?->video_url))
                                ->saveUploadedFileUsing(function ($file, $record) {

                                    if (! $record?->video_url) {
                                        Notification::make()
                                            ->title('Upload video first')
                                            ->danger()
                                            ->send();

                                        return null;
                                    }

                                    $bunny = app(BunnyStreamService::class);

                                    $bunny->setThumbnail(
                                        $record->video_url,
                                        $file->getRealPath()
                                    );

                                    // 🔥 Fetch updated video info
                                    $videoInfo = $bunny->getVideo($record->video_url);


                                    $thumbnailUrl = $videoInfo['thumbnailFileName'] ?? null;

                                    $file->delete();

                                    Notification::make()
                                        ->title('Thumbnail updated successfully')
                                        ->success()
                                        ->send();

                                    return $thumbnailUrl;
                                }),

                        ]),

                        TextEntry::make('video_preview')
                            ->label('Current Video')
                            ->visible(fn($record) => filled($record?->video_url))
                            ->state(function ($record) {

                                $libraryId = config('filesystems.disks.bunny_stream.library_id');
                                $guid = $record->video_url;

                                return new HtmlString("
                    <iframe
                        src='https://iframe.mediadelivery.net/embed/{$libraryId}/{$guid}'
                        style='width:100%; aspect-ratio:16/9; border-radius:8px;'
                        frameborder='0'
                        allow='accelerometer; gyroscope; encrypted-media; picture-in-picture;'
                        allowfullscreen>
                    </iframe>
                ");
                            })
                            ->hintAction(Action::make('deleteVideo')
                                ->label('Delete Video')
                                ->color('danger')
                                ->requiresConfirmation()
                                ->action(function ($record) {

                                    $bunny = app(BunnyStreamService::class);

                                    $bunny->deleteVideo($record->video_url);

                                    $record->update([
                                        'video_url' => null
                                    ]);

                                    Notification::make()
                                        ->title('Video deleted')
                                        ->success()
                                        ->send();
                                })),

                    ]),

            ]);
    }
}
