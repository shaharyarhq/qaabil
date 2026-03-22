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
                            {{ $objective->videos->count() }}
                        </div>
                        <div class="text-[.68rem] text-white/45 mt-1 font-bold uppercase tracking-[.08em]">
                            {{ Str::plural('Submission', $objective->videos->count()) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Videos grid ─────────────────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        @php
            $libraryId = config('filesystems.disks.bunny_stream.library_id');
            $cdnHost = config('filesystems.disks.bunny_stream.hostname');
        @endphp

        {{-- Section header + filter pills --}}
        <div class="flex items-center justify-between mb-8 flex-wrap gap-3">
            <div class="flex items-center gap-2">
                <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                <h2 class="font-['Instrument_Serif',serif] italic text-[1.9rem] text-[#0f172a]">Submissions</h2>
                <span class="text-[#f59e0b]">✦</span>
            </div>

            @if ($objective->videos->isNotEmpty())
                <div class="flex items-center gap-2 text-xs font-bold" x-data>
                    <button onclick="filterVideos('all')" id="f-all"
                        class="filter-btn active-filter px-4 py-1.5 rounded-full border transition-all">All</button>
                    <button onclick="filterVideos('approved')" id="f-approved"
                        class="filter-btn px-4 py-1.5 rounded-full border border-[#e2e8f0] text-[#94a3b8] transition-all">Approved</button>
                    <button onclick="filterVideos('pending')" id="f-pending"
                        class="filter-btn px-4 py-1.5 rounded-full border border-[#e2e8f0] text-[#94a3b8] transition-all">Pending</button>
                </div>
            @endif
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" id="video-grid">
            @forelse ($objective->videos as $i => $video)
                @php
                    $status =
                        $video->status instanceof \App\Enums\VideoStatus
                            ? $video->status->value
                            : (string) $video->status;
                    $guid = $video->video_url;
                    $thumb = $video->thumbnail_url ?? 'thumbnail.jpg';
                    $thumbUrl = "https://{$cdnHost}/{$guid}/{$thumb}";
                @endphp

                <a wire:navigate href="{{ route('videos.view', $video) }}"
                    class="video-card d{{ min($i + 1, 6) }} group flex flex-col rounded-[16px] overflow-hidden no-underline transition-all duration-[.22s] hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,.35)]"
                    style="background:#0f172a;" data-status="{{ $status }}">

                    {{-- Thumbnail --}}
                    <div class="relative w-full overflow-hidden" style="aspect-ratio:16/9;background:#1e293b;">
                        <img src="{{ $thumbUrl }}" alt="{{ $video->title }}" loading="lazy"
                            class="w-full h-full object-cover transition-all duration-300 group-hover:opacity-75 group-hover:scale-[1.03]">

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
                        <div class="absolute top-3 left-3">
                            @if ($status === 'approved')
                                <span
                                    class="inline-flex items-center gap-1 text-[.65rem] font-bold uppercase tracking-[.06em] px-2.5 py-[.2rem] rounded-full text-[#f59e0b]"
                                    style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">
                                    <span class="w-[5px] h-[5px] rounded-full bg-[#f59e0b]"></span>
                                    approved
                                </span>
                            @elseif ($status === 'pending')
                                <span
                                    class="inline-flex items-center gap-1 text-[.65rem] font-bold uppercase tracking-[.06em] px-2.5 py-[.2rem] rounded-full text-white/45"
                                    style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1)">
                                    <span class="w-[5px] h-[5px] rounded-full bg-white/30"></span>
                                    pending
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1 text-[.65rem] font-bold uppercase tracking-[.06em] px-2.5 py-[.2rem] rounded-full text-[#e06060]"
                                    style="background:rgba(200,60,60,.1);border:1px solid rgba(200,60,60,.2)">
                                    {{ $status }}
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Card body --}}
                    <div class="px-4 py-3 flex flex-col gap-1 flex-1">
                        <p class="text-sm font-semibold leading-snug line-clamp-2 text-white/85">
                            {{ $video->title ?? 'Untitled submission' }}
                        </p>
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

            @empty
                <div class="col-span-full py-20 text-center">
                    <span class="font-['Instrument_Serif',serif] italic text-5xl block mb-4 text-[#f59e0b]/20">✦</span>
                    <p class="font-['Instrument_Serif',serif] italic text-2xl text-[#94a3b8] mb-2">No submissions yet
                    </p>
                    <p class="text-sm text-[#94a3b8]/70">Be the first to submit a video for this objective.</p>
                </div>
            @endforelse
        </div>

        {{-- No results after filter --}}
        <div id="no-filter-results" class="hidden text-center py-16">
            <p class="font-['Instrument_Serif',serif] italic text-xl text-[#94a3b8]">No videos match that filter.</p>
        </div>

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

    <script>
        function filterVideos(status) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active-filter');
            });
            const active = document.getElementById('f-' + status);
            if (active) active.classList.add('active-filter');

            const cards = document.querySelectorAll('#video-grid .video-card');
            let visible = 0;
            cards.forEach(card => {
                const match = status === 'all' || card.dataset.status === status;
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            document.getElementById('no-filter-results').classList.toggle('hidden', visible > 0);
        }
    </script>
</div>
