<?php

namespace App\Filament\Admin\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;

class Profile extends MyProfilePage
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
                Action::make('delete')
            ]);
    }

    // public function getRegisteredMyProfileComponents(): array
    // {
    //     return [
    //         ...filament('filament-breezy')->getRegisteredMyProfileComponents(),
    //         'delete_account' => DeleteAccount::class,
    //     ];
    // }
}
