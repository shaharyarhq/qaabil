<?php

namespace App\Filament\Student\Pages;

use App\Enums\UserRole;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class Register extends BaseRegister
{
    // protected string $view = 'filament.student.pages.register';

    protected function handleRegistration(array $data): Model
    {
        $user = parent::handleRegistration($data);
        $user->assignRole(UserRole::STUDENT);

        Notification::make()->success()->title('Registration successful')->send();

        return $user;
    }

    public function getHeading(): string|Htmlable
    {
        return __('Member Registration');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                Checkbox::make('terms_and_conditions')
                     ->label(new HtmlString('I agree to the <a href="' . route('home') . '" target="_blank" class="text-primary-600 underline">terms and conditions</a>'))
                    ->required()
                    ->accepted()
                    ->validationMessages([
                        'accepted' => 'You must accept the terms and conditions.',
                    ])
                    ->dehydrated(false), // don't pass it to handleRegistration
            ]);
    }
}
