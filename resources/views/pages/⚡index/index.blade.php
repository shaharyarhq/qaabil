<div>

    <!-- ── Hero ───────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden">
        {{-- amber glow --}}
        <div class="absolute rounded-full pointer-events-none"
            style="width:600px;height:600px;background:radial-gradient(circle,rgba(245,158,11,.22) 0%,transparent 65%);top:-180px;right:-120px">
        </div>
        {{-- blue glow --}}
        <div class="absolute rounded-full pointer-events-none"
            style="width:300px;height:300px;background:radial-gradient(circle,rgba(99,132,255,.15) 0%,transparent 65%);bottom:-80px;left:60px">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 py-20 flex flex-col lg:flex-row items-center gap-16">

            <!-- copy -->
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-7"
                    style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                    <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                    <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">
                        Crowdsourced · Peer-Validated · Free
                    </span>
                </div>

                <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-5"
                    style="font-size:clamp(2.6rem,5vw,4rem)">
                    Learn anything.<br>
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]"
                        style="font-size:1.05em">Together.</span>
                </h1>

                <p class="text-white/60 text-[1.05rem] leading-[1.7] max-w-[440px] mb-9 mx-auto lg:mx-0">
                    Every chapter is unlocked by real video submissions. Submit once — access everything.
                </p>

                <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                    <button
                        class="bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-8 py-3 text-[.925rem] cursor-pointer transition-colors">
                        Browse courses
                    </button>
                    <button
                        class="text-white/90 font-bold rounded-xl px-8 py-3 text-[.925rem] cursor-pointer transition-all hover:bg-white/15"
                        style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.2)">
                        How it works
                    </button>
                </div>
            </div>

            <!-- floating feature cards -->
            <div class="shrink-0 grid grid-cols-2 gap-3 max-w-xs w-full">
                @php
                    $heroStats = [
                        ['icon' => '🎯', 'label' => 'Submit a video', 'sub' => 'to unlock chapters'],
                        ['icon' => '👥', 'label' => 'Peer reviewed', 'sub' => 'by top contributors'],
                        ['icon' => '♾️', 'label' => 'Approval to access', 'sub' => 'one approval = access'],
                        ['icon' => '🌍', 'label' => 'Community built', 'sub' => 'by members, for members'],
                    ];
                @endphp
                @foreach($heroStats as $s)
                    <div class="rounded-2xl p-4 backdrop-blur-md"
                        style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1)">
                        <div class="text-[1.4rem] mb-1.5">{{ $s['icon'] }}</div>
                        <div class="text-[.8rem] font-bold text-white mb-0.5">{{ $s['label'] }}</div>
                        <div class="text-[.72rem] font-medium text-white/50">{{ $s['sub'] }}</div>
                    </div>
                @endforeach
            </div>

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
                @foreach($trustItems as $t)
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
