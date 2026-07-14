<?php

namespace App\Filament\Support\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Caresome\FilamentAuthDesigner\Pages\Auth\RequestPasswordReset as ResetPasswordRequestPage;

class RequestPasswordReset extends ResetPasswordRequestPage
{
    public function content(Schema $schema): Schema
    {
        $schema = parent::content($schema);
        $schemaComponents = $schema->getComponents();

        return $schema
            ->components([
                Section::make()
                    ->schema([
                        ...$schemaComponents
                    ]),
            ]);
    }
}
