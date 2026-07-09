<div>
    {{-- ══════════════════════════════════════════════
    SETTINGS
    ══════════════════════════════════════════════ --}}
    @php
        $settings = app(\App\Settings\AcademyPageSettings::class);

        $hero = $settings->hero;
        $about = $settings->about;
        $courses = $settings->courses;
        $features = $settings->features;
        $gallery = $settings->gallery;
        $tutors = $settings->tutors;
        $testimonials = $settings->testimonials;
        $manifesto = $settings->manifesto;

        // Resolves stored hrefs: "#section", "route:name", or a full url/path.
        $resolveHref = function (?string $href) {
            if (!$href) {
                return '#';
            }
            if (str_starts_with($href, 'route:')) {
                return route(substr($href, 6));
            }
            return $href;
        };

        // Resolves a FileUpload path (public disk) into a full URL.
        $imgUrl = function (?string $path) {
            return $path ? \Illuminate\Support\Facades\Storage::disk('public')->url($path) : '';
        };
    @endphp

    {{-- ══════════════════════════════════════════════
    HERO SLIDER
    ══════════════════════════════════════════════ --}}
    <div class="acad-hero-slider relative overflow-hidden">
        <div class="swiper academyHeroSwiper">
            <div class="swiper-wrapper">
                @foreach ($hero['slides'] as $slide)
                    <div class="swiper-slide">
                        <div class="relative h-105 sm:h-125 md:h-140 lg:h-170">
                            <img src="{{ $imgUrl($slide['image']) }}" alt="{{ $slide['alt'] }}"
                                class="absolute inset-0 w-full h-full object-cover object-center">
                            <div class="absolute inset-0"
                                style="background:linear-gradient(105deg,rgba(27,58,107,.95) 0%,rgba(27,58,107,.65) 50%,rgba(27,58,107,.3) 100%)">
                            </div>
                            <div class="relative z-10 h-full flex items-center">
                                <div class="w-full px-5 sm:px-8 max-w-7xl mx-auto">
                                    <div class="max-w-lg">
                                        <div class="inline-flex items-center gap-2 rounded-full px-3 py-1 mb-4 sm:mb-6"
                                            style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.3)">
                                            <span
                                                class="inline-block w-1.5 h-1.5 rounded-full bg-[#f59e0b] shrink-0 animate-pulse"></span>
                                            <span
                                                class="text-white/80 text-[.65rem] sm:text-[.72rem] font-bold uppercase tracking-[.08em]">{{ $slide['tag'] }}</span>
                                        </div>
                                        <h2 class="text-white font-extrabold leading-[1.1] tracking-tight mb-3 sm:mb-4"
                                            style="font-size:clamp(1.6rem,5vw,3.5rem)">
                                            {{ $slide['title'] }}
                                        </h2>
                                        <p
                                            class="text-white/65 text-sm sm:text-base md:text-lg mb-6 sm:mb-8 leading-relaxed max-w-sm sm:max-w-md">
                                            {{ $slide['subtitle'] }}
                                        </p>
                                        <div class="flex flex-col xs:flex-row flex-wrap gap-3">
                                            <a href="{{ $resolveHref($slide['cta1_href']) }}"
                                                class="no-underline inline-flex items-center justify-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-6 py-3 text-sm transition-all">
                                                {{ $slide['cta1_label'] }}
                                                <svg class="w-4 h-4 ml-2 shrink-0" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                            <a href="{{ $resolveHref($slide['cta2_href']) }}"
                                                class="no-underline inline-flex items-center justify-center text-white/80 font-semibold rounded-xl px-6 py-3 text-sm transition-all hover:bg-white/10"
                                                style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.2)">
                                                {{ $slide['cta2_label'] }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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

    <main class="flex flex-col gap-16 sm:gap-20 md:gap-24 pb-20 sm:pb-28">
        {{-- ══════════════════════════════════════════════
        ABOUT QAABIL ACADEMY
        ══════════════════════════════════════════════ --}}
        <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 pt-12 sm:pt-16 md:pt-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div>
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-3">
                        <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                        {{ $about['heading'] }}
                    </div>
                    <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug mb-5 sm:mb-6 [&_em]:font-['Instrument_Serif',serif] [&_em]:font-normal [&_em]:italic [&_em]:text-[#1b3a6b]"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        {!! str($about['title'])->sanitizeHtml() !!}
                    </h2>
                    <div class="space-y-3 sm:space-y-4 text-[#475569] leading-relaxed text-sm">
                        {!! str($about['description'])->sanitizeHtml() !!}
                    </div>
                    <div class="flex flex-col xs:flex-row flex-wrap gap-3 mt-7 sm:mt-8">
                        <a href="{{ $resolveHref($about['cta1_href']) }}"
                            class="no-underline text-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-6 py-3 text-sm transition-colors">
                            {{ $about['cta1_label'] }}
                        </a>
                        <a href="{{ $resolveHref($about['cta2_href']) }}"
                            class="no-underline text-center text-[#1b3a6b] font-semibold rounded-xl px-6 py-3 text-sm transition-all hover:bg-[#1b3a6b]/5 border border-[#1b3a6b]/20">
                            {{ $about['cta2_label'] }}
                        </a>
                    </div>
                </div>
                <div class="relative h-70 sm:h-85 mt-4 lg:mt-0 lg:h-105 block">
                    <img src="{{ $imgUrl($about['image_main']) }}" alt="Students at Qaabil Academy"
                        class="absolute top-0 left-0 w-[65%] h-[75%] object-cover rounded-2xl shadow-[0_20px_40px_-12px_rgba(27,58,107,.2)]">
                    <img src="{{ $imgUrl($about['image_secondary']) }}" alt="One-to-one tutoring session"
                        class="absolute bottom-0 right-0 w-[52%] h-[58%] object-cover rounded-2xl shadow-[0_20px_40px_-12px_rgba(27,58,107,.2)] border-4 border-white">
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════════
        WHAT WE OFFER (COURSES)
        ══════════════════════════════════════════════ --}}
        <section id="offerings" class="max-w-7xl mx-auto px-4 sm:px-6">

            <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap"
                rel="stylesheet">

            <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                    {{ $courses['heading'] }}
                </div>
                <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug [&_em]:font-['Instrument_Serif',serif] [&_em]:font-normal [&_em]:italic [&_em]:text-[#1b3a6b]"
                    style="font-size:clamp(1.6rem,4vw,2rem)">
                    {!! str($courses['title'])->sanitizeHtml() !!}
                </h2>
                <div class="text-[#475569] mt-3 leading-relaxed text-sm">
                    {!! str($courses['description'])->sanitizeHtml() !!}
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($courses['items'] as $o)
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

                        <div class="relative z-10 flex flex-col flex-1">

                            @if (!empty($o['logo']))
                                <img src="{{ $imgUrl($o['logo']) }}" width="{{ $o['logo_width'] ?? 260 }}"
                                    height="{{ $o['logo_height'] ?? 40 }}" alt="{{ $o['title'] }}"
                                    class="mb-5 object-contain object-left" />
                            @elseif (!empty($o['icon']))
                                <div class="text-3xl mb-5">{{ $o['icon'] }}</div>
                            @endif

                            @if (!empty($o['subtitle']))
                                <div
                                    class="text-[.68rem] font-bold uppercase tracking-wider mb-1.5 {{ $o['dark'] ? 'text-[#f59e0b]' : 'text-[#94a3b8]' }}">
                                    {{ $o['subtitle'] }}
                                </div>
                            @endif

                            <h3 class="font-semibold leading-tight mb-3 {{ $o['dark'] ? 'text-white' : 'text-[#0f172a]' }}"
                                style="font-family:'Fredoka',sans-serif; font-size:clamp(1.6rem,3.5vw,2rem); letter-spacing:-.01em;">
                                {{ $o['title'] }}
                            </h3>

                            @if (!empty($o['desc']))
                                <p
                                    class="text-sm leading-relaxed mb-5 {{ $o['dark'] ? 'text-white/55' : 'text-[#475569]' }}">
                                    {{ $o['desc'] }}
                                </p>
                            @endif

                            <ul
                                class="{{ $isLongList ? 'grid grid-cols-2 gap-x-3 gap-y-2' : 'space-y-2' }} mb-6 flex-1">
                                @foreach ($o['features'] as $f)
                                    <li
                                        class="flex items-center gap-2 text-xs font-semibold {{ $o['dark'] ? 'text-white/70' : 'text-[#1b3a6b]' }}">
                                        <span
                                            class="inline-block w-1.5 h-1.5 rounded-full bg-[#f59e0b] shrink-0"></span>
                                        {{ $f }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ $resolveHref($o['cta_href']) }}"
                                class="no-underline text-center py-3 rounded-xl text-sm font-extrabold transition-colors mt-auto
                                {{ $o['dark']
                                    ? 'bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b]'
                                    : 'bg-[#1b3a6b]/5 hover:bg-[#1b3a6b]/10 text-[#1b3a6b] border border-[#1b3a6b]/15' }}">
                                {{ $o['cta_label'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ══════════════════════════════════════════════
        WHY CHOOSE QAABIL ACADEMY (FEATURES)
        ══════════════════════════════════════════════ --}}
        <section class="bg-[#f8fafc] border-y border-[#e2e8f0]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">
                <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-3">
                        <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                        {{ $features['heading'] }}
                    </div>
                    <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug [&_em]:font-['Instrument_Serif',serif] [&_em]:font-normal [&_em]:italic [&_em]:text-[#1b3a6b]"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        {!! str($features['title'])->sanitizeHtml() !!}
                    </h2>
                    <p class="text-[#475569] mt-3 leading-relaxed text-sm max-w-md mx-auto">
                        {{ $features['description'] }}
                    </p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    @foreach ($features['items'] as $why)
                        <div
                            class="bg-white border border-[#e2e8f0] rounded-2xl p-5 sm:p-6 transition-all hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                            <div class="text-xl sm:text-2xl mb-3 sm:mb-4">{{ $why['icon'] }}</div>
                            <h3 class="text-sm sm:text-base font-extrabold text-[#0f172a] mb-2">{{ $why['title'] }}
                            </h3>
                            <p class="text-sm text-[#475569] leading-relaxed">{{ $why['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════════
        GALLERY SLIDER
        ══════════════════════════════════════════════ --}}
        <section id="gallery" class="w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-2">
                            <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                            {{ $gallery['heading'] }}
                        </div>
                        <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug [&_em]:font-['Instrument_Serif',serif] [&_em]:font-normal [&_em]:italic [&_em]:text-[#1b3a6b]"
                            style="font-size:clamp(1.5rem,4vw,2rem)">
                            {!! str($gallery['title'])->sanitizeHtml() !!}
                        </h2>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button
                            class="gallery-prev w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="gallery-next w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            @php
                $galleryImages = collect($gallery['images'])
                    ->map(fn($img) => [$imgUrl($img['image']), $img['alt']])
                    ->toArray();
            @endphp

            <div class="px-4 sm:px-6" style="overflow:hidden" x-data="{
                open: false,
                activeIndex: 0,
                images: {{ Js::from($galleryImages) }},
                next() { this.activeIndex = (this.activeIndex + 1) % this.images.length },
                prev() { this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length }
            }"
                @keydown.escape.window="open = false" @keydown.arrow-right.window="if (open) next()"
                @keydown.arrow-left.window="if (open) prev()">

                <div class="swiper gallerySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($galleryImages as $index => [$src, $alt])
                            <div class="swiper-slide">
                                <div class="h-52 sm:h-64 md:h-80 rounded-xl sm:rounded-2xl overflow-hidden cursor-pointer"
                                    @click="open = true; activeIndex = {{ $index }}">
                                    <img src="{{ $src }}" alt="{{ $alt }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-show="open" x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4" @click="open = false"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    <button @click.stop="open = false"
                        class="absolute top-4 right-4 sm:top-6 sm:right-6 text-white text-3xl leading-none hover:opacity-70 z-10">
                        &times;
                    </button>

                    <button @click.stop="prev()"
                        class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 text-white text-4xl leading-none hover:opacity-70 z-10 px-2">
                        &#8249;
                    </button>

                    <img :src="images[activeIndex][0]" :alt="images[activeIndex][1]" @click.stop
                        class="max-w-full max-h-[85vh] rounded-xl shadow-2xl object-contain">

                    <button @click.stop="next()"
                        class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 text-white text-4xl leading-none hover:opacity-70 z-10 px-2">
                        &#8250;
                    </button>

                    <p x-show="images[activeIndex][1]" x-text="images[activeIndex][1]"
                        class="absolute bottom-4 sm:bottom-6 text-white text-sm sm:text-base"></p>
                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════════════════
        TUTORS SLIDER
        ══════════════════════════════════════════════ --}}
        <section id="tutors" class="w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest text-[#1b3a6b] mb-2">
                            <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                            {{ $tutors['heading'] }}
                        </div>
                        <h2 class="font-extrabold text-[#0f172a] tracking-tight leading-snug [&_em]:font-['Instrument_Serif',serif] [&_em]:font-normal [&_em]:italic [&_em]:text-[#1b3a6b]"
                            style="font-size:clamp(1.5rem,4vw,2rem)">
                            {!! str($tutors['title'])->sanitizeHtml() !!}
                        </h2>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button
                            class="tutors-prev w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            class="tutors-next w-10 h-10 rounded-full bg-white border border-[#e2e8f0] flex items-center justify-center hover:border-[#1b3a6b]/30 transition-all shadow-sm">
                            <svg class="w-4 h-4 text-[#1b3a6b]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="px-4 sm:px-6" style="overflow:hidden">
                <div class="swiper tutorsSwiper">
                    <div class="swiper-wrapper items-stretch">
                        @foreach ($tutors['items'] as $tutor)
                            <div class="swiper-slide h-auto!">
                                <div
                                    class="bg-white border border-[#e2e8f0] rounded-2xl sm:rounded-3xl p-5 sm:p-7 flex flex-col h-full transition-all hover:-translate-y-1 hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                                    <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-5">
                                        @if (!empty($tutor['avatar_image']))
                                            <img src="{{ $imgUrl($tutor['avatar_image']) }}"
                                                alt="{{ $tutor['name'] }}"
                                                class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl object-cover shrink-0">
                                        @else
                                            <div
                                                class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl flex items-center justify-center text-lg sm:text-xl font-extrabold shrink-0 text-white bg-[#1b3a6b]">
                                                {{ collect(explode(' ', $tutor['name']))->map(fn($w) => mb_substr($w, 0, 1))->join('') }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm sm:text-base font-extrabold text-[#0f172a]">
                                                {{ $tutor['name'] }}
                                            </div>
                                            <div class="text-xs font-semibold text-[#94a3b8]">{{ $tutor['role'] }}
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-[#475569] leading-relaxed flex-1 mb-4 sm:mb-5">
                                        {{ $tutor['bio'] }}
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($tutor['tags'] as $tag)
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
                    <div class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-widest mb-3"
                        style="color:rgba(245,158,11,.8)">
                        <span class="inline-block w-4 h-0.75 rounded-sm bg-[#f59e0b]"></span>
                        Testimonials
                    </div>
                    <h2 class="font-extrabold text-white tracking-tight leading-snug"
                        style="font-size:clamp(1.6rem,4vw,2rem)">
                        Hear from our
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">satisfied
                            students</span>
                    </h2>
                </div>
                <div class="swiper testimonialsSwiper overflow-hidden">
                    <div class="swiper-wrapper items-stretch">
                        @foreach ($testimonials['items'] as $t)
                            <div class="swiper-slide h-auto!">
                                <div class="rounded-2xl sm:rounded-3xl p-5 sm:p-7 h-full flex flex-col"
                                    style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1)">
                                    <div
                                        class="text-[#f59e0b] text-2xl sm:text-3xl font-serif mb-3 sm:mb-4 leading-none">
                                        "</div>
                                    <p class="text-white/75 text-sm leading-relaxed flex-1 mb-5 sm:mb-6 italic">
                                        {{ $t['quote'] }}
                                    </p>
                                    <div class="flex items-center gap-3">
                                        @if (!empty($t['avatar_image']))
                                            <img src="{{ $imgUrl($t['avatar_image']) }}" alt="{{ $t['name'] }}"
                                                class="w-9 h-9 sm:w-10 sm:h-10 rounded-full object-cover shrink-0">
                                        @else
                                            <div
                                                class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#f59e0b] flex items-center justify-center text-[#1b3a6b] font-extrabold text-sm shrink-0">
                                                {{ mb_substr($t['name'], 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-bold text-white">{{ $t['name'] }}</p>
                                            <p class="text-xs text-white/45">{{ $t['subject'] }}</p>
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
                    <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.45] max-w-155 mx-auto mb-4"
                        style="font-size:clamp(1.25rem,3.5vw,2.1rem)">
                        {{ $manifesto['quote'] }}
                    </p>
                    <div class="w-10 h-0.5 rounded mx-auto mb-5 sm:mb-6" style="background:rgba(245,158,11,.4)">
                    </div>
                    <div class="flex flex-col xs:flex-row flex-wrap gap-3 justify-center">
                        <a href="{{ $resolveHref($manifesto['button_url']) }}"
                            class="no-underline text-center bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-7 sm:px-8 py-3 text-sm transition-colors">
                            {{ $manifesto['button_label'] }}
                        </a>
                        <a href="{{ $manifesto['whatsapp_url'] }}" target="_blank"
                            class="no-underline text-center text-white/80 font-semibold rounded-xl px-7 sm:px-8 py-3 text-sm transition-all hover:bg-white/10"
                            style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                            {{ $manifesto['whatsapp_label'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- ══════════════════════════════════════════════
    WHATSAPP FLOATING BUTTON
    ══════════════════════════════════════════════ --}}
    <a href="{{ $manifesto['whatsapp_url'] }}?text=Hi%2C%20I%27m%20interested%20in%20Qaabil%20Academy."
        target="_blank"
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
                    }
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
