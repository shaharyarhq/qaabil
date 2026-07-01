<div>
    {{-- ══════════════════════════════════════════════
    HERO SLIDER
    ══════════════════════════════════════════════ --}}
    @php
        $academySlides = [
            [
                'image' =>
                    'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80',
                'alt' => 'Qaabil Academy classroom',
                'tag' => 'Now Enrolling — Batch 2025',
                'title' => 'Where capability meets community.',
                'sub' =>
                    'Qaabil Academy is a physical learning centre built on the same values as the platform — peer-driven, proof-based, and free of ego.',
                'cta1' => ['label' => 'Enrol Now', 'href' => '#contact'],
                'cta2' => ['label' => 'Explore Courses', 'href' => '#offerings'],
            ],
            [
                'image' =>
                    'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80',
                'alt' => 'Tutors teaching',
                'tag' => 'Expert-Led · In-Person',
                'title' => 'Taught by people who actually do.',
                'sub' =>
                    'Every tutor at Qaabil Academy is a practitioner. No textbook-only instructors — just real people with real work to show for it.',
                'cta1' => ['label' => 'Meet the Tutors', 'href' => '#tutors'],
                'cta2' => ['label' => 'Our Story', 'href' => '#about'],
            ],
            [
                'image' =>
                    'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80',
                'alt' => 'Students at work',
                'tag' => 'In-Person & Hybrid',
                'title' => 'Small batches. Serious results.',
                'sub' => 'We cap every cohort deliberately. More feedback. More accountability. Better outcomes.',
                'cta1' => ['label' => 'View Batches', 'href' => '#offerings'],
                'cta2' => ['label' => 'See the Gallery', 'href' => '#gallery'],
            ],
        ];
    @endphp
    <div class="acad-hero-slider relative overflow-hidden">
        <div class="swiper academyHeroSwiper">
            <div class="swiper-wrapper">
                @foreach ($academySlides as $slide)
                    <div class="swiper-slide">
                        {{-- Mobile: 420px | tablet: 560px | desktop: 680px --}}
                        <div class="relative h-[420px] sm:h-[500px] md:h-[560px] lg:h-[680px]">
                            <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                class="absolute inset-0 w-full h-full object-cover object-center">
                            <div class="absolute inset-0"
                                style="background:linear-gradient(105deg,rgba(27,58,107,.95) 0%,rgba(27,58,107,.65) 50%,rgba(27,58,107,.3) 100%)">
                            </div>
                            <div class="relative z-10 h-full flex items-center">
                                <div class="w-full px-5 sm:px-8 max-w-7xl mx-auto">
                                    <div class="max-w-lg">
                                        {{-- tag pill --}}
                                        <div class="inline-flex items-center gap-2 rounded-full px-3 py-1 mb-4 sm:mb-6"
                                            style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">
                                            <span
                                                class="inline-block w-[6px] h-[6px] rounded-full bg-[#f59e0b] shrink-0 animate-pulse"></span>
                                            <span
                                                class="text-white/80 text-[.65rem] sm:text-[.72rem] font-bold uppercase tracking-[.08em]">{{ $slide['tag'] }}</span>
                                        </div>
                                        {{-- heading — clamp so it never overflows on tiny screens --}}
                                        <h2 class="text-white font-extrabold leading-[1.1] tracking-tight mb-3 sm:mb-4"
                                            style="font-size:clamp(1.6rem,5vw,3.5rem)">
                                            {{ $slide['title'] }}
                                        </h2>
                                        <p
                                            class="text-white/65 text-sm sm:text-base md:text-lg mb-6 sm:mb-8 leading-relaxed max-w-sm sm:max-w-md">
                                            {{ $slide['sub'] }}
                                        </p>
                                        {{-- CTAs stack on very small screens --}}
                                        <div class="flex flex-col xs:flex-row flex-wrap gap-3">
                                            <a href="{{ $slide['cta1']['href'] }}"
                                                class="no-underline inline-flex items-center justify-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-6 py-3 text-sm transition-all">
                                                {{ $slide['cta1']['label'] }}
                                                <svg class="w-4 h-4 ml-2 shrink-0" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                            <a href="{{ $slide['cta2']['href'] }}"
                                                class="no-underline inline-flex items-center justify-center text-white/80 font-semibold rounded-xl px-6 py-3 text-sm transition-all hover:bg-white/10"
                                                style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.2)">
                                                {{ $slide['cta2']['label'] }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- nav arrows — hidden on very small, smaller on mobile --}}
            <button
                class="acad-hero-prev hidden sm:flex absolute left-3 md:left-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm items-center justify-center transition-all border border-white/20">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="acad-hero-next hidden sm:flex absolute right-3 md:right-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 md:w-12 md:h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm items-center justify-center transition-all border border-white/20">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div class="acad-hero-pagination absolute bottom-5 sm:bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
            </div>
        </div>
    </div>
    {{-- ══════════════════════════════════════════════
    STATS BAR
    ══════════════════════════════════════════════ --}}
    {{-- <div class="bg-white border-b border-[#e2e8f0]"> --}}
        {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-5"> --}}
            {{-- 2-col on mobile, 4-col on md — remove divide-x on mobile (it looks odd with 2-col wrap) --}}
            {{-- <div class="grid grid-cols-2 md:grid-cols-4 text-center md:divide-x md:divide-[#e2e8f0]"> --}}
                {{-- @php
                $stats = [
                ['500+', 'Students enrolled'],
                ['12', 'Courses offered'],
                ['98%', 'Satisfaction rate'],
                ['3', 'Years running'],
                ];
                @endphp --}}
                {{-- @foreach ($stats as [$num, $label])
                <div
                    class="px-3 sm:px-6 py-3 border-b border-[#e2e8f0] md:border-b-0 last:border-b-0 nth-2:border-b nth-2:md:border-b-0">
                    <div class="text-[1.35rem] sm:text-[1.6rem] font-extrabold text-[#1b3a6b] leading-none">
                        {{ $num }}</div>
                    <div class="text-[.68rem] sm:text-[.72rem] font-semibold text-[#94a3b8] mt-0.5">
                        {{ $label }}</div>
                </div>
                @endforeach --}}
                {{--
            </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    <main class="flex flex-col gap-16 sm:gap-20 md:gap-24 pb-20 sm:pb-28">
        {{-- ══════════════════════════════════════════════
        ABOUT QAABIL ACADEMY
        ══════════════════════════════════════════════ --}}
        <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 pt-12 sm:pt-16 md:pt-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                {{-- text --}}
                <div>
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                        <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                        About Qaabil Academy
                    </div>
                    <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug mb-5 sm:mb-6"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        Where personalised learning
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">takes
                            shape.</span>
                    </h2>
                    <div class="space-y-3 sm:space-y-4 text-[#475569] leading-relaxed text-sm">
                        <p>Qaabil Academy is the physical extension of Qaabil, an online learning platform founded by
                            Mr. Zain — an education professional with 18 years of experience in the teaching and
                            learning industry.</p>
                        <p>Located at Plaza Damas, Sri Hartamas, Kuala Lumpur, we focus on one-to-one classes because we
                            believe individual attention produces the strongest results. Every student learns
                            differently, so our approach is tailored to each learner's pace, ability, goals, and
                            challenges.</p>
                        <p>We specialise in IGCSE and A Level programmes, while also supporting IB students and English
                            Language learners. Students don't just attend lessons — they receive focused mentorship,
                            structured guidance, and continuous accountability.</p>
                    </div>
                    <div class="flex flex-col xs:flex-row flex-wrap gap-3 mt-7 sm:mt-8">
                        <a href="#contact"
                            class="no-underline text-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-6 py-3 text-sm transition-colors">
                            Book a visit →
                        </a>
                        <a href="#offerings"
                            class="no-underline text-center text-[#1b3a6b] font-semibold rounded-xl px-6 py-3 text-sm transition-all hover:bg-[#1b3a6b]/5 border border-[#1b3a6b]/20">
                            See what we offer
                        </a>
                    </div>
                </div>
                {{-- image collage --}}
                <div class="relative h-[280px] sm:h-[340px] mt-4 lg:mt-0 lg:h-[420px] block">
                    <img src="{{ asset('images/academy/main-pic-qaabil.webp') }}" alt="Students at Qaabil Academy"
                        class="absolute top-0 left-0 w-[65%] h-[75%] object-cover rounded-2xl shadow-[0_20px_40px_-12px_rgba(27,58,107,.2)]">
                    <img src="{{ asset('images/academy/room-window.webp') }}" alt="One-to-one tutoring session"
                        class="absolute bottom-0 right-0 w-[52%] h-[58%] object-cover rounded-2xl shadow-[0_20px_40px_-12px_rgba(27,58,107,.2)] border-4 border-white">
                </div>
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        WHAT WE OFFER (SERVICES)
        ══════════════════════════════════════════════ --}}
        <section id="offerings" class="max-w-7xl mx-auto px-4 sm:px-6">

            {{-- Load Fredoka --}}
            <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap"
                rel="stylesheet">

            <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    What We Offer
                </div>
                <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug"
                    style="font-size:clamp(1.6rem,4vw,2rem)">
                    Subjects built for
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">real results</span>
                </h2>
                <p class="text-[#475569] mt-3 leading-relaxed text-sm">
                    One-to-one tutoring tailored to your syllabus, your pace, and your goals.
                </p>
            </div>

            @php
                $offerings = [
                    [
                        'icon_img' => asset('images/academy/exam-board-logo.webp'),
                        'badge' => null,
                        'title' => 'IGCSE',
                        'sub' => '',
                        'desc' => '',
                        'features' => [
                            'Business Studies',
                            'Accounting',
                            'Economics',
                            'Mathematics',
                            'Additional Mathematics',
                            'Biology',
                            'Chemistry',
                            'Physics',
                            'Combined Science',
                            'Geography',
                            'History',
                            'ICT',
                            'Computer Science',
                            'Travel & Tourism',
                            'Sociology',
                            'Psychology',
                            'English',
                            'Spanish',
                            'Chinese',
                            'Malay',
                        ],
                        'dark' => false,
                    ],
                    [
                        'icon_img' => asset('images/academy/exam-board-logo.webp'),
                        'badge' => null,
                        'title' => 'A Level',
                        'sub' => '',
                        'desc' => '',
                        'features' => [
                            'Business',
                            'Accounting',
                            'Economics',
                            'Mathematics',
                            'Additional Mathematics',
                            'Biology',
                            'Chemistry',
                            'Physics',
                            'Geography',
                            'History',
                            'Sociology',
                            'Psychology',
                            'English',
                            'Chinese',
                        ],
                        'dark' => false,
                    ],
                    [
                        'icon_img' => asset('images/academy/ib-logo.webp'),
                        'badge' => null,
                        'title' => 'IB',
                        'sub' => '',
                        'desc' =>
                            'Subject support across the IB Diploma Programme, tailored to your specific syllabus and assessment style.',
                        'icon_width' => 140,
                        'icon_height' => 40,
                        'features' => [
                            'Business Management',
                            'Economics',
                            'Mathematics',
                            'Biology',
                            'Chemistry',
                            'Physics',
                            'Geography',
                            'History',
                            'Psychology',
                            'English',
                        ],
                        'dark' => false,
                    ],
                    [
                        'icon' => '🗣️',
                        'badge' => null,
                        'title' => 'English Language',
                        'sub' => 'All levels welcome',
                        'desc' =>
                            'Conversational fluency, academic writing, and exam preparation — structured to your current level and target goal.',
                        'features' => ['Cambridge English', 'Business English', 'IELTS', 'TOEFL', 'MUET'],
                        'dark' => false,
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($offerings as $o)
                            @php $isLongList = count($o['features']) > 8; @endphp
                            <div
                                class="relative rounded-2xl sm:rounded-3xl p-7 sm:p-9 flex flex-col overflow-hidden transition-all duration-200 hover:-translate-y-1
                                                                                                                                        {{ $o['dark']
                    ? 'bg-[#1b3a6b] hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.45)]'
                    : 'bg-white border border-[#e2e8f0] hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]' }}">

                                @if ($o['dark'])
                                    <div class="absolute rounded-full pointer-events-none"
                                        style="width:220px;height:220px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 70%);bottom:-60px;right:-40px">
                                    </div>
                                @endif

                                @if ($o['badge'])
                                    <div class="absolute top-4 right-4 sm:top-5 sm:right-5">
                                        <span
                                            class="text-[.6rem] font-extrabold uppercase tracking-[.06em] bg-[#f59e0b] text-[#1b3a6b] rounded-full px-2.5 py-1">
                                            {{ $o['badge'] }}
                                        </span>
                                    </div>
                                @endif

                                <div class="relative z-10 flex flex-col flex-1">

                                    {{-- Icon --}}
                                    @if (isset($o['icon_img']))
                                        <img src="{{ $o['icon_img'] }}" @if (isset($o['icon_width'])) width="{{ $o['icon_width'] }}"
                                        @else width="260" @endif @if (isset($o['icon_height'])) height="{{ $o['icon_height'] }}"
                                            @else height="40" @endif alt="{{ $o['title'] }}" class="mb-5 object-contain object-left" />
                                    @else
                                        <div class="text-3xl mb-5">{{ $o['icon'] }}</div>
                                    @endif

                                    {{-- Sub --}}
                                    @if ($o['sub'])
                                        <div
                                            class="text-[.68rem] font-bold uppercase tracking-wider mb-1.5 {{ $o['dark'] ? 'text-[#f59e0b]' : 'text-[#94a3b8]' }}">
                                            {{ $o['sub'] }}
                                        </div>
                                    @endif

                                    {{-- Title --}}
                                    <h3 class="font-semibold leading-tight mb-3 {{ $o['dark'] ? 'text-white' : 'text-[#0f172a]' }}"
                                        style="font-family:'Fredoka',sans-serif; font-size:clamp(1.6rem,3.5vw,2rem); letter-spacing:-.01em;">
                                        {{ $o['title'] }}
                                    </h3>

                                    {{-- Desc --}}
                                    @if ($o['desc'])
                                        <p class="text-sm leading-relaxed mb-5 {{ $o['dark'] ? 'text-white/55' : 'text-[#475569]' }}">
                                            {{ $o['desc'] }}
                                        </p>
                                    @endif

                                    {{-- Features --}}
                                    <ul class="{{ $isLongList ? 'grid grid-cols-2 gap-x-3 gap-y-2' : 'space-y-2' }} mb-6 flex-1">
                                        @foreach ($o['features'] as $f)
                                            <li
                                                class="flex items-center gap-2 text-xs font-semibold {{ $o['dark'] ? 'text-white/70' : 'text-[#1b3a6b]' }}">
                                                <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#f59e0b] shrink-0"></span>
                                                {{ $f }}
                                            </li>
                                        @endforeach
                                    </ul>

                                    {{-- CTA --}}
                                    <a href="#contact" class="no-underline text-center py-3 rounded-xl text-sm font-extrabold transition-colors mt-auto
                                                                                                                                                {{ $o['dark']
                    ? 'bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b]'
                    : 'bg-[#1b3a6b]/5 hover:bg-[#1b3a6b]/10 text-[#1b3a6b] border border-[#1b3a6b]/15' }}">
                                        Enquire →
                                    </a>
                                </div>
                            </div>
                @endforeach
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        WHY CHOOSE QAABIL ACADEMY
        ══════════════════════════════════════════════ --}}
        <section class="bg-[#f8fafc] border-y border-[#e2e8f0]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                        <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                        Why Choose Us
                    </div>
                    <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        Not just another
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">coaching
                            centre.</span>
                    </h2>
                    <p class="text-[#475569] mt-3 leading-relaxed text-sm max-w-md mx-auto">
                        The market is full of institutes with tall promises. Here's what actually makes us different.
                    </p>
                </div>
                @php
                    $whys = [
                        [
                            '🎯',
                            'Proof-based learning',
                            'You don\'t pass a test — you build something real. Every cohort ends with a public portfolio project reviewed by industry practitioners, not just your tutor.',
                        ],
                        [
                            '👥',
                            'Cohort sizes capped at 15',
                            'We refuse to scale at the cost of quality. Small groups mean your tutor knows your name, your blockers, and your progress.',
                        ],
                        [
                            '🔗',
                            'Platform access included',
                            'Every academy student gets full Qaabil platform access. Your learning doesn\'t stop when the cohort ends — you keep the library forever.',
                        ],
                        [
                            '📍',
                            'Karachi-rooted, globally relevant',
                            'Curriculum built for the Pakistani job market — but benchmarked against international standards. Local context, global ambition.',
                        ],
                        [
                            '💸',
                            'Honest pricing, no hidden fees',
                            'The price you see is the price you pay. No "certification fees". No "placement fee". No subscriptions after graduation.',
                        ],
                        [
                            '🔄',
                            'Repeat until you\'re ready',
                            'Not satisfied with your output? Come back next cohort, on us. We don\'t hand out certificates to people who aren\'t ready.',
                        ],
                    ];
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    @foreach ($whys as [$icon, $title, $desc])
                        <div
                            class="bg-white border border-[#e2e8f0] rounded-2xl p-5 sm:p-6 transition-all hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                            <div class="text-xl sm:text-2xl mb-3 sm:mb-4">{{ $icon }}</div>
                            <h3 class="text-sm sm:text-base font-extrabold text-[#0f172a] mb-2">{{ $title }}
                            </h3>
                            <p class="text-sm text-[#475569] leading-relaxed">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        GALLERY SLIDER
        ══════════════════════════════════════════════ --}}
        <section id="gallery" class="w-full">
            {{-- header — max-w-7xl mein --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                            <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                            Gallery
                        </div>
                        <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug"
                            style="font-size:clamp(1.5rem,4vw,2rem)">
                            Life at
                            <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">Qaabil
                                Academy</span>
                        </h2>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button
                            class="gallery-prev w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="gallery-next w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            @php
                $galleryImages = [
                    [
                        'https://images.unsplash.com/photo-1605711285791-0219e80e43a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Workshop session',
                    ],
                    [
                        'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Students coding',
                    ],
                    [
                        'https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Collaboration session',
                    ],
                    [
                        'https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Team discussion',
                    ],
                    [
                        'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Classroom',
                    ],
                    [
                        'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Presentation day',
                    ],
                    [
                        'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'Group project',
                    ],
                ];
            @endphp

            {{-- Swiper full width pe, px sirf visual ke liye --}}
            <div class="px-4 sm:px-6" style="overflow:hidden">
                <div class="swiper gallerySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($galleryImages as [$src, $alt])
                            <div class="swiper-slide">
                                <div class="h-52 sm:h-64 md:h-80 rounded-xl sm:rounded-2xl overflow-hidden">
                                    <img src="{{ $src }}" alt="{{ $alt }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        TUTORS SLIDER
        ══════════════════════════════════════════════ --}}
        <section id="tutors" class="w-full">
            {{-- header — max-w-7xl mein --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                            <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                            Our Tutors
                        </div>
                        <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug"
                            style="font-size:clamp(1.5rem,4vw,2rem)">
                            Practitioners,
                            <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">not just
                                teachers.</span>
                        </h2>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button
                            class="tutors-prev w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="tutors-next w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            @php
                $tutors = [
                    [
                        'Z',
                        '#f59e0b',
                        'Zain Malik',
                        'Lead — Web Development',
                        'Full-stack developer with 8 years of Laravel experience. Has shipped products for clients across the UK, UAE, and Pakistan.',
                        ['Laravel', 'Vue.js', 'System Design'],
                    ],
                    [
                        'A',
                        '#1b3a6b',
                        'Ayesha Siddiqui',
                        'UI/UX Design',
                        'Senior product designer at a Karachi-based fintech. Teaching is her way of giving back — she\'s been doing it for 4 years.',
                        ['Figma', 'User Research', 'Design Systems'],
                    ],
                    [
                        'H',
                        '#0f172a',
                        'Hassan Raza',
                        'Digital Marketing',
                        'Runs his own performance marketing agency. He\'s managed ad budgets in the tens of millions — and he\'ll tell you what actually works.',
                        ['Meta Ads', 'SEO', 'Analytics'],
                    ],
                    [
                        'S',
                        '#f59e0b',
                        'Sara Ahmed',
                        'AI & Automation',
                        'ML engineer at a global tech company. Obsessed with making AI practical for builders — not just impressive on slides.',
                        ['Python', 'LLM APIs', 'Automation'],
                    ],
                    [
                        'U',
                        '#1b3a6b',
                        'Usman Tariq',
                        'Mobile Development',
                        'Ships Flutter apps for a living. Three of his apps have over 100k downloads on the Play Store.',
                        ['Flutter', 'Dart', 'Firebase'],
                    ],
                ];
            @endphp

            {{-- Swiper full width pe --}}
            <div class="px-4 sm:px-6" style="overflow:hidden">
                <div class="swiper tutorsSwiper">
                    <div class="swiper-wrapper items-stretch">
                        @foreach ($tutors as [$initial, $color, $name, $role, $bio, $tags])
                            <div class="swiper-slide !h-auto">
                                <div
                                    class="bg-white border border-[#e2e8f0] rounded-2xl sm:rounded-3xl p-5 sm:p-7 flex flex-col h-full transition-all hover:-translate-y-1 hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                                    <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl flex items-center justify-center text-lg sm:text-xl font-extrabold shrink-0 text-white"
                                            style="background:{{ $color }}">
                                            {{ $initial }}
                                        </div>
                                        <div>
                                            <div class="text-sm sm:text-base font-extrabold text-[#0f172a]">
                                                {{ $name }}
                                            </div>
                                            <div class="text-xs font-semibold text-[#94a3b8]">{{ $role }}
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-[#475569] leading-relaxed flex-1 mb-4 sm:mb-5">
                                        {{ $bio }}
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($tags as $tag)
                                            <span
                                                class="text-[.62rem] sm:text-[.65rem] font-bold uppercase tracking-wider bg-[#1b3a6b]/5 text-[#1b3a6b] rounded-full px-2.5 py-1">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        TESTIMONIALS
        ══════════════════════════════════════════════ --}}
        <section class="bg-[#1b3a6b] relative overflow-hidden">
            <div class="absolute rounded-full pointer-events-none"
                style="width:400px;height:400px;background:radial-gradient(circle,rgba(245,158,11,.15) 0%,transparent 65%);top:-160px;right:-80px">
            </div>
            <div class="absolute rounded-full pointer-events-none"
                style="width:250px;height:250px;background:radial-gradient(circle,rgba(99,132,255,.1) 0%,transparent 65%);bottom:-60px;left:40px">
            </div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 py-14 sm:py-16 md:py-20">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
                    <div class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] mb-3"
                        style="color:rgba(245,158,11,.8)">
                        <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                        Testimonials
                    </div>
                    <h2 class="font-extrabold text-white tracking-tight leading-snug"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        Hear from our
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">satisfied
                            students</span>
                    </h2>
                </div>
                @php
                    $testimonials = [
                        [
                            'A',
                            'Arman Dev',
                            'Business & Economics — CIMP',
                            'I\'ve been learning Business and Economics with Mr Zain for over a year now, and he always makes my learning experience interesting and engaging. His teaching style is very clear and he makes sure I end the class with full understanding. This has helped me consistently achieve scores above 80 in every exam.',
                        ],
                        [
                            'Z',
                            'Zaina Ahamed',
                            'Business Studies — IGCSE',
                            'Mr Zain has been the most supportive teacher ever! He has helped me improve in business studies by a lot and I am very grateful for this achievement — all thanks to him!',
                        ],
                        [
                            'K',
                            'Kaamil Sayeed',
                            'Business Studies — IGCSE',
                            'Very nice environment and teachers. Mr Zain from business has got me from a D to an A in Business Studies IGCSE.',
                        ],
                        [
                            'S',
                            'Saifullah Sawban',
                            'Business & Economics — International Baccalaureate',
                            'I got 85% in my business exam after I enrolled with Mr Zain. He is highly recommended for Business and Economics.',
                        ],
                        [
                            'D',
                            'Dewi',
                            'Accounting — IGCSE',
                            'I started with zero knowledge, but Mr Zain explained everything clearly and made accounting feel easy. His notes and shortcuts were super helpful, and he genuinely cares about his students.',
                        ],
                        [
                            'H',
                            'Harith Abdillah',
                            'Economics — IGCSE',
                            'Mr Zain is the best economics teacher! He helped me understand the concepts of each section in the syllabus and prepared me to have confidence for the exam, while also using fun acronyms.',
                        ],
                        [
                            'A',
                            'Amrissh Soo',
                            'Accounting — IGCSE',
                            'Mr Zain helped me go from a barely pass in my mocks to an A* in my Accounting IGCSE in just 4 months. If it wasn\'t for him I would not have been able to get even close to this result!',
                        ],
                    ];
                @endphp
                <div class="swiper testimonialsSwiper overflow-hidden">
                    <div class="swiper-wrapper items-stretch">
                        @foreach ($testimonials as [$initial, $name, $cohort, $quote])
                            <div class="swiper-slide !h-auto">
                                <div class="rounded-2xl sm:rounded-3xl p-5 sm:p-7 h-full flex flex-col"
                                    style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1)">
                                    <div class="text-[#f59e0b] text-2xl sm:text-3xl font-serif mb-3 sm:mb-4 leading-none">
                                        "</div>
                                    <p class="text-white/75 text-sm leading-relaxed flex-1 mb-5 sm:mb-6 italic">
                                        {{ $quote }}
                                    </p>
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#f59e0b] flex items-center justify-center text-[#1b3a6b] font-extrabold text-sm shrink-0">
                                            {{ $initial }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-white">{{ $name }}</p>
                                            <p class="text-xs text-white/45">{{ $cohort }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="testimonials-pagination flex justify-center gap-3 mt-7 sm:mt-8"></div>
                </div>
            </div>
        </section>
        {{-- ══════════════════════════════════════════════
        MANIFESTO / CLOSING CTA
        ══════════════════════════════════════════════ --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div
                class="manifesto relative bg-[#1b3a6b] rounded-2xl sm:rounded-3xl overflow-hidden px-6 sm:px-10 md:px-20 py-12 sm:py-16 text-center">
                <div class="absolute rounded-full pointer-events-none"
                    style="width:350px;height:350px;background:radial-gradient(circle,rgba(245,158,11,.16) 0%,transparent 65%);top:-160px;right:-60px">
                </div>
                <div class="relative z-10">
                    <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.45] max-w-[620px] mx-auto mb-4"
                        style="font-size:clamp(1.25rem,3.5vw,2.1rem)">
                        The education centre is where the platform's philosophy gets a physical form.
                    </p>
                    <div class="w-10 h-[2px] rounded mx-auto mb-5 sm:mb-6" style="background:rgba(245,158,11,.4)">
                    </div>
                    <div class="flex flex-col xs:flex-row flex-wrap gap-3 justify-center">
                        <a href="{{ route('contact') }}#contact"
                            class="no-underline text-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-7 sm:px-8 py-3 text-sm transition-colors">
                            Contact us →
                        </a>
                        <a href="https://wa.me/601167424472" target="_blank"
                            class="no-underline text-center text-white/80 font-semibold rounded-xl px-7 sm:px-8 py-3 text-sm transition-all hover:bg-white/10"
                            style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                            Ask on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- ══════════════════════════════════════════════
    WHATSAPP FLOATING BUTTON
    ══════════════════════════════════════════════ --}}
    <a href="https://wa.me/601167424472?text=Hi%2C%20I%27m%20interested%20in%20Qaabil%20Academy." target="_blank"
        class="wa-float fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 w-13 h-13 sm:w-14 sm:h-14 rounded-full flex items-center justify-center shadow-[0_8px_24px_-4px_rgba(37,211,102,.5)] transition-all hover:scale-110 hover:shadow-[0_12px_32px_-4px_rgba(37,211,102,.65)]"
        style="background:#25d366;width:52px;height:52px" title="Chat with us on WhatsApp">
        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="white" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg>
        <span class="absolute inset-0 rounded-full animate-ping opacity-30" style="background:#25d366"></span>
    </a>
    @script
    <script>
        // ── Hero ──
        new Swiper('.academyHeroSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            speed: 800,
            navigation: {
                nextEl: '.acad-hero-next',
                prevEl: '.acad-hero-prev'
            },
            pagination: {
                el: '.acad-hero-pagination',
                clickable: true,
                renderBullet: (index, className) =>
                    `<span class="${className} w-3 h-3 rounded-full cursor-pointer transition-all duration-300" style="background:rgba(255,255,255,.3)"></span>`,
            },
        });
        const acadHeroPag = document.querySelector('.acad-hero-pagination');
        if (acadHeroPag) {
            new MutationObserver(() => {
                acadHeroPag.querySelectorAll('.swiper-pagination-bullet').forEach(b => {
                    if (b.classList.contains('swiper-pagination-bullet-active')) {
                        b.style.background = '#f59e0b';
                        b.style.width = '28px';
                        b.style.borderRadius = '999px';
                    } else {
                        b.style.background = 'rgba(255,255,255,.3)';
                        b.style.width = '12px';
                        b.style.borderRadius = '50%';
                    }
                });
            }).observe(acadHeroPag, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['class']
            });
        }
        // ── Gallery ──
        new Swiper('.gallerySwiper', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            speed: 700,
            slidesPerView: 1.1,
            spaceBetween: 12,
            navigation: {
                nextEl: '.gallery-next',
                prevEl: '.gallery-prev'
            },
            breakpoints: {
                480: {
                    slidesPerView: 1.5,
                    spaceBetween: 14
                },
                640: {
                    slidesPerView: 2.1,
                    spaceBetween: 16
                },
                1024: {
                    slidesPerView: 3.1,
                    spaceBetween: 16
                },
            },
        });
        // ── Tutors ──
        new Swiper('.tutorsSwiper', {
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            speed: 700,
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: {
                nextEl: '.tutors-next',
                prevEl: '.tutors-prev'
            },
            breakpoints: {
                480: {
                    slidesPerView: 1.2
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            },
        });
        // ── Testimonials ──
        function updateTestimonialDots() {
            document.querySelectorAll('.testimonials-pagination .swiper-pagination-bullet').forEach(b => {
                if (b.classList.contains('swiper-pagination-bullet-active')) {
                    b.style.background = '#f59e0b';
                    b.style.width = '24px';
                    b.style.borderRadius = '999px';
                } else {
                    b.style.background = 'rgba(255,255,255,.25)';
                    b.style.width = '10px';
                    b.style.borderRadius = '50%';
                }
            });
        }
        new Swiper('.testimonialsSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            speed: 700,
            slidesPerView: 1,
            spaceBetween: 16,
            pagination: {
                el: '.testimonials-pagination',
                clickable: true,
                renderBullet: (index, className) =>
                    `<span class="${className} w-2.5 h-2.5 rounded-full cursor-pointer transition-all duration-300" style="background:rgba(255,255,255,.25)"></span>`,
            },
            on: {
                init() {
                    updateTestimonialDots();
                },
                slideChange() {
                    updateTestimonialDots();
                },
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            },
        });
        const testPag = document.querySelector('.testimonials-pagination');
        if (testPag) {
            new MutationObserver(updateTestimonialDots)
                .observe(testPag, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class']
                });
        }
    </script>
    @endscript
    <style>
        .acad-hero-slider .swiper-slide {
            opacity: 0 !important;
            transition: opacity 0.8s ease;
        }

        .acad-hero-slider .swiper-slide-active {
            opacity: 1 !important;
        }

        .wa-float {
            animation: wa-bounce 3s ease-in-out infinite;
        }

        @keyframes wa-bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        .wa-float:hover {
            animation: none;
        }

        /* xs breakpoint Tailwind doesn't ship by default */
        @media (min-width: 480px) {
            .xs\:flex-row {
                flex-direction: row;
            }

            .xs\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
    </style>
</div>