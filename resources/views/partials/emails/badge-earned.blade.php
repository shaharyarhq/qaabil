<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You earned a badge!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f4f8;
            font-family: Georgia, 'Times New Roman', serif;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            max-width: 580px;
            margin: 40px auto;
            padding: 0 16px 60px;
        }

        /* ── Top bar ── */
        .topbar {
            background: #1b3a6b;
            border-radius: 16px 16px 0 0;
            padding: 20px 36px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-logo {
            font-family: Georgia, serif;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            letter-spacing: -.01em;
        }

        .topbar-dot {
            color: #f59e0b;
            font-size: .6rem;
        }

        /* ── Main card ── */
        .card {
            background: #ffffff;
            border-radius: 0 0 16px 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px -12px rgba(15, 23, 42, .18);
        }

        /* ── Hero band ── */
        .hero {
            background: linear-gradient(135deg, #1b3a6b 0%, #122952 100%);
            padding: 48px 36px 36px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 158, 11, .2) 0%, transparent 65%);
            top: -180px;
            right: -100px;
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 158, 11, .1) 0%, transparent 65%);
            bottom: -140px;
            left: -80px;
            pointer-events: none;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: Georgia, serif;
            font-size: .7rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: rgba(255, 255, 255, .45);
            margin-bottom: 24px;
        }

        .hero-eyebrow-line {
            display: inline-block;
            width: 16px;
            height: 2px;
            border-radius: 2px;
            background: #f59e0b;
        }

        .badge-circle {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: rgba(245, 158, 11, .12);
            border: 2px solid rgba(245, 158, 11, .3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            position: relative;
            z-index: 1;
            padding: 12px;
            /* give the image breathing room */
        }

        .hero-title {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 2rem;
            font-weight: normal;
            color: #ffffff;
            line-height: 1.15;
            letter-spacing: -.02em;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .hero-title em {
            color: #f59e0b;
            font-style: italic;
        }

        /* ── Body ── */
        .body {
            padding: 40px 36px;
        }

        .greeting {
            font-size: .75rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #94a3b8;
            margin-bottom: 12px;
        }

        .body-text {
            font-family: Georgia, serif;
            font-size: 1.05rem;
            color: #334155;
            line-height: 1.75;
            margin-bottom: 20px;
        }

        /* ── Badge highlight box ── */
        .badge-box {
            background: #f8fafd;
            border: 1px solid rgba(27, 58, 107, .12);
            border-left: 4px solid #f59e0b;
            border-radius: 12px;
            padding: 20px 24px;
            margin: 28px 0;
        }

        .badge-box-name {
            font-family: Georgia, serif;
            font-size: 1.15rem;
            font-weight: bold;
            color: #1b3a6b;
            margin-bottom: 6px;
        }

        .badge-box-desc {
            font-size: .9rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* ── CTA button ── */
        .cta-wrap {
            text-align: center;
            margin: 32px 0 8px;
        }

        .cta-btn {
            display: inline-block;
            background: #1b3a6b;
            color: #ffffff !important;
            text-decoration: none;
            font-family: Georgia, serif;
            font-size: .88rem;
            font-weight: bold;
            letter-spacing: .04em;
            padding: 14px 36px;
            border-radius: 12px;
            border: none;
        }

        .cta-accent {
            color: #f59e0b;
        }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid #e2e8f0;
            margin: 32px 0;
        }

        .footer-text {
            font-size: .78rem;
            color: #94a3b8;
            line-height: 1.6;
            text-align: center;
        }

        .footer-text a {
            color: #1b3a6b;
        }

        /* ── Bottom strip ── */
        .bottom-strip {
            margin-top: 24px;
            text-align: center;
            font-size: .7rem;
            color: #94a3b8;
            letter-spacing: .04em;
        }

        .bottom-strip span {
            color: #f59e0b;
        }
    </style>
</head>

<body>
    <div class="wrapper">

        {{-- Top bar --}}
        <div class="topbar">
            <span class="topbar-logo">{{ config('app.name') }}</span>
            <span class="topbar-dot">✦</span>
        </div>

        {{-- Main card --}}
        <div class="card">

            {{-- Hero --}}
            <div class="hero">
                <div class="hero-eyebrow">
                    <span class="hero-eyebrow-line"></span>
                    Achievement Unlocked
                    <span class="hero-eyebrow-line"></span>
                </div>

                {{-- Badge image instead of emoji --}}
                <div class="badge-circle">
                    <img src="{{ $iconDataUri }}" alt="{{ $badge->name }}"
                        style="width:64px;height:auto;display:block;">
                </div>

                <h1 class="hero-title">
                    You earned<br>
                    <em>{{ $badge->name }}</em>
                </h1>
            </div>

            {{-- Body --}}
            <div class="body">
                <p class="greeting">Hey {{ $notifiable->name }} 👋</p>

                <p class="body-text">
                    Congratulations — you just unlocked a new badge on your profile.
                    This is a reflection of your dedication and hard work on the platform.
                </p>

                <div class="badge-box">
                    <div style="display:flex;align-items:center;gap:14px;">
                        <img src="{{ url($badge->icon) }}" alt="{{ $badge->name }}"
                            style="width:48px;height:auto;flex-shrink:0;">
                        <div>
                            <div class="badge-box-name">{{ $badge->name }}</div>
                            <div class="badge-box-desc">{{ $badge->description }}</div>
                        </div>
                    </div>
                </div>

                <p class="body-text">
                    Keep submitting, keep learning, and keep pushing forward.
                    Every badge is a milestone — and there are more ahead. 🚀
                </p>

                {{-- CTA --}}
                <div class="cta-wrap">
                    <a href="{{ url('/member') }}" class="cta-btn">
                        View Your Badges <span class="cta-accent">✦</span>
                    </a>
                </div>

                <hr class="divider">

                <p class="footer-text">
                    You received this email because you have an account on
                    <a href="{{ url('/') }}">{{ config('app.name') }}</a>.<br>
                    If you have any questions, just reply to this email.
                </p>
            </div>
        </div>

        {{-- Bottom strip --}}
        <div class="bottom-strip">
            {{ config('app.name') }} <span>✦</span> {{ date('Y') }}
        </div>

    </div>
</body>

</html>
