<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;

class CustomPersonalInfo extends PersonalInfo
{
    protected function getNameComponent(): TextInput
    {
        return parent::getNameComponent()
            ->maxLength(60);
    }
}
