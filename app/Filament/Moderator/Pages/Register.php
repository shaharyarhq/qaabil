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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
        $schemaComponents = parent::getFormComponents();

        return $schema
            ->components([
                Wizard::make([
                    Step::make('Account')
                        ->schema($schemaComponents),
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
                                ->disk('local')
                                ->visibility('private')
                                ->deleteUploadedFileUsing(function ($file) {
                                    Storage::disk('local')->delete($file);
                                })
                                // ->preserveFilenames()
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, $livewire) {
                                    $name = $livewire->data['name'];
                                    $extension = $file->getClientOriginalExtension();

                                    return 'cv_' . str($name)->slug() . '.' . $extension;
                                })
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
