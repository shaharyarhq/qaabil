<?php

namespace App\Filament\Admin\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;

class Profile extends MyProfilePage
{
    protected function getNameComponent(): TextInput
    {
        return TextInput::make('custom_name_field')
            ->required();
    }
}
