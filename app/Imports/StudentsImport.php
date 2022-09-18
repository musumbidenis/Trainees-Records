<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class StudentsImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $validator = Validator::make($rows->toArray(), [
            '*.adm_no' => 'required|unique:students',
            '*.first_name' => 'required',
            '*.surname' => 'required',
            '*.email' => 'required|email|unique:students',
            '*.phone' => 'required',
            '*.joining_year' => 'required',
            '*.completion_year' => 'required',
            '*.dept_id' => 'required',
            '*.programme_id' => 'required',
        ]);
        //Alert the user of the input error
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0]);
        } else {
            foreach ($rows as $row) {
                Student::create([
                    'adm_no' => $row['adm_no'],
                    'first_name' => $row['first_name'],
                    'surname' => $row['surname'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'joining_year' => $row['joining_year'],
                    'completion_year' => $row['completion_year'],
                    'programme_id' => $row['programme_id'],
                    'dept_id' => $row['dept_id'],
                ]);
            }
        }

        
    }
}
