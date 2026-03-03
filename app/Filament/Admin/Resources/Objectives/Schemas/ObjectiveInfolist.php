<?php

namespace App\Filament\Admin\Resources\Objectives\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ObjectiveInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('chapter_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
