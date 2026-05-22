{{-- resources/views/infolists/partials/course-hero.blade.php --}}
@php $d = $getState(); @endphp

<div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
    <div class="flex items-start gap-4 px-6 py-5">
        {{-- Icon --}}
        <div class="shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5"
            style="background:rgba(27,58,107,.07);border:1px solid rgba(27,58,107,.1)">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.75">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
        </div>

        {{-- Main content --}}
        <div class="flex-1 min-w-0">
            <h2 class="text-base font-semibold text-gray-950 dark:text-white truncate">{{ $d['name'] }}</h2>
            @if($d['description'])
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5 leading-relaxed line-clamp-2">
                    {{ $d['description'] }}
                </p>
            @endif

            {{-- Stats row --}}
            <div class="flex flex-wrap items-center gap-x-4 gap-y-1.5 mt-3">
                @foreach([
                    ['n' => $d['sections'],   'label' => 'Sections'],
                    ['n' => $d['chapters'],   'label' => 'Chapters'],
                    ['n' => $d['objectives'], 'label' => 'Objectives'],
                ] as $i => $stat)
                    @if($i > 0)
                        <span class="text-gray-200 dark:text-gray-700 select-none">·</span>
                    @endif
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        <span class="font-semibold" style="color:#1b3a6b">{{ $stat['n'] }}</span>
                        {{ $stat['label'] }}
                    </span>
                @endforeach
            </div>
        </div>

        {{-- Timestamps --}}
        <div class="hidden sm:flex flex-col items-end gap-0.5 shrink-0">
            <span class="text-xs text-gray-400">Created {{ $d['created_at']?->diffForHumans() }}</span>
            <span class="text-xs text-gray-400">Updated {{ $d['updated_at']?->diffForHumans() }}</span>
        </div>
    </div>
</div>