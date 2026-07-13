<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('academy_page.route', [
            'url' => '/academy',
            'label' => 'Education Centre'
        ]);
    }
};
