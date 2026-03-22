<div>

    <!-- ── Hero ───────────────────────────────────── -->
    <div class="hero bg-[#1b3a6b] relative overflow-hidden">
        <div class="absolute rounded-full pointer-events-none"
            style="width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,.2) 0%,transparent 65%);top:-180px;right:-100px">
        </div>
        <div class="absolute rounded-full pointer-events-none"
            style="width:280px;height:280px;background:radial-gradient(circle,rgba(99,132,255,.12) 0%,transparent 65%);bottom:-80px;left:40px">
        </div>

        <div class="relative z-10 max-w-3xl mx-auto px-6 py-20 text-center">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-6"
                style="background:rgba(245,158,11,.12);border:1px solid rgba(245,158,11,.25)">
                <span class="inline-block w-[7px] h-[7px] rounded-full bg-[#f59e0b] shrink-0"></span>
                <span class="text-white/80 text-[.75rem] font-bold uppercase tracking-[.08em]">We'd love to hear from
                    you</span>
            </div>
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-5"
                style="font-size:clamp(2.4rem,5vw,3.75rem)">
                Let's
                <span class="font-['Instrument_Serif',serif] font-normal italic text-[#f59e0b]"> talk.</span>
            </h1>
            <p class="text-white/60 text-lg max-w-lg mx-auto leading-relaxed">
                Whether you're a student, a teacher , or an institution — we're here and happy to chat.
            </p>
        </div>
    </div>

    <!-- ── Main ──────────────────────────────────── -->
    <main class="max-w-6xl mx-auto px-6 py-16 pb-28">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-start">

            <!-- ── Left: contact methods + info ─────── -->
            <div class="lg:col-span-2 flex flex-col gap-5">

                <!-- contact method cards -->
                @php
                    $methods = [
                        [
                            'label' => 'Email us',
                            'value' => 'hello@qaabil.com',
                            'sub' => 'We reply within 24 hours',
                            'href' => 'mailto:hello@qaabil.com',
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                        ],
                        [
                            'label' => 'For institutions',
                            'value' => 'partners@qaabil.com',
                            'sub' => 'Schools, universities & bootcamps',
                            'href' => 'mailto:partners@qaabil.com',
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                        ],
                        [
                            'label' => 'Community Discord',
                            'value' => 'discord.gg/qaabil',
                            'sub' => 'Live chat with the community',
                            'href' => '#',
                            'icon' =>
                                '<path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>',
                        ],
                    ];
                @endphp

                @foreach ($methods as $i => $m)
                    <a href="{{ $m['href'] }}"
                        class="contact-card fu d{{ $i + 1 }} flex items-center gap-4 bg-white border border-[#e2e8f0] rounded-2xl p-5 no-underline text-inherit transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_12px_28px_-8px_rgba(27,58,107,.12)] hover:border-[rgba(27,58,107,.2)]">
                        <div class="contact-icon-wrap w-11 h-11 rounded-xl flex items-center justify-center shrink-0 transition-colors duration-200"
                            style="background:rgba(27,58,107,.07)">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b"
                                stroke-width="1.8" class="transition-colors duration-200">
                                {!! $m['icon'] !!}
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[.7rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-0.5">
                                {{ $m['label'] }}</p>
                            <p class="text-sm font-bold text-[#0f172a] truncate">{{ $m['value'] }}</p>
                            <p class="text-xs text-[#94a3b8] mt-0.5">{{ $m['sub'] }}</p>
                        </div>
                        <svg class="w-4 h-4 text-[#e2e8f0] shrink-0 ml-auto" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endforeach

                <!-- response time note -->
                <div class="fu d4 bg-[#1b3a6b] rounded-2xl p-6 relative overflow-hidden">
                    <div class="absolute rounded-full pointer-events-none"
                        style="width:180px;height:180px;background:radial-gradient(circle,rgba(245,158,11,.18) 0%,transparent 70%);bottom:-60px;right:-40px">
                    </div>
                    <div class="relative z-10">
                        <div class="text-[#f59e0b] text-2xl mb-3">✦</div>
                        <p class="text-sm font-bold text-white mb-1">Built by the community</p>
                        <p class="text-xs text-white/50 leading-relaxed">
                            Qaabil is a passion project. We're a small team backed by a big community. Your message
                            genuinely matters to us.
                        </p>
                    </div>
                </div>

            </div>

            <!-- ── Right: contact form ───────────────── -->
            <div class="lg:col-span-3 fu d2 bg-white border border-[#e2e8f0] rounded-3xl p-8 md:p-10">

                <div class="mb-8">
                    <div
                        class="inline-flex items-center gap-2 text-[.7rem] font-extrabold uppercase tracking-[.1em] text-[#1b3a6b] mb-2">
                        <span class="inline-block w-4 h-[3px] rounded-sm bg-[#f59e0b]"></span>
                        Send a message
                    </div>
                    <h2 class="text-[1.6rem] font-extrabold text-[#0f172a] tracking-tight leading-snug">
                        Drop us a <span
                            class="font-['Instrument_Serif',serif] font-normal italic text-[#1b3a6b]">note</span>
                    </h2>
                </div>

                <form action="#" method="POST" class="flex flex-col gap-5" onsubmit="handleSubmit(event)">
                    @csrf

                    <!-- name + email row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="float-wrap">
                            <input type="text" name="name" id="name" placeholder=" "
                                class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all"
                                required>
                            <label for="name" class="field-label">Your name</label>
                        </div>
                        <div class="float-wrap">
                            <input type="email" name="email" id="email" placeholder=" "
                                class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all"
                                required>
                            <label for="email" class="field-label">Email address</label>
                        </div>
                    </div>

                    <!-- subject / type -->
                    <div>
                        <label
                            class="block text-[.72rem] font-extrabold uppercase tracking-[.08em] text-[#94a3b8] mb-2">
                            What's this about?
                        </label>
                        <div class="flex flex-wrap gap-2" id="topic-group">
                            @foreach (['General enquiry', 'Student support', 'Become a maintainer', 'Institution / partnership', 'Bug report', 'Other'] as $topic)
                                <button type="button" onclick="selectTopic(this)"
                                    class="topic-btn text-[.78rem] font-semibold px-3.5 py-1.5 rounded-full border border-[#e2e8f0] text-[#475569] bg-white transition-all hover:border-[#1b3a6b] hover:text-[#1b3a6b]">
                                    {{ $topic }}
                                </button>
                            @endforeach
                        </div>
                        <input type="hidden" name="topic" id="topic-val">
                    </div>

                    <!-- message -->
                    <div class="float-wrap">
                        <textarea name="message" id="message" rows="5" placeholder=" "
                            class="field w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-xl px-4 py-3.5 text-sm text-[#0f172a] font-medium transition-all resize-none"
                            required></textarea>
                        <label for="message" class="field-label">Your message</label>
                    </div>

                    <!-- submit -->
                    <button type="submit" id="submit-btn"
                        class="w-full py-4 rounded-xl text-sm font-extrabold text-[#1b3a6b] bg-[#f59e0b] hover:bg-[#d97706] border-none cursor-pointer transition-colors flex items-center justify-center gap-2">
                        <span id="btn-text">Send message</span>
                        <svg id="btn-arrow" width="16" height="16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                        <svg id="btn-spinner" class="hidden animate-spin" width="16" height="16"
                            viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"
                                stroke-dasharray="32" stroke-dashoffset="12" opacity=".4" />
                            <path d="M12 2a10 10 0 0110 10" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" />
                        </svg>
                    </button>

                    <!-- success state (hidden by default) -->
                    <div id="success-msg" class="hidden text-center py-4">
                        <div class="text-3xl mb-2">✅</div>
                        <p class="text-sm font-bold text-[#0f172a]">Message sent!</p>
                        <p class="text-xs text-[#94a3b8] mt-1">We'll get back to you within 24 hours.</p>
                    </div>

                </form>
            </div>

        </div>

    </main>

    <script>
        // ── Topic pill selector ─────────────────────
        function selectTopic(btn) {
            document.querySelectorAll('.topic-btn').forEach(b => {
                b.classList.remove('bg-[#1b3a6b]', 'text-white', 'border-[#1b3a6b]');
                b.classList.add('border-[#e2e8f0]', 'text-[#475569]', 'bg-white');
            });
            btn.classList.remove('border-[#e2e8f0]', 'text-[#475569]', 'bg-white');
            btn.classList.add('bg-[#1b3a6b]', 'text-white', 'border-[#1b3a6b]');
            document.getElementById('topic-val').value = btn.textContent.trim();
        }

        // ── Form submit (demo — shows success state) ─
        function handleSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            const arrow = document.getElementById('btn-arrow');
            const spinner = document.getElementById('btn-spinner');
            const success = document.getElementById('success-msg');

            btn.disabled = true;
            btnText.textContent = 'Sending…';
            arrow.classList.add('hidden');
            spinner.classList.remove('hidden');

            setTimeout(() => {
                btn.classList.add('hidden');
                success.classList.remove('hidden');
            }, 1400);
        }
    </script>

</div>
