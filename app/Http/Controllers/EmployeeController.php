<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller
{
    public function export()
    {
        return Excel::download(new EmployeeExport, 'Mgtwell_Staff_List_2024.xlsx');
    }

    public function cardAllEmployee(Request $request)
    {
        $users = DB::table('users')
            ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
            ->select('users.*', 'employees.*')
            ->get();

        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $departments = DB::table('departments')->get();
        $projects = DB::table('budgets')->get();

        return view('form.allemployeecard', compact('users', 'userList', 'permission_lists', 'departments', 'projects'));
    }

    public function listAllEmployee()
    {
        $users = DB::table('users')
            ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
            ->select('users.*', 'employees.*')
            ->get();

        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $departments = DB::table('departments')->get();
        $projects = DB::table('budgets')->get();

        return view('form.employeelist', compact('users', 'userList', 'permission_lists', 'departments', 'projects'));
    }
    public function saveRecord(Request $request)
    {

        // Validate inputs (optional but recommended)
        $request->validate([
            'name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|email',
            'birthDate' => 'required|date',
            'nid' => 'required|string|max:255',
            'blood_group' => 'nullable|string|max:10',
            'phone_number' => 'required|string|max:20',
            'second_number' => 'required|string|max:20',
            'account_number' => 'required|string|max:50',
            'position' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'employee_id' => 'required|string|max:50',
            'department' => 'required|integer',
            'project' => 'required|string|max:255',
            'work_station' => 'required|string|max:255',
            'gross_salary' => 'required|numeric',
            'current_address' => 'required|string',
            'permanent_address' => 'required|string',
            'profile' => 'nullable|file|max:5120',
            'nid_attachment' => 'nullable|file|max:5120',
            'document' => 'nullable|file|max:10240',
            'cv_attachment' => 'nullable|file|max:10240',

            
        ]);

        // Clean and format salary
        $grossSalary = (float) $request->gross_salary;

        // Tax calculation
        if ($grossSalary <= 5000) {
            $tax = 0;
        } elseif ($grossSalary <= 12500) {
            $tax = (($grossSalary * 2) / 100) - 100;
        } elseif ($grossSalary <= 100000) {
            $tax = 150 + 0.10 * ($grossSalary - 12500);
        } else {
            $tax = 8900 + 0.20 * ($grossSalary - 100000);
        }

        $netSalary = $grossSalary - $tax;

        DB::beginTransaction();
        try {
            $existingEmployee = Employee::where('email', $request->email)->first();
            $user = User::where('email', $request->email)->first();


            if (!$existingEmployee) {
                $employee = new Employee;
                $employee->name = $request->name;
                $employee->fname = $request->fname;
                $employee->email = $request->email;
                $employee->birth_date = $request->birthDate;
                $employee->nid = $request->nid;
                $employee->blood_group = $request->blood_group;
                $employee->phone = $request->phone_number;
                $employee->second_phone = $request->second_number;
                $employee->account_number = $request->account_number;
                $employee->position = $request->position;
                $employee->gender = $request->gender;
                $employee->employee_id = $request->employee_id;
                $employee->department_id = $request->department;
                $employee->project = $request->project;
                $employee->work_station = $request->work_station;
                $employee->gross_salary = $grossSalary;
                $employee->tax = $tax;
                $employee->net_salary = $netSalary;
                $employee->account_status = 'Active';
                $employee->current_address = $request->current_address;
                $employee->permanent_address = $request->permanent_address;

                // Upload Profile Image
                if ($request->hasFile('profile')) {
                    $profileName = uniqid() . '_profile.' . $request->file('profile')->extension();
                    $request->file('profile')->move(public_path('assets/images'), $profileName);
                    $employee->profile = $profileName;
                }

                // Upload NID Attachment
                if ($request->hasFile('nid_attachment')) {
                    $nidName = uniqid() . '_nid.' . $request->file('nid_attachment')->extension();
                    $request->file('nid_attachment')->move(public_path('assets/nid'), $nidName);
                    $employee->nid_attachment = $nidName;
                }

                // Upload Document Attachment
                if ($request->hasFile('document')) {
                    $docName = uniqid() . '_doc.' . $request->file('document')->extension();
                    $request->file('document')->move(public_path('assets/document'), $docName);
                    $employee->documents_attachments = $docName;
                }


                // Upload Document Attachment
                if ($request->hasFile('cv')) {
                    $docName = uniqid() . '_cv.' . $request->file('cv')->extension();
                    $request->file('cv')->move(public_path('assets/cv'), $docName);
                    $employee->cv_attachment = $docName;
                }

                $employee->save();

                // Update User Table if exists
                if ($user) {
                    User::where('id', $user->id)->update([
                        'rec_id' => $request->employee_id,
                        'avatar' => $employee->profile ?? null,
                    ]);
                }

                DB::commit();
                Toastr::success('Added new employee successfully :)', 'Success');
                return redirect()->route('all/employee/card');
            } else {
                DB::rollback();
                Toastr::error('Employee already exists with this email :)', 'Error');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Add new employee failed: ');
            return redirect()->back()->withInput();
        }
    }


    public function viewRecord($employee_id)
    {
        $employees2 = DB::table('employees')
            ->join('users', 'employees.employee_id', '=', 'users.rec_id')
            ->where('employees.employee_id', '=', $employee_id)
            ->select('employees.*')
            ->get();

        $departments = DB::table('departments')->get();
        return view('form.edit.editemployee', compact('employees2', 'departments'));
    }

    public function viewsetting($employee_id)
    {
        $employees = DB::table('employees')
            ->join('users', 'employees.employee_id', '=', 'users.rec_id')
            ->select('employees.*')
            ->where('employees.employee_id', '=', $employee_id)
            ->get();

        return view('form.edit.setting', compact('employees'));
    }

    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateEmployee = [
                'id' => $request->id,
                'name' => $request->name,
                'fname' => $request->fname,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'nid' => $request->nid,
                'blood_group' => $request->blood_group,
                'phone' => $request->phone,
                'account_number' => $request->account_number,
                'position' => $request->position,
                'gender' => $request->gender,
                'employee_id' => $request->employee_id,
                'department_id' => $request->department_id,
                'project' => $request->project,
                'work_station' => $request->work_station,
                'gross_salary' => $request->gross_salary,
                'tax' => $request->tax,
                'net_salary' => $request->net_salary,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
            ];

            $updateUser = [
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
            ];

            User::where('id', $request->id)->update($updateUser);
            Employee::where('id', $request->id)->update($updateEmployee);

            DB::commit();
            Toastr::success('Updated record successfully :)', 'Success');
            return redirect()->route('all/employee/card');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Update failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function updateSetting($employee_id)
    {
        dd($employee_id);
    }

    public function deleteRecord($employee_id)
    {
        DB::beginTransaction();
        try {
            Employee::where('employee_id', $employee_id)->delete();
            DB::commit();
            Toastr::success('Deleted successfully :)', 'Success');
            return redirect()->route('all/employee/card');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Delete failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function employeesearch(Request $request)
    {
        $query = DB::table('users')
            ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
            ->select('users.*', 'employees.birth_date', 'employees.gender');

        if ($request->employee_id) {
            $query->where('employee_id', 'LIKE', '%' . $request->employee_id . '%');
        }

        if ($request->name) {
            $query->where('users.name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->position) {
            $query->where('users.position', 'LIKE', '%' . $request->position . '%');
        }

        $users = $query->get();
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $departments = DB::table('departments')->get();
        $projects = DB::table('budgets')->get();

        return view('form.allemployeecard', compact('users', 'userList', 'permission_lists', 'departments', 'projects'));
    }

    public function employeeListSearch(Request $request)
    {
        $query = DB::table('users')
            ->join('employees', 'users.rec_id', '=', 'employees.employee_id')
            ->select('users.*', 'employees.birth_date', 'employees.gender');

        if ($request->employee_id) {
            $query->where('employee_id', 'LIKE', '%' . $request->employee_id . '%');
        }

        if ($request->name) {
            $query->where('users.name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->position) {
            $query->where('users.position', 'LIKE', '%' . $request->position . '%');
        }

        $users = $query->get();
        $userList = DB::table('users')->get();
        $permission_lists = DB::table('permission_lists')->get();
        $departments = DB::table('departments')->get();
        $projects = DB::table('budgets')->get();
        return view('form.employeelist', compact('users', 'userList', 'permission_lists', 'departments', 'projects'));

    }

    public function profileEmployee($employee_id)
    {
        $user = DB::table('employees')
            ->where('employees.employee_id', '=', $employee_id)
            ->select('employees.*')
            ->get();

        return view('form.employeeprofile', compact('user'));
    }
}
