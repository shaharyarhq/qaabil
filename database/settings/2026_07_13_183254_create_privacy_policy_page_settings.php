<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('privacy_policy.route', [
            'url' => '/privacy-policy',
            'label' => 'Privacy Policy'
        ]);

        $this->migrator->add('privacy_policy.content');
    }
};
