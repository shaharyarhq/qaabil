<?php

namespace App\Filament\Support\Pages;

use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Components\Section;
use Caresome\FilamentAuthDesigner\Pages\Auth\Register;

class BaseRegister extends Register
{
    public function getFormComponents(): array
    {
        return [
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
            Checkbox::make('terms_and_conditions')
                ->label(new HtmlString('I agree to the <a href="' . getTermsAndConditionsPageSettings()->route['url'] . '" target="_blank" class="text-primary-600 underline">terms and conditions</a>'))
                ->required()
                ->accepted()
                ->validationMessages([
                    'accepted' => 'You must accept the terms and conditions.',
                ])
                ->dehydrated(false), // don't pass it to handleRegistration
        ];
    }
    public function form(Schema $schema): Schema
    {
        $schemaComponents = $this->getFormComponents();

        $hasBackground = (bool) getPanelAuthBackgroundUrl(filament()->getCurrentPanel()->getId());

        if (!$hasBackground) {
            $schemaComponents = [
                Section::make()->schema($schemaComponents)
            ];
        }

        return $schema
            ->components($schemaComponents);
    }
}
