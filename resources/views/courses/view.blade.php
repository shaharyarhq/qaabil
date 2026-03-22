<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · {{ $course->name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --navy: #1b3a6b;
            --navy-d: #122952;
            --amber: #f59e0b;
            --amber-d: #d97706;
            --sky: #eff6ff;
            --border: #e2e8f0;
        }

        body {
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            color: var(--text);
            -webkit-font-smoothing: antialiased;
        }

        /* can't do these with tailwind alone */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .manifesto::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .chapter-toggle[aria-expanded="true"] .chapter-num {
            background: var(--navy);
            color: #fff;
            border-color: var(--navy);
        }

        .chapter-toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
            color: var(--navy);
        }

        .chapter-toggle[aria-expanded="true"],
        .chapter-toggle:hover {
            background: var(--sky);
        }

        /* smooth expand trick — no tailwind equivalent */
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

        .fade-up {
            animation: fadeUp .45s ease both;
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
    </style>
</head>

<body class="bg-[#f8fafd] text-[#0f172a] antialiased">

    <x-navbar></x-navbar>

    <!-- ── Hero ──────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden fade-up">
        {{-- amber glow --}}
        <div class="absolute rounded-full pointer-events-none"
            style="width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 65%);top:-160px;right:-100px">
        </div>

        <div class="max-w-7xl mx-auto px-6 py-14 relative z-10">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 mb-8 text-[.75rem] font-semibold text-white/40">
                <a href="{{ route('courses.index') }}"
                    class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">Courses</a>
                <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                <span class="text-white/65">{{ $course->name }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">

                {{-- Title --}}
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

                {{-- Stat cards --}}
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

        <div class="mb-10">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                <span class="text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b]">Course content</span>
            </div>
            <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                Sections <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">&
                    Chapters</span>
            </h2>
        </div>

        {{-- Sections --}}
        @forelse ($course->sections as $sectionIndex => $section)

            <div id="{{ Str::slug($section->name) }}"
                class="fade-up d{{ min($sectionIndex + 1, 5) }} mb-10 scroll-mt-20">

                {{-- Section label --}}
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
                        <div
                            class="chapter-item bg-white border border-[#e2e8f0] rounded-2xl overflow-hidden transition-colors hover:border-[rgba(27,58,107,.22)] fade-up">

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
                                        <div
                                            class="border-t border-[#e2e8f0] transition-colors hover:bg-[rgba(239,246,255,.5)] flex flex-col">

                                            {{-- Objective header --}}
                                            <div class="w-full flex justify-between">
                                                <div class="flex items-start gap-3 px-5 py-4">
                                                    <div class="w-[22px] h-[22px] rounded-full flex items-center justify-center shrink-0 mt-1"
                                                        style="border:1.5px solid rgba(27,58,107,.2)">
                                                        <div class="w-2 h-2 rounded-full bg-[#1b3a6b] opacity-35"></div>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-semibold text-[#0f172a] leading-relaxed">
                                                            {{ $obj->name }}</p>
                                                        @if ($obj->description)
                                                            <p class="text-xs text-[#94a3b8] mt-0.5 leading-relaxed">
                                                                {{ $obj->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2 px-5 py-4 shrink-0">
                                                    <a href="{{ route('objective.view', [$obj]) }}"
                                                        class="text-[.775rem] font-bold text-[#1b3a6b] no-underline transition-colors hover:text-[#d97706]">
                                                        All videos
                                                    </a>
                                                    <span class="text-[#f59e0b] text-[.65rem]">✦</span>
                                                </div>
                                            </div>

                                            {{-- Video slider --}}
                                            @if ($obj->videos->isNotEmpty())
                                                <div class="px-5 pb-5">
                                                    <div class="flex gap-3 pb-2 overflow-x-auto"
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
                                                            <a href="{{ route('video.view', [$video]) }}"
                                                                class="flex-shrink-0 rounded-xl overflow-hidden relative group cursor-pointer transition-transform duration-200 hover:-translate-y-0.5"
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
                                                                            style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">
                                                                            approved
                                                                        </span>
                                                                    @elseif ($video->status === 'pending')
                                                                        <span
                                                                            class="text-[.65rem] font-bold px-2 py-0.5 rounded-full text-white/50"
                                                                            style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1)">
                                                                            pending
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                {{-- Title --}}
                                                                <div class="px-3 py-2.5">
                                                                    <p
                                                                        class="text-[.7rem] text-white/80 leading-snug line-clamp-2">
                                                                        {{ $video->title ?? 'Untitled submission' }}
                                                                    </p>
                                                                    @if ($video->creator)
                                                                        <p class="text-[.65rem] mt-0.5 text-white/30">
                                                                            {{ $video->creator->name }}</p>
                                                                    @endif
                                                                </div>

                                                            </a>
                                                        @endforeach
                                                    </div>
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

    <x-footer></x-footer>

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
    </script>

</body>

</html>
