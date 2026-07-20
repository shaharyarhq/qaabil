<?php

namespace App\Enums;

use Filament\Support\Icons\Heroicon;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum QuestionType: string implements HasLabel, HasIcon, HasColor
{
    case Dropdown = 'dropdown';
    case SingleChoice = 'single_choice';
    case MultipleChoice = 'multiple_choice';

    public function getLabel(): string
    {
        return match ($this) {
            self::Dropdown => 'Dropdown',
            self::SingleChoice => 'Single Choice',
            self::MultipleChoice => 'Checkboxes (Multiple)',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Dropdown => 'heroicon-o-' . Heroicon::ChevronDown->value,
            self::SingleChoice => 'heroicon-o-' . Heroicon::CheckCircle->value,
            self::MultipleChoice => 'heroicon-o-' . Heroicon::Check->value,
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Dropdown => 'info',
            self::SingleChoice => 'success',
            self::MultipleChoice => 'primary',
        };
    }
}
