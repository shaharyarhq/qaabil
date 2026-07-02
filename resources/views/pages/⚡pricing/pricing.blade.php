<div>

    <!-- ── Hero ───────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden">
        <div class="absolute rounded-full pointer-events-none"
            style="width:600px;height:600px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-200px;right:-120px">
        </div>
        <div class="absolute rounded-full pointer-events-none"
            style="width:300px;height:300px;background:radial-gradient(circle,rgba(99,132,255,.13) 0%,transparent 65%);bottom:-80px;left:40px">
        </div>

        <div class="relative z-10 max-w-3xl mx-auto px-6 py-24 text-center">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-6"
                style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">Simple, honest
                    pricing</span>
            </div>
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-5"
                style="font-size:clamp(2.6rem,5vw,4rem)">
                Knowledge should be<br>
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">free for
                    everyone.</span>
            </h1>
            <p class="text-white/60 text-lg max-w-xl mx-auto leading-relaxed mb-8">
                Qaabil runs on community contributions. Submit a video, get it approved, unlock any chapter . Upgrade
                only if you want instant access.
            </p>

            {{-- social proof chips --}}

            <div class="flex flex-wrap justify-center gap-3">
                @foreach ([
        // '🎓 100% free base tier',
        '🔓 Unlock by contributing',
        // '✦ No ads, ever',
        '🌍 Community maintained',
    ] as $chip)
                    <span class="text-[.78rem] font-semibold text-white/75 rounded-full px-3.5 py-1.5"
                        style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12)">
                        {{ $chip }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ── Billing toggle ─────────────────────────── -->
    {{-- <div class="bg-white border-b border-[#e2e8f0]">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-center gap-3">
            <span id="lbl-m" class="text-sm font-extrabold text-[#0f172a]">Monthly</span>
            <div id="tog" class="tog-track" onclick="flipBilling()">
                <div class="tog-thumb"></div>
            </div>
            <span id="lbl-a" class="text-sm font-semibold text-[#94a3b8]">
                Annual
                <span
                    class="ml-1.5 inline-block text-[.65rem] font-extrabold uppercase tracking-[.06em] bg-[#f59e0b] text-[#1b3a6b] rounded-md px-2 py-[.18rem]">Save
                    30%</span>
            </span>
        </div>
    </div> --}}

    <!-- ── Plans ──────────────────────────────────── -->
    <main class="max-w-6xl mx-auto px-6 py-16 pb-28">

        {{-- Plans are deleted from here --}}

        {{-- ── Trust bar ──
        <div class="mt-12 py-8 border-y border-[#e2e8f0]">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach ([['∞', 'Chapters unlocked', 'by approved submissions'], ['100%', 'Free base tier', 'no hidden paywalls'], ['0', 'Ads on the platform', 'ever. period.'], ['24h', 'Avg review time', 'community maintained']] as [$num, $label, $sub])
                    <div>
                        <div class="text-[2rem] font-extrabold text-[#1b3a6b] leading-none mb-1">{{ $num }}
                        </div>
                        <div class="text-sm font-bold text-[#0f172a]">{{ $label }}</div>
                        <div class="text-xs text-[#94a3b8] mt-0.5">{{ $sub }}</div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        {{-- ── How it works (free unlock) ── --}}
        <div class="mt-20 text-center mb-12">
            <div
                class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
                How free access works
                <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
            </div>
            <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                Earn access the <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">Qaabil
                    way</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $steps = [
                    [
                        '01',
                        '📹',
                        'Submit a video',
                        'Record yourself solving any objective in a course. Upload it to the platform for review.',
                    ],
                    [
                        '02',
                        '✅',
                        'Get approved',
                        'A community maintainer reviews your submission. Most videos are reviewed within 24 hours.',
                    ],
                    [
                        '03',
                        '🔓',
                        'Unlock forever',
                        'One approved video unlocks every chapter in that course. No expiry, no catch.',
                    ],
                ];
            @endphp
            @foreach ($steps as $i => [$num, $icon, $title, $desc])
                <div
                    class="fu d{{ $i + 1 }} bg-white border border-[#e2e8f0] rounded-3xl p-7 relative overflow-hidden transition-all duration-200 hover:-translate-y-1 hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                    <span
                        class="absolute top-5 right-6 text-[4rem] font-extrabold text-[#1b3a6b] opacity-[.04] leading-none select-none">{{ $num }}</span>
                    <div class="text-3xl mb-4">{{ $icon }}</div>
                    <h3 class="text-base font-extrabold text-[#0f172a] mb-2">{{ $title }}</h3>
                    <p class="text-sm text-[#475569] leading-relaxed">{{ $desc }}</p>
                </div>
            @endforeach
        </div>

        {{-- ── FAQ ── --}}
        <div class="mt-20 max-w-2xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight">
                    Frequently asked <span
                        class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">questions</span>
                </h2>
            </div>

            @php
                $faqs = [
                    [
                        'Is it really free?',
                        'Yes — completely. You can browse every course, submit videos, and unlock full access without ever paying. The paid plan only exists for students who want instant access without going through the contribution flow.',
                    ],
                    [
                        'What does "unlock via approval" mean?',
                        'Submit a video solution to any objective in a course. A maintainer reviews it. If approved, you unlock every chapter in that course permanently — even if you cancel later.',
                    ],
                    [
                        'Who are the maintainers?',
                        'Maintainers are top contributors elected by the community. They review video submissions, manage objectives, and keep course quality high. It\'s a voluntary, merit-based role.',
                    ],
                    [
                        'What happens if my video is rejected?',
                        'You get feedback from the maintainer and can resubmit. There\'s no limit on resubmissions — the goal is to help you improve, not gatekeep.',
                    ],
                    [
                        'Can institutions use Qaabil for free?',
                        'Community access is free for everyone including institutions. The paid Institution plan adds private courses, branding, SSO, and dedicated support for larger deployments.',
                    ],
                ];
            @endphp

            <div class="flex flex-col gap-3">
                @foreach ($faqs as $faq)
                    <div
                        class="bg-white border border-[#e2e8f0] rounded-2xl overflow-hidden transition-colors hover:border-[rgba(27,58,107,.18)]">
                        <button
                            class="w-full flex items-center justify-between gap-4 px-6 py-4 bg-transparent border-none cursor-pointer text-left transition-colors hover:bg-[#eff6ff]"
                            onclick="toggleFaq(this)">
                            <span class="text-sm font-bold text-[#0f172a]">{{ $faq[0] }}</span>
                            <svg class="faq-chevron w-4 h-4 shrink-0 text-[#94a3b8]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="faq-body">
                            <div class="faq-inner">
                                <p class="px-6 pb-5 text-sm text-[#475569] leading-relaxed">{{ $faq[1] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ── Manifesto ── --}}
        <div class="manifesto relative mt-16 bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-20 py-16 text-center">
            <div class="absolute rounded-full pointer-events-none"
                style="width:400px;height:400px;background:radial-gradient(circle,rgba(245,158,11,.16) 0%,transparent 65%);top:-160px;right:-80px">
            </div>
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.45] max-w-[580px] mx-auto mb-4"
                    style="font-size:clamp(1.6rem,3vw,2.2rem)">
                    "The best education is the kind the community builds <span class="text-[#f59e0b]">✦</span>
                    together."
                </p>
                <div class="w-10 h-[2px] rounded mx-auto mb-6" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-sm text-white/45 max-w-[460px] mx-auto leading-relaxed mb-8">
                    Qaabil is free because knowledge should be. Start learning today — no card, no catch, no expiry.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    {{-- <button
                        class="bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-8 py-3 text-sm cursor-pointer transition-colors">
                        Join the community →
                    </button> --}}
                    <a href="{{ route('courses.index') }}"
                        class="no-underline text-white/80 font-semibold rounded-xl px-8 py-3 text-sm cursor-pointer transition-all hover:bg-white/10"
                        style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                        Browse courses
                    </a>
                </div>
            </div>
        </div>

    </main>

    <script>
        // ── Billing toggle ──────────────────────────
        let annual = false;

        function flipBilling() {
            annual = !annual;
            const tog = document.getElementById('tog');
            const lblM = document.getElementById('lbl-m');
            const lblA = document.getElementById('lbl-a');

            tog.classList.toggle('on', annual);
            lblM.style.fontWeight = annual ? '500' : '800';
            lblM.style.color = annual ? '#94a3b8' : '#0f172a';
            lblA.style.fontWeight = annual ? '800' : '500';
            lblA.style.color = annual ? '#0f172a' : '#94a3b8';

            document.querySelectorAll('.price-num').forEach(el => {
                el.classList.add('out');
                setTimeout(() => {
                    el.textContent = annual ? el.dataset.a : el.dataset.m;
                    el.classList.remove('out');
                }, 180);
            });

            document.querySelectorAll('.price-cycle').forEach(el => {
                el.textContent = annual ? 'Billed annually · cancel anytime' : 'Billed monthly · cancel anytime';
            });
        }

        // ── FAQ accordion ───────────────────────────
        function toggleFaq(btn) {
            const card = btn.parentElement;
            const body = btn.nextElementSibling;
            const isOpen = body.classList.contains('open');
            body.classList.toggle('open', !isOpen);
            btn.querySelector('.faq-chevron').style.transform = isOpen ? '' : 'rotate(180deg)';
            btn.style.background = isOpen ? '' : '#eff6ff';
        }
    </script>
</div>
