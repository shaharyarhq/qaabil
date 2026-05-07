<div>

    <!-- ── Hero Slider ───────────────────────────────────── -->
    @php
        $heroSlides = [
            [
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1600',
                'alt' => 'Students collaborating',
                'title' => 'Learn anything, together.',
                'sub' => 'Submit a video, unlock all courses for 30 days.',
                'cta' => ['label' => 'Get Started', 'href' => '#'],
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=1600',
                'alt' => 'Workspace',
                'title' => '10K+ Active Learners',
                'sub' => 'Join a community of knowledge sharers worldwide.',
                'cta' => ['label' => 'Browse Courses', 'href' => '#'],
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1600',
                'alt' => 'Online learning',
                'title' => 'Peer Reviewed Content',
                'sub' => 'Quality content validated by top contributors.',
                'cta' => ['label' => 'Learn More', 'href' => '#'],
            ],
        ];
    @endphp

    <div class="hero-slider relative overflow-hidden">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach ($heroSlides as $slide)
                    <div class="swiper-slide">
                        <div class="relative h-125 md:h-150 lg:h-175">
                            <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-r from-[#1b3a6b]/90 to-transparent"></div>
                            <div class="relative z-10 h-full flex items-center">
                                <div class="max-w-7xl mx-auto px-8 w-full">
                                    <div class="max-w-lg">
                                        <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                                            {{ $slide['title'] }}
                                        </h2>
                                        <p class="text-white/70 text-lg mb-8">
                                            {{ $slide['sub'] }}
                                        </p>
                                        <a href="{{ $slide['cta']['href'] }}"
                                            class="inline-flex items-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-semibold rounded-lg px-8 py-3.5 transition-all">
                                            {{ $slide['cta']['label'] }}
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigation Arrows --}}
            <button
                class="hero-prev absolute left-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all border border-white/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button
                class="hero-next absolute right-5 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm flex items-center justify-center transition-all border border-white/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- Pagination Dots --}}
            <div class="hero-pagination absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3"></div>
        </div>
    </div>

    {{-- Swiper CSS & JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @script
        <script>
            new Swiper('.heroSwiper', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                speed: 800,
                navigation: {
                    nextEl: '.hero-next',
                    prevEl: '.hero-prev',
                },
                pagination: {
                    el: '.hero-pagination',
                    clickable: true,
                    renderBullet: function(index, className) {
                        return '<span class="' + className +
                            ' w-3 h-3 rounded-full cursor-pointer transition-all duration-300" style="background:rgba(255,255,255,.3)"></span>';
                    },
                },
                on: {
                    init: function() {
                        document.querySelectorAll('.hero-pagination .swiper-pagination-bullet').forEach(bullet => {
                            bullet.addEventListener('mouseenter', () => {
                                if (!bullet.classList.contains('swiper-pagination-bullet-active')) {
                                    bullet.style.background = 'rgba(245,158,11,.5)';
                                }
                            });
                            bullet.addEventListener('mouseleave', () => {
                                if (!bullet.classList.contains('swiper-pagination-bullet-active')) {
                                    bullet.style.background = 'rgba(255,255,255,.3)';
                                }
                            });
                        });
                    }
                }
            });

            const observer = new MutationObserver(() => {
                document.querySelectorAll('.hero-pagination .swiper-pagination-bullet').forEach(bullet => {
                    if (bullet.classList.contains('swiper-pagination-bullet-active')) {
                        bullet.style.background = '#f59e0b';
                        bullet.style.width = '28px';
                        bullet.style.borderRadius = '999px';
                    } else {
                        bullet.style.background = 'rgba(255,255,255,.3)';
                        bullet.style.width = '12px';
                        bullet.style.borderRadius = '50%';
                    }
                });
            });

            observer.observe(document.querySelector('.hero-pagination'), {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['class']
            });
        </script>
    @endscript

    <style>
        .hero-slider .swiper-slide {
            opacity: 0 !important;
            transition: opacity 0.8s ease;
        }

        .hero-slider .swiper-slide-active {
            opacity: 1 !important;
        }
    </style>

    {{-- <!-- ── Trust bar ──────────────────────────────── -->
    <div class="bg-white border-b border-[#e2e8f0]">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex flex-wrap items-center justify-center md:justify-between gap-4 divide-x divide-[#e2e8f0]">
                @php
                    $trustItems = [
                        ['num' => '100%', 'label' => 'Free to access'],
                        ['num' => 'Peer', 'label' => 'Reviewed videos'],
                        ['num' => 'Open', 'label' => 'Community platform'],
                        ['num' => '∞', 'label' => 'Knowledge unlocked'],
                    ];
                @endphp
                @foreach ($trustItems as $t)
                    <div class="text-center px-6 first:pl-0 last:pr-0">
                        <div class="text-[1.25rem] font-extrabold text-[#1b3a6b] leading-none">{{ $t['num'] }}</div>
                        <div class="text-[.72rem] font-medium text-[#94a3b8] mt-0.5">{{ $t['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <!-- ── Courses ─────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-6 py-14 pb-28">

        <!-- section header -->
        <div class="flex items-end justify-between mb-10">
            <div>
                <div
                    class="inline-flex items-center gap-2 text-[.72rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                    <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    All Courses
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Start learning
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]"
                        style="font-size:1.1em">today</span>
                </h2>
            </div>
        </div>

        @php
            $bands = ['band-1', 'band-2', 'band-3', 'band-4', 'band-5'];
            $courses = $courses->values();
        @endphp


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">

            @foreach ($courses as $i => $course)
                <livewire:courses.course-card :course="$course" :i="$i" :key="$course->id" />
            @endforeach

            {{-- CTA dark card
            <div
                class="card-dark fade-up d6 relative bg-[#1b3a6b] rounded-[20px] overflow-hidden p-8 flex flex-col justify-between transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.5)]">
                <div class="relative z-10">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-5 shrink-0"
                        style="background:rgba(245,158,11,.15)">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-[1.75rem] font-extrabold text-white mb-2 leading-snug">
                        Create a
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">course</span>
                    </h3>
                    <p class="text-[.825rem] leading-relaxed text-white/45">
                        Admin? Design sections, chapters, invite maintainers, and grow the knowledge base.
                    </p>
                </div>
                <div class="relative z-10 mt-7">
                    <button
                        class="w-full py-[.7rem] rounded-xl text-[.85rem] font-extrabold bg-[#f59e0b] text-[#1b3a6b] border-none cursor-pointer transition-colors hover:bg-[#d97706]">
                        + New course
                    </button>
                    <p class="text-[.7rem] text-center mt-3 text-white/25">
                        Unlock by subscribing or uploading an approved video
                    </p>
                </div>
            </div> --}}

        </div>


        {{-- Manifesto --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.4] max-w-[640px] mx-auto"
                    style="font-size:clamp(1.6rem,3vw,2.25rem)">
                    "Upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter"
                </p>
                <div class="w-12 h-[2px] rounded mx-auto my-5" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-[.85rem] text-white/45 max-w-[520px] mx-auto leading-[1.75]">
                    Every course contains chapters with clear objectives. Students submit video solutions.
                    Maintainers review and accept. One approved video unlocks the rest —
                    crowdsourced, peer-validated, forever free.
                </p>
            </div>
        </div>

    </main>

</div>
