<?php

namespace App\Filament\Admin\Resources\Videos\Schemas;

use App\Filament\Moderator\Resources\Videos\Schemas\VideoForm as VForm;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        // return $schema
        //     ->components([
        //         TextInput::make('course_id')
        //             ->required()
        //             ->numeric(),
        //         TextInput::make('section_id')
        //             ->required()
        //             ->numeric(),
        //         TextInput::make('chapter_id')
        //             ->required()
        //             ->numeric(),
        //         TextInput::make('objective_id')
        //             ->required()
        //             ->numeric(),
        //         TextInput::make('title')
        //             ->required(),
        //         TextInput::make('video_url')
        //             ->url()
        //             ->default(null),
        //         TextInput::make('thumbnail_url')
        //             ->url()
        //             ->default(null),
        //         Select::make('status')
        //             ->options(VideoStatus::class)
        //             ->default(null),
        //         TextInput::make('approved_by')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('created_by')
        //             ->numeric()
        //             ->default(null),
        //         TextInput::make('updated_by')
        //             ->numeric()
        //             ->default(null),
        //     ]);

        return VForm::configure($schema);
    }
}
