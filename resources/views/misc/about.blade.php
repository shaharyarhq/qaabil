<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · Why use Qaabil?</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .04) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        .manifesto::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .dark-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            background-image:
                linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        /* comparison table striping */
        .cmp-row:nth-child(even) {
            background: #f8fafd;
        }

        .cmp-row:hover {
            background: #eff6ff;
        }

        /* counter animation */
        .counter {
            transition: opacity .3s;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-12px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fu {
            animation: fadeUp .45s ease both;
        }

        .si {
            animation: slideIn .45s ease both;
        }

        .d1 {
            animation-delay: .05s
        }

        .d2 {
            animation-delay: .10s
        }

        .d3 {
            animation-delay: .15s
        }

        .d4 {
            animation-delay: .20s
        }

        .d5 {
            animation-delay: .25s
        }

        .d6 {
            animation-delay: .30s
        }
    </style>
</head>

<body class="bg-[#f8fafd] text-[#0f172a] antialiased" style="font-family:'Plus Jakarta Sans',system-ui,sans-serif">

    <x-navbar></x-navbar>

    <!-- ── Hero ───────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden">
        <div class="absolute rounded-full pointer-events-none"
            style="width:600px;height:600px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-200px;right:-100px">
        </div>
        <div class="absolute rounded-full pointer-events-none"
            style="width:300px;height:300px;background:radial-gradient(circle,rgba(99,132,255,.12) 0%,transparent 65%);bottom:-80px;left:40px">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 py-24 text-center">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-6"
                style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">The case for
                    Qaabil</span>
            </div>
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-6"
                style="font-size:clamp(2.6rem,5.5vw,4.25rem)">
                Why the world needs<br>
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]">a different kind</span>
                of learning.
            </h1>
            <p class="text-white/60 text-lg max-w-2xl mx-auto leading-relaxed mb-10">
                Traditional education is expensive, slow, and built for institutions — not learners. Qaabil flips that
                model. Community-built, peer-validated, and free by design.
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('courses.index') }}"
                    class="no-underline bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-8 py-3 text-sm cursor-pointer transition-colors">
                    Browse courses
                </a>
                <a href="{{ route('pricing') }}"
                    class="no-underline text-white/80 font-semibold rounded-xl px-8 py-3 text-sm cursor-pointer transition-all hover:bg-white/10"
                    style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                    See pricing
                </a>
            </div>
        </div>
    </div>

    <!-- ── Stats bar ──────────────────────────────── -->
    <div class="bg-white border-b border-[#e2e8f0]">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x divide-[#e2e8f0]">
                @foreach ([['100%', 'Free base tier', 'No paywalls on knowledge'], ['∞', 'Chapters available', 'Unlocked by the community'], ['Peer', 'Reviewed content', 'By top contributors'], ['0', 'Ads. Zero. None.', 'Clean, distraction-free']] as [$num, $label, $sub])
                    <div class="px-4 first:pl-0 last:pr-0">
                        <div class="text-[2.25rem] font-extrabold text-[#1b3a6b] leading-none mb-1">{{ $num }}
                        </div>
                        <div class="text-sm font-bold text-[#0f172a]">{{ $label }}</div>
                        <div class="text-xs text-[#94a3b8] mt-0.5">{{ $sub }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <main class="max-w-6xl mx-auto px-6 py-20 pb-28 flex flex-col gap-28">

        {{-- ── Section 1: The problem ── --}}
        <section>
            <div class="max-w-xl mb-12">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    The problem
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Learning online is
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">broken.</span>
                </h2>
                <p class="text-[#475569] mt-4 leading-relaxed">
                    Most platforms charge you to watch someone else's lecture. The content goes stale. The community is
                    passive. You pay, you watch, you forget. There's no skin in the game.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @php $problems = [['💸', 'Expensive paywalls', 'Top-tier courses cost hundreds of dollars. Most learners — especially in emerging markets — simply can\'t afford them.'], ['📼', 'Passive consumption', 'Watching videos doesn\'t mean learning. Without doing, without proving, knowledge doesn\'t stick — and platforms don\'t care.'], ['🔒', 'Walled gardens', 'Your progress, your certificates, your community — all locked inside one platform. Switch platforms and you start over from zero.']]; @endphp
                @foreach ($problems as $i => [$icon, $title, $desc])
                    <div
                        class="fu d{{ $i + 1 }} bg-white border border-[#e2e8f0] rounded-2xl p-6 transition-all hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]">
                        <div class="text-2xl mb-4">{{ $icon }}</div>
                        <h3 class="text-base font-extrabold text-[#0f172a] mb-2">{{ $title }}</h3>
                        <p class="text-sm text-[#475569] leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ── Section 2: The Qaabil difference ── --}}
        <section>
            <div class="max-w-xl mb-12">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    The Qaabil difference
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Built differently.
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">On purpose.</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php $pillars = [['🎯', 'Earn access by doing', 'You don\'t pay to learn. You prove you\'ve learned. Submit a video solution to any objective. Get it approved by a community maintainer. Unlock the chapter — forever.', true], ['👥', 'Peer-validated quality', 'Every piece of content is reviewed by real humans who\'ve mastered the material. No algorithm, no auto-grader. Just community experts who care.', false], ['🔓', 'Free by design', 'The free tier isn\'t a stripped-down version. It\'s the full experience. Every course, every chapter, fully accessible — earned through contribution.', false], ['🌍', 'Built for everyone', 'A student in Kuala Lumpur gets the same education as one in San Francisco. No geography tax. No currency discrimination. Just learning.', true]]; @endphp
                @foreach ($pillars as $i => [$icon, $title, $desc, $featured])
                    <div
                        class="fu d{{ $i + 1 }} {{ $featured ? 'bg-[#1b3a6b] dark-card' : 'bg-white border border-[#e2e8f0]' }} relative rounded-3xl p-8 overflow-hidden transition-all hover:-translate-y-1 {{ $featured ? 'hover:shadow-[0_20px_40px_-12px_rgba(27,58,107,.45)]' : 'hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.18)]' }}">
                        @if ($featured)
                            <div class="absolute rounded-full pointer-events-none"
                                style="width:200px;height:200px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 70%);bottom:-60px;right:-40px">
                            </div>
                        @endif
                        <div class="relative z-10">
                            <div class="text-3xl mb-5">{{ $icon }}</div>
                            <h3 class="text-lg font-extrabold {{ $featured ? 'text-white' : 'text-[#0f172a]' }} mb-3">
                                {{ $title }}</h3>
                            <p class="text-sm leading-relaxed {{ $featured ? 'text-white/55' : 'text-[#475569]' }}">
                                {{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ── Section 3: How it works (visual flow) ── --}}
        <section>
            <div class="text-center max-w-xl mx-auto mb-14">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    How it works
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Four steps to
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">mastery</span>
                </h2>
                <p class="text-[#475569] mt-3 leading-relaxed text-sm">No subscription required. No credit card. Just
                    you, the material, and the community.</p>
            </div>

            <div class="relative">
                {{-- connector line (desktop only) --}}
                <div class="hidden md:block absolute top-10 left-[10%] right-[10%] h-[2px]"
                    style="background:linear-gradient(90deg,transparent,#e2e8f0 15%,#f59e0b 50%,#e2e8f0 85%,transparent)">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative z-10">
                    @php $steps = [['01', '🔍', 'Explore', 'Browse courses built by the community. Each one has clear sections, chapters, and learning objectives.'], ['02', '📹', 'Submit', 'Record yourself solving an objective. It doesn\'t need to be perfect — it needs to show you understand.'], ['03', '✅', 'Get approved', 'A maintainer reviews your video within 24 hours and gives you real feedback.'], ['04', '🔓', 'Unlock', 'One approval unlocks the full course — permanently. No expiry, no renewal.']]; @endphp
                    @foreach ($steps as $i => [$num, $icon, $title, $desc])
                        <div class="fu d{{ $i + 1 }} flex flex-col items-center text-center">
                            <div
                                class="w-20 h-20 rounded-2xl flex items-center justify-center mb-5 text-3xl relative {{ $i === 2 ? 'bg-[#f59e0b]' : 'bg-white border border-[#e2e8f0]' }} shadow-[0_4px_16px_-4px_rgba(27,58,107,.12)]">
                                {{ $icon }}
                                <span
                                    class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-[#1b3a6b] text-white text-[.6rem] font-extrabold flex items-center justify-center">{{ $num }}</span>
                            </div>
                            <h3 class="text-base font-extrabold text-[#0f172a] mb-2">{{ $title }}</h3>
                            <p class="text-xs text-[#475569] leading-relaxed max-w-[180px]">{{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ── Section 4: Comparison table ── --}}
        <section>
            <div class="text-center max-w-xl mx-auto mb-12">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    Qaabil vs the rest
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    See how we
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">compare</span>
                </h2>
            </div>

            <div class="bg-white border border-[#e2e8f0] rounded-3xl overflow-hidden">
                {{-- header --}}
                <div class="grid grid-cols-4 border-b border-[#e2e8f0]">
                    <div class="p-5">
                        <span class="text-xs font-bold text-[#94a3b8] uppercase tracking-wider">Feature</span>
                    </div>
                    @foreach ([['Qaabil', 'bg-[#1b3a6b]', 'text-white'], ['Udemy', 'bg-white', 'text-[#0f172a]'], ['Coursera', 'bg-white', 'text-[#0f172a]']] as [$name, $bg, $tc])
                        <div class="p-5 text-center border-l border-[#e2e8f0] {{ $bg }}">
                            <span class="text-sm font-extrabold {{ $tc }}">{{ $name }}</span>
                            @if ($name === 'Qaabil')
                                <div class="mt-1">
                                    <span
                                        class="text-[.6rem] font-extrabold uppercase tracking-[.06em] bg-[#f59e0b] text-[#1b3a6b] rounded-full px-2 py-0.5">us</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @php $rows = [['Free full access', '✅', '❌', '❌'], ['Earn access by contributing', '✅', '❌', '❌'], ['Peer-reviewed content', '✅', '⚠️', '✅'], ['No ads', '✅', '❌', '✅'], ['Community maintained', '✅', '❌', '⚠️'], ['Works without a subscription', '✅', '❌', '❌'], ['Open to any contributor', '✅', '✅', '⚠️']]; @endphp

                @foreach ($rows as $i => $row)
                    @php
                        $label = $row[0];
                        $vals = array_slice($row, 1);
                    @endphp
                    <div
                        class="cmp-row grid grid-cols-4 border-b border-[#e2e8f0] last:border-b-0 transition-colors cursor-default">
                        <div class="p-4 pl-5 flex items-center">
                            <span class="text-sm text-[#475569] font-medium">{{ $label }}</span>
                        </div>
                        @foreach ($vals as $ci => $val)
                            <div
                                class="p-4 flex items-center justify-center border-l border-[#e2e8f0] {{ $ci === 0 ? 'bg-[#eff6ff]/40' : '' }}">
                                <span class="text-base">{{ $val }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ── Section 5: Who is it for ── --}}
        <section>
            <div class="text-center max-w-xl mx-auto mb-12">
                <div
                    class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-3">
                    <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                    Who is Qaabil for?
                </div>
                <h2 class="text-[2rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                    Built for
                    <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">real
                        learners</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php $personas = [['🎓', 'The self-taught student', 'You learn by doing, not by watching. You want to prove your skills, not just collect certificates. Qaabil gives you a structured path and a community that validates your work.', ['Structured learning path', 'Video-based proof of work', 'Community recognition']], ['👨‍🏫', 'The passionate teacher', 'You\'ve built a following because you teach differently. Qaabil gives you a platform to structure your knowledge, crowdsource solutions, and scale your impact without the overhead.', ['Course creation tools', 'Maintainer controls', 'Student analytics']], ['🏫', 'The forward-thinking institution', 'You want your students doing, not just listening. Qaabil\'s peer-review model turns passive learners into active contributors — raising quality for everyone.', ['Private course creation', 'Custom branding & SSO', 'Dedicated support']]]; @endphp
                @foreach ($personas as $i => [$icon, $title, $desc, $features])
                    <div
                        class="fu d{{ $i + 1 }} bg-white border border-[#e2e8f0] rounded-3xl p-7 flex flex-col transition-all hover:-translate-y-1 hover:shadow-[0_16px_32px_-12px_rgba(27,58,107,.1)] hover:border-[rgba(27,58,107,.2)]">
                        <div class="text-3xl mb-5">{{ $icon }}</div>
                        <h3 class="text-base font-extrabold text-[#0f172a] mb-3">{{ $title }}</h3>
                        <p class="text-sm text-[#475569] leading-relaxed flex-1 mb-5">{{ $desc }}</p>
                        <ul class="space-y-2">
                            @foreach ($features as $f)
                                <li class="flex items-center gap-2 text-xs font-semibold text-[#1b3a6b]">
                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#f59e0b] shrink-0"></span>
                                    {{ $f }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ── Section 6: Values ── --}}
        <section class="bg-white border border-[#e2e8f0] rounded-3xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                {{-- left: text --}}
                <div class="p-10 md:p-14 flex flex-col justify-center">
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-4">
                        <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                        Our values
                    </div>
                    <h2 class="text-[1.9rem] font-extrabold text-[#0f172a] tracking-tight leading-snug mb-6">
                        What we believe<br>
                        <span class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">to our
                            core</span>
                    </h2>
                    <ul class="space-y-5">
                        @php $values = [['Openness', 'Knowledge should have no border, language barrier, or bank balance requirement.'], ['Proof over promises', 'A video you made beats a certificate you bought. We value demonstrated understanding.'], ['Community first', 'The platform exists for learners — not the other way around. We answer to our community.'], ['Radical honesty', 'We\'re a small team. We\'ll tell you what we can\'t do yet. And we\'ll keep shipping.']]; @endphp
                        @foreach ($values as [$name, $desc])
                            <li class="flex items-start gap-3">
                                <span class="inline-block w-2 h-2 rounded-full bg-[#f59e0b] shrink-0 mt-2"></span>
                                <div>
                                    <span class="text-sm font-extrabold text-[#0f172a]">{{ $name }} — </span>
                                    <span class="text-sm text-[#475569]">{{ $desc }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{-- right: navy accent block --}}
                <div
                    class="dark-card relative bg-[#1b3a6b] p-10 md:p-14 flex flex-col justify-between overflow-hidden min-h-[360px]">
                    <div class="absolute rounded-full pointer-events-none"
                        style="width:300px;height:300px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 70%);bottom:-80px;right:-60px">
                    </div>
                    <div class="relative z-10">
                        <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.5] mb-8"
                            style="font-size:clamp(1.3rem,2vw,1.65rem)">
                            "Qaabil means <span class="text-[#f59e0b]">capable</span> in Arabic and Malay. We believe
                            every learner is capable — they just need the right community around them."
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-[#f59e0b] flex items-center justify-center text-[#1b3a6b] font-extrabold text-sm shrink-0">
                                Z</div>
                            <div>
                                <p class="text-sm font-bold text-white">Zain</p>
                                <p class="text-xs text-white/45">Founder, Qaabil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ── CTA ── --}}
        <div class="manifesto relative bg-[#1b3a6b] rounded-3xl overflow-hidden px-8 md:px-20 py-16 text-center">
            <div class="absolute rounded-full pointer-events-none"
                style="width:450px;height:450px;background:radial-gradient(circle,rgba(245,158,11,.16) 0%,transparent 65%);top:-180px;right:-80px">
            </div>
            <div class="relative z-10">
                <p class="font-['Instrument_Serif',serif] italic text-white leading-[1.45] max-w-[600px] mx-auto mb-4"
                    style="font-size:clamp(1.6rem,3vw,2.2rem)">
                    "The best time to start learning was yesterday. <span class="text-[#f59e0b]">✦</span> The second
                    best time is right now."
                </p>
                <div class="w-10 h-[2px] rounded mx-auto mb-6" style="background:rgba(245,158,11,.4)"></div>
                <p class="text-sm text-white/45 max-w-[460px] mx-auto leading-relaxed mb-8">
                    Join thousands of learners already building on Qaabil. Free to start, forever to keep.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('courses.index') }}"
                        class="no-underline bg-[#f59e0b] hover:bg-[#d97706] text-[#1b3a6b] font-extrabold rounded-xl px-8 py-3 text-sm cursor-pointer transition-colors">
                        Start learning free →
                    </a>
                    <a href="{{ route('pricing') }}"
                        class="no-underline text-white/80 font-semibold rounded-xl px-8 py-3 text-sm cursor-pointer transition-all hover:bg-white/10"
                        style="background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.18)">
                        View pricing
                    </a>
                </div>
            </div>
        </div>

    </main>

   <x-footer></x-footer>

</body>

</html>
