<?php

namespace App\Filament\Student\Pages;

use App\Enums\UserRole;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Checkbox;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Support\Pages\BaseRegister;

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
        $schema = parent::form($schema);
        $schemaComponents = $schema->getComponents();

        return $schema
            ->components([
                Section::make()
                    ->schema([
                        ...$schemaComponents
                    ])
            ]);
    }
}
