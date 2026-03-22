<?php

namespace App\Filament\Admin\Pages;

use Filament\Auth\Pages\EditProfile;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class Profile extends EditProfile
{
    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                FileUpload::make('avatar')
                    ->image()
                    ->imageEditor()
                    ->circleCropper()
                    ->directory('users/avatars')
                    ->moveFiles()
                    ->columnSpanFull()
                    ->disk('public')
                    ->visibility('public'),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
