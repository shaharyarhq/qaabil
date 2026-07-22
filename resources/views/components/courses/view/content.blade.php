<!-- ── Content ────────────────────────────────── -->
<main class="max-w-8xl mx-auto px-6 py-14 pb-28">

    {{-- ── Section header + jump-to trigger ── --}}
    <div class="mb-10">
        <div class="flex items-center gap-2 mb-1.5">
            <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
            <span class="text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b]">Course content</span>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                Sections <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">&
                    Chapters</span>
            </h2>
            <button @click="openJump()"
                class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white border border-[#e2e8f0] rounded-xl text-[.82rem] font-semibold text-[#94a3b8] transition-all hover:border-[rgba(27,58,107,.3)] hover:text-[#1b3a6b] hover:shadow-sm"
                style="min-width:220px">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                </svg>
                <span>Jump to section or chapter…</span>
                <kbd
                    class="ml-auto text-[.65rem] font-bold px-1.5 py-0.5 rounded bg-[#f1f5f9] border border-[#e2e8f0] text-[#94a3b8]">/</kbd>
            </button>
        </div>
    </div>

    {{-- ── Jump-to palette ── --}}
    <div x-show="jumpOpen" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @keydown.window="handleKey($event)"
        class="fixed inset-0 z-50 flex items-start justify-center pt-[12vh]" style="display:none">
        <div class="absolute inset-0 bg-[#0f172a]/40 backdrop-blur-sm" @click="closeAll()"></div>
        <div
            class="relative w-full max-w-lg mx-4 bg-white rounded-2xl shadow-[0_32px_80px_-12px_rgba(15,23,42,.35)] border border-[#e2e8f0] overflow-hidden">
            <div class="flex items-center gap-3 px-4 py-3.5 border-b border-[#e2e8f0]">
                <svg class="shrink-0 text-[#94a3b8]" width="17" height="17" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                </svg>
                <input x-ref="jumpInput" x-model="jumpQuery" @input="filterJump()" type="text"
                    placeholder="Search sections, chapters, objectives…"
                    class="flex-1 text-[.9rem] text-[#0f172a] placeholder-[#cbd5e1] bg-transparent border-none outline-none">
                <button @click="closeAll()" class="text-[#94a3b8] hover:text-[#0f172a] transition-colors">
                    <kbd
                        class="px-1.5 py-0.5 rounded bg-[#f1f5f9] border border-[#e2e8f0] text-[.65rem] font-bold">Esc</kbd>
                </button>
            </div>
            <div x-ref="jumpList" class="max-h-90 overflow-y-auto">
                <template x-if="jumpQuery.trim() === ''">
                    <div class="px-4 pt-3 pb-1 text-[.65rem] font-extrabold uppercase tracking-widest text-[#94a3b8]">
                        Sections & chapters
                    </div>
                </template>
                <template x-if="jumpResults.length === 0">
                    <div class="px-5 py-8 text-center text-sm text-[#94a3b8] font-['Instrument_Serif',serif] italic">
                        Nothing found for "<span x-text="jumpQuery"></span>"
                    </div>
                </template>
                <template x-for="(item, idx) in jumpResults" :key="item.id">
                    <a :href="item.href" @click.prevent="jumpTo(item)"
                        :data-active="idx === activeIdx ? 'true' : 'false'"
                        :class="idx === activeIdx ? 'bg-[#eff6ff]' : 'hover:bg-[#f8fafd]'"
                        class="flex items-center gap-3 px-4 py-3 cursor-pointer transition-colors no-underline group"
                        @mouseenter="activeIdx = idx">
                        <div class="shrink-0 w-7 h-7 rounded-lg flex items-center justify-center text-[.6rem] font-extrabold uppercase"
                            :class="{
                                'bg-[#eff6ff] text-[#1b3a6b] border border-[rgba(27,58,107,.12)]': item
                                    .type === 'section',
                                'bg-[#fffbeb] text-[#b45309] border border-[rgba(245,158,11,.2)]': item
                                    .type === 'chapter',
                                'bg-[#f0fdf4] text-[#059669] border border-[rgba(5,150,105,.15)]': item
                                    .type === 'objective',
                            }">
                            <span x-text="item.type === 'section' ? 'S' : item.type === 'chapter' ? 'C' : 'O'"></span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-[.85rem] font-semibold text-[#0f172a] truncate" x-text="item.label"></div>
                            <div class="text-[.72rem] text-[#94a3b8] truncate" x-text="item.sub"></div>
                        </div>
                        <svg class="shrink-0 text-[#94a3b8] opacity-0 group-hover:opacity-100 transition-opacity"
                            width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12" />
                        </svg>
                    </a>
                </template>
            </div>
            <div class="px-4 py-2.5 border-t border-[#e2e8f0] flex items-center gap-4 text-[.68rem] text-[#94a3b8]">
                <span><kbd class="font-bold">↑↓</kbd> navigate</span>
                <span><kbd class="font-bold">↵</kbd> jump</span>
                <span><kbd class="font-bold">Esc</kbd> close</span>
                <span class="ml-auto flex items-center gap-3">
                    <span class="flex items-center gap-1"><span
                            class="w-2.5 h-2.5 rounded-full bg-[#eff6ff] border border-[rgba(27,58,107,.3)] inline-block"></span>
                        Section</span>
                    <span class="flex items-center gap-1"><span
                            class="w-2.5 h-2.5 rounded-full bg-[#fffbeb] border border-[rgba(245,158,11,.4)] inline-block"></span>
                        Chapter</span>
                    <span class="flex items-center gap-1"><span
                            class="w-2.5 h-2.5 rounded-full bg-[#f0fdf4] border border-[rgba(5,150,105,.3)] inline-block"></span>
                        Objective</span>
                </span>
            </div>
        </div>
    </div>

    {{-- Sections --}}
    @forelse ($course->sections as $sectionIndex => $section)
        <div id="{{ Str::slug($section->name) }}"
            class="section-item fade-up d{{ min($sectionIndex + 1, 5) }} mb-4 scroll-mt-24 rounded-2xl overflow-hidden"
            style="border:1px solid rgba(27,58,107,.18);background:#f8fafd;">

            {{-- ── Section header (clickable) ── --}}
            <button
                class="section-toggle w-full flex items-center gap-3 px-6 py-4 text-left cursor-pointer border-none transition-all duration-200"
                {{-- aria-expanded="{{ $sectionIndex === 0 ? 'true' : 'false' }}" --}} onclick="toggleSection(this)">

                {{-- Section number pill --}}
                <span
                    class="section-num shrink-0 w-8 h-8 rounded-xl flex items-center justify-center font-['Instrument_Serif',serif] text-[1rem] font-bold transition-all duration-200">
                    {{ $sectionIndex + 1 }}
                </span>

                {{-- Section name --}}
                <span
                    class="flex-1 text-[.95rem] font-extrabold tracking-tight transition-colors duration-200 text-left section-title">
                    {{ $section->name }}
                </span>

                {{-- Stats pill --}}
                <div class="hidden sm:flex items-center gap-2 shrink-0">
                    <span
                        class="section-pill text-[.65rem] font-bold px-2.5 py-1 rounded-full transition-all duration-200">
                        {{ $section->chapters->count() }} {{ Str::plural('chapter', $section->chapters->count()) }}
                    </span>
                </div>

                {{-- Chevron --}}
                <svg class="chevron shrink-0 w-4 h-4 transition-all duration-300 text-[#94a3b8]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- ── Section body ── --}}
            <div class="section-body" style="border-top:1px solid rgba(27,58,107,.1)">
                <div class="section-body-inner px-5">

                    @php
                        $chapterOffset = 0;
                        foreach ($course->sections->take($sectionIndex) as $prev) {
                            $chapterOffset += $prev->chapters->count();
                        }
                    @endphp

                    <div class="flex flex-col gap-3">
                        @forelse ($section->chapters as $chapterIndex => $chapter)
                            <div id="{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}"
                                class="chapter-item bg-white rounded-xl overflow-hidden transition-all hover:shadow-sm scroll-mt-24"
                                style="border:1px solid rgba(27,58,107,.1)">

                                <button
                                    class="chapter-toggle w-full flex items-center justify-between gap-4 px-5 py-4 bg-transparent border-none cursor-pointer text-left transition-colors"
                                    aria-expanded="false" onclick="toggleChapter(this)">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="chapter-num w-8 h-8 rounded-lg flex items-center justify-center shrink-0 font-['Instrument_Serif',serif] text-[.9rem] font-bold transition-colors"
                                            style="background:rgba(27,58,107,.07);color:#1b3a6b;border:1px solid rgba(27,58,107,.1)">
                                            {{ $chapterOffset + $chapterIndex + 1 }}
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-[.9rem] font-bold text-[#0f172a] tracking-tight truncate">
                                                {{ $chapter->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 shrink-0">
                                        <span class="hidden sm:block text-[.7rem] font-semibold text-[#94a3b8]">
                                            {{ $chapter->objectives->count() }}
                                            {{ Str::plural('objective', $chapter->objectives->count()) }}
                                        </span>
                                        <svg class="chevron w-4 h-4 shrink-0 text-[#94a3b8] transition-all duration-300"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </button>

                                <div class="chapter-body">
                                    <div class="chapter-body-inner">
                                        @forelse ($chapter->objectives as $obj)
                                            <div id="{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}-{{ Str::slug($obj->name) }}"
                                                class="border-t-2 transition-colors hover:bg-[rgba(239,246,255,.6)] flex flex-col scroll-mt-24"
                                                style="border-color:rgba(27,58,107,.15)" x-data="{
                                                    status: '{{ $objectiveProgress[$obj->id] ?? '' }}',
                                                    isAuth: {{ auth()->check() ? 'true' : 'false' }},
                                                    handle(key) {
                                                        if (!this.isAuth) return;
                                                        const next = this.status === key ? null : key;
                                                        this.status = next;
                                                        $wire.setObjectiveProgress({{ $obj->id }}, next);
                                                    }
                                                }">

                                                <div
                                                    class="w-full flex flex-col sm:flex-row sm:items-start sm:justify-between">
                                                    <div class="flex items-start gap-3 px-5 py-4">
                                                        <div :style="{
                                                            background: status === 'behind' ? '#ef4444' :
                                                                status === 'practice' ? '#f59e0b' :
                                                                status === 'mastery' ? '#10b981' :
                                                                'rgba(27,58,107,0.4)'
                                                        }"
                                                            class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 mt-0.5"
                                                            style="border:1.5px solid rgba(27,58,107,.2)">
                                                            <div class="w-1.5 h-1.5 rounded-full transition-colors duration-200"
                                                                :style="{
                                                                    background: status === 'behind' ? '#ef4444' :
                                                                        status === 'practice' ? '#f59e0b' :
                                                                        status === 'mastery' ? '#10b981' :
                                                                        'rgba(27,58,107,0.4)'
                                                                }">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p
                                                                class="text-sm font-semibold text-[#0f172a] leading-relaxed">
                                                                {{ $obj->name }}</p>
                                                            @if ($obj->description)
                                                                <p
                                                                    class="text-xs text-[#94a3b8] mt-0.5 leading-relaxed">
                                                                    {{ $obj->description }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center gap-2 px-5 pb-4 sm:py-4 shrink-0"
                                                        x-data="{
                                                            language: '',
                                                            focus: '',
                                                            creator: '',
                                                            sort: 'newest',
                                                            filtersOpen: false,
                                                            redirect() {
                                                                const url = new URL('{{ route('objectives.view', $obj) }}');
                                                                if (this.language) url.searchParams.set('language', this.language);
                                                                if (this.focus) url.searchParams.set('focus', this.focus);
                                                                if (this.creator) url.searchParams.set('creator', this.creator);
                                                                if (this.sort !== 'newest') url.searchParams.set('sort', this.sort);
                                                                window.open(url.toString(), '_blank');
                                                                filtersOpen = false;
                                                            },
                                                            get activeCount() {
                                                                let c = 0;
                                                                if (this.language) c++;
                                                                if (this.focus) c++;
                                                                if (this.sort !== 'newest') c++;
                                                                return c;
                                                            }
                                                        }">

                                                        {{-- ── Desktop: filters (click-to-apply, matches mobile behavior) ── --}}
                                                        <div class="hidden sm:flex items-center gap-2">
                                                            {{-- Language --}}
                                                            <div class="relative shrink-0">
                                                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none"
                                                                    width="13" height="13" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        d="M3 6h18M6 12h12M9 18h6" />
                                                                </svg>
                                                                <select x-model="language"
                                                                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s]">
                                                                    <option value="">All languages</option>
                                                                    @foreach ($this->availableLanguages as $code)
                                                                        <option value="{{ $code }}">
                                                                            {{ config('app.languages.' . $code, $code) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            {{-- Focus --}}
                                                            <div class="relative shrink-0">
                                                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none"
                                                                    width="13" height="13" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        d="M3 6h18M6 12h12M9 18h6" />
                                                                </svg>
                                                                <select x-model="focus"
                                                                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s]">
                                                                    <option value="">All focus types</option>
                                                                    <option
                                                                        value="{{ \App\Enums\VideoFocus::LessonFocused->value }}">
                                                                        Lesson Focused</option>
                                                                    <option
                                                                        value="{{ \App\Enums\VideoFocus::QuestionFocused->value }}">
                                                                        Question Focused</option>
                                                                </select>
                                                            </div>

                                                            {{-- Sort --}}
                                                            <div class="relative shrink-0">
                                                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none"
                                                                    width="13" height="13" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        d="M3 6h18M6 12h12M9 18h6" />
                                                                </svg>
                                                                <select x-model="sort"
                                                                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s]">
                                                                    <option value="newest">Newest first</option>
                                                                    <option value="oldest">Oldest first</option>
                                                                    <option value="rating-high">Highest rating first
                                                                    </option>
                                                                    <option value="rating-low">Lowest rating first
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            {{-- Apply button — filters only fire once this is clicked --}}
                                                            <button type="button" @click="redirect()"
                                                                class="relative inline-flex items-center gap-1.5 text-[.775rem] font-bold text-white rounded-lg px-3.5 py-3 transition-all hover:opacity-90 active:scale-95"
                                                                style="background:#1b3a6b;">
                                                                <span
                                                                    x-text="activeCount > 0 ? 'Apply filters' : 'All videos'"></span>
                                                                <span x-show="activeCount > 0" x-text="activeCount"
                                                                    style="display:none"
                                                                    class="min-w-4 h-4 px-1 rounded-full bg-[#f59e0b] text-[#1b3a6b] text-[.6rem] font-extrabold flex items-center justify-center"></span>
                                                            </button>
                                                        </div>

                                                        {{-- ── Mobile: filter trigger + view-all link ── --}}
                                                        <div class="flex sm:hidden items-center gap-3 w-full">
                                                            <button type="button" @click="filtersOpen = true"
                                                                class="relative inline-flex items-center gap-1.5 text-[.75rem] font-bold text-[#1b3a6b] bg-white border border-[#e2e8f0] rounded-lg px-3 py-2 transition-colors hover:border-[rgba(27,58,107,.3)]">
                                                                <svg width="13" height="13" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M3 5h18M6 10h12M10 15h4" />
                                                                </svg>
                                                                Filters
                                                                <span x-show="activeCount > 0" x-text="activeCount"
                                                                    style="display:none"
                                                                    class="ml-0.5 min-w-4 h-4 px-1 rounded-full bg-[#f59e0b] text-white text-[.6rem] font-extrabold flex items-center justify-center"></span>
                                                            </button>

                                                            <a wire:navigate
                                                                href="{{ route('objectives.view', $obj) }}"
                                                                class="text-[.75rem] font-bold text-[#1b3a6b] no-underline">
                                                                All videos
                                                            </a>
                                                            <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                                                        </div>

                                                        {{-- ── Mobile: filter slideover (bottom sheet) ── --}}
                                                        <div x-show="filtersOpen"
                                                            x-transition:enter="transition ease-out duration-150"
                                                            x-transition:enter-start="opacity-0"
                                                            x-transition:enter-end="opacity-100"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0"
                                                            @keydown.window.escape="filtersOpen = false"
                                                            class="fixed inset-0 z-50 sm:hidden" style="display:none">

                                                            <div class="absolute inset-0 bg-[#0f172a]/40 backdrop-blur-sm"
                                                                @click="filtersOpen = false"></div>

                                                            <div x-show="filtersOpen"
                                                                x-transition:enter="transition ease-out duration-250"
                                                                x-transition:enter-start="translate-y-full"
                                                                x-transition:enter-end="translate-y-0"
                                                                x-transition:leave="transition ease-in duration-200"
                                                                x-transition:leave-start="translate-y-0"
                                                                x-transition:leave-end="translate-y-full"
                                                                class="absolute bottom-0 left-0 right-0 bg-white rounded-t-3xl overflow-hidden"
                                                                style="box-shadow:0 -8px 40px rgba(15,23,42,.2)">

                                                                <div
                                                                    class="w-10 h-1 rounded-full bg-[#e2e8f0] mx-auto mt-3">
                                                                </div>

                                                                <div
                                                                    class="flex items-start justify-between px-5 pt-4 pb-2 gap-3">
                                                                    <div class="min-w-0">
                                                                        <h3
                                                                            class="text-[.95rem] font-extrabold text-[#0f172a]">
                                                                            Filter videos</h3>
                                                                        <p
                                                                            class="text-[.75rem] text-[#94a3b8] truncate mt-0.5">
                                                                            {{ $obj->name }}</p>
                                                                    </div>
                                                                    <button @click="filtersOpen = false"
                                                                        class="shrink-0 w-7 h-7 rounded-full bg-[#f1f5f9] border border-[#e2e8f0] text-[#94a3b8] flex items-center justify-center text-xs">✕</button>
                                                                </div>

                                                                <div class="px-5 pb-6 pt-2 flex flex-col gap-4">
                                                                    <div>
                                                                        <label
                                                                            class="block text-[.7rem] font-bold text-[#94a3b8] uppercase tracking-wider mb-1.5">Language</label>
                                                                        <select x-model="language"
                                                                            class="w-full text-[.85rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-xl px-3.5 py-3">
                                                                            <option value="">All languages
                                                                            </option>
                                                                            @foreach ($this->availableLanguages as $code)
                                                                                <option value="{{ $code }}">
                                                                                    {{ config('app.languages.' . $code, $code) }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div>
                                                                        <label
                                                                            class="block text-[.7rem] font-bold text-[#94a3b8] uppercase tracking-wider mb-1.5">Focus</label>
                                                                        <select x-model="focus"
                                                                            class="w-full text-[.85rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-xl px-3.5 py-3">
                                                                            <option value="">All focus types
                                                                            </option>
                                                                            <option
                                                                                value="{{ \App\Enums\VideoFocus::LessonFocused->value }}">
                                                                                Lesson Focused</option>
                                                                            <option
                                                                                value="{{ \App\Enums\VideoFocus::QuestionFocused->value }}">
                                                                                Question Focused</option>
                                                                        </select>
                                                                    </div>

                                                                    <div>
                                                                        <label
                                                                            class="block text-[.7rem] font-bold text-[#94a3b8] uppercase tracking-wider mb-1.5">Sort</label>
                                                                        <select x-model="sort"
                                                                            class="w-full text-[.85rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-xl px-3.5 py-3">
                                                                            <option value="newest">Newest first
                                                                            </option>
                                                                            <option value="oldest">Oldest first
                                                                            </option>
                                                                            <option value="rating-high">Highest rating
                                                                                first</option>
                                                                            <option value="rating-low">Lowest rating
                                                                                first</option>
                                                                        </select>
                                                                    </div>

                                                                    <button @click="redirect()"
                                                                        class="mt-1 w-full py-3 rounded-xl bg-[#1b3a6b] text-white text-[.85rem] font-extrabold">
                                                                        View videos
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($obj->videos->isNotEmpty())
                                                    <div class="px-5 pb-5" x-data="{
                                                        scroll(dir) {
                                                                const track = $refs.track;
                                                                const card = track.querySelector('a');
                                                                const gap = 12;
                                                                const step = card ? (card.offsetWidth + gap) * 2 : 460;
                                                                track.scrollBy({ left: dir * step, behavior: 'smooth' });
                                                            },
                                                            get canPrev() { return this.$refs.track?.scrollLeft > 4; },
                                                            get canNext() {
                                                                const t = this.$refs.track;
                                                                return t ? t.scrollLeft < t.scrollWidth - t.clientWidth - 4 : false;
                                                            },
                                                            atStart: true, atEnd: false,
                                                            update() {
                                                                const t = this.$refs.track;
                                                                if (!t) return;
                                                                this.atStart = t.scrollLeft <= 4;
                                                                this.atEnd = t.scrollLeft >= t.scrollWidth - t.clientWidth - 4;
                                                            }
                                                    }"
                                                        x-init="$nextTick(() => update())">
                                                        <div class="relative group/slider">
                                                            <button @click="scroll(-1); $nextTick(() => update())"
                                                                x-show="!atStart"
                                                                x-transition:enter="transition ease-out duration-150"
                                                                x-transition:enter-start="opacity-0 scale-90"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="transition ease-in duration-100"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-90"
                                                                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 z-10 w-8 h-8 rounded-full bg-white shadow-md flex items-center justify-center transition-all hover:shadow-lg"
                                                                style="display:none;border:1px solid rgba(27,58,107,.15)"
                                                                aria-label="Scroll left">
                                                                <svg width="14" height="14" fill="none"
                                                                    viewBox="0 0 24 24" stroke="#1b3a6b"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                            </button>

                                                            <div x-ref="track" @scroll.passive="update()"
                                                                class="flex gap-3 pb-2 overflow-x-auto"
                                                                style="scrollbar-width:none;-webkit-overflow-scrolling:touch;">
                                                                @foreach ($obj->videos as $video)
                                                                    @php
                                                                        preg_match(
                                                                            '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/',
                                                                            $video->video_url ?? '',
                                                                            $matches,
                                                                        );
                                                                        $videoId = $matches[1] ?? null;
                                                                        $thumbnail = $videoId
                                                                            ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"
                                                                            : null;
                                                                        $reviews = $video->reviews ?? collect();
                                                                        $total = $reviews->count();
                                                                        $avgRating =
                                                                            $total > 0
                                                                                ? round(
                                                                                    $reviews
                                                                                        ->map(
                                                                                            fn($r) => optional(
                                                                                                $r->ratings->first(),
                                                                                            )->value ?? 0,
                                                                                        )
                                                                                        ->avg(),
                                                                                    1,
                                                                                )
                                                                                : null;
                                                                    @endphp

                                                                    <a wire:navigate
                                                                        href="{{ route('videos.view', [$video]) }}"
                                                                        class="shrink-0 rounded-xl overflow-hidden relative group cursor-pointer transition-transform duration-200 hover:-translate-y-0.5"
                                                                        style="width:220px;background:#0f172a;border:1px solid rgba(27,58,107,.2);">
                                                                        @if ($thumbnail)
                                                                            <img src="{{ $thumbnail }}"
                                                                                alt="{{ $video->title }}"
                                                                                class="w-full object-cover transition-opacity duration-300 group-hover:opacity-70"
                                                                                style="height:130px;">
                                                                        @else
                                                                            <div class="w-full flex items-center justify-center"
                                                                                style="height:130px;background:rgba(27,58,107,.15)">
                                                                                <span class="text-white/20 text-xs">No
                                                                                    thumbnail</span>
                                                                            </div>
                                                                        @endif
                                                                        <div
                                                                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                                            <div
                                                                                class="w-10 h-10 rounded-full flex items-center justify-center bg-[rgba(245,158,11,.9)] backdrop-blur-sm">
                                                                                <svg width="14" height="14"
                                                                                    viewBox="0 0 14 14"
                                                                                    fill="#1b3a6b">
                                                                                    <path d="M3 2l9 5-9 5V2z" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <div class="absolute top-2 right-2">
                                                                            @if ($video->status === 'approved')
                                                                                <span
                                                                                    class="text-[.65rem] font-bold px-2 py-0.5 rounded-full text-[#f59e0b]"
                                                                                    style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">approved</span>
                                                                            @elseif ($video->status === 'pending')
                                                                                <span
                                                                                    class="text-[.65rem] font-bold px-2 py-0.5 rounded-full text-white/50"
                                                                                    style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1)">pending</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="px-3 py-2.5">
                                                                            <p
                                                                                class="text-[.7rem] text-white/80 leading-snug line-clamp-2">
                                                                                {{ $video->title ?? 'Untitled submission' }}
                                                                            </p>
                                                                            @if ($avgRating !== null)
                                                                                <div
                                                                                    class="flex items-center gap-1 mt-1.5">
                                                                                    <div
                                                                                        class="flex items-center gap-0.5">
                                                                                        @for ($s = 1; $s <= 5; $s++)
                                                                                            <svg width="10"
                                                                                                height="10"
                                                                                                viewBox="0 0 20 20"
                                                                                                fill="{{ $s <= round($avgRating) ? '#f59e0b' : 'rgba(255,255,255,0.15)' }}">
                                                                                                <path
                                                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                                            </svg>
                                                                                        @endfor
                                                                                    </div>
                                                                                    <span
                                                                                        class="text-[.6rem] font-bold text-[#f59e0b]">{{ number_format($avgRating, 1) }}</span>
                                                                                    <span
                                                                                        class="text-[.6rem] text-white/25">({{ $total }})</span>
                                                                                </div>
                                                                            @else
                                                                                <p
                                                                                    class="text-[.6rem] mt-1.5 text-white/20 italic">
                                                                                    No ratings yet</p>
                                                                            @endif
                                                                            @if ($video->creator)
                                                                                <p
                                                                                    class="text-[.65rem] mt-0.5 text-white/30">
                                                                                    {{ $video->creator->name }}</p>
                                                                            @endif
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>

                                                            <button @click="scroll(1); $nextTick(() => update())"
                                                                x-show="!atEnd"
                                                                x-transition:enter="transition ease-out duration-150"
                                                                x-transition:enter-start="opacity-0 scale-90"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="transition ease-in duration-100"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-90"
                                                                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 z-10 w-8 h-8 rounded-full bg-white shadow-md flex items-center justify-center transition-all hover:shadow-lg"
                                                                style="display:none;border:1px solid rgba(27,58,107,.15)"
                                                                aria-label="Scroll right">
                                                                <svg width="14" height="14" fill="none"
                                                                    viewBox="0 0 24 24" stroke="#1b3a6b"
                                                                    stroke-width="2.5">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        @if ($obj->videos->count() > 2)
                                                            <div class="flex items-center justify-center gap-1.5 mt-3">
                                                                @foreach ($obj->videos as $v)
                                                                    <div
                                                                        class="w-1.5 h-1.5 rounded-full bg-[rgba(27,58,107,.15)]">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="mx-5 mb-5 rounded-xl p-8 text-center">
                                                        <p
                                                            class="font-['Instrument_Serif',serif] italic text-2xl md:text-3xl text-[#1b3a6b] mb-3">
                                                            No videos available yet
                                                        </p>

                                                        <p class="text-base text-[#36588d] mb-6">
                                                            Be the first to upload a video for this Learning Objective.
                                                        </p>

                                                        <a href="{{ \App\Filament\Student\Resources\Videos\VideoResource::getUrl('index', panel: App\Enums\Panel::MEMBER->value) }}"
                                                            class="inline-flex items-center rounded-lg bg-[#1b3a6b] px-6 py-3 text-white font-medium hover:bg-[#163057] transition">
                                                            Upload a Video
                                                        </a>
                                                    </div>
                                                @endif
                                                {{-- ── End of LO CTA ── --}}
                                                <div class="flex flex-wrap items-center justify-between gap-3 px-5 py-3"
                                                    style="border-top:1px solid rgba(27,58,107,.07);"
                                                    x-data="{
                                                        status: '{{ $objectiveProgress[$obj->id] ?? '' }}',
                                                        isAuth: {{ auth()->check() ? 'true' : 'false' }},
                                                        handle(key) {
                                                            if (!this.isAuth) return;
                                                            const next = this.status === key ? null : key;
                                                            this.status = next;
                                                            $wire.setObjectiveProgress({{ $obj->id }}, next);
                                                        }
                                                    }">
                                                    {{-- Progress radio toggles --}}
                                                    <div class="flex items-center gap-2 disabled">
                                                        <span
                                                            class="text-[.65rem] font-bold text-[#1b3a6b] uppercase tracking-wider">Progress:</span>
                                                        <template
                                                            x-for="opt in [
            { key: 'behind',   label: 'Falling Behind',     active: 'bg-red-50 text-red-600 border-red-300',             idle: 'text-[#1b3a6b] border-[rgba(27,58,107,.25)]' },
            { key: 'practice', label: 'Need More Practice',  active: 'bg-amber-50 text-amber-600 border-amber-300',       idle: 'text-[#1b3a6b] border-[rgba(27,58,107,.25)]' },
            { key: 'mastery',  label: 'Mastery Reached',     active: 'bg-emerald-50 text-emerald-600 border-emerald-300', idle: 'text-[#1b3a6b] border-[rgba(27,58,107,.25)]' }
        ]"
                                                            :key="opt.key">
                                                            <button type="button" {{-- @click="handle(opt.key)" --}} disabled
                                                                {{-- :disabled="!isAuth" --}}
                                                                :class="!isAuth
                                                                    ?
                                                                    'opacity-40 cursor-not-allowed bg-slate-50 text-[#94a3b8] border-[#e2e8f0]' :
                                                                    status === opt.key ?
                                                                    opt.active + ' font-extrabold cursor-pointer' :
                                                                    opt.idle +
                                                                    ' font-bold bg-white hover:bg-[#eff6ff] cursor-pointer'"
                                                                class="text-[.65rem] px-2.5 py-1 rounded-full border transition-all duration-150 font-semibold"
                                                                x-text="opt.label">
                                                            </button>
                                                        </template>
                                                    </div>
                                                    {{-- Take Quiz button --}}
                                                    @if ($obj->quiz)
                                                        <a target="_blank"
                                                            href="{{ App\Filament\Student\Pages\TakeQuiz::getUrl(['quiz' => $obj->quiz->id], panel: App\Enums\Panel::MEMBER->value) }}"
                                                            class="inline-flex items-center gap-1.5 text-[.75rem] font-bold text-white rounded-[10px] px-3.5 py-2 transition-all duration-200 hover:opacity-90 active:scale-95 shrink-0"
                                                            style="background:#1b3a6b;">
                                                            <svg width="13" height="13" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12l2 2 4-4M7 20H5a2 2 0 01-2-2V6a2 2 0 012-2h11l4 4v12a2 2 0 01-2 2h-2" />
                                                            </svg>
                                                            Take Quiz
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @empty
                                            <div
                                                class="px-6 py-5 font-['Instrument_Serif',serif] italic text-sm text-[#94a3b8]">
                                                No objectives yet.</div>
                                        @endforelse
                                    </div>
                                </div>
                                {{-- ── End of Chapter CTA ── --}}
                                <div class="flex items-center justify-end px-5 py-3"
                                    style="border-top:1px solid rgba(27,58,107,.1);background:rgba(248,250,253,.7);">
                                    <a href="{{ $chapter->quiz_link }}" target="_blank"
                                        class="inline-flex items-center gap-1.5 text-[.75rem] font-bold rounded-[10px] px-3.5 py-2 transition-all duration-200 hover:opacity-90 active:scale-95"
                                        style="background:rgba(27,58,107,.08);color:#1b3a6b;border:1px solid rgba(27,58,107,.15);">
                                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        Take Test
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="font-['Instrument_Serif',serif] italic text-sm text-[#94a3b8] py-2">No chapters
                                in this section yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- ── End of Section CTA ── --}}
            <div class="flex items-center justify-end px-6 py-3.5"
                style="border-top:1px solid rgba(27,58,107,.12);background:rgba(27,58,107,.02);">
                <a href="{{ $section->quiz_link }}" target="_blank"
                    class="inline-flex items-center gap-2 text-[.8rem] font-bold text-white rounded-xl px-4 py-2.5 transition-all duration-200 hover:opacity-90 active:scale-95"
                    style="background:linear-gradient(135deg,#1b3a6b 0%,#2d5499 100%);box-shadow:0 2px 8px rgba(27,58,107,.25);">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    Take Exam
                </a>
            </div>
        </div>
    @empty
        <div class="text-center py-20 font-['Instrument_Serif',serif] italic text-2xl text-[#94a3b8]">
            No sections yet <span class="text-[#f59e0b]">✦</span>
        </div>
    @endforelse

    {{-- Course Past Papers CTA --}}
    @if ($course->quiz_link)
        <div class="flex items-center justify-between gap-4 mt-4 px-6 py-4 rounded-2xl"
            style="background:rgba(27,58,107,.04);border:1px solid rgba(27,58,107,.12);">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0"
                    style="background:linear-gradient(135deg,#1b3a6b 0%,#2d5499 100%);box-shadow:0 2px 8px rgba(27,58,107,.25);">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="white"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[.85rem] font-extrabold text-[#0f172a] tracking-tight">Past Papers</p>
                    <p class="text-[.72rem] text-[#94a3b8]">Practice with real past exam questions</p>
                </div>
            </div>
            <a href="{{ $course->quiz_link }}" target="_blank"
                class="inline-flex items-center gap-2 text-[.8rem] font-bold text-white rounded-xl px-5 py-2.5 transition-all duration-200 hover:opacity-90 active:scale-95 shrink-0"
                style="background:linear-gradient(135deg,#1b3a6b 0%,#2d5499 100%);box-shadow:0 2px 8px rgba(27,58,107,.25);">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                View Past Papers
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12" />
                </svg>
            </a>
        </div>
    @endif

    @php
        $settings = getHomePageSettings();
    @endphp

    {{-- Manifesto --}}
    <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
        <div class="relative z-10">
            <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.4] max-w-160 mx-auto"
                style="font-size:clamp(1.6rem,3vw,2.25rem)">
                {!! str($settings->manifesto_quote) !!}
            </p>
            <div class="w-12 h-0.5 rounded mx-auto my-5" style="background:rgba(245,158,11,.4)"></div>
            <p class="text-sm text-white/45 max-w-115 mx-auto leading-relaxed">
                Submit a video solution to any objective. Once approved by a maintainer, you unlock the full course.
            </p>
            <button
                class="mt-7 relative z-10 bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-9 py-3 text-sm cursor-pointer transition-colors">
                Submit a video
            </button>
        </div>
    </div>
</main>
