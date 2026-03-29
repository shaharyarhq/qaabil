<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum VideoFocus: string implements HasLabel
{
    case LessonFocused = 'lesson_focused';

    case QuestionFocused = 'question_focused';

    public function getLabel(): string
    {
        return match ($this) {
            self::LessonFocused => 'Lesson Focused',
            self::QuestionFocused => 'Question Focused',
        };
    }
}
