<?php

namespace App\Filament\Support\Components\Filters;

use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class UpdatedAtFilter
{
    public static function make()
    {
        return Filter::make('updated_at')
            ->schema([
                Fieldset::make()
                    ->label('Updated')
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        DatePicker::make('updated_from')
                            ->displayFormat(app_date_format())
                            ->maxDate(fn (Get $get) => $get('updated_until') ?: now())
                            ->label('From'),
                        DatePicker::make('updated_until')
                            ->displayFormat(app_date_format())
                            ->minDate(fn (Get $get) => $get('updated_from'))
                            ->maxDate(now())
                            ->label('Until'),
                    ]),
            ])
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        $data['updated_from'],
                        fn (Builder $query, $date): Builder => $query->whereDate('updated_at', '>=', $date),
                    )
                    ->when(
                        $data['updated_until'],
                        fn (Builder $query, $date): Builder => $query->whereDate('updated_at', '<=', $date),
                    );
            })
            ->indicateUsing(function (array $data): ?string {
                if (! $data['updated_from'] && ! $data['updated_until']) {
                    return null;
                }

                $from = $data['updated_from']
                    ? Carbon::parse($data['updated_from'])->format(app_date_format())
                    : null;

                $until = $data['updated_until']
                    ? Carbon::parse($data['updated_until'])->format(app_date_format())
                    : null;

                if ($from && $until) {
                    return "Updated: {$from} to {$until}";
                }

                if ($from) {
                    return "Updated from {$from}";
                }

                return "Updated until {$until}";
            });
    }
}
