<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\StaffSalary;
use App\Models\Budget;
use App\Models\Attendance;



use Brian2694\Toastr\Facades\Toastr;

class PayrollController extends Controller
{

    public function payroll_edit()
    {
        $employees = DB::table('users')
        ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
        ->select('users.*', 'employees.*')
        ->get();
        return view('payroll.edit_payslip', compact('employees'));
    }
    // view page salary
    public function salary()
    {

        $users = DB::table('users')
                    ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.*')
                    ->get();
        $userList = DB::table('users')->get();
        return view('payroll.employeesalary',compact('users','userList'));
    }

    // save record
     public function saveRecord(Request $request)
     {

        DB::beginTransaction();
        try {
            $salary = StaffSalary::updateOrCreate(['rec_id' => $request->rec_id]);
            $salary->name              = $request->name;
            $salary->rec_id            = $request->rec_id;
            $salary->salary            = $request->salary;
            $salary->basic             = $request->basic;
            $salary->da                = $request->da;
            $salary->hra               = $request->hra;
            $salary->conveyance        = $request->conveyance;
            $salary->allowance         = $request->allowance;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->tds               = $request->tds;
            $salary->esi               = $request->esi;
            $salary->pf                = $request->pf;
            $salary->leave             = $request->leave;
            $salary->prof_tax          = $request->prof_tax;
            $salary->labour_welfare    = $request->labour_welfare;
            $salary->save();

            DB::commit();
            Toastr::success('Create new Salary successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Salary fail :)','Error');
            return redirect()->back();
        }
     }
     public function budgets()
     {
        $budgets=DB::table('budgets')->get();
        $budget_code=DB::table('budgets')->distinct('code')->count();
        $budget_code_sum = DB::table('budgets')->sum('badget_amount');
        $net_amount_sum = DB::table('staff_salaries')->sum('net_amount');
        $expenses_sum = DB::table('expenses')->sum('amount');
        $total_cost= $expenses_sum+$net_amount_sum;
        $remaining=$budget_code_sum-$total_cost;
         return view('payroll.budget', compact('budgets', 'budget_code', 'budget_code_sum', 'total_cost', 'remaining'));

     }

     public function budgets_new(Request $request)
     {

        $budgets = new Budget;
        $budgets->code    = $request->budget_code;
        $budgets->category    = $request->budget_category;
        $budgets->start    = $request->start_date;
        $budgets->end    = $request->end_date;
        $budgets->total_revenue    = $request->total_revenue;
        $budgets->tax    = $request->tax;
        $total_amount=$request->tax+$request->total_revenue;
        $budgets->badget_amount    = $total_amount;
        $budgets->save();

        return back()->with('success', 'New budget created successfully :)');

     }

    public function payments()
    {
        $users = DB::table('users')
        ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
        ->join('staff_salaries', 'users.rec_id', '=', 'staff_salaries.rec_id' )
        ->select('users.*', 'employees.*', 'staff_salaries.*')
        ->get();
        $userList = DB::table('users')->join('employees', 'users.rec_id', '=', 'employees.employee_id')->select('users.*', 'employees.*')->get();
        $projects=DB::table('budgets')->get();
        return view('payroll.payments',compact('users','userList', 'projects'));
    }

    public function MenualPayment(Request $request)
    {

        $salary = new StaffSalary;
        $salary->rec_id=$request->employee_id;
        $salary->salary=$request->gross_salary;
        $salary->tax=$request->tax;
        $salary->net_salary=$request->net_salary;
        $salary->month=$request->month;
        $salary->days=$request->days;
        $salary->year=$request->days;
        $salary->leaves=$request->leaves;
        $salary->days=$request->days;
        $paiddays=$request->leaves+$request->present_days;
        $salary->paiddays=$paiddays;
        $amount = $request->net_salary / $request->days;
        $net_amount=$amount*$paiddays;
        $salary->paiddays=$paiddays;
        $salary->code=$request->code;
        $salary->net_amount=$net_amount;
        $salary->created_at=$request->payment_date;

        $salary->save();
        return redirect()->back();

    }
    // salary view detail
    public function salarypaid(Request $request, $rec_id)
    {
        
        DB::transaction(function () use ($request, $rec_id) {
            $users = DB::table('users')
                ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
                ->select('users.*', 'employees.*')
                ->where('employees.employee_id', $rec_id)
                ->first();

            $currentMonth = now()->format('n');
            $attendances =DB::table('Attendances')->where('rec_id', $rec_id)
                ->where('months', $currentMonth)
                ->select('date')
                ->distinct('date')
                ->count();

            $leaves = DB::table('leaves_admins')
                ->where('leave_type', 'Daily')
                ->where('rec_id', $rec_id)
                ->where('status', 'Confirmed')
                ->sum('total');

            $today = Carbon::now();
            $startOfMonth = $today->copy()->startOfMonth();
            $endOfMonth = $today->copy()->endOfMonth();
            $daysInMonth = $endOfMonth->day;

            $Absent_days = $daysInMonth - $attendances;
            $Present_days = $attendances; // Correct logic here
            $salary_per_day = $users->net_salary / $daysInMonth;
            $Net_Amount = $salary_per_day * ($Present_days+$leaves);
            $code=$users->budget_code;
            StaffSalary::create([
                'rec_id' => $rec_id,
                'salary' => $users->gross_salary,
                'tax' => $users->tax,
                'net_salary' => $users->net_salary,
                'month' => $currentMonth,
                'days' => $daysInMonth,
                'year' => $today->year,
                'leaves' => $leaves,
                'paiddays' => $leaves + $Present_days,
                'code' =>$code,
                'net_amount'=>$Net_Amount,
            ]);

            Toastr::success('Created new salary successfully :)', 'Success');
        }, 5); // Retry transaction 5 times if there's a deadlock

        return redirect()->route('form/salary/payments');
        }

    public function salaryView($rec_id)
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

        $budgets=DB::table('budgets')->join('employees','budgets.code','=','employees.project')->select('budgets.*')->distinct('code')->first();


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
        return view('payroll.salaryview',compact('users', 'attendances', 'daysInMonth', 'Absent_days', 'Present_days' , 'Net_Amount' ,'leaves24', 'budgets'));
    }


    public function PaymentView($rec_id)
    {
        $users = DB::table('users')
        ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
        ->join('staff_salaries', 'users.rec_id', '=', 'staff_salaries.rec_id')
        ->select('users.*', 'employees.*', 'staff_salaries.*', 'staff_salaries.created_at as salary_created_at')
        ->where('employees.employee_id',$rec_id)->first();
        return view('payroll.paymentview',compact('users'));

    }


    // update record
    public function update_route($rec_id)
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
        $leaves25 = DB::table('leaves_admins')->where('leave_type', '=','Daily')->where('rec_id',$rec_id)->where('status', '=','Confirmed')->sum('total');
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
        $Net_Amount=$salary_per_days*($Present_days+$leaves25);

        return view('payroll.salary_edit ',compact('users', 'attendances', 'daysInMonth', 'Absent_days', 'Present_days' , 'Net_Amount' ,'leaves25', 'budgets'));

    }


    public function update($rec_id)
    {
        $users = DB::table('users')
        ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
        ->select('users.*', 'employees.*')
        ->where('employees.employee_id',$rec_id)
        ->first();
        $currentMonth = now()->format('n');
        $attendances =DB::table('Attendances')->where('rec_id',$rec_id)->where('months',$currentMonth)
                ->distinct('date')
                ->count('date');
        $budgets=DB::table('budgets')->join('employees','budgets.code','=','employees.project')->select('budgets.*')->distinct()->get();
        $leaves = DB::table('leaves_admins')->where('leave_type', '=','Daily')->where('rec_id',$rec_id)->where('status', '=','Confirmed')->sum('total');
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
        $Net_Amount=$salary_per_days*($Present_days+$leaves);
        return view('payroll.salary_edit ',compact('users', 'attendances', 'daysInMonth', 'Absent_days', 'Present_days' , 'Net_Amount' ,'leaves', 'budgets'));
    }

    public function updateRecord(Request $request)
    {

        $budget = Budget::findOrFail($request->rec_id);
        dd($budget);
        // Update the budget entry with the form data
        $budget->salary = $request->input('gross_salary');
        $budget->tax = $request->input('tax');
        $budget->net_salary = $request->input('Net_Amount');
        $budget->month = '10';
        $budget->days = $request->input('daysInMonth');
        $budget->month = '2024';
        $budget->leaves = '0';
        $budget->paiddays = $request->input('paiddays');
        // Save the changes
        $budget->save();
        return view('home');

    }


    public function deletePayment($rec_id)
    {
        DB::beginTransaction();
        try{
            $salary = StaffSalary::where('rec_id',$rec_id)->delete();
            DB::commit();
            Toastr::success('Delete record successfully :)', 'Success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            Toastr::error('Delete record fail: )', 'Error');
            return redirect()->back();
        }
    }

    public function deleteBudget($id)
    {
        DB::beginTransaction();
        try{
            $salary = Budget::where('id',$id)->delete();
            DB::commit();
            Toastr::success('Delete record successfully :)', 'Success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            Toastr::error('Delete record fail: )', 'Error');
            return redirect()->back();
        }
    }
    public function budgetsEdit(Request $request)
    {
        DB::beginTransaction();
        try{
            $update =[
                'id' => $request->id,
                'code' => $request->budget_code,
                'category'    => $request->budget_category,
                'start'      => $request->start_date,
                'end'          => $request->end_date,
                'total_revenue'   => $request->total_revenue,
                 'tax'   => $request->tax,
                 'badget_amount'   => $request->total_amount,
            ];
            Budget::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Update record successfully :)', 'Success');
            return redirect()->back();
        }catch(\Exception $e)
        {
            DB::rollback();
            Toastr::error('Update record fail: )', 'Error');
            return redirect()->back();
        }
    }
    // delete record
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            StaffSalary::destroy($request->id);

            DB::commit();
            Toastr::success('Salary deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Salary deleted fail :)','Error');
            return redirect()->back();
        }
    }

    // payroll Items
    public function payrollItems()
    {
        return view('payroll.payrollitems');
    }
}
