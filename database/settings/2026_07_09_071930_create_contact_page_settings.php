<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_page.hero', [
            'badge' => "We'd love to hear from you",
            'title' => "Let's talk.",
            'subtitle' => "Whether you're a student, a teacher, or an institution — we're here and happy to chat.",
        ]);

        $this->migrator->add('contact_page.methods', [
            'items' => [
                [
                    'label' => 'Email us at',
                    'value' => 'admin@qaabil.academy',
                    'sub' => 'We reply within 24 hours',
                    'href' => 'mailto:admin@qaabil.academy',
                    'type' => 'email',
                ],
                [
                    'label' => 'WhatsApp us at',
                    'value' => '+6 011 6742 4472',
                    'sub' => '',
                    'href' => 'https://wa.me/601167424472',
                    'type' => 'whatsapp',
                ],
            ],
        ]);

        $this->migrator->add('contact_page.socials', [
            'items' => [
                ['label' => 'LinkedIn', 'href' => 'https://linkedin.com/company/qaabilacademy', 'icon_key' => 'linkedin'],
                ['label' => 'Instagram', 'href' => 'https://instagram.com/qaabil.academy', 'icon_key' => 'instagram'],
                ['label' => 'Facebook', 'href' => 'https://fb.com/qaabil.academy', 'icon_key' => 'facebook'],
                ['label' => 'TikTok', 'href' => 'https://tiktok.com/@qaabil.academy', 'icon_key' => 'tiktok'],
                ['label' => 'YouTube', 'href' => 'https://www.youtube.com/@qaabil.academy', 'icon_key' => 'youtube'],
                ['label' => 'Threads', 'href' => 'https://www.threads.com/@qaabil.academy', 'icon_key' => 'threads'],
            ],
        ]);

        $this->migrator->add('contact_page.note', [
            'icon' => '✦',
            'title' => 'Built by the community',
            'description' => "Qaabil is a passion project. We're a small team backed by a big community. Your message genuinely matters to us.",
        ]);

        $this->migrator->add('contact_page.topics', [
            'items' => [
                'General enquiry',
                'Student support',
                'Become a Moderator/Tutor',
                'Institution / partnership',
                'Bug report',
                'Other',
            ],
        ]);
    }
};
