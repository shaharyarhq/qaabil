<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives;

use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\ChapterResource;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Pages\CreateObjective;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Pages\EditObjective;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Pages\ViewObjective;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas\ObjectiveForm;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Schemas\ObjectiveInfolist;
use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\Tables\ObjectivesTable;
use App\Models\Objective;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ObjectiveResource extends Resource
{
    protected static ?string $model = Objective::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = ChapterResource::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ObjectiveForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ObjectiveInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ObjectivesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateObjective::route('/create'),
            // 'view' => ViewObjective::route('/{record}'),
            'edit' => EditObjective::route('/{record}/edit'),
        ];
    }
}
