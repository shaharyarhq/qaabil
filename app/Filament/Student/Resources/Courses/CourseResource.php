<?php

namespace App\Filament\Student\Resources\Courses;

use App\Filament\Student\Resources\Courses\Pages\CreateCourse;
use App\Filament\Student\Resources\Courses\Pages\ListCourses;
use App\Filament\Student\Resources\Courses\Pages\ViewCourse;
use App\Filament\Student\Resources\Courses\Schemas\CourseForm;
use App\Filament\Student\Resources\Courses\Schemas\CourseInfolist;
use App\Filament\Student\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use App\Models\Objective;
use App\Models\UserObjectiveProgress;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;
    protected static string|null $modelLabel = 'My Courses';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
            'create' => CreateCourse::route('/create'),
            'view' => ViewCourse::route('/{record}'),
            // 'edit' => EditCourse::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $doneObjectiveIds = UserObjectiveProgress::where('user_id', filament()->auth()->user()->id)
            ->pluck('objective_id');

        $courseIds = Objective::whereIn('objectives.id', $doneObjectiveIds)
            ->join('chapters', 'chapters.id', '=', 'objectives.chapter_id')
            ->join('sections', 'sections.id', '=', 'chapters.section_id')
            ->pluck('sections.course_id')
            ->unique();

        return parent::getEloquentQuery()
            ->where('is_disabled', false)
            ->whereIn('id', $courseIds);
    }
}
