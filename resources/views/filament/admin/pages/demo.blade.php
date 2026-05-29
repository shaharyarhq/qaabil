<x-filament-panels::page>
    {{-- ══════════════════════════════════════════════════════
         NAVBAR
    ══════════════════════════════════════════════════════════ --}}
    <div class="flex items-center justify-between pb-8 mb-4 border-b border-gray-200">

        <div class="flex items-center gap-2.5">
            <div class="p-1.5 bg-primary-600 rounded-lg">
                <x-filament::icon icon="heroicon-m-bolt" class="h-5 w-5 text-white" />
            </div>
            <span class="text-xl font-extrabold text-gray-900 tracking-tight">LaunchKit</span>
        </div>

        <div class="hidden md:flex items-center gap-6">
            <x-filament::link href="#features" color="gray" weight="medium">Features</x-filament::link>
            <x-filament::link href="#pricing" color="gray" weight="medium">Pricing</x-filament::link>
            <x-filament::link href="#testimonials" color="gray" weight="medium">Testimonials</x-filament::link>
            <x-filament::link href="#faq" color="gray" weight="medium">FAQ</x-filament::link>
        </div>

        <div class="flex items-center gap-3">
            <x-filament::button color="gray" outlined tag="a" href="/login" size="sm">
                Sign in
            </x-filament::button>
            <x-filament::button color="primary" tag="a" href="/register" size="sm" icon="heroicon-m-arrow-right" icon-position="after">
                Get Started Free
            </x-filament::button>
        </div>

    </div>


    {{-- ══════════════════════════════════════════════════════
         HERO
    ══════════════════════════════════════════════════════════ --}}
    <div class="text-center py-20">

        <div class="mb-8">
            <x-filament::badge color="success" icon="heroicon-m-sparkles">
                Now on Filament v5 · Public Beta
            </x-filament::badge>
        </div>

        <h1 class="text-6xl md:text-7xl font-black text-gray-900 tracking-tight leading-[1.05] mb-7">
            Ship your Laravel app<br>
            <span class="text-primary-600">in days, not weeks</span>
        </h1>

        <p class="text-xl text-gray-500 max-w-xl mx-auto mb-12 leading-relaxed">
            A production-ready starter kit built on Filament v5.
            Auth, roles, dashboards, and billing — all out of the box.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-16">
            <x-filament::button size="xl" color="primary" tag="a" href="/register" icon="heroicon-m-rocket-launch">
                Start for Free
            </x-filament::button>
            <x-filament::button size="xl" color="gray" outlined tag="a" href="#demo" icon="heroicon-m-play-circle">
                Watch Demo
            </x-filament::button>
        </div>

        {{-- Social proof --}}
        <div class="flex items-center justify-center gap-4">
            <div class="flex -space-x-3">
                @foreach (['AK','BR','CL','DM','EN'] as $initials)
                <x-filament::avatar src="https://ui-avatars.com/api/?name={{ $initials }}&background=6366f1&color=fff&size=64" alt="{{ $initials }}" size="md" class="ring-2 ring-white" />
                @endforeach
            </div>
            <div class="text-left">
                <div class="flex gap-0.5 mb-1">
                    @for ($i = 0; $i
                    < 5; $i++) <x-filament::icon icon="heroicon-m-star" class="h-4 w-4 text-warning-400" />
                    @endfor
                </div>
                <p class="text-sm text-gray-500">
                    Trusted by <span class="font-bold text-gray-800">12,000+</span> developers worldwide
                </p>
            </div>
        </div>

    </div>


    {{-- ══════════════════════════════════════════════════════
         CALLOUT
    ══════════════════════════════════════════════════════════ --}}
    <div class="mb-20">
        <x-filament::callout icon="heroicon-o-gift" icon-color="warning" color="warning" heading="Limited Beta Offer — 3 months free on any Pro plan">
            Sign up before the end of the month. No credit card required. Cancel anytime.
        </x-filament::callout>
    </div>


    {{-- ══════════════════════════════════════════════════════
         STATS
    ══════════════════════════════════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-24">

        @foreach ([
        ['heroicon-o-users', 'success', '12,000+', 'Active Developers', 'bg-success-50'],
        ['heroicon-o-server-stack', 'primary', '99.9%', 'Uptime SLA', 'bg-primary-50'],
        ['heroicon-o-clock', 'warning', '< 2 min', 'Avg. Setup Time' , 'bg-warning-50' ], ] as [$icon, $color, $stat, $label, $bg]) <x-filament::card>
            <div class="flex items-center gap-5 py-2">
                <div class="p-3 {{ $bg }} rounded-xl">
                    <x-filament::icon :icon="$icon" class="h-7 w-7 text-{{ $color }}-600" />
                </div>
                <div>
                    <p class="text-3xl font-black text-gray-900 leading-none mb-1">{{ $stat }}</p>
                    <p class="text-sm text-gray-500 font-medium">{{ $label }}</p>
                </div>
            </div>
            </x-filament::card>

            @endforeach

    </div>


    {{-- ══════════════════════════════════════════════════════
         FEATURES
    ══════════════════════════════════════════════════════════ --}}
    <div id="features" class="mb-24">

        <div class="text-center mb-14">
            <x-filament::badge color="primary" class="mb-5 inline-flex">Features</x-filament::badge>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Everything you need to ship</h2>
            <p class="text-gray-500 text-lg max-w-lg mx-auto">
                No paid add-ons. No missing pieces. A complete foundation so you can focus on your product.
            </p>
        </div>

        <div x-data="{ tab: 'security' }">

            <x-filament::tabs label="Feature categories">

                <x-filament::tabs.item icon="heroicon-o-shield-check" @click="tab = 'security'" :alpine-active="'tab === \'security\''">
                    Security
                </x-filament::tabs.item>

                <x-filament::tabs.item icon="heroicon-o-chart-bar" @click="tab = 'dashboard'" :alpine-active="'tab === \'dashboard\''">
                    Dashboard
                </x-filament::tabs.item>

                <x-filament::tabs.item icon="heroicon-o-cloud-arrow-up" @click="tab = 'devops'" :alpine-active="'tab === \'devops\''">
                    DevOps
                </x-filament::tabs.item>

            </x-filament::tabs>

            {{-- Security --}}
            <div x-show="tab === 'security'" x-cloak class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-6">
                @foreach ([
                ['heroicon-o-lock-closed', 'success', 'Multi-guard Auth', 'Login, register, password reset, and email verification ready to go.'],
                ['heroicon-o-shield-check', 'success', 'Roles & Permissions', 'Granular RBAC with Spatie Permissions baked in from day one.'],
                ['heroicon-o-device-phone-mobile', 'success', '2FA Support', 'Time-based one-time passwords for all user accounts with backup codes.'],
                ['heroicon-o-eye-slash', 'success', 'Audit Logging', 'Every sensitive action logged with user, IP address, and full timestamp.'],
                ] as [$icon, $color, $title, $desc])
                <x-filament::card>
                    <div class="flex items-start gap-4">
                        <div class="p-2 rounded-lg bg-{{ $color }}-50 shrink-0">
                            <x-filament::icon :icon="$icon" class="h-6 w-6 text-{{ $color }}-600" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm mb-1">{{ $title }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                </x-filament::card>
                @endforeach
            </div>

            {{-- Dashboard --}}
            <div x-show="tab === 'dashboard'" x-cloak class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-6">
                @foreach ([
                ['heroicon-o-chart-bar', 'primary', 'Live Stats Widgets', 'Real-time counters, trend charts, and KPI cards using Filament v5 widgets.'],
                ['heroicon-o-table-cells', 'primary', 'Data Tables', 'Sortable, filterable, and searchable tables with bulk actions out of the box.'],
                ['heroicon-o-paint-brush', 'primary', 'Themeable UI', 'Light and dark mode support with a custom primary colour picker per panel.'],
                ['heroicon-o-squares-2x2', 'primary', 'Widget Builder', 'Drag-and-drop dashboard builder so admin users can arrange their own view.'],
                ] as [$icon, $color, $title, $desc])
                <x-filament::card>
                    <div class="flex items-start gap-4">
                        <div class="p-2 rounded-lg bg-{{ $color }}-50 shrink-0">
                            <x-filament::icon :icon="$icon" class="h-6 w-6 text-{{ $color }}-600" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm mb-1">{{ $title }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                </x-filament::card>
                @endforeach
            </div>

            {{-- DevOps --}}
            <div x-show="tab === 'devops'" x-cloak class="grid grid-cols-1 lg:grid-cols-2 gap-6 pt-6">
                @foreach ([
                ['heroicon-o-cloud-arrow-up', 'warning', 'One-click Deploy', 'GitHub Actions CI/CD pipeline pre-configured for Laravel Forge and Vapor.'],
                ['heroicon-o-puzzle-piece', 'warning', 'Modular Design', 'Enable only what you need — every feature is a self-contained module.'],
                ['heroicon-o-bell', 'warning', 'Notifications', 'Email, Slack etc and in-app alerts with lesser additional configuration.'],
                ['heroicon-o-wrench-screwdriver', 'warning', 'Health Checks', 'Built-in uptime monitoring and queue worker health endpoints included.'],
                ] as [$icon, $color, $title, $desc])
                <x-filament::card>
                    <div class="flex items-start gap-4">
                        <div class="p-2 rounded-lg bg-{{ $color }}-50 shrink-0">
                            <x-filament::icon :icon="$icon" class="h-6 w-6 text-{{ $color }}-600" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 text-sm mb-1">{{ $title }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                </x-filament::card>
                @endforeach
            </div>

        </div>
    </div>


    {{-- ══════════════════════════════════════════════════════
         TESTIMONIALS
    ══════════════════════════════════════════════════════════ --}}
    <div id="testimonials" class="mb-24">

        <div class="text-center mb-14">
            <x-filament::badge color="warning" class="mb-5 inline-flex">Testimonials</x-filament::badge>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Loved by developers</h2>
            <p class="text-gray-500 text-lg">Don't take our word for it.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach ([
            ['Sarah K.', 'Senior Dev · Stripe', 'SK', 'LaunchKit saved us weeks of boilerplate. The Filament v5 integration is seamless and the code quality is genuinely excellent.'],
            ['Ahmed R.', 'Founder · DevFlow', 'AR', 'We went from idea to production in 3 days. The modular design is a game changer for small teams that need to move fast.'],
            ['Priya M.', 'Lead Eng · Vercel', 'PM', 'Best Laravel starter kit I have used. Clean architecture, solid defaults, and absolutely zero headaches on day one.'],
            ] as [$name, $role, $initials, $quote])

            <x-filament::card>
                <div class="flex gap-0.5 mb-5">
                    @for ($i = 0; $i
                    < 5; $i++) <x-filament::icon icon="heroicon-m-star" class="h-4 w-4 text-warning-400" />
                    @endfor
                </div>
                <p class="text-gray-700 text-sm leading-relaxed mb-6">"{{ $quote }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <x-filament::avatar src="https://ui-avatars.com/api/?name={{ $initials }}&background=6366f1&color=fff&size=64" alt="{{ $name }}" size="md" />
                    <div>
                        <p class="font-semibold text-gray-900 text-sm">{{ $name }}</p>
                        <p class="text-xs text-gray-400">{{ $role }}</p>
                    </div>
                </div>
            </x-filament::card>

            @endforeach

        </div>
    </div>


    {{-- ══════════════════════════════════════════════════════
         PRICING
    ══════════════════════════════════════════════════════════ --}}
    <div id="pricing" class="mb-24">

        <div class="text-center mb-14">
            <x-filament::badge color="success" class="mb-5 inline-flex">Pricing</x-filament::badge>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, honest pricing</h2>
            <p class="text-gray-500 text-lg">One plan. All features. No hidden fees.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

            {{-- Free --}}
            <x-filament::section icon="heroicon-o-gift" icon-color="gray" icon-size="lg">
                <x-slot name="heading">Free</x-slot>
                <x-slot name="description">Perfect for side projects and learning.</x-slot>

                <div class="py-6 border-b border-gray-100 mb-6">
                    <span class="text-5xl font-black text-gray-900">$0</span>
                    <span class="text-gray-400 ml-2">/ month</span>
                </div>

                <ul class="space-y-3 mb-8">
                    @foreach ([
                    'Up to 3 projects',
                    'Core modules only',
                    'Community support',
                    'Monthly updates',
                    ] as $item)
                    <li class="flex items-center gap-3 text-sm text-gray-600">
                        <x-filament::icon icon="heroicon-m-check-circle" class="h-5 w-5 text-success-500 shrink-0" />
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <x-filament::button color="gray" outlined tag="a" href="/register" class="w-full justify-center">
                    Get started free
                </x-filament::button>
            </x-filament::section>

            {{-- Pro --}}
            <x-filament::section icon="heroicon-o-star" icon-color="warning" icon-size="lg">
                <x-slot name="heading">
                    <span class="flex items-center gap-3">
                        Pro
                        <x-filament::badge color="primary">Most Popular</x-filament::badge>
                    </span>
                </x-slot>
                <x-slot name="description">For teams that ship fast and scale.</x-slot>

                <div class="py-6 border-b border-gray-100 mb-6">
                    <span class="text-5xl font-black text-gray-900">$29</span>
                    <span class="text-gray-400 ml-2">/ month</span>
                </div>

                <ul class="space-y-3 mb-8">
                    @foreach ([
                    'Unlimited projects',
                    'All modules included',
                    'Priority support (24h SLA)',
                    'Early access to new features',
                    'Multi-tenancy support',
                    ] as $item)
                    <li class="flex items-center gap-3 text-sm text-gray-600">
                        <x-filament::icon icon="heroicon-m-check-circle" class="h-5 w-5 text-success-500 shrink-0" />
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <x-filament::button color="primary" tag="a" href="/register?plan=pro" icon="heroicon-m-arrow-right" icon-position="after" class="w-full justify-center">
                    Upgrade to Pro
                </x-filament::button>
            </x-filament::section>

        </div>
    </div>


    {{-- ══════════════════════════════════════════════════════
         FAQ
    ══════════════════════════════════════════════════════════ --}}
    <div id="faq" class="mb-24">

        <div class="text-center mb-14">
            <x-filament::badge color="gray" class="mb-5 inline-flex">FAQ</x-filament::badge>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Common questions</h2>
            <p class="text-gray-500 text-lg">Everything you need to know before getting started.</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-3">
            @foreach ([
            ['Do I need a Filament license?', 'No. LaunchKit uses the open-source Filament v5 packages which are MIT licensed and completely free forever.'],
            ['Can I use this for client projects?', 'Yes, absolutely. The license allows unlimited commercial and client use with no royalties or restrictions.'],
            ['What PHP version is required?', 'PHP 8.2 or higher, matching Filament v5 minimum requirements. Laravel 11 or higher is strongly recommended.'],
            ['Is multi-tenancy supported?', 'Yes. The Pro plan ships with Filament multi-tenancy pre-wired and ready for you to configure per your needs.'],
            ['What happens after beta?', 'Your account and data carry over automatically. Early adopters are locked into beta pricing for life.'],
            ] as [$q, $a])
            <x-filament::section collapsible collapsed>
                <x-slot name="heading">{{ $q }}</x-slot>
                <p class="text-gray-600 text-sm leading-relaxed py-1">{{ $a }}</p>
            </x-filament::section>
            @endforeach
        </div>
    </div>


    {{-- ══════════════════════════════════════════════════════
         FINAL CTA
    ══════════════════════════════════════════════════════════ --}}
    <div class="mb-16">
        <x-filament::card>
            <div class="text-center py-14 px-6">

                <div class="mb-6">
                    <x-filament::badge color="primary" icon="heroicon-m-rocket-launch">
                        Limited spots available
                    </x-filament::badge>
                </div>

                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Ready to launch?</h2>
                <p class="text-gray-500 text-lg mb-10 max-w-lg mx-auto">
                    Join thousands of developers who ship faster with LaunchKit.
                    Set up in minutes. Cancel anytime.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <x-filament::button size="xl" color="primary" tag="a" href="/register" icon="heroicon-m-rocket-launch">
                        Create Free Account
                    </x-filament::button>

                    <x-filament::button size="xl" color="gray" outlined tag="a" href="https://github.com/yourorg/launchkit" icon="heroicon-m-code-bracket">
                        View on GitHub
                    </x-filament::button>
                </div>

            </div>
        </x-filament::card>
    </div>


    {{-- ══════════════════════════════════════════════════════
         FOOTER
    ══════════════════════════════════════════════════════════ --}}
    <div class="pt-8 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-6">

        <div class="flex items-center gap-2.5">
            <div class="p-1.5 bg-primary-600 rounded-lg">
                <x-filament::icon icon="heroicon-m-bolt" class="h-4 w-4 text-white" />
            </div>
            <span class="font-bold text-gray-800">LaunchKit</span>
        </div>

        <p class="text-sm text-gray-400">
            © {{ date('Y') }} LaunchKit · Built with ❤️ on
            <x-filament::link href="https://laravel.com" color="primary" size="sm">Laravel</x-filament::link>
            &amp;
            <x-filament::link href="https://filamentphp.com" color="primary" size="sm">Filament v5</x-filament::link>
        </p>

        <div class="flex gap-6">
            <x-filament::link href="/privacy" color="gray" size="sm">Privacy</x-filament::link>
            <x-filament::link href="/terms" color="gray" size="sm">Terms</x-filament::link>
            <x-filament::link href="/contact" color="gray" size="sm">Contact</x-filament::link>
        </div>

    </div>
</x-filament-panels::page>
