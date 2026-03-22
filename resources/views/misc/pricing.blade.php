<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · Pricing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 56px 56px;
        }
        .card-featured-plan::before {
            content: '';
            position: absolute; inset: 0; border-radius: 28px;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        .manifesto::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* toggle */
        .tog-track {
            width: 48px; height: 26px; border-radius: 13px;
            background: #e2e8f0; position: relative;
            cursor: pointer; transition: background .2s;
            flex-shrink: 0;
        }
        .tog-track.on { background: #1b3a6b; }
        .tog-thumb {
            width: 20px; height: 20px; border-radius: 50%;
            background: #fff; position: absolute;
            top: 3px; left: 3px;
            transition: transform .2s;
            box-shadow: 0 1px 4px rgba(0,0,0,.18);
        }
        .tog-track.on .tog-thumb { transform: translateX(22px); }

        /* price swap */
        .price-num { transition: opacity .18s, transform .18s; }
        .price-num.out { opacity: 0; transform: translateY(6px); }

        /* faq */
        .faq-body { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .3s ease; }
        .faq-body.open { grid-template-rows: 1fr; }
        .faq-inner { overflow: hidden; }
        .faq-chevron { transition: transform .3s; }
        .faq-open .faq-chevron { transform: rotate(180deg); }

        @keyframes fadeUp {
            from { opacity:0; transform:translateY(16px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .fu  { animation: fadeUp .45s ease both; }
        .d1  { animation-delay:.05s }
        .d2  { animation-delay:.12s }
        .d3  { animation-delay:.19s }
        .d4  { animation-delay:.26s }
    </style>
</head>
<body class="bg-[#f8fafd] text-[#0f172a] antialiased" style="font-family:'Plus Jakarta Sans',system-ui,sans-serif">

<x-navbar></x-navbar>

<!-- ── Hero ───────────────────────────────────── -->
<div class="hero bg-[#1b3a6b] relative overflow-hidden">
    <div class="absolute rounded-full pointer-events-none" style="width:600px;height:600px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-200px;right:-120px"></div>
    <div class="absolute rounded-full pointer-events-none" style="width:300px;height:300px;background:radial-gradient(circle,rgba(99,132,255,.13) 0%,transparent 65%);bottom:-80px;left:40px"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-6 py-24 text-center">
        <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-6" style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
            <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
            <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">Simple, honest pricing</span>
        </div>
        <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-5" style="font-size:clamp(2.6rem,5vw,4rem)">
            Knowledge should be<br>
            <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">free for everyone.</span>
        </h1>
        <p class="text-white/60 text-lg max-w-xl mx-auto leading-relaxed mb-8">
            Qaabil runs on community contributions. Submit a video, get it approved, unlock any chapter — forever free. Upgrade only if you want instant access.
        </p>

        {{-- social proof chips --}}
        <div class="flex flex-wrap justify-center gap-3">
            @foreach(['🎓 100% free base tier', '🔓 Unlock by contributing', '✦ No ads, ever', '🌍 Community maintained'] as $chip)
            <span class="text-[.78rem] font-semibold text-white/75 rounded-full px-3.5 py-1.5" style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12)">
                {{ $chip }}
            </span>
            @endforeach
        </div>
    </div>
</div>

<!-- ── Billing toggle ─────────────────────────── -->
<div class="bg-white border-b border-[#e2e8f0]">
    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-center gap-3">
        <span id="lbl-m" class="text-sm font-extrabold text-[#0f172a]">Monthly</span>
        <div id="tog" class="tog-track" onclick="flipBilling()"><div class="tog-thumb"></div></div>
        <span id="lbl-a" class="text-sm font-semibold text-[#94a3b8]">
            Annual
            <span class="ml-1.5 inline-block text-[.65rem] font-extrabold uppercase tracking-[.06em] bg-[#f59e0b] text-[#1b3a6b] rounded-md px-2 py-[.18rem]">Save 30%</span>
        </span>
    </div>
</div>

<!-- ── Plans ──────────────────────────────────── -->
<main class="max-w-6xl mx-auto px-6 py-16 pb-28">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">

        {{-- ── FREE ── --}}
        <div class="fu d1 bg-white border border-[#e2e8f0] rounded-[28px] p-8 flex flex-col transition-all duration-200 hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.2)]">
            <div class="mb-7">
                <div class="w-11 h-11 rounded-2xl flex items-center justify-center mb-5" style="background:rgba(27,58,107,.08)">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <p class="text-[.72rem] font-extrabold uppercase tracking-[.1em] text-[#94a3b8] mb-1">Community</p>
                <h3 class="text-xl font-extrabold text-[#0f172a] mb-2">Free forever</h3>
                <p class="text-sm text-[#475569] leading-relaxed">Join, browse, and earn access by submitting video solutions. The Qaabil way.</p>
            </div>

            <div class="mb-7">
                <div class="flex items-end gap-1.5 mb-1">
                    <span class="text-[3rem] font-extrabold text-[#0f172a] leading-none price-num" data-m="$0" data-a="$0">$0</span>
                    <span class="text-[#94a3b8] text-sm mb-2 font-medium">/ month</span>
                </div>
                <p class="text-xs text-[#94a3b8]">No credit card · no commitment</p>
            </div>

            <ul class="space-y-3 flex-1 mb-8">
                @foreach([
                    ['Browse all courses & chapters',    true],
                    ['Submit video solutions',           true],
                    ['Unlock chapters via approval',     true],
                    ['Community discussion access',      true],
                    ['Personal progress dashboard',      true],
                    ['Instant full access',              false],
                    ['Priority review queue',            false],
                ] as [$feat, $inc])
                <li class="flex items-start gap-2.5">
                    @if($inc)
                    <svg class="w-[17px] h-[17px] text-[#1b3a6b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    @else
                    <svg class="w-[17px] h-[17px] text-[#e2e8f0] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    @endif
                    <span class="text-sm {{ $inc ? 'text-[#475569]' : 'text-[#cbd5e1]' }}">{{ $feat }}</span>
                </li>
                @endforeach
            </ul>

            <a href="{{ route('home') }}" class="block w-full py-3.5 rounded-2xl text-sm font-bold text-center text-[#1b3a6b] no-underline border-[1.5px] border-[#e2e8f0] bg-transparent cursor-pointer transition-all hover:border-[#1b3a6b] hover:bg-[#eff6ff]">
                Get started free
            </a>
        </div>

        {{-- ── PRO (featured, taller) ── --}}
        <div class="card-featured-plan fu d2 relative bg-[#1b3a6b] rounded-[28px] p-8 flex flex-col overflow-hidden transition-all duration-200 hover:-translate-y-1 hover:shadow-[0_28px_56px_-12px_rgba(27,58,107,.5)]"
             style="margin-top:-24px;margin-bottom:-24px">
            <div class="absolute rounded-full pointer-events-none" style="width:250px;height:250px;background:radial-gradient(circle,rgba(245,158,11,.22) 0%,transparent 70%);top:-80px;right:-60px"></div>

            {{-- badge --}}
            <div class="absolute top-6 right-6 z-10">
                <span class="text-[.65rem] font-extrabold uppercase tracking-[.07em] bg-[#f59e0b] text-[#1b3a6b] rounded-full px-3 py-1">
                    Most popular
                </span>
            </div>

            <div class="relative z-10 mb-7">
                <div class="w-11 h-11 rounded-2xl flex items-center justify-center mb-5" style="background:rgba(245,158,11,.15)">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#f59e0b" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <p class="text-[.72rem] font-extrabold uppercase tracking-[.1em] text-white/50 mb-1">Student Pro</p>
                <h3 class="text-xl font-extrabold text-white mb-2">Instant access</h3>
                <p class="text-sm text-white/55 leading-relaxed">Skip the queue. Get immediate, full access to every chapter across every course.</p>
            </div>

            <div class="relative z-10 mb-7">
                <div class="flex items-end gap-1.5 mb-1">
                    <span class="text-[3rem] font-extrabold text-white leading-none price-num" data-m="$9" data-a="$6">$9</span>
                    <span class="text-white/50 text-sm mb-2 font-medium price-period">/ month</span>
                </div>
                <p class="text-xs text-white/35 price-cycle">Billed monthly · cancel anytime</p>
            </div>

            <ul class="relative z-10 space-y-3 flex-1 mb-8">
                @foreach([
                    'Everything in Community',
                    'Instant full access to all content',
                    'Priority video review (48h SLA)',
                    'Download course notes & materials',
                    'Certificate of completion',
                    'Early access to new courses',
                    '7-day free trial',
                ] as $feat)
                <li class="flex items-start gap-2.5">
                    <svg class="w-[17px] h-[17px] text-[#f59e0b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span class="text-sm text-white/80">{{ $feat }}</span>
                </li>
                @endforeach
            </ul>

            <button class="relative z-10 w-full py-3.5 rounded-2xl text-sm font-extrabold bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] border-none cursor-pointer transition-colors">
                Start free trial
            </button>
            <p class="relative z-10 text-center text-[.7rem] text-white/30 mt-3">No card needed for trial</p>
        </div>

        {{-- ── INSTITUTION ── --}}
        <div class="fu d3 bg-white border border-[#e2e8f0] rounded-[28px] p-8 flex flex-col transition-all duration-200 hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.2)]">
            <div class="mb-7">
                <div class="w-11 h-11 rounded-2xl flex items-center justify-center mb-5" style="background:rgba(27,58,107,.08)">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <p class="text-[.72rem] font-extrabold uppercase tracking-[.1em] text-[#94a3b8] mb-1">Institution</p>
                <h3 class="text-xl font-extrabold text-[#0f172a] mb-2">For schools & orgs</h3>
                <p class="text-sm text-[#475569] leading-relaxed">Private courses, bulk student seats, admin controls, and a dedicated account manager.</p>
            </div>

            <div class="mb-7">
                <div class="flex items-end gap-1.5 mb-1">
                    <span class="text-[3rem] font-extrabold text-[#0f172a] leading-none">Custom</span>
                </div>
                <p class="text-xs text-[#94a3b8]">Tailored to your headcount</p>
            </div>

            <ul class="space-y-3 flex-1 mb-8">
                @foreach([
                    ['Everything in Student Pro',        true],
                    ['Unlimited student seats',          true],
                    ['Private & branded courses',        true],
                    ['SSO + LMS integration',            true],
                    ['Admin analytics dashboard',        true],
                    ['Dedicated account manager',        true],
                    ['Priority SLA support',             true],
                ] as [$feat, $inc])
                <li class="flex items-start gap-2.5">
                    <svg class="w-[17px] h-[17px] text-[#f59e0b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    <span class="text-sm text-[#475569]">{{ $feat }}</span>
                </li>
                @endforeach
            </ul>

            <a href="mailto:hello@qaabil.com" class="block w-full py-3.5 rounded-2xl text-sm font-bold text-center text-white no-underline bg-[#1b3a6b] cursor-pointer transition-colors hover:bg-[#122952]">
                Get in touch
            </a>
        </div>

    </div>

    {{-- ── Trust bar ── --}}
    <div class="mt-12 py-8 border-y border-[#e2e8f0]">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @foreach([
                ['∞',    'Chapters unlocked',    'by approved submissions'],
                ['100%', 'Free base tier',        'no hidden paywalls'],
                ['0',    'Ads on the platform',   'ever. period.'],
                ['24h',  'Avg review time',       'community maintained'],
            ] as [$num, $label, $sub])
            <div>
                <div class="text-[2rem] font-extrabold text-[#1b3a6b] leading-none mb-1">{{ $num }}</div>
                <div class="text-sm font-bold text-[#0f172a]">{{ $label }}</div>
                <div class="text-xs text-[#94a3b8] mt-0.5">{{ $sub }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── How it works (free unlock) ── --}}
    <div class="mt-20 text-center mb-12">
        <div class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
            <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
            How free access works
            <span class="inline-block w-[18px] h-[3px] rounded-sm bg-[#f59e0b]"></span>
        </div>
        <h2 class="text-[1.75rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
            Earn access the <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">Qaabil way</span>
        </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $steps = [
                ['01', '📹', 'Submit a video', 'Record yourself solving any objective in a course. Upload it to the platform for review.'],
                ['02', '✅', 'Get approved', 'A community maintainer reviews your submission. Most videos are reviewed within 24 hours.'],
                ['03', '🔓', 'Unlock forever', 'One approved video unlocks every chapter in that course. No expiry, no catch.'],
            ];
        @endphp
        @foreach($steps as $i => [$num, $icon, $title, $desc])
        <div class="fu d{{ $i + 1 }} bg-white border border-[#e2e8f0] rounded-3xl p-7 relative overflow-hidden transition-all duration-200 hover:-translate-y-1 hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
            <span class="absolute top-5 right-6 text-[4rem] font-extrabold text-[#1b3a6b] opacity-[.04] leading-none select-none">{{ $num }}</span>
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
                Frequently asked <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">questions</span>
            </h2>
        </div>

        @php $faqs = [
            ['Is it really free?',
             'Yes — completely. You can browse every course, submit videos, and unlock full access without ever paying. The paid plan only exists for students who want instant access without going through the contribution flow.'],
            ['What does "unlock via approval" mean?',
             'Submit a video solution to any objective in a course. A maintainer reviews it. If approved, you unlock every chapter in that course permanently — even if you cancel later.'],
            ['Who are the maintainers?',
             'Maintainers are top contributors elected by the community. They review video submissions, manage objectives, and keep course quality high. It\'s a voluntary, merit-based role.'],
            ['What happens if my video is rejected?',
             'You get feedback from the maintainer and can resubmit. There\'s no limit on resubmissions — the goal is to help you improve, not gatekeep.'],
            ['Can institutions use Qaabil for free?',
             'Community access is free for everyone including institutions. The paid Institution plan adds private courses, branding, SSO, and dedicated support for larger deployments.'],
        ]; @endphp

        <div class="flex flex-col gap-3">
            @foreach($faqs as $faq)
            <div class="bg-white border border-[#e2e8f0] rounded-2xl overflow-hidden transition-colors hover:border-[rgba(27,58,107,.18)]">
                <button class="w-full flex items-center justify-between gap-4 px-6 py-4 bg-transparent border-none cursor-pointer text-left transition-colors hover:bg-[#eff6ff]"
                        onclick="toggleFaq(this)">
                    <span class="text-sm font-bold text-[#0f172a]">{{ $faq[0] }}</span>
                    <svg class="faq-chevron w-4 h-4 shrink-0 text-[#94a3b8]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
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
        <div class="absolute rounded-full pointer-events-none" style="width:400px;height:400px;background:radial-gradient(circle,rgba(245,158,11,.16) 0%,transparent 65%);top:-160px;right:-80px"></div>
        <div class="relative z-10">
            <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.45] max-w-[580px] mx-auto mb-4" style="font-size:clamp(1.6rem,3vw,2.2rem)">
                "The best education is the kind the community builds <span class="text-[#f59e0b]">✦</span> together."
            </p>
            <div class="w-10 h-[2px] rounded mx-auto mb-6" style="background:rgba(245,158,11,.4)"></div>
            <p class="text-sm text-white/45 max-w-[460px] mx-auto leading-relaxed mb-8">
                Qaabil is free because knowledge should be. Start learning today — no card, no catch, no expiry.
            </p>
            <div class="flex flex-wrap gap-3 justify-center">
                <button class="bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold border-none rounded-xl px-8 py-3 text-sm cursor-pointer transition-colors">
                    Join the community →
                </button>
                <a href="{{ route('courses.index') }}"
                   class="no-underline text-white/80 font-semibold rounded-xl px-8 py-3 text-sm cursor-pointer transition-all hover:bg-white/10"
                   style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                    Browse courses
                </a>
            </div>
        </div>
    </div>

</main>

<x-footer></x-footer>

<script>
    // ── Billing toggle ──────────────────────────
    let annual = false;

    function flipBilling() {
        annual = !annual;
        const tog  = document.getElementById('tog');
        const lblM = document.getElementById('lbl-m');
        const lblA = document.getElementById('lbl-a');

        tog.classList.toggle('on', annual);
        lblM.style.fontWeight = annual ? '500' : '800';
        lblM.style.color      = annual ? '#94a3b8' : '#0f172a';
        lblA.style.fontWeight = annual ? '800' : '500';
        lblA.style.color      = annual ? '#0f172a' : '#94a3b8';

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
        const card     = btn.parentElement;
        const body     = btn.nextElementSibling;
        const isOpen   = body.classList.contains('open');
        body.classList.toggle('open', !isOpen);
        btn.querySelector('.faq-chevron').style.transform = isOpen ? '' : 'rotate(180deg)';
        btn.style.background = isOpen ? '' : '#eff6ff';
    }
</script>

</body>
</html>