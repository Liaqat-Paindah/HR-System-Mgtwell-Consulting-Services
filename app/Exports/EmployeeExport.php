<?php

namespace App\Exports;
use App\Models\Employee; // Your model

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }


    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Father Name',
            'Email',
            'Birth Date',
            'Tazkira or NID',
            'Blood Group',
            'TIN Number',
            'Phone Number',
            'Account Number',
            'Position',
            'Gender',
            'Employee ID',
            'Department ID',
            'Project',
            'Budget_Code',
            'Address',
            'Work Station',
            'Category',
            'Step',
            'Gross Salary',
            'Tax',
            'Net Salary',
            'Profile',
            'Created',
            'Updated',
        ];
    }

}
