<?php

namespace App\Filament\Student\Resources\Courses\Pages;

use App\Filament\Student\Resources\Courses\CourseResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewCourse extends ViewRecord
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // EditAction::make(),
            Action::make('view_course')
                ->label('View Course on Website')
                ->icon(Heroicon::ArrowUpRight)
                ->url(fn(Model $record) => route('courses.view', $record))
                ->openUrlInNewTab(),
            Action::make('download_report')
                ->label('Download Report')
                ->color('success')
                ->icon(Heroicon::DocumentArrowDown)
                ->action(function (Model $record) {
                    $record->load([
                        'sections.chapters.objectives.userProgress' => fn($q) => $q
                            ->where('user_id', filament()->auth()->user()->id)
                    ]);

                    $pdf = Pdf::loadView('pdf.course-report', [
                        'course' => $record,
                    ])
                        ->setOption('enable_html5_parser', true)
                        ->setPaper('a4', 'portrait');

                    return response()->streamDownload(
                        fn() => print($pdf->output()),
                        str($record->name)->slug() . '-report.pdf'
                    );
                }),
        ];
    }
}
