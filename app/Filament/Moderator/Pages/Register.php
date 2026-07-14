<?php

namespace App\Filament\Moderator\Pages;

use App\Enums\UserRole;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Components\Wizard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Support\Pages\BaseRegister;
use Filament\Schemas\Components\Wizard\Step;

class Register extends BaseRegister
{
    // protected string $view = 'filament.moderator.pages.register';

    protected function handleRegistration(array $data): Model
    {
        $user = parent::handleRegistration($data);
        $user->assignRole(UserRole::MODERATOR);

        Notification::make()->success()->title('Registration successful')->send();

        return $user;
    }

    public function getHeading(): string|Htmlable
    {
        return __('Moderator Registration');
    }

    public function form(Schema $schema): Schema
    {
        $schema = parent::form($schema);
        $schemaComponents = $schema->getComponents();

        return $schema
            ->components([
                Wizard::make([
                    Step::make('Account')
                        ->schema([
                            ...$schemaComponents
                        ]),
                    Step::make('CV / Resume')
                        ->schema([
                            FileUpload::make('cv_path')
                                ->label('Upload CV / Resume')
                                ->acceptedFileTypes([
                                    'application/pdf',
                                    'application/msword',
                                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                                ])
                                ->directory('attachments/user_registrations/cvs')
                                ->disk('public')
                                ->visibility('public')
                                ->deleteUploadedFileUsing(function ($file) {
                                    Storage::disk('public')->delete($file);
                                })
                                ->preserveFilenames()
                                ->required()
                                ->removeUploadedFileButtonPosition('right')
                                ->required()
                                ->columnSpanFull()
                                ->downloadable()
                                ->openable()
                        ]),
                ])
                    ->contained(),
            ]);
    }
}
