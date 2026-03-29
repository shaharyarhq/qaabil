<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CourseTemplateExport implements
    FromCollection,
    WithHeadings,
    WithColumnWidths,
    WithStyles,
    WithTitle
{
    private array $rows = [
        ['Python Programming', 'Getting Started', 'Installing Python', 'Install Python 3.11'],
        ['Python Programming', 'Getting Started', 'Installing Python', 'Set up virtual environment'],
        ['Python Programming', 'Core Concepts', 'Variables & Data Types', 'Integers and floats'],
        ['Web Design Fundamentals', 'HTML Basics', 'Document Structure', 'DOCTYPE and head tags'],
        ['Web Design Fundamentals', 'CSS Styling', 'Selectors & Properties', 'Class vs ID selectors'],
        ['Data Analysis with Excel', 'Excel Essentials', 'Formulas & Functions', 'SUM, AVERAGE, COUNT'],
    ];

    public function title(): string
    {
        return 'Template';
    }

    public function headings(): array
    {
        return [
            'course_name',
            'section_name',
            'chapter_name',
            'objective_name',
        ];
    }

    public function collection(): Collection
    {
        return collect($this->rows);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 28,
            'C' => 34,
            'D' => 36,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = count($this->rows) + 1;

        // Header
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => [
                'bold'  => true,
                'color' => ['argb' => 'FFFFFFFF'],
                'size'  => 11,
            ],
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF1E3A5F'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Body (light borders only, no heavy loops)
        $sheet->getStyle("A2:D{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'       => ['argb' => 'FFDDDDDD'],
                ],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Freeze header
        $sheet->freezePane('A2');
    }
}