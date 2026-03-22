<?php

namespace App\Filament\Student\Resources\Videos\Schemas;

use App\Enums\VideoStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Illuminate\Support\Facades\Storage;
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
                    ->afterStateUpdatedJs('$set(`section_id`, null)')
                    ->required(),

                Select::make('section_id')
                    ->label('Section')
                    ->relationship('section', 'name', fn ($query, Get $get) => $query->where('course_id', $get('course_id')))
                    ->afterStateUpdatedJs('$set(`chapter_id`, null)')
                    ->required(),

                Select::make('chapter_id')
                    ->label('Chapter')
                    ->relationship('chapter', 'name', fn ($query, Get $get) => $query->where('section_id', $get('section_id')))
                    ->afterStateUpdatedJs('$set(`objective_id`, null)')
                    ->required(),

                Select::make('objective_id')
                    ->label('Objective')
                    ->relationship(
                        'objective',
                        'name',
                        fn ($query, Get $get) => $query->where('chapter_id', $get('chapter_id'))
                    )
                    ->required(),

                Select::make('status')
                    ->disabled()
                    ->visibleOn(Operation::Edit)
                    ->options(VideoStatus::class),

                Select::make('language')
                    ->options(config('app.languages'))
                    ->required()
                    ->default('en'),

                Section::make('Video')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([

                        // Group::make([

                        //     FileUpload::make('video_url')
                        //         ->label('Upload Video')
                        //         ->acceptedFileTypes(['video/*'])
                        //         ->visibility('public')
                        //         ->preserveFilenames()
                        //         ->previewable(false)
                        //         ->nullable()
                        //         ->dehydrateStateUsing(function (?Model $record, $state) {
                        //             if ($record?->video_url) {
                        //                 return $record->video_url;
                        //             }
                        //             return $state;
                        //         })
                        //         ->saveUploadedFileUsing(function ($file, $record) {

                        //             $bunny = app(BunnyStreamService::class);

                        //             //  Create video object
                        //             $guid = $bunny->createVideo(
                        //                 $file->getClientOriginalName()
                        //             );

                        //             //  Upload file
                        //             $bunny->uploadVideo(
                        //                 $guid,
                        //                 $file->getRealPath()
                        //             );

                        //             //  Delete old video if replacing
                        //             if ($record?->video_url) {
                        //                 $bunny->deleteVideo($record->video_url);
                        //             }

                        //             // Cleanup temp file
                        //             $file->delete();

                        //             Notification::make()
                        //                 ->title('Video uploaded successfully')
                        //                 ->success()
                        //                 ->send();

                        //             return $guid;
                        //         }),

                        //     FileUpload::make('thumbnail_url')
                        //         ->label('Upload Thumbnail')
                        //         ->image()
                        //         ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        //         ->visibility('public')
                        //         ->previewable(true)
                        //         ->nullable()
                        //         ->visible(fn(?Model $record) => filled($record?->video_url))
                        //         ->saveUploadedFileUsing(function ($file, $record) {

                        //             if (! $record?->video_url) {
                        //                 Notification::make()
                        //                     ->title('Upload video first')
                        //                     ->danger()
                        //                     ->send();

                        //                 return null;
                        //             }

                        //             $bunny = app(BunnyStreamService::class);

                        //             $bunny->setThumbnail(
                        //                 $record->video_url,
                        //                 $file->getRealPath()
                        //             );

                        //             // 🔥 Fetch updated video info
                        //             $videoInfo = $bunny->getVideo($record->video_url);

                        //             $thumbnailUrl = $videoInfo['thumbnailFileName'] ?? null;

                        //             $file->delete();

                        //             Notification::make()
                        //                 ->title('Thumbnail updated successfully')
                        //                 ->success()
                        //                 ->send();

                        //             return $thumbnailUrl;
                        //         }),

                        // ]),

                        //         TextEntry::make('video_preview')
                        //             ->label('Current Video')
                        //             ->visible(fn($record) => filled($record?->video_url))
                        //             ->state(function ($record) {

                        //                 $libraryId = config('filesystems.disks.bunny_stream.library_id');
                        //                 $guid = $record->video_url;

                        //                 return new HtmlString("
                        //     <iframe
                        //         src='https://iframe.mediadelivery.net/embed/{$libraryId}/{$guid}'
                        //         style='width:100%; aspect-ratio:16/9; border-radius:8px;'
                        //         frameborder='0'
                        //         allow='accelerometer; gyroscope; encrypted-media; picture-in-picture;'
                        //         allowfullscreen>
                        //     </iframe>
                        // ");
                        //             })
                        //             ->hintAction(Action::make('deleteVideo')
                        //                 ->label('Delete Video')
                        //                 ->color('danger')
                        //                 ->requiresConfirmation()
                        //                 ->action(function ($record) {

                        //                     $bunny = app(BunnyStreamService::class);

                        //                     $bunny->deleteVideo($record->video_url);

                        //                     $record->update([
                        //                         'video_url' => null
                        //                     ]);

                        //                     Notification::make()
                        //                         ->title('Video deleted')
                        //                         ->success()
                        //                         ->send();
                        //                 })),

                        TextInput::make('video_url')
                            ->nullable()
                            ->placeholder('https://www.youtube.com/watch?v=abcdefgh')
                            ->url()
                            ->rules(['nullable', 'url', 'regex:/^https?:\/\/(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]+/']),

                        TextEntry::make('video_preview')
                            ->label('Current Video')
                            ->visible(fn ($record) => filled($record?->video_url))
                            ->state(function ($record) {
                                $url = $record->video_url;

                                // Extract video ID from either youtube.com/watch?v= or youtu.be/ format
                                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $url, $matches);
                                $videoId = $matches[1] ?? null;

                                if (! $videoId) {
                                    return new HtmlString('<p class="text-red-500">Invalid YouTube URL</p>');
                                }

                                return new HtmlString("
            <iframe
                src='https://www.youtube.com/embed/{$videoId}'
                style='width:100%; aspect-ratio:16/9; border-radius:8px;'
                frameborder='0'
                allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                allowfullscreen>
            </iframe>
        ");
                            }),
                    ]),

                RichEditor::make('description')
                    ->nullable()
                    ->columnSpan('full'),

                FileUpload::make('learning_materials')
                    ->label('Attachments')
                    ->directory('videos/attachments')
                    ->disk('public')
                    ->visibility('public')
                    ->multiple()
                    ->deleteUploadedFileUsing(function ($file) {
                        Storage::disk('public')->delete($file);
                    })
                    ->preserveFilenames()
                    ->nullable()
                    ->removeUploadedFileButtonPosition('right')
                    ->downloadable()
                    ->columnSpanFull()
                    ->openable(),

                FileUpload::make('quiz_attachments')
                    ->label('Quiz Attachments')
                    ->directory('videos/quizes')
                    ->disk('public')
                    ->visibility('public')
                    ->multiple()
                    ->deleteUploadedFileUsing(function ($file) {
                        Storage::disk('public')->delete($file);
                    })
                    ->preserveFilenames()
                    ->nullable()
                    ->removeUploadedFileButtonPosition('right')
                    ->downloadable()
                    ->columnSpanFull()
                    ->openable(),

                TextInput::make('quiz_link')->nullable()->url(),

            ]);
    }
}
