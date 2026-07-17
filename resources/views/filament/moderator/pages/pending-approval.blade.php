<x-filament-panels::page>
    <div class="flex flex-col items-center text-center space-y-6">
        <!-- Status Icon with Animation -->
        <div class="relative">
            <x-filament::icon icon="heroicon-o-clock" class="w-20 h-20 text-primary-500 animate-pulse" />
            <span class="absolute -top-1 -right-1 flex h-5 w-5">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-warning-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-5 w-5 bg-warning-500"></span>
            </span>
        </div>

        <!-- Status Content -->
        <div class="space-y-3 max-w-md">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                Account Pending Approval
            </h1>

            <div class="space-y-2">
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    Your moderator account is currently under review. Our team will verify your submitted CV / Resume
                    and get back to you shortly. For further queries, contact <a href="mailto:admin@qaabil.academy"
                        class="text-primary-600 underline">admin@qaabil.academy</a>.
                </p>

                <div
                    class="flex items-center justify-center gap-2 text-sm text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800/50 rounded-lg p-4">
                    <x-filament::icon icon="heroicon-o-information-circle" class="w-5 h-5 text-primary-500" />
                    <span>
                        We'll notify you via email once your account is approved.
                    </span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
            <x-filament::button color="primary" icon="heroicon-m-arrow-path" tag="a"
                href="{{ filament()->getUrl() }}">
                Refresh Status
            </x-filament::button>

            <form method="POST" action="{{ filament()->getLogoutUrl() }}">
                @csrf
                <x-filament::button color="gray" icon="heroicon-m-arrow-left-on-rectangle" type="submit" outlined>
                    Sign Out
                </x-filament::button>
            </form>
        </div>

        <!-- Support Link -->
        {{-- <p class="text-xs text-gray-400 dark:text-gray-500">
            Need help?
            <a href="#"
                class="text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300 underline">
                Contact Support
            </a>
        </p> --}}
    </div>
</x-filament-panels::page>
