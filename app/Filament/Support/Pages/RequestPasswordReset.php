<?php

namespace App\Filament\Support\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Caresome\FilamentAuthDesigner\Pages\Auth\RequestPasswordReset as ResetPasswordRequestPage;

class RequestPasswordReset extends ResetPasswordRequestPage
{
    public function content(Schema $schema): Schema
    {
        $parentSchema = parent::content($schema);
        $schemaComponents = $parentSchema->getComponents();

        $hasBackground = (bool) getPanelAuthBackgroundUrl(filament()->getCurrentPanel()->getId());

        if (!$hasBackground) {
            $schemaComponents = [
                Section::make()->schema($schemaComponents),
            ];
        }

        return $parentSchema->components($schemaComponents);
    }
}
