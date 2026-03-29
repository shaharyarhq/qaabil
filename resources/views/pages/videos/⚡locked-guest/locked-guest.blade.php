<div>

    {{-- Hero-style locked section --}}
    <div class="relative overflow-hidden min-h-[calc(100vh-80px)] flex items-center justify-center"
         style="background:#1b3a6b">

        {{-- Grid overlay (matches .hero::before) --}}
        <div class="absolute inset-0 pointer-events-none"
             style="background-image:linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);background-size:56px 56px">
        </div>

        {{-- Amber glow top-right --}}
        <div class="absolute rounded-full pointer-events-none"
             style="width:600px;height:600px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-200px;right:-150px">
        </div>

        {{-- Blue glow bottom-left --}}
        <div class="absolute rounded-full pointer-events-none"
             style="width:350px;height:350px;background:radial-gradient(circle,rgba(99,132,255,.15) 0%,transparent 65%);bottom:-100px;left:40px">
        </div>

        <div class="relative z-10 w-full max-w-md mx-auto px-6 py-20 text-center">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-8"
                 style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.72rem] font-bold uppercase tracking-[.08em]">Free Preview Used</span>
            </div>

            {{-- Lock icon --}}
            <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl"
                 style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.2)">
                <svg class="h-9 w-9 text-[#f59e0b]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
            </div>

            {{-- Headline --}}
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-4"
                style="font-size:clamp(2rem,4vw,2.75rem)">
                You've used your<br>
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]"
                      style="font-size:1.05em">free preview.</span>
            </h1>

            <p class="text-white/55 text-[.975rem] leading-[1.7] mb-10">
                Create a free account to keep watching — it only takes a minute.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-col gap-3">
                <a href="{{ route('filament.member.auth.register') }}"
                   class="w-full rounded-xl px-6 py-3.5 text-[.925rem] font-extrabold text-[#1b3a6b] transition-colors hover:bg-[#d97706]"
                   style="background:#f59e0b">
                    Create free account
                </a>
                <a href="{{ route('filament.member.auth.login') }}"
                   class="w-full rounded-xl px-6 py-3.5 text-[.925rem] font-bold text-white/90 transition-all hover:bg-white/10"
                   style="background:rgba(255,255,255,.07);border:1.5px solid rgba(255,255,255,.15)">
                    Log in
                </a>
            </div>

            {{-- Divider --}}
            <div class="my-8 flex items-center gap-4">
                <div class="flex-1 h-px" style="background:rgba(255,255,255,.08)"></div>
                <span class="text-[.72rem] font-bold text-white/25 uppercase tracking-[.08em]">or</span>
                <div class="flex-1 h-px" style="background:rgba(255,255,255,.08)"></div>
            </div>

            {{-- Browse link --}}
            <a href="{{ route('courses.index') }}"
               class="inline-flex items-center gap-2 text-[.85rem] font-semibold text-white/40 hover:text-white/70 transition-colors">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Browse courses
            </a>

        </div>
    </div>

</div>