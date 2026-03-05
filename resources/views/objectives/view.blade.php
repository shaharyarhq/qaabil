<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · {{ $objective->name }}</title>
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
            animation: fadeUp .45s ease both;
        }

        /* ── Video card ───────────────────────────────────── */
        .video-card {
            background: var(--dark);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            animation: fadeUp .45s ease both;
            transition: transform .22s ease, box-shadow .22s ease;
            text-decoration: none;
            color: inherit;
        }

        .video-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, .35);
        }

        .video-thumb {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            background: #2a2623;
        }

        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity .3s, transform .4s ease;
        }

        .video-card:hover .video-thumb img {
            opacity: .75;
            transform: scale(1.03);
        }

        .thumb-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2a2623 0%, #1e1b1a 100%);
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .22s;
        }

        .video-card:hover .play-overlay {
            opacity: 1;
        }

        .play-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(198, 156, 90, .92);
            backdrop-filter: blur(4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, .3);
        }

        /* ── Badge ────────────────────────────────────────── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            font-size: .65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .2rem .65rem;
            border-radius: 40px;
        }

        .badge-approved {
            background: rgba(198, 156, 90, .15);
            color: var(--gold);
            border: 1px solid rgba(198, 156, 90, .3);
        }

        .badge-pending {
            background: rgba(255, 255, 255, .07);
            color: rgba(255, 255, 255, .45);
            border: 1px solid rgba(255, 255, 255, .1);
        }

        .badge-rejected {
            background: rgba(200, 60, 60, .1);
            color: #e06060;
            border: 1px solid rgba(200, 60, 60, .2);
        }

        /* ── Empty state ──────────────────────────────────── */
        .empty-state {
            grid-column: 1 / -1;
            padding: 5rem 2rem;
            text-align: center;
        }

        /* ── CTA banner ───────────────────────────────────── */
        .cta-banner {
            background: var(--dark);
            border-radius: 20px;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 1rem;
            animation: fadeUp .45s ease both .2s;
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
            animation-delay: .04s
        }

        .d2 {
            animation-delay: .08s
        }

        .d3 {
            animation-delay: .12s
        }

        .d4 {
            animation-delay: .16s
        }

        .d5 {
            animation-delay: .20s
        }

        .d6 {
            animation-delay: .24s
        }

        .divider {
            border-top: 1px solid var(--border);
        }

        /* hide scrollbar utility */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            scrollbar-width: none;
        }
    </style>
</head>

<body>

    <!-- ── Navbar ──────────────────────────────────────────────────── -->
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

    <!-- ── Hero ────────────────────────────────────────────────────── -->
    <div class="hero">
        <div class="max-w-7xl mx-auto px-6 py-14">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-xs text-[#1e1b1a]/40 mb-8 font-medium flex-wrap">
                <a href="{{ route('courses.index') }}" class="hover:text-[#c69c5a] transition-colors">Courses</a>
                @if ($objective->chapter?->course)
                    <span style="color:var(--gold)">✦</span>
                    <a href="{{ route('courses.view', $objective->chapter->course) }}"
                        class="hover:text-[#c69c5a] transition-colors">
                        {{ $objective->chapter->course->name }}
                    </a>
                @endif
                @if ($objective->chapter)
                    <span style="color:var(--gold)">✦</span>
                    <a href="{{ route('courses.view', $objective->chapter->course) }}#chapter-{{ $objective->chapter->id }}"
                        class="hover:text-[#c69c5a] transition-colors">
                        {{ $objective->chapter->name }}
                    </a>
                @endif
                <span style="color:var(--gold)">✦</span>
                <span>{{ $objective->name }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
                <!-- Left: title + description -->
                <div class="max-w-2xl">
                    <!-- Chapter label -->
                    @if ($objective->chapter)
                        <p class="text-xs font-semibold uppercase tracking-widest mb-3" style="color:var(--gold)">
                            {{ $objective->chapter->name }}
                        </p>
                    @endif

                    <h1 class="serif text-5xl md:text-6xl text-[#1e1b1a] leading-tight mb-5">
                        {{ $objective->name }}
                    </h1>

                    @if ($objective->description)
                        <p class="text-[#1e1b1a]/60 text-base leading-relaxed">
                            {{ $objective->description }}
                        </p>
                    @endif
                </div>

                <!-- Right: stat -->
                <div class="shrink-0">
                    <div
                        style="background:var(--card); border-radius:14px; padding:1.1rem 1.8rem; box-shadow:0 2px 8px rgba(0,0,0,.035); text-align:center; min-width:110px;">
                        <div class="serif text-4xl text-[#1e1b1a]">{{ $objective->videos->count() }}</div>
                        <div class="text-xs text-[#1e1b1a]/45 mt-1 font-medium uppercase tracking-wide">
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

        <!-- Section header -->
        <div class="flex items-center justify-between mb-8 flex-wrap gap-3">
            <div class="flex items-center gap-3">
                <h2 class="serif-italic text-3xl text-[#1e1b1a]">Submissions</h2>
                <span style="color:var(--gold)">✦</span>
            </div>

            @if ($objective->videos->isNotEmpty())
                <!-- Filter pills -->
                <div class="flex items-center gap-2 text-xs font-medium">
                    <button onclick="filterVideos('all')" id="f-all"
                        class="filter-btn active-filter px-4 py-1.5 rounded-full border transition-all">All</button>
                    <button onclick="filterVideos('approved')" id="f-approved"
                        class="filter-btn px-4 py-1.5 rounded-full border border-[#1e1b1a]/10 text-[#1e1b1a]/50 transition-all">Approved</button>
                    <button onclick="filterVideos('pending')" id="f-pending"
                        class="filter-btn px-4 py-1.5 rounded-full border border-[#1e1b1a]/10 text-[#1e1b1a]/50 transition-all">Pending</button>
                </div>
            @endif
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" id="video-grid">

            @forelse($objective->videos as $i => $video)
                @php
                    $status =
                        $video->status instanceof \App\Enums\VideoStatus
                            ? $video->status->value
                            : (string) $video->status;
                    $guid = $video->video_url;
                    $thumb = $video->thumbnail_url ?? 'thumbnail.jpg';
                    $thumbUrl = "https://{$cdnHost}/{$guid}/{$thumb}";
                @endphp

                <a href="{{ route('video.view', $video) }}" class="video-card d{{ min($i + 1, 6) }}"
                    data-status="{{ $status }}">

                    <!-- Thumbnail -->
                    <div class="video-thumb">
                        <img src="{{ $thumbUrl }}" alt="{{ $video->title }}" loading="lazy">

                        <!-- Play overlay -->
                        <div class="play-overlay">
                            <div class="play-btn">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="#1e1b1a">
                                    <path d="M4 2.5l9 5.5-9 5.5V2.5z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Status badge -->
                        <div class="absolute top-3 left-3">
                            @if ($status === 'approved')
                                <span class="badge badge-approved">
                                    <svg width="5" height="5" viewBox="0 0 6 6" fill="currentColor">
                                        <circle cx="3" cy="3" r="3" />
                                    </svg>
                                    approved
                                </span>
                            @elseif($status === 'pending')
                                <span class="badge badge-pending">
                                    <svg width="5" height="5" viewBox="0 0 6 6" fill="currentColor">
                                        <circle cx="3" cy="3" r="3" />
                                    </svg>
                                    pending
                                </span>
                            @else
                                <span class="badge badge-rejected">{{ $status }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="px-4 py-3 flex flex-col gap-1 flex-1">
                        <p class="text-sm font-medium leading-snug line-clamp-2" style="color:rgba(255,255,255,.85);">
                            {{ $video->title ?? 'Untitled submission' }}
                        </p>
                        <div class="flex items-center justify-between mt-auto pt-2">
                            @if ($video->creator)
                                <p class="text-[11px]" style="color:rgba(255,255,255,.3);">{{ $video->creator->name }}
                                </p>
                            @else
                                <span></span>
                            @endif
                            <p class="text-[11px]" style="color:rgba(255,255,255,.25);">
                                {{ $video->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                </a>
            @empty
                <div class="empty-state">
                    <span class="serif-italic text-5xl block mb-4" style="color:rgba(198,156,90,.25)">✦</span>
                    <p class="serif-italic text-2xl text-[#1e1b1a]/30 mb-2">No submissions yet</p>
                    <p class="text-sm text-[#1e1b1a]/35">Be the first to submit a video for this objective.</p>
                </div>
            @endforelse

        </div>

        <!-- No results after filter -->
        <div id="no-filter-results" class="hidden text-center py-16">
            <p class="serif-italic text-xl text-[#1e1b1a]/30">No videos match that filter.</p>
        </div>

        <!-- ── CTA banner ─────────────────────────────────────────── -->
        <div class="cta-banner mt-16">
            <span class="serif-italic text-5xl" style="color:var(--gold)">✦</span>
            <h3 class="serif text-3xl text-[#faf7f2]">Think you can do it?</h3>
            <p class="text-sm max-w-sm leading-relaxed" style="color:rgba(250,247,242,.5);">
                Submit a video solution for <span style="color:rgba(250,247,242,.8);">{{ $objective->name }}</span>.
                Get it approved and unlock the full course.
            </p>
            <button class="btn btn-fill mt-2 px-8 py-3">Submit a video</button>
        </div>

    </main>

    <!-- ── Footer ──────────────────────────────────────────────────── -->
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

    <style>
        .active-filter {
            background: var(--dark);
            color: #fff;
            border-color: var(--dark) !important;
        }
    </style>

    <script>
        function filterVideos(status) {
            // update buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active-filter');
                btn.style.color = '';
            });
            const active = document.getElementById('f-' + status);
            if (active) active.classList.add('active-filter');

            // show/hide cards
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

</body>

</html>
