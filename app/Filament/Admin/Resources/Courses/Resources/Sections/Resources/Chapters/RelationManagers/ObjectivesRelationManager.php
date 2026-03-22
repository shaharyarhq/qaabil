<?php

namespace App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\RelationManagers;

use App\Filament\Admin\Resources\Courses\Resources\Sections\Resources\Chapters\Resources\Objectives\ObjectiveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ObjectivesRelationManager extends RelationManager
{
    protected static string $relationship = 'objectives';

    protected static ?string $relatedResource = ObjectiveResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
