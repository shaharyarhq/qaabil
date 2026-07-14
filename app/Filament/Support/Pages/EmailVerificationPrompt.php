<?php

namespace App\Filament\Support\Pages;

use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Caresome\FilamentAuthDesigner\Pages\Auth\EmailVerification;

class EmailVerificationPrompt extends EmailVerification
{
    public function content(Schema $schema): Schema
    {
        $parentSchema = parent::content($schema);
        $parentComponents = $parentSchema->getComponents();

        return $parentSchema->components([
            Section::make()
                ->schema([
                    ...$parentComponents,
                ])
        ]);
    }
}
