<?php

namespace App\Providers;

use App\Models\User;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use App\Http\Response\LoginResponse;
use App\Services\VideoAccessService;
use Filament\Forms\Components\Select;
use Filament\Navigation\NavigationItem;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Notifications\CustomVerifyEmail;
use Filament\Navigation\NavigationGroup;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Codebyray\ReviewRateable\Models\Review;
use Filament\Auth\Notifications\VerifyEmail;
use Filament\Tables\Enums\ColumnManagerLayout;
use Filament\Support\Contracts\LoadingIndicator;
use App\Filament\Support\View\LucideLoadingIndicator;
use App\Filament\Support\Pages\EmailVerificationPrompt;
use Filament\Auth\Pages\EmailVerification\EmailVerificationPrompt as BaseEmailVerificationPrompt;
use Filament\Auth\Http\Responses\LoginResponse as BaseLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            BaseLoginResponse::class,
            LoginResponse::class
        );

        $this->app->singleton(VideoAccessService::class);
        $this->app->bind(LoadingIndicator::class, LucideLoadingIndicator::class);
        $this->app->bind(VerifyEmail::class, CustomVerifyEmail::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Review::resolveRelationUsing('user', function ($review) {
        //     return $review->belongsTo(User::class, 'user_id');
        // }); Removed cause this was merged with my PR

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
                ->columnManagerLayout(ColumnManagerLayout::Modal)
                ->columnManagerTriggerAction(fn(Action $action): Action => $action->slideOver())
                ->extremePaginationLinks()
                // ->deferColumnManager(false)
                ->striped()
                // ->filters([], layout: FiltersLayout::AboveContentCollapsible)
                ->filtersTriggerAction(
                    fn(Action $action) => $action
                        ->slideOver() // This makes the filter panel a slide-over
                );
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
                    $result = $action->process(static fn(Model $record): ?bool => $record->delete());

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

        Action::configureUsing(function (Action $action) {
            $action->extraAttributes([
                'class' => 'rounded-full',
            ]);
        });
    }
}
