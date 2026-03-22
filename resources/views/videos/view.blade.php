<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · {{ $video->title ?? 'Video' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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

        .related-card:hover .play-overlay { opacity: 1; }

        /* tab underline */
        .tab-btn.active {
            color: #1b3a6b;
            border-bottom-color: #f59e0b;
        }
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up   { animation: fadeUp .45s ease both; }
        .fade-up-2 { animation: fadeUp .45s ease both .06s; }
        .fade-up-3 { animation: fadeUp .45s ease both .10s; }
        .fade-up-4 { animation: fadeUp .45s ease both .12s; }
    </style>
</head>
<body class="bg-[#f8fafd] text-[#0f172a] antialiased" style="font-family:'Plus Jakarta Sans',system-ui,sans-serif">

<x-navbar />

<!-- ── Main ──────────────────────────────────── -->
<main class="max-w-7xl mx-auto px-6 py-10 pb-28">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-xs font-semibold text-[#94a3b8] mb-8 flex-wrap">
        <a href="{{ route('courses.index') }}" class="text-[#94a3b8] no-underline transition-colors hover:text-[#1b3a6b]">Courses</a>
        @if ($video->course)
            <span class="text-[#f59e0b] text-[.65rem]">✦</span>
            <a href="{{ route('courses.view', $video->course) }}" class="text-[#94a3b8] no-underline transition-colors hover:text-[#1b3a6b]">{{ $video->course->name }}</a>
        @endif
        @if ($video->section)
            <span class="text-[#f59e0b] text-[.65rem]">✦</span>
            <span class="text-[#475569]">{{ $video->section->name }}</span>
        @endif
        @if ($video->chapter)
            <span class="text-[#f59e0b] text-[.65rem]">✦</span>
            <span class="text-[#475569]">{{ $video->chapter->name }}</span>
        @endif
        @if ($video->objective)
            <span class="text-[#f59e0b] text-[.65rem]">✦</span>
            <span class="text-[#475569]">{{ $video->objective->name }}</span>
        @endif
    </div>

    <div class="page-grid">

        <!-- ── Left col ───────────────────────────── -->
        <div class="flex flex-col gap-5">

            <!-- Player -->
            <div class="fade-up bg-[#0f172a] rounded-2xl overflow-hidden shadow-[0_8px_32px_rgba(0,0,0,.15)]">
                @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $video->video_url ?? '', $matches);
                    $videoId = $matches[1] ?? null;
                @endphp
                @if ($videoId)
                <iframe class="w-full block border-none" style="aspect-ratio:16/9"
                        src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&modestbranding=1&iv_load_policy=3&showinfo=0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                @else
                <div class="w-full flex items-center justify-center" style="aspect-ratio:16/9">
                    <p class="font-['Instrument_Serif',serif] italic text-white/30 text-lg">No video available</p>
                </div>
                @endif
            </div>

            <!-- Title + badge row -->
            <div class="fade-up-2 flex items-start justify-between gap-4 flex-wrap">
                <div class="min-w-0 flex-1">
                    <h1 class="font-['Instrument_Serif',serif] font-normal text-[2rem] md:text-[2.4rem] text-[#0f172a] leading-tight tracking-tight mb-1.5">
                        {{ $video->title ?? 'Untitled submission' }}
                    </h1>
                    <div class="flex items-center flex-wrap gap-3 text-sm text-[#94a3b8]">
                        <span>Submitted {{ $video->created_at->diffForHumans() }}</span>
                        @if ($video->creator ?? null)
                            <span class="text-[#e2e8f0]">·</span>
                            <span class="text-[#475569] font-medium">{{ $video->creator->name }}</span>
                        @endif
                        @if ($video->language)
                            <span class="text-[#e2e8f0]">·</span>
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#1b3a6b] bg-[#eff6ff] border border-[rgba(27,58,107,.12)] rounded-md px-2 py-0.5">
                                🌐 {{ $video->language }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Status badge --}}
                @php $status = $video->status instanceof \App\Enums\VideoStatus ? $video->status->value : $video->status; @endphp
                <div class="shrink-0 mt-1">
                    @if ($status === 'approved')
                    <span class="inline-flex items-center gap-1.5 text-[.7rem] font-bold uppercase tracking-[.06em] px-3 py-[.3rem] rounded-full text-[#f59e0b]"
                          style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.3)">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                        approved
                    </span>
                    @elseif ($status === 'pending')
                    <span class="inline-flex items-center gap-1.5 text-[.7rem] font-bold uppercase tracking-[.06em] px-3 py-[.3rem] rounded-full text-[#94a3b8]"
                          style="background:rgba(27,58,107,.06);border:1px solid rgba(27,58,107,.1)">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                        pending review
                    </span>
                    @else
                    <span class="inline-flex items-center gap-1.5 text-[.7rem] font-bold uppercase tracking-[.06em] px-3 py-[.3rem] rounded-full text-red-500"
                          style="background:rgba(200,60,60,.07);border:1px solid rgba(200,60,60,.15)">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                        {{ $status }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- ── Tabs: Overview / Materials / Quiz ── -->
            @php
                $hasMaterials = !empty($video->learning_materials);
                $hasQuiz      = !empty($video->quiz_attachments) || $video->quiz_link;
                $hasDesc      = !empty($video->description);
            @endphp

            <div class="fade-up-3">
                {{-- Tab bar --}}
                <div class="flex gap-0 border-b border-[#e2e8f0] mb-5">
                    <button onclick="switchTab('overview', this)"
                            class="tab-btn active text-sm font-bold px-4 pb-3 border-b-2 border-transparent text-[#94a3b8] bg-transparent cursor-pointer transition-colors hover:text-[#1b3a6b]">
                        Overview
                    </button>
                    @if($hasMaterials)
                    <button onclick="switchTab('materials', this)"
                            class="tab-btn text-sm font-bold px-4 pb-3 border-b-2 border-transparent text-[#94a3b8] bg-transparent cursor-pointer transition-colors hover:text-[#1b3a6b]">
                        Learning materials
                        <span class="ml-1.5 text-[.65rem] font-extrabold bg-[#1b3a6b] text-white rounded-full px-1.5 py-0.5">{{ count($video->learning_materials) }}</span>
                    </button>
                    @endif
                    @if($hasQuiz)
                    <button onclick="switchTab('quiz', this)"
                            class="tab-btn text-sm font-bold px-4 pb-3 border-b-2 border-transparent text-[#94a3b8] bg-transparent cursor-pointer transition-colors hover:text-[#1b3a6b]">
                        Quiz
                    </button>
                    @endif
                </div>

                {{-- Overview tab --}}
                <div id="tab-overview" class="tab-panel active">
                    {{-- Description --}}
                    @if($hasDesc)
                    <div class="bg-white border border-[#e2e8f0] rounded-2xl p-5 mb-4">
                        <p class="text-[.68rem] font-bold uppercase tracking-[.08em] text-[#94a3b8] mb-2">About this submission</p>
                        <p class="text-sm text-[#475569] leading-relaxed">{!! str($video->description)->sanitizeHtml() !!}</p>
                    </div>
                    @endif

                    {{-- Info rows --}}
                    <div class="bg-white border border-[#e2e8f0] rounded-2xl p-5 flex flex-col gap-0">

                        @if ($video->objective)
                        <div class="flex items-start gap-3 py-3 border-b border-[#e2e8f0] first:pt-0">
                            <div class="w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                            <div>
                                <p class="text-[.68rem] font-bold uppercase tracking-[.06em] text-[#94a3b8] mb-0.5">Objective</p>
                                <p class="text-sm font-medium text-[#0f172a]">{{ $video->objective->name }}</p>
                            </div>
                        </div>
                        @endif

                        @if ($video->chapter)
                        <div class="flex items-start gap-3 py-3 border-b border-[#e2e8f0]">
                            <div class="w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <div>
                                <p class="text-[.68rem] font-bold uppercase tracking-[.06em] text-[#94a3b8] mb-0.5">Chapter</p>
                                <p class="text-sm font-medium text-[#0f172a]">{{ $video->chapter->name }}</p>
                            </div>
                        </div>
                        @endif

                        @if ($video->section)
                        <div class="flex items-start gap-3 py-3 border-b border-[#e2e8f0]">
                            <div class="w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </div>
                            <div>
                                <p class="text-[.68rem] font-bold uppercase tracking-[.06em] text-[#94a3b8] mb-0.5">Section</p>
                                <p class="text-sm font-medium text-[#0f172a]">{{ $video->section->name }}</p>
                            </div>
                        </div>
                        @endif

                        @if ($video->approver)
                        <div class="flex items-start gap-3 py-3 border-b border-[#e2e8f0]">
                            <div class="w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div>
                                <p class="text-[.68rem] font-bold uppercase tracking-[.06em] text-[#94a3b8] mb-0.5">Approved by</p>
                                <p class="text-sm font-medium text-[#0f172a]">{{ $video->approver->name }}</p>
                                @if ($video->updated_at && $status === 'approved')
                                <p class="text-xs text-[#94a3b8] mt-0.5">{{ $video->updated_at->diffForHumans() }}</p>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="flex items-start gap-3 pt-3">
                            <div class="w-[30px] h-[30px] rounded-lg flex items-center justify-center shrink-0 text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-[.68rem] font-bold uppercase tracking-[.06em] text-[#94a3b8] mb-0.5">Submitted</p>
                                <p class="text-sm font-medium text-[#0f172a]">{{ $video->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Learning materials tab --}}
                @if($hasMaterials)
                <div id="tab-materials" class="tab-panel">
                    <div class="flex flex-col gap-3">
                        @foreach($video->learning_materials as $material)
                        @php
                            $name = is_array($material) ? ($material['name'] ?? basename($material['url'] ?? 'File')) : $material;
                            $url  = is_array($material) ? ($material['url'] ?? '#') : $material;
                            $ext  = strtoupper(pathinfo($url, PATHINFO_EXTENSION) ?: 'FILE');
                            $isDoc = in_array(strtolower($ext), ['pdf','doc','docx','ppt','pptx','xls','xlsx']);
                            $isImg = in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp','svg']);
                        @endphp
                        <a href="{{ asset('storage/'.$url) }}" target="_blank" rel="noopener"
                           class="flex items-center gap-4 bg-white border border-[#e2e8f0] rounded-2xl p-4 no-underline text-inherit transition-all hover:border-[rgba(27,58,107,.2)] hover:-translate-y-0.5 hover:shadow-[0_8px_20px_-8px_rgba(27,58,107,.12)]">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 text-[.65rem] font-extrabold text-[#1b3a6b]" style="background:rgba(27,58,107,.08)">
                                {{ $ext }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-[#0f172a] truncate">{{ $name }}</p>
                                <p class="text-xs text-[#94a3b8] mt-0.5">{{ $isDoc ? 'Document' : ($isImg ? 'Image' : 'File') }} · click to open</p>
                            </div>
                            <svg class="w-4 h-4 text-[#94a3b8] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Quiz tab --}}
                @if($hasQuiz)
                <div id="tab-quiz" class="tab-panel">
                    <div class="flex flex-col gap-4">

                        {{-- External quiz link --}}
                        @if($video->quiz_link)
                        <a href="{{ $video->quiz_link }}" target="_blank" rel="noopener"
                           class="flex items-center gap-4 bg-[#1b3a6b] rounded-2xl p-5 no-underline transition-all hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.45)]">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(245,158,11,.15)">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-extrabold text-white">Take the quiz</p>
                                <p class="text-xs text-white/50 mt-0.5">Opens in a new tab</p>
                            </div>
                            <svg class="w-4 h-4 text-white/40 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                        @endif

                        {{-- Quiz attachment files --}}
                        @if(!empty($video->quiz_attachments))
                        <div class="flex flex-col gap-3">
                            @foreach($video->quiz_attachments as $attachment)
                            @php
                                $aName = is_array($attachment) ? ($attachment['name'] ?? basename($attachment['url'] ?? 'Attachment')) : $attachment;
                                $aUrl  = is_array($attachment) ? ($attachment['url'] ?? '#') : $attachment;
                                $aExt  = strtoupper(pathinfo($aUrl, PATHINFO_EXTENSION) ?: 'FILE');
                            @endphp
                            <a href="{{ asset('storage/'.$aUrl) }}" target="_blank" rel="noopener"
                               class="flex items-center gap-4 bg-white border border-[#e2e8f0] rounded-2xl p-4 no-underline text-inherit transition-all hover:border-[rgba(27,58,107,.2)] hover:-translate-y-0.5">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 text-[.65rem] font-extrabold text-[#f59e0b]" style="background:rgba(245,158,11,.1)">
                                    {{ $aExt }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-[#0f172a] truncate">{{ $aName }}</p>
                                    <p class="text-xs text-[#94a3b8] mt-0.5">Quiz attachment · click to open</p>
                                </div>
                                <svg class="w-4 h-4 text-[#94a3b8] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            @endforeach
                        </div>
                        @endif

                    </div>
                </div>
                @endif

            </div>
            {{-- end tabs --}}

        </div>
        {{-- end left col --}}

        <!-- ── Right col: sidebar ─────────────────── -->
        <aside class="fade-up-4">

            <p class="text-[.7rem] font-bold uppercase tracking-[.08em] text-[#94a3b8] mb-3.5">
                More from this objective
            </p>

            @if ($video->objective)
            @php $related = $video->objective->videos->where('id', '!=', $video->id)->values(); @endphp

                @if ($related->isEmpty())
                <div class="font-['Instrument_Serif',serif] italic text-sm text-[#94a3b8] py-4">
                    No other submissions yet.
                </div>
                @else
                <div class="flex flex-col gap-1">
                    @foreach ($related as $rel)
                    @php
                        $relStatus    = $rel->status instanceof \App\Enums\VideoStatus ? $rel->status->value : $rel->status;
                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $rel->video_url ?? '', $matches);
                        $relVideoId   = $matches[1] ?? null;
                        $relThumbnail = $relVideoId ? "https://img.youtube.com/vi/{$relVideoId}/mqdefault.jpg" : null;
                    @endphp
                    <a href="{{ route('video.view', $rel) }}"
                       class="related-card flex gap-3.5 p-3 rounded-xl no-underline text-inherit transition-colors hover:bg-[#eff6ff]">
                        <div class="relative w-24 h-[60px] rounded-lg overflow-hidden shrink-0 bg-[#0f172a]">
                            @if ($relThumbnail)
                            <img src="{{ $relThumbnail }}" alt="{{ $rel->title }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center" style="background:rgba(27,58,107,.15)">
                                <span class="text-[10px] text-white/20">No preview</span>
                            </div>
                            @endif
                            <div class="play-overlay absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200">
                                <div class="w-[26px] h-[26px] rounded-full flex items-center justify-center bg-[rgba(245,158,11,.9)]">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#1b3a6b"><path d="M2 1.5l6 3.5-6 3.5V1.5z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0 py-0.5">
                            <p class="text-sm font-medium text-[#0f172a] leading-snug line-clamp-2 mb-1.5">
                                {{ $rel->title ?? 'Untitled submission' }}
                            </p>
                            <div class="flex items-center gap-2">
                                @if ($relStatus === 'approved')
                                <span class="text-[.6rem] font-bold uppercase tracking-[.04em] px-2 py-[.2rem] rounded-full text-[#f59e0b]"
                                      style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.3)">approved</span>
                                @else
                                <span class="text-[.6rem] font-bold uppercase tracking-[.04em] px-2 py-[.2rem] rounded-full text-[#94a3b8]"
                                      style="background:rgba(27,58,107,.06);border:1px solid rgba(27,58,107,.1)">{{ $relStatus }}</span>
                                @endif
                                <span class="text-[11px] text-[#94a3b8]">{{ $rel->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            @endif

            {{-- Back to course --}}
            @if ($video->course)
            <div class="mt-8 pt-6 border-t border-[#e2e8f0]">
                <a href="{{ route('courses.view', $video->course) }}"
                   class="group flex items-center gap-2 text-sm font-semibold text-[#94a3b8] no-underline transition-colors hover:text-[#1b3a6b]">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                         class="transition-transform group-hover:-translate-x-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to {{ $video->course->name }}
                </a>
            </div>
            @endif

        </aside>

    </div>
</main>

<x-footer></x-footer>

<script>
    function switchTab(id, btn) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('tab-' + id).classList.add('active');
    }
</script>

</body>
</html>
