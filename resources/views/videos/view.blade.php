<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · {{ $video->title ?? 'Video' }}</title>
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

        /* ── Layout ───────────────────────────────────────── */
        .page-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 1024px) {
            .page-grid {
                grid-template-columns: 1fr 340px;
                align-items: start;
            }
        }

        /* ── Player ───────────────────────────────────────── */
        .player-wrap {
            background: #111;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, .12);
            animation: fadeUp .45s ease both;
        }

        .player-wrap iframe {
            width: 100%;
            aspect-ratio: 16/9;
            display: block;
            border: none;
        }

        /* ── Meta block ───────────────────────────────────── */
        .meta-block {
            animation: fadeUp .45s ease both .06s;
        }

        /* ── Status badge ─────────────────────────────────── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .3rem .8rem;
            border-radius: 40px;
        }

        .badge-approved {
            background: rgba(198, 156, 90, .12);
            color: var(--gold);
            border: 1px solid rgba(198, 156, 90, .3);
        }

        .badge-pending {
            background: rgba(30, 27, 26, .06);
            color: var(--muted);
            border: 1px solid rgba(30, 27, 26, .1);
        }

        .badge-rejected {
            background: rgba(200, 60, 60, .07);
            color: #c03c3c;
            border: 1px solid rgba(200, 60, 60, .15);
        }

        /* ── Info card ────────────────────────────────────── */
        .info-card {
            background: var(--card);
            border-radius: 16px;
            padding: 1.4rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .035);
            animation: fadeUp .45s ease both .1s;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            padding: .75rem 0;
            border-bottom: 1px solid rgba(30, 27, 26, .05);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: rgba(198, 156, 90, .1);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: .8rem;
        }

        /* ── Sidebar ──────────────────────────────────────── */
        .sidebar {
            animation: fadeUp .45s ease both .12s;
        }

        .sidebar-heading {
            font-size: .7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--muted);
            margin-bottom: .875rem;
        }

        /* ── Related video card ───────────────────────────── */
        .related-card {
            display: flex;
            gap: .875rem;
            padding: .75rem;
            border-radius: 12px;
            transition: background .2s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .related-card:hover {
            background: rgba(198, 156, 90, .06);
        }

        .related-card.active {
            background: rgba(198, 156, 90, .1);
        }

        .related-thumb {
            width: 96px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
            background: #1e1b1a;
            position: relative;
        }

        .related-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-thumb-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2a2623, #1e1b1a);
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .2s;
        }

        .related-card:hover .play-overlay {
            opacity: 1;
        }

        .play-btn-sm {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: rgba(198, 156, 90, .9);
            display: flex;
            align-items: center;
            justify-content: center;
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

        .divider {
            border-top: 1px solid var(--border);
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

    <!-- ── Main ────────────────────────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-10 pb-28">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-xs text-[#1e1b1a]/40 mb-8 font-medium flex-wrap">
            <a href="{{ route('courses.index') }}" class="hover:text-[#c69c5a] transition-colors">Courses</a>
            @if ($video->course)
                <span style="color:var(--gold)">✦</span>
                <a href="{{ route('courses.view', $video->course) }}" class="hover:text-[#c69c5a] transition-colors">
                    {{ $video->course->name }}
                </a>
            @endif
            @if ($video->chapter)
                <span style="color:var(--gold)">✦</span>
                <span>{{ $video->chapter->name }}</span>
            @endif
            @if ($video->objective)
                <span style="color:var(--gold)">✦</span>
                <span>{{ $video->objective->name }}</span>
            @endif
        </div>

        <div class="page-grid">

            <!-- ── Left col: player + meta ─────────────────────── -->
            <div class="flex flex-col gap-5">

                <!-- Player -->
                <div class="player-wrap">
                    <iframe
                        src="https://iframe.mediadelivery.net/embed/{{ config('filesystems.disks.bunny_stream.library_id') }}/{{ $video->video_url }}"
                        allow="accelerometer; gyroscope; encrypted-media; picture-in-picture;" allowfullscreen>
                    </iframe>
                </div>

                <!-- Title + badge -->
                <div class="meta-block flex items-start justify-between gap-4 flex-wrap">
                    <div>
                        <h1 class="serif text-3xl md:text-4xl text-[#1e1b1a] leading-tight">
                            {{ $video->title ?? 'Untitled submission' }}
                        </h1>
                        <p class="text-sm text-[#1e1b1a]/45 mt-2">
                            Submitted {{ $video->created_at->diffForHumans() }}
                            @if ($video->creator ?? null)
                                · <span class="text-[#1e1b1a]/60">{{ $video->creator->name }}</span>
                            @endif
                        </p>
                    </div>

                    @php $status = $video->status instanceof \App\Enums\VideoStatus ? $video->status->value : $video->status; @endphp
                    <div class="shrink-0 mt-1">
                        @if ($status === 'approved')
                            <span class="badge badge-approved">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor">
                                    <circle cx="4" cy="4" r="4" />
                                </svg>
                                approved
                            </span>
                        @elseif($status === 'pending')
                            <span class="badge badge-pending">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor">
                                    <circle cx="4" cy="4" r="4" />
                                </svg>
                                pending review
                            </span>
                        @else
                            <span class="badge badge-rejected">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor">
                                    <circle cx="4" cy="4" r="4" />
                                </svg>
                                {{ $status }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Info card -->
                <div class="info-card">
                    @if ($video->objective)
                        <div class="info-row">
                            <div class="info-icon">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-[#1e1b1a]/40 font-medium uppercase tracking-wide mb-0.5">
                                    Objective</p>
                                <p class="text-sm text-[#1e1b1a]/80">{{ $video->objective->name }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($video->chapter)
                        <div class="info-row">
                            <div class="info-icon">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-[#1e1b1a]/40 font-medium uppercase tracking-wide mb-0.5">Chapter
                                </p>
                                <p class="text-sm text-[#1e1b1a]/80">{{ $video->chapter->name }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($video->approver)
                        <div class="info-row">
                            <div class="info-icon">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-[#1e1b1a]/40 font-medium uppercase tracking-wide mb-0.5">
                                    Approved by</p>
                                <p class="text-sm text-[#1e1b1a]/80">{{ $video->approver->name }}</p>
                                @if ($video->updated_at && $status === 'approved')
                                    <p class="text-xs text-[#1e1b1a]/40 mt-0.5">
                                        {{ $video->updated_at->diffForHumans() }}</p>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="info-row">
                        <div class="info-icon">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-[#1e1b1a]/40 font-medium uppercase tracking-wide mb-0.5">Submitted
                            </p>
                            <p class="text-sm text-[#1e1b1a]/80">{{ $video->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ── Right col: sidebar ──────────────────────────── -->
            <aside class="sidebar">
                <p class="sidebar-heading">More from this objective</p>

                @if ($video->objective)
                    @php
                        $related = $video->objective->videos->where('id', '!=', $video->id)->values();
                    @endphp

                    @if ($related->isEmpty())
                        <div class="text-sm serif-italic text-[#1e1b1a]/30 py-4">No other submissions yet.</div>
                    @else
                        <div class="flex flex-col gap-1">
                            @foreach ($related as $rel)
                                @php $relStatus = $rel->status instanceof \App\Enums\VideoStatus ? $rel->status->value : $rel->status; @endphp
                                <a href="{{ route('video.view', $rel) }}" class="related-card">
                                    <div class="related-thumb">
                                        @php
                                            $libraryId = config('filesystems.disks.bunny_stream.library_id');
                                            $guid = $rel->video_url;

                                            $cdnHostName = config('filesystems.disks.bunny_stream.hostname');

                                            $thubnail = $rel->thumbnail_url ?? 'thumbnail.jpg';
                                        @endphp
                                        <img src="{{ "https://{$cdnHostName}/{$guid}/{$thubnail}" }}"
                                            alt="{{ $rel->title }}">
                                        <div class="play-overlay">
                                            <div class="play-btn-sm">
                                                <svg width="10" height="10" viewBox="0 0 10 10"
                                                    fill="#1e1b1a">
                                                    <path d="M2 1.5l6 3.5-6 3.5V1.5z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0 py-0.5">
                                        <p class="text-sm text-[#1e1b1a]/80 leading-snug line-clamp-2 mb-1">
                                            {{ $rel->title ?? 'Untitled submission' }}
                                        </p>
                                        <div class="flex items-center gap-2">
                                            @if ($relStatus === 'approved')
                                                <span class="badge badge-approved"
                                                    style="font-size:.6rem; padding:.2rem .55rem;">approved</span>
                                            @else
                                                <span class="badge badge-pending"
                                                    style="font-size:.6rem; padding:.2rem .55rem;">{{ $relStatus }}</span>
                                            @endif
                                            <span
                                                class="text-[11px] text-[#1e1b1a]/35">{{ $rel->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                @endif

                <!-- Back to course -->
                @if ($video->course)
                    <div class="mt-8 pt-6 divider">
                        <a href="{{ route('courses.view', $video->course) }}"
                            class="flex items-center gap-2 text-sm text-[#1e1b1a]/50 hover:text-[#c69c5a] transition-colors font-medium group">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2"
                                class="transition-transform group-hover:-translate-x-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back to {{ $video->course->name }}
                        </a>
                    </div>
                @endif
            </aside>

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

</body>

</html>
