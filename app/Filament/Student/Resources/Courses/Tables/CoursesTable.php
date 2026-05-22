<?php

namespace App\Filament\Student\Resources\Courses\Tables;

use App\Filament\Support\Components\Filters\CreatedAtFilter;
use App\Filament\Support\Components\Filters\UpdatedAtFilter;
use App\Models\UserObjectiveProgress;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Tapp\FilamentProgressBarColumn\Tables\Columns\ProgressBarColumn;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->copyable()
                    ->searchable(),
                ProgressBarColumn::make('progress')
                    ->label('My Progress')->maxValue(100)
                    ->lowThreshold(50)
                    ->dangerLabel(fn($state) => "{$state}% completed")
                    ->warningLabel(fn($state) => "{$state}% completed")
                    ->successLabel(fn($state) => "{$state}% completed")
                    ->state(function (Model $record): int {
                        $objectiveIds = $record->objectives()
                            ->pluck('objectives.id');

                        $total = $objectiveIds->count();

                        if ($total === 0) {
                            return 0;
                        }

                        $done = UserObjectiveProgress::query()
                            ->where('user_id', Auth::id())
                            ->whereIn('objective_id', $objectiveIds)
                            ->whereNotNull('status')
                            ->count();

                        return (int) round(($done / $total) * 100);
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
                ViewAction::make(),
                Action::make('view_course')
                    ->label('View Course on Website')
                    ->icon(Heroicon::ArrowUpRight)
                    ->url(fn(Model $record) => route('courses.view', $record))
                    ->openUrlInNewTab(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
