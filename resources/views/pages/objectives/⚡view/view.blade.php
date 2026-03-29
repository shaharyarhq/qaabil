<div>
    <!-- ── Hero ────────────────────────────────────────────────────── -->
    <div class="bg-[#1b3a6b] relative overflow-hidden fade-up">
        <div class="absolute rounded-full pointer-events-none"
            style="width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 65%);top:-160px;right:-100px">
        </div>
        <div class="max-w-7xl mx-auto px-6 py-14 relative z-10">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-[.75rem] font-semibold text-white/40 mb-8 flex-wrap">
                <a wire:navigate href="{{ route('courses.index') }}"
                    class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">Courses</a>
                @if ($objective->chapter?->section?->course)
                    <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                    <a wire:navigate href="{{ route('courses.view', $objective->chapter->section->course) }}"
                        class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">
                        {{ $objective->chapter->section->course->name }}
                    </a>
                @endif
                @if ($objective->chapter)
                    <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                    <a wire:navigate
                        href="{{ route('courses.view', $objective->chapter->section->course) }}#{{ Str::slug($objective->chapter->section->name) }}-{{ Str::slug($objective->chapter->name) }}"
                        class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">
                        {{ $objective->chapter->name }}
                    </a>
                @endif
                <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                <span class="text-white/65">{{ $objective->name }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
                {{-- Left --}}
                <div class="max-w-2xl">
                    @if ($objective->chapter)
                        <div
                            class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-white/50 mb-4">
                            <span class="inline-block w-4 h-0.5 rounded-sm bg-[#f59e0b]"></span>
                            {{ $objective->chapter->name }}
                        </div>
                    @endif
                    <h1 class="font-['Instrument_Serif',serif] font-normal text-white leading-[1.1] tracking-tight mb-5"
                        style="font-size:clamp(2.5rem,5vw,3.75rem)">
                        {{ $objective->name }}
                    </h1>
                    @if ($objective->description)
                        <p class="text-white/60 text-base leading-relaxed max-w-[520px]">
                            {{ $objective->description }}
                        </p>
                    @endif
                </div>

                {{-- Stat --}}
                <div class="shrink-0">
                    <div class="text-center min-w-[110px] rounded-2xl px-6 py-[1.1rem]"
                        style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);backdrop-filter:blur(4px)">
                        <div class="font-['Instrument_Serif',serif] text-[2.25rem] text-white leading-none">
                            {{ $this->videos->count() }}
                        </div>
                        <div class="text-[.68rem] text-white/45 mt-1 font-bold uppercase tracking-[.08em]">
                            {{ Str::plural('Video', $this->videos->count()) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Videos grid ─────────────────────────────────────────────── -->
    <main class="max-w-8xl mx-auto px-6 py-14 pb-28">

        {{-- Section header --}}
        <div class="flex items-center justify-between mb-3 flex-wrap gap-3">
            <div class="flex items-center gap-2">
                <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                <h2 class="font-['Instrument_Serif',serif] italic text-[1.9rem] text-[#0f172a]">Videos</h2>
                <span class="text-[#f59e0b]">✦</span>
            </div>
            <div class="hidden md:flex items-center gap-2 text-sm text-[#94a3b8]">
                Showing
                <span class="font-extrabold text-[#1b3a6b] tabular-nums">{{ $this->videos->count() }}</span>
                {{ Str::plural('video', $this->videos->count()) }}
            </div>
        </div>

        {{-- ── Search + Sort + Filters ── --}}
        <div class="mb-3 flex flex-wrap items-center gap-3">

            {{-- Search --}}
            <div
                class="search-wrap flex-1 min-w-[200px] flex items-center gap-3 bg-white border border-[#e2e8f0] rounded-[14px] px-4 py-3 transition-all duration-[.22s]">
                <svg class="shrink-0 text-[#94a3b8]" width="18" height="18" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                </svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search by title or creator…"
                    class="search-input flex-1 bg-transparent text-[.9rem] text-[#0f172a] placeholder-[#cbd5e1]">
                @if ($search)
                    <button wire:click="$set('search', '')"
                        class="shrink-0 w-6 h-6 rounded-full bg-[#f1f5f9] border border-[#e2e8f0] text-[#94a3b8] text-xs flex items-center justify-center"
                        aria-label="Clear">✕</button>
                @endif
            </div>

            {{-- Language --}}
            <div class="relative shrink-0">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" width="13"
                    height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                </svg>
                <select wire:model.live="language"
                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s] ">
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
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" width="13"
                    height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                </svg>
                <select wire:model.live="focus"
                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s] ">
                    <option value="">All focus types</option>
                    <option value="{{ \App\Enums\VideoFocus::LessonFocused->value }}">Lesson Focused</option>
                    <option value="{{ \App\Enums\VideoFocus::QuestionFocused->value }}">Question Focused</option>
                </select>
            </div>

            {{-- Creator --}}
            <div class="relative shrink-0">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" width="13"
                    height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                </svg>
                <select wire:model.live="creator"
                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s] ">
                    <option value="">All creators</option>
                    @foreach ($this->availableCreators as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Sort --}}
            <div class="relative shrink-0">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-[#94a3b8] pointer-events-none" width="13"
                    height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                </svg>
                <select wire:model.live="sort"
                    class="sort-select text-[.8rem] font-bold text-[#0f172a] bg-white border border-[#e2e8f0] rounded-[14px] pl-8 pr-7 py-3 cursor-pointer transition-all duration-[.18s] ">
                    <option value="newest">Newest first</option>
                    <option value="oldest">Oldest first</option>
                    <option value="rating-high">Highest rating first</option>
                    <option value="rating-low">Lowest rating first</option>
                </select>
            </div>
        </div>

        {{-- ── Active filter badges ── --}}
        @php
            $sortLabels = [
                'newest' => 'Newest first',
                'oldest' => 'Oldest first',
                'rating-high' => 'Highest rating first',
                'rating-low' => 'Lowest rating first',
            ];
            $focusLabels = [
                \App\Enums\VideoFocus::LessonFocused->value => 'Lesson Focused',
                \App\Enums\VideoFocus::QuestionFocused->value => 'Question Focused',
            ];
            $hasActiveFilters = $search || $sort !== 'newest' || $language || $focus || $creator;
        @endphp

        @if ($hasActiveFilters)
            <div class="flex flex-wrap items-center gap-2 mb-8 pt-3">
                <span class="text-[.7rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8]">Active
                    filters:</span>

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
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#1b3a6b]/50 hover:text-[#1b3a6b] hover:bg-[rgba(27,58,107,.1)] transition-colors text-[10px]">✕</button>
                    </span>
                @endif

                @if ($language)
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#eff6ff] border border-[rgba(27,58,107,.15)] text-[.75rem] font-semibold text-[#1b3a6b]">
                        {{ config('app.languages.' . $language, $language) }}
                        <button wire:click="$set('language', '')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#1b3a6b]/50 hover:text-[#1b3a6b] hover:bg-[rgba(27,58,107,.1)] transition-colors text-[10px]">✕</button>
                    </span>
                @endif

                @if ($focus)
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#f0fdf4] border border-[rgba(5,150,105,.2)] text-[.75rem] font-semibold text-[#059669]">
                        {{ $focusLabels[$focus] ?? $focus }}
                        <button wire:click="$set('focus', '')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#059669]/50 hover:text-[#059669] hover:bg-[rgba(5,150,105,.1)] transition-colors text-[10px]">✕</button>
                    </span>
                @endif

                @if ($creator)
                    @php $creatorName = $this->availableCreators->firstWhere('id', $creator)?->name ?? 'Unknown'; @endphp
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#fffbeb] border border-[rgba(245,158,11,.25)] text-[.75rem] font-semibold text-[#b45309]">
                        {{ $creatorName }}
                        <button wire:click="$set('creator', '')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#b45309]/50 hover:text-[#b45309] hover:bg-[rgba(245,158,11,.15)] transition-colors text-[10px]">✕</button>
                    </span>
                @endif

                @if ($sort !== 'newest')
                    <span
                        class="inline-flex items-center gap-1.5 pl-2.5 pr-1.5 py-1 rounded-lg bg-[#fffbeb] border border-[rgba(245,158,11,.25)] text-[.75rem] font-semibold text-[#b45309]">
                        <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5" class="opacity-50">
                            <path stroke-linecap="round" d="M3 6h18M6 12h12M9 18h6" />
                        </svg>
                        {{ $sortLabels[$sort] }}
                        <button wire:click="$set('sort', 'newest')"
                            class="ml-0.5 w-4 h-4 rounded flex items-center justify-center text-[#b45309]/50 hover:text-[#b45309] hover:bg-[rgba(245,158,11,.15)] transition-colors text-[10px]">✕</button>
                    </span>
                @endif

                <button wire:click="resetAll"
                    class="ml-1 text-[.72rem] font-bold text-[#94a3b8] hover:text-[#dc2626] transition-colors underline underline-offset-2">
                    Clear all
                </button>
            </div>
        @else
            <div class="mb-8"></div>
        @endif

        {{-- Grid --}}
        @if ($this->videos->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5"
                wire:loading.class="opacity-35 pointer-events-none" wire:target="search, sort">
                @foreach ($this->videos as $i => $video)
                    @php
                        preg_match(
                            '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/',
                            $video->video_url ?? '',
                            $matches,
                        );
                        $videoId = $matches[1] ?? null;
                        $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
                        $status =
                            $video->status instanceof \App\Enums\VideoStatus
                                ? $video->status->value
                                : (string) $video->status;
                    @endphp

                    <a wire:navigate wire:key="video-{{ $video->id }}" href="{{ route('videos.view', $video) }}"
                        class="video-card d{{ min($i + 1, 6) }} group flex flex-col rounded-[16px] overflow-hidden no-underline transition-all duration-[.22s] hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,.35)]"
                        style="background:#0f172a;">

                        {{-- Thumbnail --}}
                        <div class="relative w-full overflow-hidden" style="aspect-ratio:16/9;background:#1e293b;">
                            @if ($thumbnail)
                                <img src="{{ $thumbnail }}" alt="{{ $video->title }}" loading="lazy"
                                    class="w-full h-full object-cover transition-all duration-300 group-hover:opacity-75 group-hover:scale-[1.03]">
                            @else
                                <div class="w-full h-full flex items-center justify-center"
                                    style="background:rgba(27,58,107,.15)">
                                    <span class="text-white/20 text-xs">No thumbnail</span>
                                </div>
                            @endif

                            {{-- Play overlay --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-[.22s]">
                                <div
                                    class="w-11 h-11 rounded-full flex items-center justify-center bg-[rgba(245,158,11,.9)] backdrop-blur-sm shadow-lg">
                                    <svg width="15" height="15" viewBox="0 0 16 16" fill="#1b3a6b">
                                        <path d="M4 2.5l9 5.5-9 5.5V2.5z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Status badge --}}
                            <div class="absolute top-2 right-2">
                                @if ($status === 'approved')
                                    <span class="text-[.65rem] font-bold px-2 py-0.5 rounded-full text-[#f59e0b]"
                                        style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">approved</span>
                                @elseif ($status === 'pending')
                                    <span class="text-[.65rem] font-bold px-2 py-0.5 rounded-full text-white/50"
                                        style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1)">pending</span>
                                @endif
                            </div>
                        </div>

                        {{-- Card body --}}
                        <div class="px-4 py-3 flex flex-col gap-1 flex-1">
                            <p class="text-sm font-semibold leading-snug line-clamp-2 text-white/85">
                                {{ $video->title ?? 'Untitled Video' }}
                            </p>

                            {{-- ── Stars ── --}}
                            @php
                                $reviews = $video->reviews ?? collect();
                                $total = $reviews->count();
                                $avgRating =
                                    $total > 0
                                        ? round(
                                            $reviews->map(fn($r) => optional($r->ratings->first())->value ?? 0)->avg(),
                                            1,
                                        )
                                        : null;
                            @endphp
                            @if ($avgRating !== null)
                                <div class="flex items-center gap-1 mt-0.5">
                                    <div class="flex items-center gap-0.5">
                                        @for ($s = 1; $s <= 5; $s++)
                                            <svg width="14" height="14" viewBox="0 0 20 20"
                                                fill="{{ $s <= round($avgRating) ? '#f59e0b' : 'rgba(255,255,255,0.15)' }}">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <span
                                        class="text-[.7rem] font-bold text-[#f59e0b]">{{ number_format($avgRating, 1) }}</span>
                                    <span class="text-[.7rem] text-white/25">({{ $total }})</span>
                                </div>
                            @else
                                <p class="text-[.6rem] text-white/20 italic">No ratings yet</p>
                            @endif

                            <div class="flex items-center justify-between mt-auto pt-2">
                                @if ($video->creator)
                                    <p class="text-[11px] text-white/30">{{ $video->creator->name }}</p>
                                @else
                                    <span></span>
                                @endif
                                <p class="text-[11px] text-white/25">{{ $video->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="py-20 text-center">
                @if ($search)
                    <span
                        class="font-['Instrument_Serif',serif] italic text-5xl block mb-4 text-[#f59e0b]/20">🔍</span>
                    <p class="font-['Instrument_Serif',serif] italic text-2xl text-[#94a3b8] mb-2">No videos found</p>
                    <p class="text-sm text-[#94a3b8]/70 mb-5">No Videos match "{{ $search }}".</p>
                    <button wire:click="$set('search', '')"
                        class="px-5 py-2 rounded-xl bg-[#1b3a6b] text-white text-sm font-bold transition-opacity hover:opacity-80">
                        Clear search
                    </button>
                @else
                    <span class="font-['Instrument_Serif',serif] italic text-5xl block mb-4 text-[#f59e0b]/20">✦</span>
                    <p class="font-['Instrument_Serif',serif] italic text-2xl text-[#94a3b8] mb-2">No videos yet</p>
                    <p class="text-sm text-[#94a3b8]/70">Be the first to submit a video for this objective.</p>
                @endif
            </div>
        @endif

        {{-- CTA banner --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center fade-up"
            style="animation-delay:.2s">
            <div class="relative z-10">
                <span class="font-['Instrument_Serif',serif] italic text-5xl text-[#f59e0b] block mb-4">✦</span>
                <h3 class="font-['Instrument_Serif',serif] text-[1.9rem] text-white mb-3 leading-snug">
                    Think you can do it?
                </h3>
                <p class="text-[.85rem] text-white/45 max-w-sm mx-auto leading-relaxed mb-6">
                    Submit a video solution for
                    <span class="text-white/80">{{ $objective->name }}</span>.
                    Get it approved and unlock the full course.
                </p>
                <button
                    class="bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-9 py-3 text-sm cursor-pointer transition-colors">
                    Submit a video
                </button>
            </div>
        </div>

    </main>
</div>
