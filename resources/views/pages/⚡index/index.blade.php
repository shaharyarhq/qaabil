<div>

    @php
        $settings = getHomePageSettings();
        $heroSlides = $settings->hero_slides;
    @endphp
    <!-- ── Hero Slider ───────────────────────────────────── -->

    <div class="hero-slider relative overflow-hidden">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach ($heroSlides as $slide)
                    <div class="swiper-slide">
                        <div class="relative h-125 md:h-150 lg:h-175">
                            <img src="{{ Storage::url($slide['image']) }}" alt="{{ $slide['alt'] }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-linear-to-r from-[#1b3a6b]/90 to-transparent"></div>
                            <div class="relative z-10 h-full flex items-center">
                                <div class="max-w-7xl mx-auto px-8 w-full">
                                    <div class="max-w-lg">
                                        <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                                            {{ $slide['title'] }}
                                        </h2>
                                        <p class="text-white/70 text-lg mb-8">
                                            {{ $slide['sub'] }}
                                        </p>
                                        <a href="{{ $slide['button_url'] }}"
                                            class="inline-flex items-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-semibold rounded-lg px-8 py-3.5 transition-all">
                                            {{ $slide['button_label'] }}
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
        {{-- <div class="flex items-end justify-between mb-10">
            <div>
                <div
                    class="inline-flex items-center gap-2 text-[.72rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-2">
                    <span class="inline-block w-4.5 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                    All Courses
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Start learning
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]"
                        style="font-size:1.1em">today</span>
                </h2>
            </div>
        </div> --}}

        {{-- @php
            $bands = ['band-1', 'band-2', 'band-3', 'band-4', 'band-5'];
            $courses = $courses->values();
        @endphp --}}

        {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr"> --}}

        {{-- @foreach ($courses as $i => $course)
                <livewire:courses.course-card :course="$course" :i="$i" :key="$course->id" />
            @endforeach --}}

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

        {{-- </div> --}}

        <!-- ── Qualifications ─────────────────────────────────── -->
        <div class="max-w-7xl mx-auto px-6 mb-14">

            <div class="mb-10">
                <div
                    class="inline-flex items-center gap-2 text-[.72rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-2">
                    <span class="inline-block w-4.5 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                    Browse by
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Choose your
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]"
                        style="font-size:1.1em">qualification</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($qualifications as $qualification)
                    <a href="{{ route('courses.index', ['qualification' => $qualification->id]) }}"
                        class="group relative bg-white rounded-[20px] p-7 border border-[#e2e8f0] transition-all duration-[.22s] ease hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.15)] hover:border-[#1b3a6b]/20">

                        <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-5 transition-colors"
                            style="background:rgba(27,58,107,.08)">
                            <svg class="w-5 h-5 text-[#1b3a6b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14l6.16-3.42A12.083 12.083 0 0121 17.5c-2.24 1.5-5.06 2.5-9 2.5s-6.76-1-9-2.5a12.083 12.083 0 012.84-6.92L12 14z" />
                            </svg>
                        </div>

                        <h3
                            class="text-[1.1rem] font-extrabold text-[#0f172a] mb-1.5 leading-snug group-hover:text-[#1b3a6b] transition-colors">
                            {{ $qualification->name }}
                        </h3>

                        <p class="text-[.8rem] leading-relaxed text-[#64748b] mb-4 line-clamp-2">
                            {{ $qualification->description }}
                        </p>

                        <div class="flex items-center gap-1.5 text-[.72rem] font-bold text-[#f59e0b]">
                            {{ $qualification->courses_count }}
                            {{ Str::plural('course', $qualification->courses_count) }}
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>

        {{-- Manifesto --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-16 py-14 text-center">
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.4] max-w-160 mx-auto"
                    style="font-size:clamp(1.6rem,3vw,2.25rem)">
                    {!! str($settings->manifesto_quote) !!}
                </p>
                <div class="w-12 h-0.5 rounded mx-auto my-5" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-[.85rem] text-white/45 max-w-130 mx-auto leading-[1.75]">
                    {{ str($settings->manifesto_description)->sanitizeHtml()->stripTags() }}
                </p>
            </div>
        </div>

    </main>

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

</div>
