<?php

namespace App\Exports;
use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AttendanceEmployeesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('Attendances')
        ->join('employees', 'Attendances.rec_id', '=', 'employees.employee_id')
        ->select(
            'employees.employee_id',
            'employees.name',
            'employees.position',
            'Attendances.months',
            'Attendances.date',
            DB::raw('MIN(Attendances.clock_in_time) as clock_in_time'),  // Example: using MIN() to get the first clock-in
            DB::raw('MAX(Attendances.clock_out_time) as clock_out_time')  // Example: using MAX() to get the latest clock-out
        )
        ->groupBy('Attendances.date', 'employees.id', 'employees.name', 'employees.position', 'employees.employee_id', 'Attendances.months')
        ->get();

    }

    public function headings(): array
    {
        return [
            'Employee_ID',
            'EmployeeName',
            'Position',
            'Months',
            'Date',
            'Time-In',
            'Time-Out',
        ];
    }

}
