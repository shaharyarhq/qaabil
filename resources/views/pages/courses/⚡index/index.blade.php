<div>
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        {{-- ── Page header ── --}}
        <div class="flex items-end justify-between mb-8">
            <div>
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                    <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    All Courses
                </div>
                <h2 class="text-[2.25rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Start learning
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">today</span>
                    <span class="text-[#f59e0b] text-[1.5rem] ml-1">✦</span>
                </h2>
            </div>

            <div class="hidden md:flex items-center gap-2 text-sm text-[#94a3b8]">
                Showing
                <span class="font-extrabold text-[#1b3a6b] tabular-nums">{{ $this->courses()->count() }}</span>
                {{ Str::plural('course', $this->courses()->count()) }}
            </div>
        </div>

        {{-- ── Search + Sort ── --}}
        <div class="mb-3 flex items-center gap-3">

            {{-- Search --}}
            <div
                class="search-wrap flex-1 flex items-center gap-3 bg-white border border-[#e2e8f0] rounded-[14px] px-4 py-3 transition-all duration-[.22s]">
                <svg class="shrink-0 text-[#94a3b8]" width="18" height="18" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search courses…"
                    class="search-input flex-1 bg-transparent text-[.9rem] text-[#0f172a] placeholder-[#cbd5e1]">
                @if ($search)
                    <button wire:click="$set('search', '')"
                        class="shrink-0 w-6 h-6 rounded-full bg-[#f1f5f9] border border-[#e2e8f0] text-[#94a3b8] text-xs flex items-center justify-center clear-btn"
                        aria-label="Clear">
                        ✕
                    </button>
                @endif
            </div>

            {{-- Sort --}}
            <div class="relative shrink-0">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" width="13"
                    height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                </svg>
                <select wire:model.live="sort"
                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s] hover:border-[rgba(27,58,107,.3)]">
                    <option value="newest">Newest first</option>
                    <option value="oldest">Oldest first</option>
                    <option value="name-asc">Name A → Z</option>
                    <option value="name-desc">Name Z → A</option>
                </select>
            </div>
        </div>

        {{-- ── Active filter badges (Filament-style) ── --}}
        @php
            $sortLabels = [
                'newest' => 'Newest first',
                'oldest' => 'Oldest first',
                'name-asc' => 'Name A → Z',
                'name-desc' => 'Name Z → A',
            ];
            $hasActiveFilters = $search || $sort !== 'newest';
        @endphp

        @if ($hasActiveFilters)
            <div class="flex flex-wrap items-center gap-2 mb-8 pt-3">
                {{-- Label --}}
                <span class="text-[.7rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8]">Active
                    filters:</span>

                {{-- Search badge --}}
                @if ($search)
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#eff6ff] border border-[rgba(27,58,107,.15)] text-[.75rem] font-semibold text-[#1b3a6b]">
                        <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5" class="opacity-50">
                            <circle cx="11" cy="11" r="8" />
                            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                        </svg>
                        "{{ $search }}"
                        <button wire:click="$set('search', '')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#1b3a6b]/50 hover:text-[#1b3a6b] hover:bg-[rgba(27,58,107,.1)] transition-colors text-[10px]"
                            aria-label="Remove search filter">✕</button>
                    </span>
                @endif

                {{-- Sort badge (only when not default) --}}
                @if ($sort !== 'newest')
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#fffbeb] border border-[rgba(245,158,11,.25)] text-[.75rem] font-semibold text-[#b45309]">
                        <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5" class="opacity-50">
                            <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                        </svg>
                        {{ $sortLabels[$sort] }}
                        <button wire:click="$set('sort', 'newest')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#b45309]/50 hover:text-[#b45309] hover:bg-[rgba(245,158,11,.15)] transition-colors text-[10px]"
                            aria-label="Remove sort filter">✕</button>
                    </span>
                @endif

                {{-- Clear all --}}
                <button wire:click="resetAll"
                    class="ml-1 text-[.72rem] font-bold text-[#94a3b8] hover:text-[#dc2626] transition-colors underline underline-offset-2">
                    Clear all
                </button>
            </div>
        @else
            <div class="mb-8"></div>
        @endif

        {{-- ── Course grid ── --}}
        @if ($this->courses()->isNotEmpty())
            <div id="course-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr"
                wire:loading.class="loading" wire:target="search, sort">

                @foreach ($this->courses() as $i => $course)
                  <livewire:courses.course-card :course="$course" :i="$i" :key="$course->id" />
                @endforeach

                {{-- CTA dark card
                <div
                    class="card-dark relative bg-[#1b3a6b] rounded-[20px] overflow-hidden p-8 flex flex-col justify-between transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.5)]">
                    <div class="relative z-10">
                        <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-5 shrink-0"
                            style="background:rgba(245,158,11,.15)">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="text-[1.75rem] font-extrabold text-white mb-2 leading-snug">
                            Create a
                            <span
                                class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">course</span>
                        </h3>
                        <p class="text-[.825rem] leading-relaxed text-white/45">
                            Admin? Design sections, chapters, invite maintainers, and grow the knowledge base.
                        </p>
                    </div>
                    <div class="relative z-10 mt-7">
                        <button
                            class="w-full py-[.7rem] rounded-xl text-[.85rem] font-extrabold bg-[#f59e0b] text-[#1b3a6b] border-none cursor-pointer transition-colors hover:bg-[#d97706]">
                            + New course
                        </button>
                        <p class="text-[.7rem] text-center mt-3 text-white/25">
                            Unlock by subscribing or uploading an approved video
                        </p>
                    </div>
                </div> --}}

            </div>
        @else
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div
                    class="w-16 h-16 rounded-2xl bg-white border border-[#e2e8f0] flex items-center justify-center mb-5 text-2xl shadow-sm">
                    🔍
                </div>
                <h3 class="text-lg font-extrabold text-[#0f172a] mb-2">No courses found</h3>
                <p class="text-sm text-[#94a3b8] mb-5 max-w-xs">
                    No courses match "{{ $search }}". Try a different keyword.
                </p>
                <button wire:click="$set('search', '')"
                    class="px-5 py-2 rounded-xl bg-[#1b3a6b] text-white text-sm font-bold transition-opacity hover:opacity-80">
                    Clear search
                </button>
            </div>
        @endif

        {{-- Manifesto --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-relaxed max-w-[600px] mx-auto"
                    style="font-size:clamp(1.5rem,2.5vw,2rem)">
                    " upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter "
                </p>
                <div class="w-10 h-[2px] rounded mx-auto my-[18px]" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-[.85rem] text-white/45 max-w-[500px] mx-auto leading-relaxed">
                    Every course contains sections and chapters with clear objectives. Students submit video solutions.
                    Maintainers review and accept. One approved video unlocks the rest —
                    crowdsourced, peer-validated, forever free.
                </p>
            </div>
        </div>

    </main>

</div>
