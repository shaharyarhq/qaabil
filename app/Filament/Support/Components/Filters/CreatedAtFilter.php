<?php

namespace App\Filament\Support\Components\Filters;

use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class CreatedAtFilter
{
    public static function make()
    {
        return Filter::make('created_at')
            ->schema([
                Fieldset::make()
                    ->label('Created')
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        DatePicker::make('from')
                            ->displayFormat(app_date_format())
                            ->maxDate(fn(Get $get) => $get('until') ?: now())
                            ->label('From'),
                        DatePicker::make('until')
                            ->displayFormat(app_date_format())
                            ->minDate(fn(Get $get) => $get('from') ?: now())
                            ->maxDate(now())
                            ->label('Until'),
                    ]),
            ])
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        $data['from'],
                        fn(Builder $query, $date): Builder =>
                        $query->whereDate('created_at', '>=', $date),
                    )
                    ->when(
                        $data['until'],
                        fn(Builder $query, $date): Builder =>
                        $query->whereDate('created_at', '<=', $date),
                    );
            })
            ->indicateUsing(function (array $data): ?string {
                if (!$data['from'] && !$data['until']) {
                    return null;
                }

                $from = $data['from']
                    ? Carbon::parse($data['from'])->format(app_date_format())
                    : null;

                $until = $data['until']
                    ? Carbon::parse($data['until'])->format(app_date_format())
                    : null;

                if ($from && $until) {
                    return "From {$from} to {$until}";
                }

                if ($from) {
                    return "From {$from}";
                }

                return "Until {$until}";
            });
    }
}
