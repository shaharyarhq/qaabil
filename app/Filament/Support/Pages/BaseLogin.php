<?php

namespace App\Filament\Support\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Caresome\FilamentAuthDesigner\Pages\Auth\Login;

class BaseLogin extends Login
{
    public function getFormComponents(): array
    {
        return [
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getRememberFormComponent(),
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
