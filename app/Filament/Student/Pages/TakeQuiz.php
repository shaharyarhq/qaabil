<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use App\Models\Quiz\Quiz;
use App\Enums\QuestionType;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use App\Models\Quiz\QuizAttempt;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use App\Models\UserObjectiveProgress;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Wizard;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;

class TakeQuiz extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected string $view = 'filament.student.pages.take-quiz';

    protected static bool $shouldRegisterNavigation = false;

    public Quiz $quiz;

    public QuizAttempt $attempt;

    public function getHeading(): string
    {
        return $this->quiz->objective->name;
    }

    public static function getSlug(\Filament\Panel|null $panel = null): string
    {
        return 'quiz/{quiz}/take';
    }

    public function mount(Quiz $quiz): void
    {
        $this->quiz = $quiz->load('questions.options');

        $this->attempt = QuizAttempt::firstOrNew(
            ['quiz_id' => $quiz->id, 'user_id' => Auth::id()]
        );

        if ($this->attempt->exists) {
            // $this->attempt->answers()->delete();
        }

        $this->attempt->fill([
            'status' => 'in_progress',
            'total_questions' => $quiz->questions->count(),
            'correct_count' => 0,
            'percentage' => null,
            'submitted_at' => null,
        ])->save();

        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Wizard::make(
                            $this->quiz->questions->map(function ($question, $index) {
                                $field = $question->type === QuestionType::MultipleChoice
                                    ? CheckboxList::make("answers.{$question->id}")
                                    : Radio::make("answers.{$question->id}");

                                return Step::make("q{$question->id}")
                                    ->hiddenLabel()
                                    ->label('Question ' . ($index + 1))
                                    ->schema([
                                        $field
                                            ->label($question->question)
                                            ->options($question->options->pluck('option_text', 'id'))
                                    ]);
                            })->toArray()
                        )
                            ->submitAction(Action::make('submitQuiz')
                                ->label('Submit Quiz')
                                ->requiresConfirmation()
                                ->action('submitQuiz'))
                            ->contained(false)
                            ->persistStepInQueryString(),
                    ]),
            ])
            ->statePath('data');
    }

    public function submitQuiz(): void
    {
        $data = $this->form->getState();
        $correctCount = 0;

        foreach ($this->quiz->questions as $question) {
            $selected = $data['answers'][$question->id] ?? null;
            $selectedIds = collect(is_array($selected) ? $selected : [$selected])
                ->filter()
                ->map(fn($v) => (int) $v)
                ->sort()
                ->values()
                ->all();

            $correctIds = $question->options
                ->where('is_correct', true)
                ->pluck('id')
                ->sort()
                ->values()
                ->all();

            $isCorrect = $selectedIds === $correctIds;

            if ($isCorrect) {
                $correctCount++;
            }
        }

        $total = $this->quiz->questions->count();
        $percentage = $total > 0 ? round(($correctCount / $total) * 100, 2) : 0;

        $this->attempt->update([
            'status' => 'graded',
            'correct_count' => $correctCount,
            'percentage' => $percentage,
            'submitted_at' => now(),
        ]);

        $this->updateObjectiveProgress($percentage);

        Notification::make()
            ->title("Scored {$correctCount}/{$total}")
            ->success()
            ->send();

        $this->redirect(route('courses.view', $this->quiz->objective->chapter->section->course));
    }

    protected function updateObjectiveProgress(float $percentage): void
    {
        $status = match (true) {
            $percentage >= 90 => 'mastery',
            $percentage >= 60 => 'practice',
            default => 'behind',
        };

        UserObjectiveProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'objective_id' => $this->quiz->objective_id],
            ['status' => $status]
        );
    }
}
