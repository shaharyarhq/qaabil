{{-- resources/views/infolists/partials/course-syllabus.blade.php --}}
@php
    $d = $getState();

    $statusConfig = [
        'behind' => [
            'color' => 'danger',
            'label' => 'Falling Behind',
            'icon' => 'heroicon-m-arrow-trending-down',
        ],
        'practice' => [
            'color' => 'warning',
            'label' => 'Need Practice',
            'icon' => 'heroicon-m-arrow-path',
        ],
        'mastery' => [
            'color' => 'success',
            'label' => 'Mastery',
            'icon' => 'heroicon-m-check-circle',
        ],
        null => [
            'color' => 'gray',
            'label' => 'Not Started',
            'icon' => 'heroicon-m-minus-circle',
        ],
    ];
@endphp

<x-filament::section icon="heroicon-m-bars-3-bottom-left" heading="Course Structure" description="Syllabus" collapsible>
    <div class="space-y-3">

        @forelse($d['sections'] as $si => $section)

            <x-filament::section collapsible :collapsed="$si !== 0" compact>
                <x-slot name="heading">
                    <div class="flex items-center gap-2">
                        {{-- Section number badge --}}
                        <x-filament::badge color="primary" size="sm">
                            {{ $si + 1 }}
                        </x-filament::badge>
                        <span class="font-extrabold text-sm text-gray-900 dark:text-white">
                            {{ $section['name'] }}
                        </span>
                    </div>
                </x-slot>

                <x-slot name="headerEnd">
                    <x-filament::badge color="gray" size="sm">
                        {{ count($section['chapters']) }}
                        {{ Str::plural('chapter', count($section['chapters'])) }}
                    </x-filament::badge>
                </x-slot>

                <div class="space-y-2">

                    @forelse($section['chapters'] as $ci => $chapter)
                        <x-filament::section collapsible collapsed compact>
                            <x-slot name="heading">
                                <div class="flex items-center gap-2">
                                    <x-filament::badge color="gray" size="sm">
                                        {{ $ci + 1 }}
                                    </x-filament::badge>
                                    <span class="font-bold text-sm text-gray-800 dark:text-gray-200">
                                        {{ $chapter['name'] }}
                                    </span>
                                </div>
                            </x-slot>

                            <x-slot name="headerEnd">
                                <x-filament::badge color="gray" size="sm">
                                    {{ count($chapter['objectives']) }}
                                    {{ Str::plural('objective', count($chapter['objectives'])) }}
                                </x-filament::badge>
                            </x-slot>

                            {{-- Objectives --}}
                            @forelse($chapter['objectives'] as $obj)
                                @php
                                    $status = $obj['status'];
                                    $status = $status instanceof \App\Enums\Progress ? $status->value : $status ?? null;
                                    $cfg = $statusConfig[$status] ?? $statusConfig[null];
                                @endphp

                                <div
                                    class="flex items-center gap-3 py-2 px-1 rounded-lg transition hover:bg-gray-50 dark:hover:bg-white/5">
                                    <x-filament::icon :icon="$cfg['icon']" class="w-5 h-5 shrink-0" :style="'color: var(--' .
                                        match ($cfg['color']) {
                                            'danger' => 'error',
                                            'warning' => 'warning',
                                            'success' => 'success',
                                            default => 'gray',
                                        } .
                                        '-500)'" />

                                    <span class="flex-1 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        {{ $obj['name'] }}
                                    </span>

                                    <x-filament::badge :color="$cfg['color']" size="sm">
                                        {{ $cfg['label'] }}
                                    </x-filament::badge>
                                </div>

                            @empty
                                <x-filament::section>
                                    No objectives yet.
                                </x-filament::section>
                            @endforelse

                        </x-filament::section>

                    @empty
                        <p class="text-sm italic text-gray-400 px-2 py-3">No chapters yet.</p>
                    @endforelse

                </div>

            </x-filament::section>

        @empty
            <div class="py-8 text-center">
                <x-filament::icon icon="heroicon-o-academic-cap"
                    class="w-10 h-10 mx-auto text-gray-300 dark:text-gray-600 mb-2" />
                <p class="text-sm italic text-gray-400">No sections yet.</p>
            </div>
        @endforelse

    </div>
</x-filament::section>
