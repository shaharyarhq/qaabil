<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            🏆 Your Badges
        </x-slot>

        @php $badges = $this->getBadges() @endphp

        @if ($badges->isEmpty())
            <p class="text-sm text-gray-400">
                No badges yet — start uploading videos!
            </p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($badges as $badge)
                    <div
                        class="flex flex-col items-center p-4 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-center">
                        <img src="{{ asset($badge->icon) }}" alt="{{ $badge->name }}" class="w-16 h-auto mb-2" />
                        <div class="font-semibold text-sm">{{ $badge->name }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $badge->description }}</div>
                        <div class="text-xs text-gray-400 mt-2">{{ $badge->pivot->created_at->diffForHumans() }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
