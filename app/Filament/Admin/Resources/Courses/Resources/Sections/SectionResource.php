<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections;

use App\Filament\Admin\Resources\Courses\CourseResource;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Pages\CreateSection;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Pages\EditSection;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Pages\ViewSection;
use App\Filament\Admin\Resources\Courses\Resources\Sections\RelationManagers\ChaptersRelationManager;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Schemas\SectionForm;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Schemas\SectionInfolist;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Tables\SectionsTable;
use App\Models\Section;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = CourseResource::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ChaptersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateSection::route('/create'),
            // 'view' => ViewSection::route('/{record}'),
            'edit' => EditSection::route('/{record}/edit'),
        ];
    }
}
