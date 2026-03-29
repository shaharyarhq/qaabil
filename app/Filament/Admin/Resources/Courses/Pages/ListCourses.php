<?php

namespace App\Filament\Admin\Resources\Courses\Pages;

use App\Exports\CourseTemplateExport;
use App\Filament\Admin\Resources\Courses\CourseResource;
use App\Imports\CourseImport;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Maatwebsite\Excel\Facades\Excel;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('import')
                ->label('Import from Excel')
                ->color('success')
                ->schema([
                    FileUpload::make('file')
                        ->label('Excel File')
                        ->required()
                        ->hintAction(
                            Action::make('download_example')->label('Download Example')->icon(Heroicon::ArrowDownTray)
                                ->action(function () {
                                    return Excel::download(
                                        new CourseTemplateExport(),
                                        'course_import_template.xlsx'
                                    );
                                }),
                        )
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'text/csv',
                        ]),
                ])
                ->action(function (array $data) {
                    Excel::import(new CourseImport, $data['file']);

                    Notification::make()
                        ->title('Courses imported successfully')
                        ->success()
                        ->send();
                })
                ->openUrlInNewTab(),
        ];
    }
}
