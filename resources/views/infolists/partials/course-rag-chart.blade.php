{{-- resources/views/infolists/partials/course-rag-chart.blade.php --}}
@php
    $d        = $getState();
    $courseId = $d['courseId'];
@endphp

@livewire(\App\Livewire\CourseRagChartWidget::class, ['courseId' => $courseId], key('rag-chart-' . $courseId))