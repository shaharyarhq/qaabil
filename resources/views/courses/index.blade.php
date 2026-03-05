<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qaabil · Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --gold:   #c69c5a;
            --dark:   #1e1b1a;
            --bg:     #faf7f2;
            --muted:  rgba(30,27,26,.45);
            --border: rgba(198,156,90,.18);
        }

        body { background: var(--bg); font-family: 'Sora', sans-serif; color: var(--dark); -webkit-font-smoothing: antialiased; }
        h1,h2,h3,.serif { font-family: 'Instrument Serif', serif; font-weight: 400; letter-spacing: -.02em; }
        .serif-italic { font-family: 'Instrument Serif', serif; font-style: italic; }
        nav { border-bottom: 1px solid var(--border); }

        .btn { border-radius: 40px; font-size: .8125rem; font-weight: 500; padding: .45rem 1.25rem; transition: background .15s, color .15s, border-color .15s; cursor: pointer; }
        .btn-ghost { background: transparent; border: 1px solid rgba(30,27,26,.15); color: var(--dark); }
        .btn-ghost:hover { background: var(--dark); color: var(--bg); border-color: var(--dark); }
        .btn-fill { background: var(--dark); color: #fff; border: 1px solid var(--dark); }
        .btn-fill:hover { background: var(--gold); border-color: var(--gold); color: var(--dark); }

        .card { background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.04); transition: transform .22s ease, box-shadow .22s ease; animation: fadeUp .45s ease both; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 16px 32px -10px rgba(0,0,0,.1); }
        .card-dark { background: var(--dark); border-radius: 20px; animation: fadeUp .45s ease both; transition: transform .22s ease, box-shadow .22s ease; }
        .card-dark:hover { transform: translateY(-4px); box-shadow: 0 20px 36px -10px rgba(0,0,0,.28); }

        .pill { font-size:.7rem; font-weight:500; text-transform:uppercase; letter-spacing:.06em; padding:.25rem .75rem; border-radius:40px; background:rgba(30,27,26,.05); color:var(--muted); transition: background .25s, color .25s; }
        .card:hover .pill { background: rgba(198,156,90,.12); color: var(--gold); }
        .underline-gold { position: relative; display: inline-block; }
        .underline-gold::after { content:''; position:absolute; bottom:-2px; left:0; height:2px; width:0; background:var(--gold); transition: width .3s ease; }
        .card:hover .underline-gold::after { width: 100%; }
        .divider { border-top: 1px solid var(--border); }

        .d1{animation-delay:.04s}.d2{animation-delay:.08s}.d3{animation-delay:.12s}
        .d4{animation-delay:.16s}.d5{animation-delay:.20s}.d6{animation-delay:.24s}

        @keyframes fadeUp { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }

        /* ── View Transition API ─────────────────────────────
           Suppress the default cross-fade on <html> root so only
           our named elements animate (card → hero morph).
           Each card's bar and title get unique names via inline style.
        ──────────────────────────────────────────────────────── */
        ::view-transition-old(root),
        ::view-transition-new(root) { animation: none; mix-blend-mode: normal; }
    </style>
</head>
<body>

<nav>
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
        <a href="/" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('storage/logo.png') }}" alt="Qaabil" class="h-14 w-auto object-contain">
        </a>
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-[#1e1b1a]/70">
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Courses</a>
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Dashboard</a>
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Community</a>
        </div>
        <div class="flex items-center gap-2">
            <button class="btn btn-ghost hidden sm:inline-block">Log in</button>
            <button class="btn btn-fill">Sign up</button>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 py-14 pb-28">

    <div class="flex items-center justify-between mb-10">
        <h2 class="text-4xl serif-italic">All courses <span class="text-2xl ml-1" style="color:var(--gold)">✦</span></h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">

        @foreach ($courses as $i => $course)
        <a href="{{ route('courses.view', $course) }}"
           class="card group flex flex-col d{{ ($i % 5) + 1 }}"
           data-course-id="{{ $course->id }}">

            {{-- Gold bar: view-transition-name = course-bar-{id} --}}
            <div style="height:6px; background:var(--gold); view-transition-name: course-bar-{{ $course->id }};"></div>

            <div class="p-6 flex flex-col flex-1">
                <div class="flex items-center justify-between mb-4">
                    <span class="pill">{{ $course->chapters_count }} {{ Str::plural('chapter', $course->chapters_count) }}</span>
                    <span class="serif-italic text-xs" style="color:var(--muted)">{{ $course->updated_at->diffForHumans() }}</span>
                </div>

                {{-- Title: view-transition-name = course-title-{id} --}}
                <h3 class="text-[1.4rem] serif mb-2 transition-transform duration-300 group-hover:translate-x-0.5"
                    style="view-transition-name: course-title-{{ $course->id }};">
                    {{ $course->name }}
                    <span class="text-[#c69c5a] opacity-0 group-hover:opacity-100 transition-opacity ml-1">✦</span>
                </h3>

                <p class="text-sm leading-relaxed mb-5 flex-1" style="color:rgba(30,27,26,.6)">{{ $course->description }}</p>

                <div class="flex items-center justify-between pt-4 border-t border-[#1e1b1a]/5 group-hover:border-[#c69c5a]/20 transition-colors duration-300">
                    <span class="text-xs flex items-center gap-1.5" style="color:rgba(30,27,26,.45)">🔥 {{ $course->videos_count ?? 0 }} videos</span>
                    <span class="text-sm font-medium underline-gold">{{ $course->objectives_count ?? 0 }} {{ Str::plural('objective', $course->objectives_count ?? 0) }}</span>
                </div>
            </div>
        </a>
        @endforeach

        <div class="card-dark d6 p-8 flex flex-col justify-between">
            <div>
                <span class="serif-italic text-5xl block mb-4" style="color:var(--gold)">✦</span>
                <h3 class="text-3xl serif-italic text-[#faf7f2] mb-2">Create a course</h3>
                <p class="text-sm leading-relaxed" style="color:rgba(250,247,242,.55)">Admin? Design chapters, invite maintainers, and grow the knowledge base.</p>
            </div>
            <div class="mt-8">
                <button class="w-full py-3 rounded-full text-sm font-medium transition-colors"
                        style="background:var(--gold);color:var(--dark)"
                        onmouseover="this.style.background='#b58b4a'"
                        onmouseout="this.style.background='var(--gold)'">+ New course</button>
                <p class="text-xs text-center mt-4" style="color:rgba(250,247,242,.3)">Unlock by subscribing or uploading an approved video</p>
            </div>
        </div>

    </div>

    <div class="divider mt-16 pt-12 max-w-xl mx-auto text-center">
        <p class="serif-italic text-[1.7rem] leading-snug">
            " upload an approved video <span style="color:var(--gold)">✦</span> unlock any chapter "
        </p>
        <p class="text-sm mt-5 leading-relaxed" style="color:rgba(30,27,26,.5)">
            Every course contains chapters with clear objectives. Students submit video solutions.
            Maintainers review and accept. One approved video unlocks the rest —
            crowdsourced, peer-validated, forever free.
        </p>
    </div>

</main>

<footer class="divider py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-2 text-xs" style="color:rgba(30,27,26,.45)">
        <span>© 2025 Qaabil — <span style="color:var(--gold)">✦</span> empower learning.</span>
        <div class="flex gap-5">
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Terms</a>
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Privacy</a>
            <a href="#" class="hover:text-[#c69c5a] transition-colors">Contact</a>
        </div>
    </div>
</footer>

</body>
</html>