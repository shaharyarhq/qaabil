<?php

namespace App\Filament\Admin\Resources\Videos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VideoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextEntry::make('course_id')
                //     ->numeric(),
                // TextEntry::make('section_id')
                //     ->numeric(),
                // TextEntry::make('chapter_id')
                //     ->numeric(),
                // TextEntry::make('objective_id')
                //     ->numeric(),
                // TextEntry::make('title'),
                // TextEntry::make('video_url')
                //     ->placeholder('-'),
                // TextEntry::make('thumbnail_url')
                //     ->placeholder('-'),
                // TextEntry::make('status')
                //     ->badge()
                //     ->placeholder('-'),
                // TextEntry::make('approved_by')
                //     ->numeric()
                //     ->placeholder('-'),
                // TextEntry::make('created_by')
                //     ->numeric()
                //     ->placeholder('-'),
                // TextEntry::make('updated_by')
                //     ->numeric()
                //     ->placeholder('-'),
                // TextEntry::make('created_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                // TextEntry::make('updated_at')
                //     ->dateTime()
                //     ->placeholder('-'),
            ]);
    }
}
