<?php

namespace App\Exports;

use App\Transcript;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TranscriptsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function query()
    {
        $company = auth()->user()->belongToCompany();

        $classroomIds = $company->classrooms->pluck('id')->toArray();

        return Transcript::query()->whereIn('classroom_id', $classroomIds);
    }

    public function map($transcript): array
    {
        return [
            $transcript->classroom->name,
            $transcript->student->name,
            $transcript->subject,
            $transcript->score
        ];
    }

    public function headings(): array
    {
        return [
            '班級',
            '學生',
            '科目',
            '成績'
        ];
    }
}
