<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters;

use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Pages\CreateChapter;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Pages\EditChapter;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Pages\ViewChapter;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\RelationManagers\ObjectivesRelationManager;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Schemas\ChapterForm;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Schemas\ChapterInfolist;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Tables\ChaptersTable;
use App\Filament\Admin\Resources\Courses\Resources\Sections\SectionResource;
use App\Models\Chapter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChapterResource extends Resource
{
    protected static ?string $model = Chapter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = SectionResource::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ChapterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ChapterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChaptersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ObjectivesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateChapter::route('/create'),
            // 'view' => ViewChapter::route('/{record}'),
            'edit' => EditChapter::route('/{record}/edit'),
        ];
    }
}
