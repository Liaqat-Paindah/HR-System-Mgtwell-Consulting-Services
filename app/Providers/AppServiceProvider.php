<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $expensesCount = DB::table('expenses')
                ->join('users', 'expenses.rec_id', '=', 'users.rec_id')
                ->join('employees', 'expenses.rec_id', '=', 'employees.employee_id')
                ->where('expenses.status', '=', 'purchased')
                ->count();

                if(Auth::check())
                {
                $recId = Auth::user()->rec_id;
                $leaves = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.rec_id', '=', $recId)
                    ->where('leaves_admins.status', '=', 'Confirmed')
                    ->where('leaves_admins.leave_type', '=', 'Daily')
                    ->count();

                    $requested = DB::table('leaves_admins')
                    ->join('employees', 'employees.employee_id', '=', 'leaves_admins.rec_id')
                    ->where('leaves_admins.rec_id', '=', $recId)
                    ->where('leaves_admins.status', '=', 'Requested')
                    ->where('leaves_admins.leave_type', '=', 'Daily')
                    ->count();


                    $attendance= DB::table('Attendances')
                    ->join('employees', 'employees.id', '=', 'Attendances.employee_id') // Join on matching id
                    ->join('users', 'users.rec_id', '=', 'employees.employee_id') // Join employees with users
                    ->where('users.id', Auth::user()->id) // Filter by the authenticated user's id
                    ->select('Attendances.*', 'employees.*')
                    ->distinct('date') // Select columns from both tables
                    ->count(); // Execute the query and get the results

                    $expensesstaff = DB::table('expenses')
                    ->join('employees', 'expenses.rec_id', '=', 'employees.employee_id')
                    ->where('expenses.status', '=', 'Pending')
                    ->where('expenses.rec_id','=', $recId)
                    ->count();


                    $Purchased = DB::table('expenses')
                    ->join('employees', 'expenses.rec_id', '=', 'employees.employee_id')
                    ->where('expenses.status', '=', 'Purchased')
                    ->where('expenses.rec_id','=', $recId)
                    ->count();

                    $employees = DB::table('employees')
                    ->join('users', 'employees.employee_id', '=', 'users.rec_id')
                    ->select('employees.*')
                    ->where('employees.employee_id','=',$recId)
                    ->get();

                    $userscount = DB::table('employees')->where('employees.employee_id','=',$recId)->select('employees.*')->get();


                // Debugging: Check the count of leaves

                }
                else
                {
                    return Redirect::to('/login'); // or use '/register' depending on your requirement
                }
                $view->with('employees', $employees);
                $view->with('expensesstaff', $expensesstaff);
                $view->with('userscount', $userscount);
                $view->with('Purchased', $Purchased);
                $view->with('attendance', $attendance);
                $view->with('leaves', $leaves);
                $view->with('requested', $requested);
                $view->with('expensesCount', $expensesCount);
        });
    }
}
