<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('pricing_page.hero', [
            'badge' => 'Simple, honest pricing',
            'title' => 'Knowledge should be<br><span class="font-[\'Instrument_Serif\',serif] font-normal italic text-[#f59e0b]">free for everyone.</span>',
            'description' => 'Qaabil runs on community contributions. Submit a video, get it approved, unlock any chapter. Upgrade only if you want instant access.',
            'chips' => [
                '🔓 Unlock by contributing',
                '🌍 Community maintained',
            ],
        ]);

        $this->migrator->add('pricing_page.how_it_works', [
            'steps' => [
                [
                    'icon' => '📹',
                    'title' => 'Submit a video',
                    'description' => 'Record yourself solving any objective in a course. Upload it to the platform for review.',
                ],
                [
                    'icon' => '✅',
                    'title' => 'Get approved',
                    'description' => 'A community maintainer reviews your submission. Most videos are reviewed within 24 hours.',
                ],
                [
                    'icon' => '🔓',
                    'title' => 'Unlock forever',
                    'description' => 'One approved video unlocks every chapter in that course. No expiry, no catch.',
                ],
            ],
        ]);

        $this->migrator->add('pricing_page.faqs', [
            [
                'question' => 'Is it really free?',
                'answer' => 'Yes — completely. You can browse every course, submit videos, and unlock full access without ever paying. The paid plan only exists for students who want instant access without going through the contribution flow.',
            ],
            [
                'question' => 'What does "unlock via approval" mean?',
                'answer' => 'Submit a video solution to any objective in a course. A maintainer reviews it. If approved, you unlock every chapter in that course permanently.',
            ],
            [
                'question' => 'Who are the maintainers?',
                'answer' => 'Maintainers are trusted community members who review submissions and help maintain course quality.',
            ],
            [
                'question' => 'What happens if my video is rejected?',
                'answer' => 'You receive feedback and can resubmit as many times as needed.',
            ],
            [
                'question' => 'Can institutions use Qaabil for free?',
                'answer' => 'Yes. Community access is free. Institution plans add private courses, branding, SSO, and dedicated support.',
            ],
        ]);

        $this->migrator->add('pricing_page.manifesto', [
            'quote' => 'The best education is the kind the community builds ✦ together.',
            'description' => 'Qaabil is free because knowledge should be. Start learning today — no card, no catch, no expiry.',
            'button_label' => 'Browse courses',
            'button_url' => '/courses',
        ]);
    }
};
