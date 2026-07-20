<?php

namespace App\Filament\Admin\Resources\Objectives\Tables;

use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ObjectivesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('chapter.name')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('chapter.section.name')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
                TextColumn::make('chapter.section.course.name')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
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
                CreatedAtFilter::make(),
                UpdatedAtFilter::make(),
                SelectFilter::make('course')
                    ->relationship('chapter.section.course', 'name'),
                SelectFilter::make('section')
                    ->relationship('chapter.section', 'name', fn($query, Get $get) => $query->when($get('course'), fn($q) => $q->where('course_id', $get('course')))),
                SelectFilter::make('chapter')
                    ->relationship('chapter', 'name', fn($query, Get $get) => $query->when($get('chapter.section'), fn($q) => $q->where('section_id', $get('chapter.section')))),
            ])
            ->recordActions([
                // ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
