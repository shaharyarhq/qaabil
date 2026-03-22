<div x-data="courseSearch()" @keydown.escape.window="closeAll()">
    <!-- ── Hero ──────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden fade-up">
        <div class="absolute rounded-full pointer-events-none"
            style="width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 65%);top:-160px;right:-100px">
        </div>
        <div class="max-w-7xl mx-auto px-6 py-14 relative z-10">
            <div class="flex items-center gap-2 mb-8 text-[.75rem] font-semibold text-white/40">
                <a wire:navigate href="{{ route('courses.index') }}"
                    class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">Courses</a>
                <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                <span class="text-white/65">{{ $course->name }}</span>
            </div>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-white/50 mb-4">
                        <span class="inline-block w-4 h-0.5 rounded-sm bg-[#f59e0b]"></span>
                        Course
                    </div>
                    <h1 class="font-['Instrument_Serif',serif] font-normal text-white leading-[1.1] tracking-tight mb-5"
                        style="font-size:clamp(2.5rem,5vw,3.75rem)">
                        {{ $course->name }}
                    </h1>
                    <p class="text-white/60 text-base leading-relaxed max-w-[520px]">
                        {{ $course->description }}
                    </p>
                </div>
                <div class="flex flex-wrap gap-3 lg:justify-end shrink-0">
                    @foreach ([[$course->sections_count, Str::plural('Section', $course->sections_count)], [$course->chapters_count, Str::plural('Chapter', $course->chapters_count)], [$course->videos_count ?? 0, 'Videos']] as [$num, $label])
                        <div class="text-center min-w-[100px] rounded-2xl px-6 py-[1.1rem]"
                            style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);backdrop-filter:blur(4px)">
                            <div class="font-['Instrument_Serif',serif] text-[2.25rem] text-white leading-none">
                                {{ $num }}</div>
                            <div class="text-[.68rem] text-white/45 mt-1 font-bold uppercase tracking-[.08em]">
                                {{ $label }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- ── Content ────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        {{-- ── Section header + jump-to trigger ── --}}
        <div class="mb-10">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                <span class="text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b]">Course content</span>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Sections <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">&
                        Chapters</span>
                </h2>

                <button @click="openJump()"
                    class="inline-flex items-center gap-2.5 px-4 py-2.5 bg-white border border-[#e2e8f0] rounded-[12px] text-[.82rem] font-semibold text-[#94a3b8] transition-all hover:border-[rgba(27,58,107,.3)] hover:text-[#1b3a6b] hover:shadow-sm"
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
                {{-- Input --}}
                <div class="flex items-center gap-3 px-4 py-3.5 border-b border-[#e2e8f0]">
                    <svg class="shrink-0 text-[#94a3b8]" width="17" height="17" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
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

                {{-- Results --}}
                <div class="max-h-[360px] overflow-y-auto">
                    <template x-if="jumpResults.length === 0">
                        <div
                            class="px-5 py-8 text-center text-sm text-[#94a3b8] font-['Instrument_Serif',serif] italic">
                            Nothing found for "<span x-text="jumpQuery"></span>"
                        </div>
                    </template>
                    <template x-for="(item, idx) in jumpResults" :key="item.id">
                        <a :href="item.href" @click="closeAll()"
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
                                <span
                                    x-text="item.type === 'section' ? 'S' : item.type === 'chapter' ? 'C' : 'O'"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[.85rem] font-semibold text-[#0f172a] truncate" x-text="item.label">
                                </div>
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

                {{-- Footer --}}
                <div
                    class="px-4 py-2.5 border-t border-[#e2e8f0] flex items-center gap-4 text-[.68rem] text-[#94a3b8]">
                    <span><kbd class="font-bold">↑↓</kbd> navigate</span>
                    <span><kbd class="font-bold">↵</kbd> jump</span>
                    <span><kbd class="font-bold">Esc</kbd> close</span>
                </div>
            </div>
        </div>

        {{-- Sections --}}
        @forelse ($course->sections as $sectionIndex => $section)
            <div id="{{ Str::slug($section->name) }}"
                class="fade-up d{{ min($sectionIndex + 1, 5) }} mb-10 scroll-mt-24">

                <div class="flex items-center gap-2.5 pb-3 mb-3 border-b-2 border-[#e2e8f0]">
                    <span
                        class="text-[.68rem] font-extrabold uppercase tracking-[.08em] text-[#1b3a6b] bg-[#eff6ff] border border-[rgba(27,58,107,.12)] rounded-md px-2.5 py-0.5">
                        Section {{ $sectionIndex + 1 }}
                    </span>
                    <a href="#{{ Str::slug($section->name) }}"
                        class="text-base font-extrabold text-[#0f172a] tracking-tight">{{ $section->name }}</a>
                    <span class="text-[.75rem] font-semibold text-[#94a3b8] ml-auto">
                        {{ $section->chapters->count() }} {{ Str::plural('chapter', $section->chapters->count()) }}
                    </span>
                </div>

                @php
                    $chapterOffset = 0;
                    foreach ($course->sections->take($sectionIndex) as $prev) {
                        $chapterOffset += $prev->chapters->count();
                    }
                @endphp

                <div class="flex flex-col gap-3">
                    @forelse ($section->chapters as $chapterIndex => $chapter)
                        <div id="{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}"
                            class="chapter-item bg-white border border-[#e2e8f0] rounded-2xl overflow-hidden transition-colors hover:border-[rgba(27,58,107,.22)] fade-up scroll-mt-24">

                            <button
                                class="chapter-toggle w-full flex items-center justify-between gap-4 px-6 py-5 bg-transparent border-none cursor-pointer text-left transition-colors"
                                aria-expanded="false" onclick="toggleChapter(this)">
                                <div class="flex items-center gap-4 min-w-0">
                                    <div class="chapter-num w-9 h-9 rounded-[10px] flex items-center justify-center flex-shrink-0 font-['Instrument_Serif',serif] text-[.9rem] font-bold transition-colors"
                                        style="background:rgba(27,58,107,.08);color:#1b3a6b;border:1px solid rgba(27,58,107,.12)">
                                        {{ $chapterOffset + $chapterIndex + 1 }}
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-base font-bold text-[#0f172a] tracking-tight truncate">
                                            {{ $chapter->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 shrink-0">
                                    <span class="hidden sm:block text-[.75rem] font-semibold text-[#94a3b8]">
                                        {{ $chapter->objectives->count() }}
                                        {{ Str::plural('objective', $chapter->objectives->count()) }}
                                    </span>
                                    <svg class="chevron w-[18px] h-[18px] shrink-0 text-[#94a3b8] transition-all duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </button>

                            <div class="chapter-body">
                                <div class="chapter-body-inner">
                                    @forelse ($chapter->objectives as $obj)
                                        <div id="{{ Str::slug($obj->name) }}"
                                            class="border-t border-[#e2e8f0] transition-colors hover:bg-[rgba(239,246,255,.5)] flex flex-col scroll-mt-24">

                                            <div class="w-full flex justify-between">
                                                <div class="flex items-start gap-3 px-5 py-4">
                                                    <div class="w-[22px] h-[22px] rounded-full flex items-center justify-center shrink-0 mt-1"
                                                        style="border:1.5px solid rgba(27,58,107,.2)">
                                                        <div class="w-2 h-2 rounded-full bg-[#1b3a6b] opacity-35">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="text-sm font-semibold text-[#0f172a] leading-relaxed">
                                                            {{ $obj->name }}</p>
                                                        @if ($obj->description)
                                                            <p class="text-xs text-[#94a3b8] mt-0.5 leading-relaxed">
                                                                {{ $obj->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2 px-5 py-4 shrink-0">
                                                    <a wire:navigate href="{{ route('objectives.view', [$obj]) }}"
                                                        class="text-[.775rem] font-bold text-[#1b3a6b] no-underline transition-colors hover:text-[#d97706]">
                                                        All videos
                                                    </a>
                                                    <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                                                </div>
                                            </div>

                                            @if ($obj->videos->isNotEmpty())
                                                {{-- Slider --}}
                                                <div class="px-5 pb-5" x-data="{
                                                    scroll(dir) {
                                                            const track = $refs.track;
                                                            const card = track.querySelector('a');
                                                            const gap = 12;
                                                            const step = card ? (card.offsetWidth + gap) * 2 : 460;
                                                            track.scrollBy({ left: dir * step, behavior: 'smooth' });
                                                        },
                                                        get canPrev() {
                                                            return this.$refs.track?.scrollLeft > 4;
                                                        },
                                                        get canNext() {
                                                            const t = this.$refs.track;
                                                            return t ? t.scrollLeft < t.scrollWidth - t.clientWidth - 4 : false;
                                                        },
                                                        atStart: true,
                                                        atEnd: false,
                                                        update() {
                                                            const t = this.$refs.track;
                                                            if (!t) return;
                                                            this.atStart = t.scrollLeft <= 4;
                                                            this.atEnd = t.scrollLeft >= t.scrollWidth - t.clientWidth - 4;
                                                        }
                                                }"
                                                    x-init="$nextTick(() => update())">
                                                    <div class="relative group/slider">

                                                        {{-- Prev button --}}
                                                        <button @click="scroll(-1); $nextTick(() => update())"
                                                            x-show="!atStart"
                                                            x-transition:enter="transition ease-out duration-150"
                                                            x-transition:enter-start="opacity-0 scale-90"
                                                            x-transition:enter-end="opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100 scale-100"
                                                            x-transition:leave-end="opacity-0 scale-90"
                                                            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 z-10 w-8 h-8 rounded-full bg-white border border-[#e2e8f0] shadow-md flex items-center justify-center transition-all hover:border-[#1b3a6b] hover:shadow-lg"
                                                            style="display:none" aria-label="Scroll left">
                                                            <svg width="14" height="14" fill="none"
                                                                viewBox="0 0 24 24" stroke="#1b3a6b"
                                                                stroke-width="2.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 19l-7-7 7-7" />
                                                            </svg>
                                                        </button>

                                                        {{-- Track --}}
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
                                                                @endphp

                                                                <a wire:navigate
                                                                    href="{{ route('videos.view', [$video]) }}"
                                                                    class="flex-shrink-0 rounded-xl overflow-hidden relative group cursor-pointer transition-transform duration-200 hover:-translate-y-0.5"
                                                                    style="width:220px;background:#0f172a;border:1px solid rgba(27,58,107,.2);">

                                                                    {{-- Thumbnail --}}
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

                                                                    {{-- Play overlay --}}
                                                                    <div
                                                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                                        <div
                                                                            class="w-10 h-10 rounded-full flex items-center justify-center bg-[rgba(245,158,11,.9)] backdrop-blur-sm">
                                                                            <svg width="14" height="14"
                                                                                viewBox="0 0 14 14" fill="#1b3a6b">
                                                                                <path d="M3 2l9 5-9 5V2z" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>

                                                                    {{-- Status badge --}}
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

                                                                    {{-- Info --}}
                                                                    <div class="px-3 py-2.5">
                                                                        <p
                                                                            class="text-[.7rem] text-white/80 leading-snug line-clamp-2">
                                                                            {{ $video->title ?? 'Untitled submission' }}
                                                                        </p>
                                                                        @if ($video->creator)
                                                                            <p
                                                                                class="text-[.65rem] mt-0.5 text-white/30">
                                                                                {{ $video->creator->name }}</p>
                                                                        @endif
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>

                                                        {{-- Next button --}}
                                                        <button @click="scroll(1); $nextTick(() => update())"
                                                            x-show="!atEnd"
                                                            x-transition:enter="transition ease-out duration-150"
                                                            x-transition:enter-start="opacity-0 scale-90"
                                                            x-transition:enter-end="opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100 scale-100"
                                                            x-transition:leave-end="opacity-0 scale-90"
                                                            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 z-10 w-8 h-8 rounded-full bg-white border border-[#e2e8f0] shadow-md flex items-center justify-center transition-all hover:border-[#1b3a6b] hover:shadow-lg"
                                                            style="display:none" aria-label="Scroll right">
                                                            <svg width="14" height="14" fill="none"
                                                                viewBox="0 0 24 24" stroke="#1b3a6b"
                                                                stroke-width="2.5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 5l7 7-7 7" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    {{-- Dot indicators --}}
                                                    @if ($obj->videos->count() > 2)
                                                        <div class="flex items-center justify-center gap-1.5 mt-3">
                                                            @foreach ($obj->videos as $v)
                                                                <div class="w-1.5 h-1.5 rounded-full bg-[#e2e8f0]">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="px-5 pb-4">
                                                    <p
                                                        class="font-['Instrument_Serif',serif] italic text-[.825rem] text-[#94a3b8]">
                                                        No videos submitted yet.
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    @empty
                                        <div
                                            class="px-6 py-5 font-['Instrument_Serif',serif] italic text-sm text-[#94a3b8]">
                                            No objectives yet.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="font-['Instrument_Serif',serif] italic text-sm text-[#94a3b8] py-2">
                            No chapters in this section yet.
                        </p>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="text-center py-20 font-['Instrument_Serif',serif] italic text-2xl text-[#94a3b8]">
                No sections yet <span class="text-[#f59e0b]">✦</span>
            </div>
        @endforelse

        {{-- Manifesto --}}
        <div class="manifesto mt-6 bg-[#1b3a6b] rounded-3xl relative overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-relaxed max-w-[560px] mx-auto"
                    style="font-size:clamp(1.4rem,2.5vw,1.9rem)">
                    " upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter "
                </p>
                <div class="w-10 h-0.5 rounded mx-auto my-4 bg-[rgba(245,158,11,.4)]"></div>
                <p class="text-sm text-white/45 max-w-[460px] mx-auto leading-relaxed">
                    Submit a video solution to any objective. Once approved by a maintainer, you unlock the full course.
                </p>
                <button
                    class="mt-7 relative z-10 bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-9 py-3 text-sm cursor-pointer transition-colors">
                    Submit a video
                </button>
            </div>
        </div>
    </main>

    <script>
        function toggleChapter(btn) {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.nextElementSibling.classList.toggle('open', !expanded);
        }
        document.addEventListener('DOMContentLoaded', () => {
            const first = document.querySelector('.chapter-toggle');
            if (first) toggleChapter(first);
        });

        function courseSearch() {
            const items = [];

            @foreach ($course->sections as $sectionIndex => $section)
                items.push({
                    id: 'section-{{ $section->id }}',
                    type: 'section',
                    label: @js($section->name),
                    sub: 'Section {{ $sectionIndex + 1 }} · {{ $section->chapters->count() }} {{ Str::plural('chapter', $section->chapters->count()) }}',
                    href: '#{{ Str::slug($section->name) }}',
                });
                @foreach ($section->chapters as $chapterIndex => $chapter)
                    items.push({
                        id: 'chapter-{{ $chapter->id }}',
                        type: 'chapter',
                        label: @js($chapter->name),
                        sub: '{{ $section->name }} · {{ $chapter->objectives->count() }} {{ Str::plural('objective', $chapter->objectives->count()) }}',
                        href: '#{{ Str::slug($section->name) }}-{{ Str::slug($chapter->name) }}',
                    });
                    @foreach ($chapter->objectives as $obj)
                        items.push({
                            id: 'obj-{{ $obj->id }}',
                            type: 'objective',
                            label: @js($obj->name),
                            sub: '{{ $chapter->name }}',
                            href: '#{{ Str::slug($obj->name) }}',
                        });
                    @endforeach
                @endforeach
            @endforeach

            return {
                jumpOpen: false,
                jumpQuery: '',
                jumpResults: items,
                activeIdx: 0,
                allItems: items,

                openJump() {
                    this.jumpOpen = true;
                    this.jumpQuery = '';
                    this.jumpResults = this.allItems;
                    this.activeIdx = 0;
                    this.$nextTick(() => this.$refs.jumpInput?.focus());
                },

                closeAll() {
                    this.jumpOpen = false;
                },

                filterJump() {
                    const q = this.jumpQuery.toLowerCase().trim();
                    this.jumpResults = q ?
                        this.allItems.filter(i =>
                            i.label.toLowerCase().includes(q) ||
                            i.sub.toLowerCase().includes(q)
                        ) :
                        this.allItems;
                    this.activeIdx = 0;
                },

                handleKey(e) {
                    if (!this.jumpOpen) {
                        if (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement
                            .tagName !== 'TEXTAREA') {
                            e.preventDefault();
                            this.openJump();
                        }
                        return;
                    }
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        this.activeIdx = Math.min(this.activeIdx + 1, this.jumpResults.length - 1);
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        this.activeIdx = Math.max(this.activeIdx - 1, 0);
                    } else if (e.key === 'Enter') {
                        const item = this.jumpResults[this.activeIdx];
                        if (item) {
                            window.location.hash = item.href.slice(1);
                            this.closeAll();
                        }
                    }
                },
            };
        }
    </script>
</div>
