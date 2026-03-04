<?php

namespace App\Filament\Admin\Resources\Moderators\Tables;

use App\Enums\UserStatus;
use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ModeratorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state): string => match ($state) {
                        UserStatus::APPROVED => 'success',
                        UserStatus::PENDING => 'warning',
                        UserStatus::REJECTED => 'danger',
                    }),
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
            ])
            ->recordActions([
                // ViewAction::make(),
                EditAction::make(),
                Action::make('update_status')
                    ->color('success')
                    ->icon(Heroicon::ArrowUpTray)
                    ->modalWidth(Width::Small)
                    ->schema(fn(Model $record) => [
                        Select::make('status')
                            ->options(UserStatus::class)
                            ->required()
                            ->default($record->status),
                    ])
                    ->action(function (Model $record, array $data) {
                        $record->status = $data['status'];
                        // $record->approved_by = filament()->auth()->user()->id;
                        $record->save();
                    })
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
