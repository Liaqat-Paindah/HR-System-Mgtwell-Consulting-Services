<?php

namespace App\Http\Controllers;

use App\Models\LeavesAdmin;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PDF;
use App\Models\User;
use App\Models\Employee;
use App\Models\expense;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        return view('dashboard.dashboard');
    }


    // employee dashboard
    public function emDashboard()
    {
        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        return view('dashboard.emdashboard', compact('todayDate'));
    }

    public function total()
    {
        $employees6 = Employee::count();
        $projects = Employee::distinct('project')->count();
        $salaries = Employee::get();
        $data = [];

        foreach ($salaries as $salary) {
            $month = Carbon::parse($salary->year)->format('Y-m');
            if (!isset($data[$month])) {
                $data[$month] = ['total' => 0, 'staff_count' => 0];
            }
            $data[$month]['total'] += $salary->net_salary;
            $data[$month]['staff_count']++;
        }

        $months = array_keys($data);
        $totalSalaries = array_column($data, 'total');
        $staffCounts = array_column($data, 'staff_count');
        $active_employees = Employee::where('account_status', 'active')->count();
        $inactive_employees = Employee::where('account_status', 'inactive')->count();
        $total_employees = $active_employees + $inactive_employees;

        // Avoid division by zero
        if ($total_employees > 0) {
            $active_percentage = ($active_employees / $total_employees) * 100;
            $inactive_percentage = ($inactive_employees / $total_employees) * 100;
        } else {
            $active_percentage = 0;
            $inactive_percentage = 0;
        }
        $AVG = LeavesAdmin::where('status', 'approved')->where('leave_type', 'daily')->avg('total');
        $total_leaves = LeavesAdmin::where('status', 'approved')->where('leave_type', 'daily')->sum('total');
        $pendding_leaves = LeavesAdmin::where('status', 'Pending')->where('leave_type', 'daily')->sum('total');
        $recentLeaves = LeavesAdmin::with('employee') // only selected columns from employee
            ->where('status', 'requested')
            ->latest('created_at')
            ->take(5)
            ->get();

        $leave_progress = LeavesAdmin::with('employee')
            ->selectRaw('rec_id, SUM(total) as total_days')
            ->where('status', 'approved')
            ->where('leave_type', 'daily')
            ->groupBy('rec_id')
            ->orderBy('total_days','desc')
            ->get();

        // Optional: round to 2 decimal places
        $active_percentage = round($active_percentage, 2);
        $inactive_percentage = round($inactive_percentage, 2);
        return view('dashboard.dashboard', compact('employees6', 'projects', 'months', 'totalSalaries', 'staffCounts', 'active_employees', 'inactive_employees', 'active_percentage', 'inactive_percentage', 'AVG', 'total_leaves', 'pendding_leaves', 'recentLeaves', 'leave_progress'));
    }

    public function generatePDF(Request $request)
    {
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        // $pdf = PDF::loadView('payroll.salaryview', $data);
        // return $pdf->download('text.pdf');
        // selecting PDF view
        $pdf = PDF::loadView('payroll.salaryview');
        // download pdf file
        return $pdf->download('pdfview.pdf');
    }


}
