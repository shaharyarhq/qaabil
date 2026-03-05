<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · {{ $course->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Sora:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #c69c5a;
            --dark: #1e1b1a;
            --bg: #faf7f2;
            --muted: rgba(30, 27, 26, .45);
            --border: rgba(198, 156, 90, .18);
            --card: #ffffff;
        }

        body {
            background: var(--bg);
            font-family: 'Sora', sans-serif;
            color: var(--dark);
            -webkit-font-smoothing: antialiased;
        }

        .serif {
            font-family: 'Instrument Serif', serif;
            font-weight: 400;
            letter-spacing: -.02em;
        }

        .serif-italic {
            font-family: 'Instrument Serif', serif;
            font-style: italic;
        }

        nav {
            border-bottom: 1px solid var(--border);
        }

        .btn {
            border-radius: 40px;
            font-size: .8125rem;
            font-weight: 500;
            padding: .45rem 1.25rem;
            transition: background .15s, color .15s, border-color .15s;
            cursor: pointer;
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid rgba(30, 27, 26, .15);
            color: var(--dark);
        }

        .btn-ghost:hover {
            background: var(--dark);
            color: var(--bg);
            border-color: var(--dark);
        }

        .btn-fill {
            background: var(--dark);
            color: #fff;
            border: 1px solid var(--dark);
        }

        .btn-fill:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--dark);
        }

        /* ── Hero ─────────────────────────────────────────── */
        .hero {
            border-bottom: 1px solid var(--border);
            animation: fadeUp .5s ease both;
        }

        /* ── Stat card ────────────────────────────────────── */
        .stat-card {
            background: var(--card);
            border-radius: 14px;
            padding: 1.1rem 1.4rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .035);
            text-align: center;
            min-width: 90px;
        }

        /* ── Chapter accordion ────────────────────────────── */
        .chapter-item {
            background: var(--card);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .035);
            animation: fadeUp .45s ease both;
        }

        .chapter-toggle {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            transition: background .2s;
        }

        .chapter-toggle:hover {
            background: rgba(198, 156, 90, .05);
        }

        .chapter-toggle[aria-expanded="true"] {
            background: rgba(198, 156, 90, .06);
        }

        .chapter-num {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(198, 156, 90, .12);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Instrument Serif', serif;
            font-size: .85rem;
            flex-shrink: 0;
        }

        .chevron {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            color: var(--muted);
            transition: transform .3s ease;
        }

        .chapter-toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
        }

        /* CSS grid trick for smooth expand */
        .chapter-body {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows .3s ease;
        }

        .chapter-body.open {
            grid-template-rows: 1fr;
        }

        .chapter-body-inner {
            overflow: hidden;
        }

        /* ── Objective row ────────────────────────────────── */
        .obj-row {
            display: flex;
            align-items: flex-start;
            gap: .875rem;
            padding: .875rem 1.5rem;
            border-top: 1px solid rgba(30, 27, 26, .05);
            transition: background .2s;
        }

        .obj-row:hover {
            background: rgba(198, 156, 90, .03);
        }

        .obj-dot {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 1.5px solid rgba(198, 156, 90, .35);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .obj-dot-inner {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gold);
            opacity: .4;
        }

        /* ── Animations ───────────────────────────────────── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .d1 {
            animation-delay: .05s
        }

        .d2 {
            animation-delay: .10s
        }

        .d3 {
            animation-delay: .15s
        }

        .d4 {
            animation-delay: .20s
        }

        .d5 {
            animation-delay: .25s
        }

        .divider {
            border-top: 1px solid var(--border);
        }


        /* video card */
        .video-card {
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .video-card:hover {
            /* transform: translateY(-2px);
            box-shadow: 0 12px 24px -6px rgba(0, 0, 0, .35); */
        }

        /* arrow buttons */
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-calc(50% + 12px));
            /* account for pb-2 */
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid rgba(198, 156, 90, .25);
            background: rgba(250, 247, 242, .92);
            color: #1e1b1a;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
            transition: background .15s, border-color .15s;
            z-index: 10;
        }

        .slider-arrow:hover {
            background: #fff;
            border-color: rgba(198, 156, 90, .5);
        }

        /* dot indicators */
        .dot-indicator {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: rgba(30, 27, 26, .15);
            transition: background .25s, transform .25s;
        }

        .dot-indicator.active {
            background: #c69c5a;
            transform: scale(1.3);
        }

        /* obj-row override for the new layout */
        .obj-row {
            border-top: 1px solid rgba(30, 27, 26, .05);
            transition: background .2s;
            align-items: flex-start;
            gap: 0;
            padding: 0;
            /* padding moved inside children */
            flex-direction: column;
        }

        .obj-row:hover {
            background: rgba(198, 156, 90, .025);
        }
    </style>
</head>

<body>

    <!-- ── Navbar ─────────────────────────────────────────────────── -->
    <nav>
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('storage/logo.png') }}" alt="Qaabil" class="h-14 w-auto object-contain">
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-[#1e1b1a]/70">
                <a href="{{ route('courses.index') }}" class="hover:text-[#c69c5a] transition-colors">Courses</a>
                <a href="#" class="hover:text-[#c69c5a] transition-colors">Dashboard</a>
                <a href="#" class="hover:text-[#c69c5a] transition-colors">Community</a>
            </div>
            <div class="flex items-center gap-2">
                <button class="btn btn-ghost hidden sm:inline-block">Log in</button>
                <button class="btn btn-fill">Sign up</button>
            </div>
        </div>
    </nav>

    <!-- ── Hero ───────────────────────────────────────────────────── -->
    <div class="hero">
        <div class="max-w-7xl mx-auto px-6 py-14">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-xs text-[#1e1b1a]/40 mb-8 font-medium">
                <a href="{{ route('courses.index') }}" class="hover:text-[#c69c5a] transition-colors">Courses</a>
                <span style="color:var(--gold)">✦</span>
                <span>{{ $course->name }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
                <!-- Title + description -->
                <div class="max-w-2xl">
                    <h1 class="serif text-5xl md:text-6xl text-[#1e1b1a] leading-tight mb-5">
                        {{ $course->name }}
                    </h1>
                    <p class="text-[#1e1b1a]/60 text-base leading-relaxed">
                        {{ $course->description }}
                    </p>
                </div>

                <!-- Stats -->
                <div class="flex flex-wrap gap-3 lg:justify-end shrink-0">
                    <div class="stat-card">
                        <div class="serif text-3xl text-[#1e1b1a]">{{ $course->chapters_count }}</div>
                        <div class="text-xs text-[#1e1b1a]/45 mt-1 font-medium uppercase tracking-wide">
                            {{ Str::plural('Chapter', $course->chapters_count) }}
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="serif text-3xl text-[#1e1b1a]">{{ $course->objectives_count ?? 0 }}</div>
                        <div class="text-xs text-[#1e1b1a]/45 mt-1 font-medium uppercase tracking-wide">
                            {{ Str::plural('Objective', $course->objectives_count ?? 0) }}
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="serif text-3xl text-[#1e1b1a]">{{ $course->videos_count ?? 0 }}</div>
                        <div class="text-xs text-[#1e1b1a]/45 mt-1 font-medium uppercase tracking-wide">Videos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Chapters ────────────────────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        <div class="flex items-center gap-3 mb-8">
            <h2 class="serif-italic text-3xl text-[#1e1b1a]">Chapters</h2>
            <span style="color:var(--gold)">✦</span>
        </div>

        <div class="flex flex-col gap-4">
            @forelse ($course->chapters as $index => $chapter)
                <div class="chapter-item d{{ min($index + 1, 5) }}">

                    <button class="chapter-toggle" aria-expanded="false" onclick="toggleChapter(this)">
                        <div class="flex items-center gap-4 min-w-0">
                            <div class="chapter-num">{{ $index + 1 }}</div>
                            <div class="min-w-0">
                                <div class="serif text-[1.1rem] text-[#1e1b1a] truncate">{{ $chapter->name }}</div>
                                @if ($chapter->description)
                                    <div class="text-xs text-[#1e1b1a]/45 mt-0.5 truncate">{{ $chapter->description }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-4 shrink-0">
                            <span class="text-xs font-medium text-[#1e1b1a]/40 hidden sm:block">
                                {{ $chapter->objectives->count() }}
                                {{ Str::plural('objective', $chapter->objectives->count()) }}
                            </span>
                            <svg class="chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>

                    <div class="chapter-body">
                        <div class="chapter-body-inner">
                            @forelse ($chapter->objectives as $obj)
                                <div class="obj-row flex-col gap-0 p-0">

                                    {{-- Objective header --}}
                                    <div class="w-full flex justify-between">
                                        <div class="flex items-start gap-3 px-5 py-4">
                                            <div class="obj-dot mt-1">
                                                <div class="obj-dot-inner"></div>
                                            </div>
                                            <div>
                                                <p class="text-sm text-[#1e1b1a]/80 leading-relaxed font-medium">
                                                    {{ $obj->name }}</p>
                                                @if ($obj->description)
                                                    <p class="text-xs text-[#1e1b1a]/45 mt-1 leading-relaxed">
                                                        {{ $obj->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="gap-3 px-5 py-4">
                                            <a href="{{ route('objective.view', [$obj]) }}" class="text-sm  hover:underline text-[#1e1b1a]/80 leading-relaxed font-medium">
                                                All videos
                                            </a>
                                            <span style="color:var(--gold)">✦</span>
                                        </div>
                                    </div>

                                    {{-- Video slider --}}
                                    @if ($obj->videos->isNotEmpty())
                                        <div class="relative px-5 pb-5">

                                            {{-- Scroll container --}}
                                            <div class="video-slider flex gap-3 pb-2 overflow-auto"
                                                {{-- style="scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; scrollbar-width: none;" --}}>

                                                @foreach ($obj->videos as $video)
                                                    <a href="{{ route('video.view', [$video]) }}"
                                                        class="video-card flex-shrink-0 rounded-xl overflow-hidden relative group cursor-pointer"
                                                        style="width: 220px; scroll-snap-align: start; background: #1e1b1a;">

                                                        @php
                                                            $libraryId = config(
                                                                'filesystems.disks.bunny_stream.library_id',
                                                            );
                                                            $guid = $video->video_url;

                                                            $cdnHostName = config(
                                                                'filesystems.disks.bunny_stream.hostname',
                                                            );

                                                            $thubnail = $record->thumbnail_url ?? 'thumbnail.jpg';
                                                        @endphp
                                                        <img src="{{ "https://{$cdnHostName}/{$guid}/{$thubnail}" }}"
                                                            alt="{{ $video->title }}"
                                                            class="w-full object-cover transition-opacity duration-300 group-hover:opacity-70"
                                                            style="height: 130px;">

                                                        {{-- Play button overlay --}}
                                                        <video
                                                            src="https://vz-37c7561e-16f.b-cdn.net/e6ec1268-9f56-4d62-a184-f53539b39b8f/preview.webp?v=1772747506"
                                                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                            <div class="w-10 h-10 rounded-full flex items-center justify-center"
                                                                style="background: rgba(198,156,90,.9); backdrop-filter: blur(4px);">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                    fill="#1e1b1a">
                                                                    <path d="M3 2l9 5-9 5V2z" />
                                                                </svg>
                                                            </div>
                                                        </video>


                                                        {{-- Status badge --}}
                                                        <div class="absolute top-2 right-2">
                                                            @if ($video->status === 'approved')
                                                                <span
                                                                    class="text-[10px] font-semibold px-2 py-0.5 rounded-full"
                                                                    style="background:rgba(198,156,90,.15); color:#c69c5a; border: 1px solid rgba(198,156,90,.3);">
                                                                    approved
                                                                </span>
                                                            @elseif($video->status === 'pending')
                                                                <span
                                                                    class="text-[10px] font-semibold px-2 py-0.5 rounded-full"
                                                                    style="background:rgba(255,255,255,.08); color:rgba(255,255,255,.5); border: 1px solid rgba(255,255,255,.1);">
                                                                    pending
                                                                </span>
                                                            @endif
                                                        </div>

                                                        {{-- Title --}}
                                                        <div class="px-3 py-2.5">
                                                            <p class="text-xs text-white/80 leading-snug line-clamp-2"
                                                                style="font-size:.72rem;">
                                                                {{ $video->title ?? 'Untitled submission' }}
                                                            </p>
                                                            @if ($video->creator)
                                                                <p class="text-[10px] mt-1"
                                                                    style="color:rgba(255,255,255,.3);">
                                                                    {{ $video->creator->name }}</p>
                                                            @endif
                                                        </div>

                                                    </a>
                                                @endforeach

                                            </div>

                                        </div>
                                    @else
                                        <div class="px-5 pb-4">
                                            <p class="text-xs serif-italic" style="color:rgba(30,27,26,.3)">No videos
                                                submitted yet.</p>
                                        </div>
                                    @endif

                                </div>
                            @empty
                                <div class="px-6 py-5 text-sm serif-italic text-[#1e1b1a]/35">No objectives yet.</div>
                            @endforelse
                        </div>
                    </div>

                </div>
            @empty
                <div class="text-center py-20 serif-italic text-2xl text-[#1e1b1a]/30">
                    No chapters yet <span style="color:var(--gold)">✦</span>
                </div>
            @endforelse
        </div>

        <!-- Bottom note -->
        <div class="divider mt-16 pt-12 max-w-xl mx-auto text-center">
            <p class="serif-italic text-[1.7rem] text-[#1e1b1a] leading-snug">
                " upload an approved video <span style="color:var(--gold)">✦</span> unlock any chapter "
            </p>
            <p class="text-sm text-[#1e1b1a]/50 mt-4 leading-relaxed">
                Submit a video solution to any objective. Once approved by a maintainer, you unlock the full course.
            </p>
            <button class="btn btn-fill mt-7 px-8 py-3 text-sm">Submit a video</button>
        </div>

    </main>

    <!-- ── Footer ─────────────────────────────────────────────────── -->
    <footer class="divider py-8">
        <div
            class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-2 text-xs text-[#1e1b1a]/45">
            <span>© 2025 Qaabil — <span style="color:var(--gold)">✦</span> empower learning.</span>
            <div class="flex gap-5">
                <a href="#" class="hover:text-[#c69c5a] transition-colors">Terms</a>
                <a href="#" class="hover:text-[#c69c5a] transition-colors">Privacy</a>
                <a href="#" class="hover:text-[#c69c5a] transition-colors">Contact</a>
            </div>
        </div>
    </footer>

    <script>
        function toggleChapter(btn) {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!expanded));
            btn.nextElementSibling.classList.toggle('open', !expanded);
        }

        // Open first chapter on load
        document.addEventListener('DOMContentLoaded', () => {
            const first = document.querySelector('.chapter-toggle');
            if (first) toggleChapter(first);
        });

        function slider() {
            return {
                canScrollLeft: false,
                canScrollRight: false,
                activeDot: 0,

                init() {
                    this.$nextTick(() => this.onScroll());
                },

                onScroll() {
                    const t = this.$refs.track;
                    if (!t) return;
                    this.canScrollLeft = t.scrollLeft > 4;
                    this.canScrollRight = t.scrollLeft + t.clientWidth < t.scrollWidth - 4;

                    // update active dot: which card is most in view
                    const cardW = 220 + 12; // width + gap
                    this.activeDot = Math.round(t.scrollLeft / cardW);
                },

                scrollBy(dir) {
                    const t = this.$refs.track;
                    t.scrollBy({
                        left: dir * 232,
                        behavior: 'smooth'
                    });
                }
            }
        }
    </script>

</body>

</html>
