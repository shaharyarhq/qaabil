<?php

namespace App\Providers;

use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Table::configureUsing(function (Table $table): void {
            $table
                // ->deferFilters(false)
                ->persistFiltersInSession()
                ->reorderableColumns()
                ->defaultDateDisplayFormat(app_date_format())
                ->defaultDateTimeDisplayFormat(app_date_time_format())
                ->defaultSort('created_at', 'desc')
                ->filtersFormColumns(2)
                ->paginated([5, 10, 25, 50, 100, 'all'])
                ->extremePaginationLinks()
                // ->deferColumnManager(false)
                ->striped();
            // ->filters([], layout: FiltersLayout::AboveContentCollapsible)
            // ->filtersTriggerAction(
            //     fn(Action $action) => $action
            //         ->slideOver() // This makes the filter panel a slide-over
            // )
        });

        SelectFilter::configureUsing(function (SelectFilter $filter): void {
            $filter
                ->searchable()
                ->preload()
                ->optionsLimit(10);
        });

        TextColumn::configureUsing(function (TextColumn $column): void {
            $column->toggleable()
                ->sortable()
                ->searchable();
        });

        Select::configureUsing(function (Select $select) {
            $select->searchable()
                ->preload()
                ->optionsLimit(10);
        });

        DeleteAction::configureUsing(function (DeleteAction $action) {
            $action->action(function () use ($action): void {
                try {
                    $result = $action->process(static fn (Model $record): ?bool => $record->delete());

                    if (! $result) {
                        $action->failure();

                        return;
                    }

                    $action->success();
                } catch (\Throwable $e) {

                    $errorRef = strtoupper(Str::random(8));

                    $isForeignKey = isset($e->errorInfo) &&
                        $e->errorInfo[0] === '23000' &&
                        ($e->errorInfo[1] ?? null) === 1451;

                    $errorMessage = match (true) {
                        $isForeignKey => 'Cannot delete this record because it has related data.',
                        default => $e->getMessage() ?: 'An unknown error occurred while deleting the record.',
                    };

                    Notification::make('record_deletion_error')
                        ->danger()
                        ->title('Error While Deleting Record')
                        ->body($errorMessage)
                        ->send();

                    $action->failure();

                    logger($e);
                }
            });
        });
    }
}
