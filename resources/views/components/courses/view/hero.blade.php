 <!-- ── Hero ──────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden fade-up">
        <div class="absolute rounded-full pointer-events-none"
            style="width:clamp(250px,50vw,500px);height:clamp(250px,50vw,500px);background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 65%);top:-80px sm:top:-120px lg:top:-160px;right:-60px sm:right:-80px lg:right:-100px">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-14 relative z-10">
            <!-- Breadcrumb -->
            <div
                class="flex flex-wrap items-center gap-1.5 sm:gap-2 mb-4 sm:mb-6 lg:mb-8 text-[.65rem] xs:text-[.7rem] sm:text-[.75rem] font-semibold text-white/40">
                <a wire:navigate href="{{ route('courses.index') }}"
                    class="text-white/40 no-underline transition-colors hover:text-[#f59e0b]">Courses</a>
                <span class="text-[#f59e0b] text-[.55rem] xs:text-[.6rem] sm:text-[.65rem]">✦</span>
                <span
                    class="text-white/65 truncate max-w-37.5 xs:max-w-[200px] sm:max-w-none">{{ $course->name }}</span>
            </div>

            <!-- Main Content -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 sm:gap-8 lg:gap-10">
                <!-- Left: Title + Description -->
                <div class="max-w-2xl">
                    <div
                        class="inline-flex items-center gap-1.5 sm:gap-2 text-[.6rem] xs:text-[.65rem] sm:text-[.7rem] font-extrabold uppercase tracking-widest text-white/50 mb-3 sm:mb-4">
                        <span class="inline-block w-3 sm:w-4 h-0.5 rounded-sm bg-[#f59e0b]"></span>
                        Course
                    </div>
                    <h1 class="font-['Instrument_Serif',serif] font-normal text-white leading-[1.1] tracking-tight mb-3 sm:mb-4 lg:mb-5"
                        style="font-size:clamp(1.8rem,4.5vw,3.75rem)">
                        {{ $course->name }}
                    </h1>
                    <p class="text-white/60 text-sm xs:text-base leading-relaxed max-w-130">
                        {{ $course->description }}
                    </p>
                </div>

                <!-- Right: Stats Cards -->
                <div class="flex flex-wrap gap-2 sm:gap-3 lg:justify-end shrink-0">
                    @foreach ([[$course->sections_count, Str::plural('Section', $course->sections_count)], [$course->chapters_count, Str::plural('Chapter', $course->chapters_count)], [$course->objectives_count, Str::plural('Learning Objective', $course->objectives_count)], [$course->videos_count ?? 0, 'Videos']] as [$num, $label])
                        <div class="text-center rounded-xl sm:rounded-2xl px-4 sm:px-5 lg:px-6 py-3 sm:py-[.9rem] lg:py-[1.1rem] flex-1 sm:flex-none min-w-20 xs:min-w-[90px] sm:min-w-25"
                            style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);backdrop-filter:blur(4px)">
                            <div
                                class="font-['Instrument_Serif',serif] text-[1.5rem] xs:text-[1.75rem] sm:text-[2rem] lg:text-[2.25rem] text-white leading-none">
                                {{ $num }}</div>
                            <div
                                class="text-[.6rem] xs:text-[.65rem] sm:text-[.68rem] text-white/45 mt-0.5 sm:mt-1 font-bold uppercase tracking-[.06em] sm:tracking-[.08em]">
                                {{ $label }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
