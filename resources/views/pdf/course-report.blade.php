{{-- resources/views/pdf/course-report.blade.php --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin-top: 40px;
            margin-left: 45px;
            margin-right: 45px;
            margin-bottom: 40px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1a1a1a;
            line-height: 1.4;
        }

        /* ── Top bar ── */
        .top-bar {
            width: 100%;
            border-bottom: 3px solid #c8102e;
            padding-bottom: 6px;
            margin-bottom: 6px;
        }

        .top-bar-left {
            float: left;
            font-size: 11px;
            font-weight: bold;
            color: #c8102e;
            letter-spacing: 0.5px;
        }

        .top-bar-right {
            float: right;
            font-size: 9px;
            color: #555555;
        }

        .clear {
            clear: both;
        }

        /* ── Main heading ── */
        .main-heading {
            font-size: 22px;
            font-weight: bold;
            color: #c8102e;
            margin-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 6px;
        }

        /* ── Legend table ── */
        .legend-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #bbbbbb;
            margin-bottom: 12px;
        }

        .legend-table th {
            padding: 7px 8px;
            font-size: 9.5px;
            font-weight: bold;
            color: #ffffff;
            background-color: #1b3a6b;
            text-align: center;
        }

        .legend-table th.topic-th {
            background-color: #1b3a6b;
            text-align: left;
            width: 18%;
        }

        .legend-table th.obj-th {
            background-color: #1b3a6b;
            text-align: left;
            width: 38%;
        }

        .legend-table th.r-th {
            background-color: #c8102e;
            width: 7%;
        }

        .legend-table th.a-th {
            background-color: #e07b00;
            width: 7%;
        }

        .legend-table th.g-th {
            background-color: #2e7d32;
            width: 7%;
        }

        .legend-table th.advice-th {
            background-color: #1b3a6b;
            text-align: left;
            width: 23%;
        }

        .legend-table td {
            padding: 7px 8px;
            font-size: 9px;
            vertical-align: top;
            border: 1px solid #cccccc;
            line-height: 14px;
            background-color: #f9f9f9;
        }

        .rag-label {
            font-size: 8.5px;
            line-height: 13px;
        }

        .rag-label strong {
            color: #c8102e;
        }

        .rag-label .a-label {
            color: #e07b00;
        }

        .rag-label .g-label {
            color: #2e7d32;
        }

        .note {
            font-size: 9px;
            color: #555;
            font-style: italic;
            margin-bottom: 22px;
        }

        /* ── Progress summary block ── */
        .progress-block {
            border: 1px solid #dde3ef;
            border-radius: 6px;
            background: #f8fafd;
            padding: 14px 16px;
            margin-bottom: 18px;
        }

        .progress-block-header {
            width: 100%;
            margin-bottom: 10px;
        }

        .progress-heading {
            float: left;
            font-size: 12px;
            font-weight: bold;
            color: #1b3a6b;
        }

        .progress-percent {
            float: right;
            font-size: 18px;
            font-weight: bold;
            color: #1b3a6b;
        }

        .progress-sub {
            font-size: 8.5px;
            color: #888;
            float: left;
            clear: left;
            margin-top: 1px;
        }

        /* ── Segmented bar ── */
        .bar-track {
            width: 100%;
            height: 10px;
            background: #e5e7eb;
            border-radius: 99px;
            overflow: hidden;
            margin-bottom: 12px;
            clear: both;
        }

        .bar-segment-mastery {
            float: left;
            height: 10px;
            background: #10b981;
        }

        .bar-segment-practice {
            float: left;
            height: 10px;
            background: #f59e0b;
        }

        .bar-segment-behind {
            float: left;
            height: 10px;
            background: #ef4444;
        }

        /* ── Stat cards row ── */
        .stat-row {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .stat-row td {
            width: 25%;
            padding: 4px 5px;
            vertical-align: top;
        }

        .stat-card {
            border: 1px solid #dde3ef;
            border-radius: 5px;
            background: #ffffff;
            padding: 8px 10px;
        }

        .stat-badge {
            display: inline-block;
            padding: 2px 7px;
            border-radius: 99px;
            font-size: 8px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        .badge-gray {
            background: #9ca3af;
        }

        .badge-red {
            background: #ef4444;
        }

        .badge-amber {
            background: #f59e0b;
        }

        .badge-green {
            background: #10b981;
        }

        .stat-number {
            font-size: 20px;
            font-weight: bold;
            color: #0f172a;
            line-height: 1;
            margin-bottom: 2px;
        }

        .stat-pct {
            font-size: 8px;
            color: #888;
        }

        /* ── RAG breakdown chart ── */
        .chart-section {
            border: 1px solid #dde3ef;
            background: #f8fafd;
            padding: 14px 16px;
            margin-bottom: 20px;
        }

        .chart-heading {
            font-size: 11px;
            font-weight: bold;
            color: #1b3a6b;
            margin-bottom: 10px;
        }

        /* ── Section / Topic heading ── */
        .topic-heading {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            background-color: #c8102e;
            padding: 6px 10px;
            margin-top: 20px;
            margin-bottom: 0;
        }

        /* ── Report table ── */
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #bbbbbb;
        }

        .report-table thead tr th {
            padding: 6px 8px;
            font-size: 9.5px;
            font-weight: bold;
            color: #ffffff;
            text-align: left;
            border: 1px solid #999999;
        }

        .report-table thead .th-topic {
            background-color: #1b3a6b;
            width: 22%;
        }

        .report-table thead .th-obj {
            background-color: #1b3a6b;
            width: 40%;
        }

        .report-table thead .th-r {
            background-color: #c8102e;
            width: 7%;
            text-align: center;
        }

        .report-table thead .th-a {
            background-color: #e07b00;
            width: 7%;
            text-align: center;
        }

        .report-table thead .th-g {
            background-color: #2e7d32;
            width: 7%;
            text-align: center;
        }

        .report-table thead .th-advice {
            background-color: #1b3a6b;
            width: 17%;
        }

        .report-table tbody tr.row-odd {
            background-color: #ffffff;
        }

        .report-table tbody tr.row-even {
            background-color: #f0f4f9;
        }

        .report-table tbody td {
            padding: 8px 8px;
            font-size: 9px;
            vertical-align: top;
            border: 1px solid #cccccc;
            line-height: 14px;
        }

        .report-table tbody td.td-topic {
            border-left: 4px solid #1b3a6b;
            font-weight: bold;
            font-size: 9px;
            line-height: 14px;
            color: #1b3a6b;
        }

        .obj-item {
            margin-bottom: 6px;
            padding-left: 8px;
            text-indent: -8px;
        }

        .tick-cell {
            text-align: center;
            vertical-align: top;
        }

        .tick-wrap {
            margin-bottom: 6px;
            min-height: 14px;
            display: block;
        }

        .box {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1.5px solid #888888;
            vertical-align: middle;
        }

        .box-empty {
            background-color: #ffffff;
        }

        .box-tick {
            font-size: 8px;
            line-height: 11px;
            color: #ffffff;
            text-align: center;
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1.5px solid;
            vertical-align: middle;
        }

        .td-advice {
            font-size: 8.5px;
            color: #444;
            line-height: 13px;
        }

        .advice-item {
            margin-bottom: 6px;
        }
    </style>
</head>

<body>

    {{-- ── Top bar ── --}}
    <div class="top-bar">
        <div>
            <span class="top-bar-left">{{ $course->name }}</span>
            <div class="clear"></div>
        </div>
    </div>

    {{-- ── Main heading ── --}}
    <div class="main-heading">Progress Report</div>

    <div class="note">
        Note: this report provides a simplified overview of learner progress across topics and objectives.
        Progress is based on self-reported status at the time of generation.
    </div>

    {{-- ════════════════════════════════════════════════════
         PROGRESS SUMMARY BLOCK
         ════════════════════════════════════════════════════ --}}
    @php
        use App\Enums\Progress;
        use App\Models\UserObjectiveProgress;
        use Illuminate\Support\Facades\Auth;

        $objectiveIds = $course->objectives()->pluck('objectives.id');
        $total = $objectiveIds->count();

        $rows = UserObjectiveProgress::query()
            ->where('user_id', Auth::id())
            ->whereIn('objective_id', $objectiveIds)
            ->whereNotNull('status')
            ->get()
            ->groupBy(fn($r) => $r->status->value)
            ->map->count();

        $mastery = $rows->get('mastery', 0);
        $practice = $rows->get('practice', 0);
        $behind = $rows->get('behind', 0);
        $done = $mastery + $practice + $behind;
        $notStarted = $total - $done;
        $percent = $total > 0 ? (int) round(($done / $total) * 100) : 0;

        // Segment widths (rounded, capped so they don't exceed 100%)
        $wMastery = $total > 0 ? round(($mastery / $total) * 100) : 0;
        $wPractice = $total > 0 ? round(($practice / $total) * 100) : 0;
        $wBehind = $total > 0 ? round(($behind / $total) * 100) : 0;

    @endphp

    {{-- Progress bar card --}}
    <div class="progress-block">
        <div class="progress-block-header">
            <span class="progress-heading">My Progress</span>
            <span class="progress-percent">{{ $percent }}%</span>
            {{-- <span class="progress-sub">{{ $done }} of {{ $total }} objectives marked</span> --}}
            <div class="clear"></div>
        </div>

        {{-- Segmented bar --}}
        <div class="bar-track">
            @if ($wMastery > 0)
                <div class="bar-segment-mastery" style="width:{{ $wMastery }}%"></div>
            @endif
            @if ($wPractice > 0)
                <div class="bar-segment-practice" style="width:{{ $wPractice }}%"></div>
            @endif
            @if ($wBehind > 0)
                <div class="bar-segment-behind" style="width:{{ $wBehind }}%"></div>
            @endif
            <div class="clear"></div>
        </div>

        {{-- Stat cards --}}
        <table class="stat-row">
            <tr>
                @foreach ([['label' => 'Not Started', 'class' => 'badge-gray', 'count' => $notStarted, 'total' => $total], ['label' => 'Behind', 'class' => 'badge-red', 'count' => $behind, 'total' => $total], ['label' => 'Practice', 'class' => 'badge-amber', 'count' => $practice, 'total' => $total], ['label' => 'Mastery', 'class' => 'badge-green', 'count' => $mastery, 'total' => $total]] as $card)
                    <td>
                        <div class="stat-card">
                            <div><span class="stat-badge {{ $card['class'] }}">{{ $card['label'] }}</span></div>
                            <div class="stat-number">{{ $card['count'] }}</div>
                            @if ($card['total'] > 0)
                                <div class="stat-pct">{{ round(($card['count'] / $card['total']) * 100) }}% of total
                                </div>
                            @endif
                        </div>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>

    {{-- ════════════════════════════════════════════════════
         RAG BREAKDOWN — SVG donut via filled <path> arcs
         DomPDF supports fill on <path> reliably.
         Each segment is an annular wedge:
           outer arc (R=52) → inner arc (r=30) back
         Angle 0 = top (12 o'clock), clockwise.
         ════════════════════════════════════════════════════ --}}
    @php
        $cx = 60;
        $cy = 60;
        $R = 52;
        $r = 30;
        $steps = 60;

        $segments = [
            ['color' => '#10b981', 'label' => 'Mastery', 'count' => $mastery],
            ['color' => '#f59e0b', 'label' => 'Need Practice', 'count' => $practice],
            ['color' => '#ef4444', 'label' => 'Falling Behind', 'count' => $behind],
            ['color' => '#d1d5db', 'label' => 'Not Started', 'count' => $notStarted],
        ];

        $wedgePoints = function (
            float $startDeg,
            float $sweepDeg,
            float $cx,
            float $cy,
            float $R,
            float $r,
            int $steps,
        ): string {
            if ($sweepDeg < 0.5) {
                return '';
            }
            $toRad = M_PI / 180;
            $numPts = max(2, (int) round(($steps * $sweepDeg) / 360));
            $pts = [];
            for ($i = 0; $i <= $numPts; $i++) {
                $a = ($startDeg + ($sweepDeg * $i) / $numPts) * $toRad;
                $pts[] = round($cx + $R * cos($a), 3) . ',' . round($cy + $R * sin($a), 3);
            }
            for ($i = $numPts; $i >= 0; $i--) {
                $a = ($startDeg + ($sweepDeg * $i) / $numPts) * $toRad;
                $pts[] = round($cx + $r * cos($a), 3) . ',' . round($cy + $r * sin($a), 3);
            }
            return implode(' ', $pts);
        };

        $angleStart = -90.0;
        $gap = 1.5;
        foreach ($segments as &$seg) {
            $seg['pct'] = $total > 0 ? $seg['count'] / $total : 0;
            $seg['angleSweep'] = $seg['pct'] * 360;
            $sweepWithGap = max(0, $seg['angleSweep'] - $gap);
            $seg['points'] =
                $sweepWithGap > 0.5
                    ? $wedgePoints($angleStart + $gap / 2, $sweepWithGap, $cx, $cy, $R, $r, $steps)
                    : '';
            $angleStart += $seg['angleSweep'];
        }
        unset($seg);

        // Build SVG string
        $svgParts = [];
        $svgParts[] = '<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120">';

        if ($total === 0) {
            $emptyPts = [];
            for ($i = 0; $i <= 60; $i++) {
                $a = ((($i / 60) * 360 - 90) * M_PI) / 180;
                $emptyPts[] = round($cx + $R * cos($a), 3) . ',' . round($cy + $R * sin($a), 3);
            }
            for ($i = 60; $i >= 0; $i--) {
                $a = ((($i / 60) * 360 - 90) * M_PI) / 180;
                $emptyPts[] = round($cx + $r * cos($a), 3) . ',' . round($cy + $r * sin($a), 3);
            }
            $svgParts[] = '<polygon points="' . implode(' ', $emptyPts) . '" fill="#e5e7eb"/>';
        } else {
            foreach ($segments as $seg) {
                if ($seg['points']) {
                    $svgParts[] = '<polygon points="' . $seg['points'] . '" fill="' . $seg['color'] . '"/>';
                }
            }
        }

        $svgParts[] =
            '<text x="' .
            $cx .
            '" y="' .
            ($cy - 4) .
            '" text-anchor="middle" font-family="DejaVu Sans, sans-serif" font-size="13" font-weight="bold" fill="#1b3a6b">' .
            $percent .
            '%</text>';
        $svgParts[] =
            '<text x="' .
            $cx .
            '" y="' .
            ($cy + 8) .
            '" text-anchor="middle" font-family="DejaVu Sans, sans-serif" font-size="7" fill="#9ca3af">marked</text>';
        $svgParts[] = '</svg>';

        $svgString = implode('', $svgParts);
        $svgBase64 = base64_encode($svgString);
    @endphp

    <div class="chart-section">
        <div class="chart-heading">Learning Objectives — RAG Breakdown</div>
        <table cellpadding="0" cellspacing="0" style="width:100%;">
            <tr>
                <td style="width:140px;text-align:center;vertical-align:middle;">
                    {{-- KEY FIX: img tag with base64 data URI, NOT inline <svg> --}}
                    <img src="data:image/svg+xml;base64,{{ $svgBase64 }}" width="120" height="120" />
                </td>

                <td style="vertical-align:middle;padding-left:14px;">
                    <table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                        @foreach ($segments as $seg)
                            @php $pct = $total > 0 ? round($seg['pct'] * 100) : 0; @endphp
                            <tr>
                                <td style="width:10px;padding:3px 6px 3px 0;vertical-align:middle;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                        <rect x="0" y="0" width="10" height="10" fill="{{ $seg['color'] }}" />
                                    </svg>
                                </td>
                                <td
                                    style="font-family:DejaVu Sans,sans-serif;font-size:8.5px;color:#374151;padding:3px 10px 3px 0;">
                                    {{ $seg['label'] }}
                                </td>
                                <td
                                    style="font-family:DejaVu Sans,sans-serif;font-size:8.5px;font-weight:bold;color:#0f172a;padding:3px 5px 3px 0;">
                                    {{ $seg['count'] }}
                                </td>
                                <td
                                    style="font-family:DejaVu Sans,sans-serif;font-size:8px;color:#9ca3af;padding:3px 0;">
                                    ({{ $pct }}%)
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"
                                style="padding-top:8px;border-top:1px solid #e5e7eb;font-family:DejaVu Sans,sans-serif;font-size:8px;color:#6b7280;">
                                Total: <strong style="color:#0f172a;">{{ $total }}</strong>
                                &nbsp;&nbsp;
                                Marked: <strong style="color:#0f172a;">{{ $done }}</strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    {{-- ════════════════════════════════════════════════════ --}}

    {{-- ── Legend table ── --}}
    <table class="legend-table">
        <thead>
            <tr>
                <th class="topic-th">Topic</th>
                <th class="obj-th">Learning Objectives</th>
                <th class="r-th">R</th>
                <th class="a-th">A</th>
                <th class="g-th">G</th>
                <th class="advice-th">Progress</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>These are the topics in the course syllabus.</td>
                <td>This is what learners should be able to do or know for each part of the syllabus.</td>
                <td colspan="3" style="text-align:left;">
                    <div class="rag-label">
                        <strong>Red</strong> = <strong>Behind</strong> — learner is struggling and needs focused
                        support.<br><br>
                        <span class="a-label"><strong>Amber</strong> = <strong>Practice</strong></span> — reasonably
                        confident but needs more practice.<br><br>
                        <span class="g-label"><strong>Green</strong> = <strong>Mastery</strong></span> — learner is very
                        confident.
                    </div>
                </td>
                <td>Indicates the learner's current status for each objective.</td>
            </tr>
        </tbody>
    </table>

    {{-- ── Per-section tables ── --}}
    @foreach ($course->sections as $sectionIndex => $section)
        <div class="topic-heading">
            Topic {{ $sectionIndex + 1 }}: {{ $section->name }}
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th class="th-topic">Topic</th>
                    <th class="th-obj">You should be able to</th>
                    <th class="th-r">R</th>
                    <th class="th-a">A</th>
                    <th class="th-g">G</th>
                    <th class="th-advice">Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($section->chapters as $chapterIndex => $chapter)
                    <tr class="{{ $chapterIndex % 2 === 0 ? 'row-odd' : 'row-even' }}">
                        <td class="td-topic">{{ $chapter->name }}</td>
                        <td>
                            @foreach ($chapter->objectives as $objective)
                                <div class="obj-item">&#x2022; {{ $objective->name }}</div>
                            @endforeach
                        </td>
                        {{-- R --}}
                        <td class="tick-cell">
                            @foreach ($chapter->objectives as $objective)
                                @php $status = $objective->userProgress->first()?->status?->value; @endphp
                                <div class="tick-wrap">
                                    @if ($status === Progress::BEHIND->value)
                                        <span class="box-tick"
                                            style="background:#c8102e;border-color:#c8102e;">&#x2713;</span>
                                    @else
                                        <span class="box box-empty"></span>
                                    @endif
                                </div>
                            @endforeach
                        </td>
                        {{-- A --}}
                        <td class="tick-cell">
                            @foreach ($chapter->objectives as $objective)
                                @php $status = $objective->userProgress->first()?->status?->value; @endphp
                                <div class="tick-wrap">
                                    @if ($status === Progress::PRACTICE->value)
                                        <span class="box-tick"
                                            style="background:#e07b00;border-color:#e07b00;">&#x2713;</span>
                                    @else
                                        <span class="box box-empty"></span>
                                    @endif
                                </div>
                            @endforeach
                        </td>
                        {{-- G --}}
                        <td class="tick-cell">
                            @foreach ($chapter->objectives as $objective)
                                @php $status = $objective->userProgress->first()?->status?->value; @endphp
                                <div class="tick-wrap">
                                    @if ($status === Progress::MASTERY->value)
                                        <span class="box-tick"
                                            style="background:#2e7d32;border-color:#2e7d32;">&#x2713;</span>
                                    @else
                                        <span class="box box-empty"></span>
                                    @endif
                                </div>
                            @endforeach
                        </td>
                        {{-- Progress --}}
                        <td class="td-advice">
                            @foreach ($chapter->objectives as $objective)
                                @php $status = $objective->userProgress->first()?->status?->value; @endphp
                                <div class="advice-item">
                                    @switch($status)
                                        @case(Progress::BEHIND->value)
                                            <span
                                                style="color:#c8102e;font-weight:bold;">{{ Progress::BEHIND->getLabel() }}</span>
                                        @break

                                        @case(Progress::PRACTICE->value)
                                            <span
                                                style="color:#e07b00;font-weight:bold;">{{ Progress::PRACTICE->getLabel() }}</span>
                                        @break

                                        @case(Progress::MASTERY->value)
                                            <span
                                                style="color:#2e7d32;font-weight:bold;">{{ Progress::MASTERY->getLabel() }}</span>
                                        @break

                                        @default
                                            <span style="color:#888888;">Not started.</span>
                                    @endswitch
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>

</html>
