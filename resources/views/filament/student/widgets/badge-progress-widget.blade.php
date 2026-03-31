<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Badge Progress This Month</x-slot>

        <div class="flex flex-col gap-3">
            @foreach ($this->getProgress() as $progress)
                @php
                    $current = $progress['current'];
                    $nextTierName = null;
                    $nextTierTarget = null;
                    $currentTierName = null;

                    foreach ($progress['tiers'] as $name => $target) {
                        if ($current >= $target) {
                            $currentTierName = $name;
                        }
                        if ($current < $target && !$nextTierName) {
                            $nextTierName = $name;
                            $nextTierTarget = $target;
                        }
                    }

                    $percentage = $nextTierTarget ? min(100, round(($current / $nextTierTarget) * 100)) : 100;
                    $unit = $progress['unit'] ?? 'items';
                @endphp

                {{-- Card --}}
                <div
                    class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                    {{-- Header --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">

                            {{-- Icon --}}
                            <div class="w-9 h-9 rounded-lg flex items-center justify-center text-base flex-shrink-0"
                                style="background:{{ $progress['icon_bg'] }}; color:{{ $progress['icon_color'] }};">
                                {{ $progress['icon'] }}
                            </div>

                            {{-- Title + subtitle --}}
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $progress['label'] }} Badges
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                    @if ($nextTierName)
                                        {{ $current }} of {{ $nextTierTarget }} {{ $unit }} &rarr;
                                        {{ $nextTierName }}
                                    @else
                                        Max tier reached! 🎉
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Current tier badge --}}
                        @if ($currentTierName)
                            <span class="text-xs font-medium px-3 py-1 rounded-full flex-shrink-0"
                                style="background:{{ $progress['badge_bg'] }}; color:{{ $progress['badge_color'] }};">
                                {{ $currentTierName }}
                            </span>
                        @else
                            <span
                                class="text-xs px-3 py-1 rounded-full flex-shrink-0 bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-500">
                                No badge yet
                            </span>
                        @endif
                    </div>

                    {{-- Progress bar --}}
                    <div class="w-full h-2 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-500"
                            style="width:{{ $percentage }}%; background:{{ $progress['bar_color'] }};"></div>
                    </div>

                    {{-- Tier pills --}}
                    <div class="flex flex-wrap gap-1.5">
                        @foreach ($progress['tiers'] as $name => $target)
                            @php $isActive = $current >= $target; @endphp
                            @if ($isActive)
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium"
                                    style="background:{{ $progress['badge_bg'] }}; color:{{ $progress['badge_color'] }};">
                                    {{ $name }} &bull; {{ $target }}
                                </span>
                            @else
                                <span
                                    class="text-xs px-2 py-0.5 rounded-full border border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500">
                                    {{ $name }} &bull; {{ $target }}
                                </span>
                            @endif
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
