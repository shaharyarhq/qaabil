<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Progress: string implements HasLabel, HasColor
{
    case NOT_STARTED = 'not_started';
    case BEHIND = 'behind';
    case PRACTICE = 'practice';
    case MASTERY = 'mastery';

    public function getLabel(): string
    {
        return match ($this) {
            self::NOT_STARTED => 'Not Started',
            self::BEHIND      => 'Behind',
            self::PRACTICE    => 'Practice',
            self::MASTERY     => 'Mastery',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NOT_STARTED => 'gray',
            self::BEHIND      => 'danger',
            self::PRACTICE    => 'warning',
            self::MASTERY     => 'success',
        };
    }
}
