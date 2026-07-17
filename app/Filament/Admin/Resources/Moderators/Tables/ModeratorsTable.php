<?php

namespace App\Filament\Admin\Resources\Moderators\Tables;

use App\Enums\UserStatus;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;

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
                // EditAction::make(),
                Action::make('update_status')
                    ->color('success')
                    ->icon(Heroicon::ArrowUpTray)
                    ->modalWidth(Width::Small)
                    ->schema(fn(Model $record) => [
                        Select::make('status')
                            ->options(UserStatus::class)
                            ->required()
                            ->preload(false)
                            ->default($record->status),
                    ])
                    ->action(function (Model $record, array $data) {
                        $record->status = $data['status'];
                        // $record->approved_by = filament()->auth()->user()->id;
                        $record->save();
                    }),
                Action::make('view_cv')
                    ->label('View CV / Resume')
                    ->icon(Heroicon::DocumentText)
                    ->modalWidth(Width::ExtraLarge)
                    ->visible(fn(Model $record) => filled($record->cv_path))
                    ->modalSubmitAction(false)
                    // ->slideOver()
                    ->fillForm(fn(Model $record) => [
                        'cv_path' => $record->cv_path,
                    ])
                    ->schema(fn(Model $record) => [
                        // Section::make()
                        // ->schema([
                        FileUpload::make('cv_path')
                            ->hiddenLabel()
                            ->disk('local')
                            ->visibility('private')
                            ->disabled()
                            ->dehydrated(false)
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                        // ]),
                    ]),
            ])
            ->recordUrl(null)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
