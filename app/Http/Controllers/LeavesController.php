<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use App\Exports\AttendanceEmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\LeavesAdmin;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use App\Notifications\EmployeeNotification;
use Carbon\Carbon;
use App\Models\User; // Assuming your admin users are in the 'users' table

class LeavesController extends Controller
{


    public function approve(Request $request)
    {
            // Retrieve the leave record by ID
            $leave = LeavesAdmin::find($request->input('id'));
            if ($leave) {
                // Update the status
                $leave->status = $request->input('status');
                $leave->save();

                // Redirect with a success message
                return redirect()->back()->with('success', 'Leave status updated successfully.');
            } else {
                // Handle the case where the leave ID was not found
                return redirect()->back()->with('error', 'Leave record not found.');
            }
        }

    // leaves
    public function leaves()
    {
        $leaves4 = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->select('leaves_admins.*', 'employees.name','employees.profile', 'employees.position')
                    ->get();
        $count_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')
                    ->select('leaves_admins.*', 'employees.*')
                    ->count();

                    $sum_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_approved= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Approved')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Declined= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Declined')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Confirmed= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Confirmed')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');
        return view('form.leaves',compact('leaves4', 'count_requested', 'sum_requested','sum_Confirmed', 'sum_Declined', 'sum_approved'));
    }

    public function leaves_line()
    {
        $leaves4 = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->select('leaves_admins.*', 'employees.name','employees.profile', 'employees.position')
                    ->get();
        $count_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')
                    ->select('leaves_admins.*', 'employees.*')
                    ->count();

                    $sum_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_approved= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Approved')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Declined= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Declined')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Confirmed= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Confirmed')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');
        return view('form.leaves_line',compact('leaves4', 'count_requested', 'sum_requested','sum_Confirmed', 'sum_Declined', 'sum_approved'));
    }

    public function leaves_admin()
    {
        $leaves4 = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->select('leaves_admins.*', 'employees.name','employees.profile', 'employees.position')
                    ->get();
        $count_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')
                    ->select('leaves_admins.*', 'employees.*')
                    ->count();

                    $sum_requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Requested')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_approved= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Approved')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Declined= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Declined')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');

                    $sum_Confirmed= DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.status', '=', 'Confirmed')->where('leaves_admins.leave_type', '=', 'Daily')
                    ->sum('leaves_admins.total');
        return view('form.leaves_admin',compact('leaves4', 'count_requested', 'sum_requested','sum_Confirmed', 'sum_Declined', 'sum_approved'));
    }



    // save record
    public function ShowRecord()
    {
        $leaves2 = DB::table('leaves_admins')
        ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')->where('employees.employee_id', Auth::user()->rec_id) // Filter by the authenticated user's id
        ->select('leaves_admins.*', 'employees.*', 'leaves_admins.id as admin_id') // Select columns from both tables
        ->get(); // Execute the query and get the results

        $sick = DB::table('leaves_admins')
        ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')->where('employees.employee_id', Auth::user()->rec_id)->where('leave_category', '=', 'Sick Leave') // Filter by the authenticated user's id
        ->select('leaves_admins.*', 'employees.*', 'leaves_admins.id as admin_id') // Select columns from both tables
        ->count(); // Execute the query and get the results

        return view('form.leavesemployee', compact('leaves2', 'sick'));

    }



    public function saveRecord(Request $request)
    {
        // Create a new leave record
        $leaves = new LeavesAdmin;
        $leaves->rec_id = Auth::user()->rec_id;
        $leaves->leave_category = $request->leave_category;
        $leaves->from_date = $request->from;
        $leaves->to_date = $request->to;
        $leaves->total = $request->total;
        $leaves->leave_type = $request->leave_type;
        $leaves->leave_reason = $request->leave_reason;
        $leaves->status = 'Requested';
        $leaves->save();

        $leave = DB::table('leaves_admins')
        ->join('employees', 'leaves_admins.rec_id', '=', 'employees.employee_id')
        ->select('leaves_admins.*', 'employees.*')
        ->where('leaves_admins.rec_id', Auth::user()->rec_id)
        ->get();


        // Send notification to admin (assuming you have a way to fetch the admin)
        $admin = User::where('rec_id', Auth::user()->rec_id)->first(); // Modify this according to your role logic
        if ($admin) {
            $admin->notify(new EmployeeNotification($leaves, $leave));
        }

        return back()->with('success', 'Create new Leaves successfully :)');
    }

    public function leaveReport()
    {
        $results = DB::table('employees as e')
        ->leftJoin('users as u', 'e.employee_id', '=', 'u.rec_id')  // Use LEFT JOIN to include all employees
        ->leftJoin('leaves_admins as l', 'e.employee_id', '=', 'l.rec_id')  // LEFT JOIN for the leaves
        ->where('l.status', 'Approved')
        ->where('l.leave_type', 'Daily')
        ->select('e.name', 'e.position','e.employee_id', 'e.profile', DB::raw('IFNULL(SUM(l.total), 0) as total_leave_days'))
        ->groupBy('e.employee_id', 'e.name', 'e.position', 'e.profile')  // Group by employee columns
        ->get();

        return view('reports.leaveReport', compact('results'));
    }


    public function leaveAnnual($employee_id)
    {


        $annuals = DB::table('employees as e')
        ->leftJoin('users as u', 'e.employee_id', '=', 'u.rec_id')  // Use LEFT JOIN to include all employees
        ->leftJoin('leaves_admins as l', 'e.employee_id', '=', 'l.rec_id')  // LEFT JOIN for the leaves
        ->where('l.status', 'Approved')
        ->where('l.leave_type', 'Daily')
        ->where('l.leave_category', 'Annual Vacation')
        ->where('l.rec_id', $employee_id)
        ->select('e.name', 'e.position','e.employee_id', 'e.profile', DB::raw('IFNULL(SUM(l.total), 0) as total_leave_days'))
        ->groupBy('e.employee_id', 'e.name', 'e.position', 'e.profile')  // Group by employee columns
        ->get();
        if ($annuals->isNotEmpty()) {
            $total = $annuals->first()->total_leave_days;  // Access the first item in the collection and get total_leave_days
            $total= $annuals->first()->total_leave_days;
            $oveall_leave=18;
            $Annual_leave=18-$total;
        } else {
            $total = 0;  // Default to 0 if no records found
            $Annual_leave=0;

        }

        return view('reports.reports_annual', compact('annuals', 'Annual_leave'));
    }

    public function leaveDetails($employee_id)
    {


        $annuals = DB::table('employees as e')
        ->leftJoin('users as u', 'e.employee_id', '=', 'u.rec_id')  // Use LEFT JOIN to include all employees
        ->leftJoin('leaves_admins as l', 'e.employee_id', '=', 'l.rec_id')  // LEFT JOIN for the leaves
        ->where('l.status', 'Approved')
        ->where('l.leave_type', 'Daily')
        ->where('l.leave_category', 'sick leave')
        ->where('l.rec_id', $employee_id)
        ->select('e.name', 'e.position','e.employee_id', 'e.profile', DB::raw('IFNULL(SUM(l.total), 0) as total_leave_days'))
        ->groupBy('e.employee_id', 'e.name', 'e.position', 'e.profile')  // Group by employee columns
        ->get();
        if ($annuals->isNotEmpty()) {
            $total = $annuals->first()->total_leave_days;  // Access the first item in the collection and get total_leave_days
            $total= $annuals->first()->total_leave_days;
            $oveall_leave=12;
            $Annual_leave=12-$total;
        } else {
            $total = 0;  // Default to 0 if no records found
            $Annual_leave=0;
        }

        return view('reports.leave_report_details', compact('annuals', 'Annual_leave'));
    }

    // edit record
    public function editRecordLeave(Request $request)
    {
            $from_date = new DateTime($request->from_date);
            $to_date = new DateTime($request->to_date);
            $day     = $from_date->diff($to_date);
            $days    = $day->d;
            $update = [
                'id'           => $request->id,
                'leave_category' => $request->leave_category,
                'from_date'    => $request->from_date,
                'to_date'      => $request->to_date,
                'total'          => $request->days,
                'leave_type'   => $request->leave_type,
              'leave_reason'   => $request->leave_reason,

            ];

            LeavesAdmin::where('id',$request->id)->update($update);
            DB::commit();

            Toastr::success('Updated Leaves successfully :)','Success');
            return redirect()->back();

    }

    // edit leave of employees
    public function editRecordleavesemployee(Request $request)

    {

        $from_date = new DateTime($request->from_date);
        $to_date = new DateTime($request->to_date);
        $day     = $from_date->diff($to_date);
        $days    = $day->d;
        $update = [
            'id'           => $request->admin_id,
            'leave_category' => $request->leave_category,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
            'total'          => $request->days,
            'leave_type'   => $request->leave_type,
            'leave_reason'   => $request->leave_reason,

        ];

        LeavesAdmin::where('id',$request->admin_id)->update($update);
        DB::commit();

        DB::commit();
        Toastr::success('Updated Leaves successfully :)','Success');
        return redirect()->back();

    }

    // delete record


    public function deleteLeaveAdmin(Request $request)
    {

        try {

            LeavesAdmin::destroy($request->id);
            Toastr::success('Leaves admin deleted successfully :)','Success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            Toastr::error('Leaves Employee delete fail :)','Error');
            return redirect()->back();
        }

    }

    public function deleteLeave(Request $request)
    {
        try {

            LeavesAdmin::destroy($request->admin_id);
            Toastr::success('Leaves Employee deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Leaves admin delete fail :)','Error');
            return redirect()->back();
        }
    }

    public function deleteRecord($employee_id)
    {
        DB::beginTransaction();
        try{

            Attendance::where('rec_id',$employee_id)->delete();

            DB::commit();
            Toastr::success('Delete record successfully :)','Success');
            return redirect()->route('attendancelist');

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back();
        }
    }
    public function deletedetails($rec_id,$date)

    {
        DB::beginTransaction();
        try{
            Attendance::where('rec_id',$rec_id)->where('date',$date)->delete();
            DB::commit();
            Toastr::success('Delete record successfully :)','Success');
            return redirect()->route('attendance_details');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back();
        }
    }


    // leaveSettings
    public function leaveSettings()
    {
        return view('form.leavesettings');
    }

    // attendance admin
    public function attendanceIndex()
    {
            $attendances = DB::table('Attendances')
            ->Join('employees', 'Attendances.rec_id', '=', 'employees.employee_id')
            ->select('employees.*', 'Attendances.date', 'Attendances.status')
            ->orderBy('employees.id')->distinct('date')
            ->get();

        $groupedAttendances = $attendances->groupBy('id')->map(function ($items) {
            $employee = $items->first();
            $attendanceRecords = $items->map(function ($item) {
                return [
                    'date' => $item->date,
                    'status' => $item->status,
                ];
            });
            return [
                'employee' => $employee,
                'attendances' => $attendanceRecords,
            ];
        });

        return view('form.attendance', compact('groupedAttendances'));

    }

    public function attendanceList()
    {
        $attendances = DB::table('Attendances')
        ->Join('employees', 'Attendances.rec_id', '=', 'employees.employee_id')
        ->select('employees.*', 'Attendances.months', 'Attendances.rec_id')
        ->distinct()
        ->get();
        return view('form.attendancelist', compact('attendances'));
    }

    public function Attendance_Details($rec_id)
    {
$attendances = DB::table('Attendances')
    ->join('employees', 'Attendances.rec_id', '=', 'employees.employee_id')
    ->where('Attendances.rec_id', $rec_id)  // Filter based on specific rec_id (Employee)
    ->select(
        'Attendances.clock_in_time',
        'Attendances.clock_out_time',
        'Attendances.date',
        'Attendances.months',
        'Attendances.rec_id',
        'Attendances.created_at',
        'employees.name',
        'employees.profile',
        'employees.fname',
        'employees.position'
    )
    ->groupBy(
        'Attendances.date',
        'Attendances.clock_in_time',
        'Attendances.clock_out_time',
        'Attendances.months',
        'Attendances.rec_id',
        'Attendances.created_at',
        'employees.name',
        'employees.profile',
        'employees.fname',
        'employees.position'
    )
    ->get();



        return view('form.attendance_details', compact('attendances'));
    }

    public function export()
    {
        return Excel::download(new AttendanceEmployeesExport, 'Attendance_Employee.xlsx');

    }

    public function Attendanceemployees(Request $request)
    {
        $employee = Employee::where('employee_id', Auth::user()->rec_id)->first();
    if ($employee) {
        $timezone = 'Asia/Kabul';
        $monthNumber = Carbon::now($timezone)->month;

        // Define the current time and 4 PM in the specified timezone
        $timeIn = Carbon::now($timezone)->toTimeString(); // Current time
        $timeOut = Carbon::createFromTime(16, 0, 0, $timezone)->toTimeString(); // 4:00 PM

        DB::table('Attendances')->insert([
            'employee_id' => Auth::user()->rec_id,
            'rec_id' => Auth::user()->rec_id,
            'date' => Carbon::now($timezone)->toDateString(), // Today's date
            'months' => $monthNumber,
            'clock_in_time' => $timeIn,
            'clock_out_time' => $timeOut,
            'status' => $request->status,
            'created_at' => now(), // Optional: Add created_at timestamp
            'updated_at' => now(), // Optional: Add updated_at timestamp
        ]);
    }
    return redirect()->back();

}
public function attendanceemployee()
{

            DB::beginTransaction();
        try{
        $employees1 = DB::table('Attendances')
        ->join('employees', 'employees.employee_id', '=', 'Attendances.employee_id') // Join on matching id
         ->where('employees.employee_id', Auth::user()->rec_id) // Filter by the authenticated user's id
        ->select('Attendances.*', 'employees.*') // Select columns from both tables
        ->get(); // Execute the query and get the results
            DB::commit();
          Toastr::success('Attendance Signed successfully :)','Success');
         return view('form.attendanceemployee', compact('employees1'));

        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back();
        }

}

    // leaves Employee
    public function leavesEmployee()
    {
        return view('form.leavesemployee');
    }

    // shiftscheduling
    public function shiftScheduLing()
    {
        return view('form.shiftscheduling');
    }

    // shiftList
    public function shiftList()
    {
        return view('form.shiftlist');
    }
}
