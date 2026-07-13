<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('terms_and_conditions.route', [
            'url' => '/terms-and-conditions',
            'label' => 'Terms And Conditions'
        ]);

        $this->migrator->add('terms_and_conditions.content');
    }
};
