<?php

namespace App\Imports;

use App\Transcript;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TranscriptsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        dd($row);
        $row = collect($row)->values()->toArray();
        $classroom = Classroom::where('name', $row[0])->frist();
        $student = Student::where('name', $row[1])->first();

        return new Transcript([
            'classroom_id' => $classroom->id,
            'student_id' => $student->id,
            'score' => $row[2],
            'subject' => $row[3],
        ]);
    }
}
