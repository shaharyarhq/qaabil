<?php

namespace App\Filament\Student\Resources\Courses\Schemas;

use App\Models\UserObjectiveProgress;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Tapp\FilamentProgressBarColumn\Tables\Columns\ProgressBarColumn;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()
                    ->columnSpanFull()
                    ->heading( "Info")
                    ->schema([
                        TextEntry::make('sections_count')
                            ->label('Sections')
                            ->state(fn(Model $record) => $record->sections()->count())
                            ->badge()
                            ->size(TextSize::Large)
                            ->color('primary')
                            ->icon('heroicon-o-squares-2x2'),

                        TextEntry::make('chapters_count')
                            ->label('Chapters')
                            ->state(fn(Model $record) => $record->chapters()->count())
                            ->badge()
                            ->size(TextSize::Large)
                            ->color('info')
                            ->icon('heroicon-o-document-text'),

                        TextEntry::make('objectives_count')
                            ->label('Objectives')
                            ->state(fn(Model $record) => $record->objectives()->count())
                            ->badge()
                            ->size(TextSize::Large)
                            ->color('success')
                            ->icon('heroicon-o-check-circle'),

                        TextEntry::make('created_at')
                            ->label('Created')
                            ->since()
                            ->icon('heroicon-o-clock')
                            ->color('gray'),

                        TextEntry::make('updated_at')
                            ->label('Last updated')
                            ->since()
                            ->icon('heroicon-o-arrow-path')
                            ->color('gray'),
                    ])
                    ->columns(5),

                // ── Progress bar ───────────────────────────────────────
                ViewEntry::make('lo_progress')
                    ->label('')
                    ->columnSpanFull()
                    ->view('infolists.partials.course-progress')
                    ->state(function (Model $record): array {
                        $objectiveIds = $record->objectives()
                            ->pluck('objectives.id');

                        $total        = $objectiveIds->count();

                        $rows = UserObjectiveProgress::query()
                            ->where('user_id', Auth::user()->id)
                            ->whereIn('objective_id', $objectiveIds)
                            ->whereNotNull('status')
                            ->get()
                            ->groupBy('status')
                            ->map->count();

                        $behind     = $rows->get('behind',   0);
                        $practice   = $rows->get('practice', 0);
                        $mastery    = $rows->get('mastery',  0);
                        $done       = $behind + $practice + $mastery;

                        return [
                            'total'      => $total,
                            'done'       => $done,
                            'behind'     => $behind,
                            'practice'   => $practice,
                            'mastery'    => $mastery,
                            'notStarted' => $total - $done,
                            'percent'    => $total > 0 ? (int) round(($done / $total) * 100) : 0,
                        ];
                    }),

                // ── RAG Donut Chart ────────────────────────────────────
                // Section::make('RAG Breakdown')
                //     ->columnSpanFull()
                //     ->schema([
                ViewEntry::make('rag_chart')
                    ->label('')
                    ->columnSpanFull()
                    ->view('infolists.partials.course-rag-chart')
                    ->state(fn(Model $record) => ['courseId' => $record->id]),
                // ]),

                // ── Syllabus tree ──────────────────────────────────────
                ViewEntry::make('syllabus_tree')
                    ->label('')
                    ->columnSpanFull()
                    ->view('infolists.partials.course-syllabus')
                    ->state(function (Model $record): array {
                        $objectiveIds = $record->objectives()
                            ->pluck('objectives.id');

                        $progressMap = UserObjectiveProgress::query()
                            ->where('user_id', Auth::user()->id)
                            ->whereIn('objective_id', $objectiveIds)
                            ->pluck('status', 'objective_id')
                            ->toArray();

                        return [
                            'sections' => $record->sections->map(fn($section) => [
                                'id'       => $section->id,
                                'name'     => $section->name,
                                'chapters' => $section->chapters->map(fn($chapter) => [
                                    'id'         => $chapter->id,
                                    'name'       => $chapter->name,
                                    'objectives' => $chapter->objectives->map(fn($obj) => [
                                        'id'     => $obj->id,
                                        'name'   => $obj->name,
                                        'status' => isset($progressMap[$obj->id]) ? (string) $progressMap[$obj->id]->value : null,
                                    ])->toArray(),
                                ])->toArray(),
                            ])->toArray(),
                        ];
                    }),
            ]);
    }
}
