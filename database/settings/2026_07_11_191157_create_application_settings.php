<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('application_settings.site_settings', [
            'logo' => '',
            'logo_dark_mode' => '',
            'favicon' => ''
        ]);
    }
};
