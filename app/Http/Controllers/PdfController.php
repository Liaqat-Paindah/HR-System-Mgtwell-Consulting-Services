<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Attendance;

use Barryvdh\DomPDF\Facade as PDF;
class pdfController extends Controller
{
    public function generatePdf($employee_id)
    {

        $user = DB::table('employees')
            ->where('employee_id',$employee_id)
            ->select('*')
            ->get(); // Use get() if you expect multiple records, or first() for a single record

        // Check if user data exists
        if ($user->isEmpty()) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Load the view and pass the data to it
        $pdf = PDF::loadView('form.employee_pdf', ['user' => $user]);

        // Return the PDF as a download
        return $pdf->download('form.employee_pdf.pdf');
    }

    public function payslip($rec_id)
    {
        $users = DB::table('users')
                ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
                ->select('users.*', 'employees.*')
                ->where('employees.employee_id',$rec_id)
                ->first();
         $currentMonth = now()->format('n');
         $attendances = DB::table('Attendances')->where('rec_id',$rec_id)->where('months',$currentMonth)
                ->distinct('date')
                ->count('date');
        $budgets=DB::table('budgets')->join('employees','budgets.code','=','employees.project')->select('budgets.*')->distinct()->get();

        $leaves24 = DB::table('leaves_admins')->where('leave_type', '=','Daily')->where('rec_id',$rec_id)->where('status', '=','Confirmed')->sum('total');
        $today = Carbon::now();
        // Get the first and last day of the current month
        $startOfMonth = $today->startOfMonth();
        $endOfMonth = $today->endOfMonth();
        // Calculate the number of days in the month
        $daysInMonth = $endOfMonth->day;
        $Absent_days=$daysInMonth-$attendances ;
        $Present_days=$daysInMonth-$Absent_days;
        $net_salary=$users->net_salary;
        $salary_per_days=$net_salary/$daysInMonth;
        $Net_Amount=$salary_per_days*($Present_days+$leaves24);

        $pdf = PDF::loadView('payroll.payslip_pdf', compact('budgets','users', 'attendances', 'daysInMonth', 'Absent_days', 'Present_days' , 'Net_Amount', 'today', 'leaves24'));

        // Return the PDF as a download
        return $pdf->download('payroll.payslip_pdf.pdf');
    }

    public function paymentSlip($rec_id)
    {
        $users = DB::table('users')
        ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
        ->join('staff_salaries', 'users.rec_id', '=', 'staff_salaries.rec_id')
        ->select('users.*', 'employees.*', 'staff_salaries.*', 'staff_salaries.created_at as salary_created_at')
        ->where('employees.employee_id',$rec_id)->first();
    $pdf = PDF::loadView('payroll.payment_pdf', compact('users'));

    return $pdf->download('payroll.payment_pdf.pdf');
    }

    public function Attendance_PDF($rec_id)
    {

     $attendances = DB::table('Attendances')
        ->join('employees', 'Attendances.rec_id', '=', 'employees.employee_id')
        ->where('rec_id', $rec_id)
        ->get();

    $pdf = PDF::loadView('form.attendance_pdf', compact('attendances'));
    return $pdf->download('form.attendance_pdf.pdf');

    }
}
