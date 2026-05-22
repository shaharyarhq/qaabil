{{-- resources/views/infolists/partials/course-progress.blade.php --}}
@php $d = $getState(); @endphp

<x-filament::section>
    <x-slot name="heading">My Progress</x-slot>
    <x-slot name="description">{{ $d['done'] }} of {{ $d['total'] }} objectives marked</x-slot>
    <x-slot name="headerEnd">
        <span class="text-2xl font-bold tabular-nums" style="color:#1b3a6b">
            {{ $d['percent'] }}<span class="text-sm font-medium text-gray-400">%</span>
        </span>
    </x-slot>

    <div class="space-y-5">

        {{-- Segmented progress bar --}}
        <div class="w-full h-2 rounded-full overflow-hidden bg-gray-100 dark:bg-white/5">
            @if($d['total'] > 0)
                <div class="h-full flex">
                    @if($d['mastery']  > 0) <div class="h-full" style="width:{{ round(($d['mastery']  / $d['total']) * 100) }}%;background:#10b981;transition:width .5s ease"></div> @endif
                    @if($d['practice'] > 0) <div class="h-full" style="width:{{ round(($d['practice'] / $d['total']) * 100) }}%;background:#f59e0b;transition:width .5s ease"></div> @endif
                    @if($d['behind']   > 0) <div class="h-full" style="width:{{ round(($d['behind']   / $d['total']) * 100) }}%;background:#ef4444;transition:width .5s ease"></div> @endif
                </div>
            @endif
        </div>

        {{-- RAG stat cards --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            @foreach([
                ['key' => 'notStarted', 'enum' => App\Enums\Progress::NOT_STARTED, 'color' => 'gray'],
                ['key' => 'behind',     'enum' => App\Enums\Progress::BEHIND,       'color' => 'danger'],
                ['key' => 'practice',   'enum' => App\Enums\Progress::PRACTICE,     'color' => 'warning'],
                ['key' => 'mastery',    'enum' => App\Enums\Progress::MASTERY,      'color' => 'success'],
            ] as $item)
                <x-filament::card>
                    <div class="flex flex-col gap-1">
                        <x-filament::badge :color="$item['color']" size="sm" class="self-start">
                            {{ $item['enum']->getLabel() }}
                        </x-filament::badge>
                        <p class="text-2xl font-bold tabular-nums text-gray-950 dark:text-white mt-1">
                            {{ $d[$item['key']] }}
                        </p>
                        @if($d['total'] > 0)
                            <p class="text-xs text-gray-500">
                                {{ round(($d[$item['key']] / $d['total']) * 100) }}% of total
                            </p>
                        @endif
                    </div>
                </x-filament::card>
            @endforeach
        </div>

    </div>
</x-filament::section>
