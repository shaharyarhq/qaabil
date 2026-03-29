<?php

namespace App\Imports;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Objective;
use App\Models\Section;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements
    ToCollection,
    WithHeadingRow,
    SkipsEmptyRows,
    WithChunkReading
{
    public array $errors = [];
    public int   $imported = 0;

    public function chunkSize(): int
    {
        return 100;
    }

    public function collection(Collection $rows): void
    {
        foreach ($rows as $index => $row) {
            $rowNum = $index + 2;

            $validator = Validator::make($row->toArray(), [
                'course_name'  => 'required|string',
                'section_name' => 'required|string',
                'chapter_name' => 'required|string',
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $msg) {
                    $this->errors[] = "Row {$rowNum}: {$msg}";
                }
                continue;
            }

            try {
                $course = Course::firstOrCreate(['name' => trim($row['course_name'])]);

                $section = Section::firstOrCreate([
                    'name'      => trim($row['section_name']),
                    'course_id' => $course->id,
                ]);

                $chapter = Chapter::firstOrCreate([
                    'name'       => trim($row['chapter_name']),
                    'section_id' => $section->id,
                ]);

                if (!empty($row['objective_name'])) {
                    Objective::firstOrCreate([
                        'name'       => trim($row['objective_name']),
                        'chapter_id' => $chapter->id,
                    ]);
                }

                $this->imported++;
            } catch (\Throwable $e) {
                $this->errors[] = "Row {$rowNum}: " . $e->getMessage();
            }
        }
    }
}
