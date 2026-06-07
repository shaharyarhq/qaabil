<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->copyable()
                    ->placeholder('Not verified Yet')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->copyable()->badge(),
                TextColumn::make('socialiteUser.provider')
                    ->label('Active provider')
                    ->copyable()
                    ->default('email')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_verified_at')
                    ->label('Email Verified At')
                    ->dateTime(app_date_time_format()),
                TextColumn::make('created_at')
                    ->label('Registered At')
                    ->dateTime(app_date_time_format()),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // ViewAction::make(),
                // EditAction::make(),
                DeleteAction::make()
                    ->hidden(fn($record) => $record->isSuperAdmin()),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()

                ]),
            ])
            ->checkIfRecordIsSelectableUsing(
                fn($record): bool => !$record->isSuperAdmin(),
            )
        ;
    }
}
