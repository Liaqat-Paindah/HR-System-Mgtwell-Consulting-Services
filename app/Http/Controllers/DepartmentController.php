<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\department;
use Brian2694\Toastr\Facades\Toastr;


use DB;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function index()
    {
    $departments=department::get();
    return view('department.departmentlist', compact('departments'));
    }


    public function store(Request $request)
    {
            $user = new department;
            $user->department=$request->name;
            $user->save();
            return back()->with('success', 'Create new department successfully :)');
            Toastr::success('Create new department successfully :)','Success');
    }

    public function update($id)
    {
        $department=department::find($id);
        return view('department.departmentedit', compact('department'));
    }

    public function updateRecord(Request $request)
    {

            // update table Employee
            $updateDepartment = [
                'id'=>$request->id,
                'department'=>$request->name,
            ];
            department::where('id',$request->id)->update($updateDepartment);
            return redirect('departmentlist');

    }
    public function deleteRecord($id)
    {
        DB::beginTransaction();
        try{

            department::where('id',$id)->delete();

            DB::commit();
            Toastr::success('Delete record successfully :)','Success');
            return redirect()->route('departmentedelete');

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Delete record fail :)','Error');
            return redirect()->back();
        }

    }

    public function details($id)
    {

        $departments = DB::table('employees')->where('employees.department_id','=',$id)->select('employees.*')->get();
        $total = DB::table('departments')->where('departments.id','=',$id)->select('departments.department')->distinct('department')->get();
        $departmentValue = $total->isNotEmpty() ? $total->first()->department : null;

        return view('department.departmentdetails', compact('departments', 'departmentValue'));

    }
}
