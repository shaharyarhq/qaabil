<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\UserObjectiveProgress;
use Illuminate\Support\Facades\Auth;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class CourseRagChartWidget extends ApexChartWidget
{
    protected static ?string $chartId = 'courseRagChart';
    protected static ?string $heading = 'Learning Objectives — RAG';
    protected static bool $deferLoading = true;

    // Passed in from the infolist ViewEntry state
    public ?int $courseId = null;

    protected function getOptions(): array
    {
        $course = Course::findOrFail($this->courseId);

        $objectiveIds = $course->objectives()
            ->pluck('objectives.id');
        $total        = $objectiveIds->count();

        $rows = UserObjectiveProgress::query()
            ->where('user_id', Auth::user()->id)
            ->whereIn('objective_id', $objectiveIds)
            ->whereNotNull('status')
            ->get()
            ->groupBy('status')
            ->map->count();

        $mastery    = $rows->get('mastery',   0);
        $practice   = $rows->get('practice',  0);
        $behind     = $rows->get('behind',    0);
        $notStarted = $total - ($mastery + $practice + $behind);

        return [
            'chart' => [
                'type'    => 'donut',
                'height'  => 260,
                'toolbar' => ['show' => true],
                'animations' => ['enabled' => true, 'speed' => 500],
            ],
            'series' => [$mastery, $practice, $behind, $notStarted ?: 0],
            'labels' => ['Mastery Reached', 'Need Practice', 'Falling Behind', 'Not Started'],
            'colors' => ['#10b981', '#f59e0b', '#ef4444', '#e5e7eb'],
            'legend' => [
                'show'     => true,
                'position' => 'bottom',
                'fontSize'  => '12px',
                'fontFamily' => 'inherit',
                'labels'   => ['colors' => '#6b7280'],
            ],
            'plotOptions' => [
                'pie' => [
                    'donut' => [
                        'size' => '70%',
                        'labels' => [
                            'show' => true,
                            'total' => [
                                'show'      => true,
                                'label'     => 'Marked',
                                'fontSize'  => '13px',
                                'fontWeight' => 600,
                                'color'     => '#6b7280',
                                'formatter' => "function(w) {
                                    const total = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                    const done  = w.globals.seriesTotals[0] + w.globals.seriesTotals[1] + w.globals.seriesTotals[2];
                                    return total > 0 ? Math.round((done / total) * 100) + '%' : '0%';
                                }",
                            ],
                        ],
                    ],
                ],
            ],
            'dataLabels' => ['enabled' => false],
            'stroke'     => ['width' => 0],
            'tooltip'    => [
                'y' => [
                    'formatter' => "function(val) { return val + ' objective' + (val !== 1 ? 's' : ''); }",
                ],
            ],
        ];
    }
}
