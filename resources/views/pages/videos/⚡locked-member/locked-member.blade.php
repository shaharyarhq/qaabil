<div>

    <div class="relative overflow-hidden min-h-[calc(100vh-80px)] flex items-center justify-center"
         style="background:#1b3a6b">

        {{-- Grid overlay --}}
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

        <div class="relative z-10 w-full max-w-xl mx-auto px-6 py-20 text-center">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-8"
                 style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.72rem] font-bold uppercase tracking-[.08em]">Access Required</span>
            </div>

            {{-- Headline --}}
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-4"
                style="font-size:clamp(2rem,4vw,2.75rem)">
                Unlock unlimited
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]"
                      style="font-size:1.05em">access.</span>
            </h1>

            <p class="text-white/55 text-[.975rem] leading-[1.7] mb-10 max-w-sm mx-auto">
                You've used your free watch. Pick one of the options below — one approved upload is all it takes.
            </p>

            {{-- Two option cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">

                {{-- Upload card --}}
                <a href="{{ filament()->getPanel('member')->getResourceUrl(App\Models\Video::Class) }}"
                   class="group flex flex-col items-center gap-4 rounded-2xl p-6 text-center transition-all hover:-translate-y-1"
                   style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12)">

                    <div class="flex h-13 w-13 items-center justify-center rounded-xl transition-colors"
                         style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.2)">
                        <svg class="h-6 w-6 text-[#f59e0b]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                    </div>

                    <div>
                        <p class="font-extrabold text-white text-[.975rem] mb-1">Upload a Video</p>
                        <p class="text-[.78rem] text-white/45 leading-relaxed">
                            Contribute to the community and get full access — completely free.
                        </p>
                    </div>

                    <span class="mt-auto inline-flex items-center gap-1.5 rounded-full px-4 py-1 text-[.72rem] font-extrabold text-[#1b3a6b] uppercase tracking-[.06em]"
                          style="background:#f59e0b">
                        ✦ Free
                    </span>
                </a>

                {{-- Subscribe card --}}
                <a href="{{ route('pricing') }}"
                   class="group flex flex-col items-center gap-4 rounded-2xl p-6 text-center transition-all hover:-translate-y-1"
                   style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12)">

                    <div class="flex h-13 w-13 items-center justify-center rounded-xl transition-colors"
                         style="background:rgba(99,132,255,.15);border:1px solid rgba(99,132,255,.2)">
                        <svg class="h-6 w-6 text-[#6384ff]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="font-extrabold text-white text-[.975rem] mb-1">Subscribe</p>
                        <p class="text-[.78rem] text-white/45 leading-relaxed">
                            Get instant, unlimited access with a premium subscription.
                        </p>
                    </div>

                    <span class="mt-auto inline-flex items-center gap-1.5 rounded-full px-4 py-1 text-[.72rem] font-extrabold text-white uppercase tracking-[.06em]"
                          style="background:rgba(99,132,255,.3);border:1px solid rgba(99,132,255,.4)">
                        ★ Premium
                    </span>
                </a>

            </div>

            {{-- Manifesto-style quote --}}
            <div class="relative rounded-2xl overflow-hidden px-6 py-5 text-center"
                 style="background:rgba(245,158,11,.07);border:1px solid rgba(245,158,11,.15)">
                <div class="absolute inset-0 pointer-events-none"
                     style="background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:48px 48px">
                </div>
                <p class="relative font-['Instrument_Serif',serif] italic text-white/70 text-[1.05rem] leading-relaxed">
                    "Upload an approved video
                    <span class="text-[#f59e0b]"> ✦ </span>
                    unlock any chapter"
                </p>
            </div>

            {{-- Back link --}}
            <div class="mt-8">
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

</div>