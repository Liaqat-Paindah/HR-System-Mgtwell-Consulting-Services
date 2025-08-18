<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PerformanceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'total'])->name('home');


// -----------------------------settings----------------------------------------//


// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('restrict.ip')->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::post('profile/information/save', [App\Http\Controllers\UserManagementController::class, 'profileInformation'])->name('profile/information/save');



// ------------------------------ register ---------------------------------//
Route::middleware(['restrict.ip'])->group(function () {

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'SaveUser'])->name('register');

});


Route::group(['middleware' => ['auth', 'role_name:Admin']], function () {
    // ------------------------------ Employees ---------------------------------//
    // ----------------------------- user userManagement -----------------------//
    Route::get('profile_user/{rec_id}', [App\Http\Controllers\UserManagementController::class, 'profile'])->middleware('auth')->name('profile_user');
    Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
    Route::post('form/user/confirm', [App\Http\Controllers\UserManagementController::class, 'UserAdmin'])->middleware('auth')->name('form/user/confirm');
    Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
    Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');
    Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
    Route::post('user/delete', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth')->name('user/delete');
    Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
    Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

    // ----------------------------- search user management ------------------------------//
    Route::post('search/user/list', [App\Http\Controllers\UserManagementController::class, 'searchUser'])->name('search/user/list');
    // ----------------------------- job ------------------------------//
    Route::get('form/job/list', [App\Http\Controllers\JobController::class, 'jobList'])->name('form/job/list');
    Route::get('form/job/view', [App\Http\Controllers\JobController::class, 'jobView'])->name('form/job/view');

    // ----------------------------- form change password ------------------------------//
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- job ------------------------------//
Route::get('form/job/list', [App\Http\Controllers\JobController::class, 'jobList'])->name('form/job/list');
Route::get('form/job/view', [App\Http\Controllers\JobController::class, 'jobView'])->name('form/job/view');


// ----------------------------- department ------------------------------//
Route::get('departmentlist', [App\Http\Controllers\DepartmentController::class, 'index'])->middleware('auth')->name('departmentlist');
Route::get('departmentdetails/{id}', [App\Http\Controllers\DepartmentController::class, 'details'])->middleware('auth');
Route::post('departmentlist', [App\Http\Controllers\DepartmentController::class, 'store'])->middleware('auth')->name('departmentlist');
Route::get('departmentedit/{id}', [App\Http\Controllers\DepartmentController::class, 'update'])->middleware('auth')->name('departmentedit');
Route::post('departmentedit/{id}', [App\Http\Controllers\DepartmentController::class, 'updateRecord'])->middleware('auth')->name('departmentedit');
Route::get('departmentedelete/{id}', [App\Http\Controllers\DepartmentController::class, 'deleteRecord'])->middleware('auth')->name('departmentedelete');


// ----------------------------- form employee ------------------------------//

Route::get('all/employee/card', [App\Http\Controllers\EmployeeController::class, 'cardAllEmployee'])->middleware('auth')->name('all/employee/card');
Route::get('all/employee/setting/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewsetting'])->middleware('auth');
Route::get('all/employee/view/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
Route::post('all/employee/setting/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'updateSetting'])->middleware('auth')->name('all/employee/setting');
Route::post('all/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateRecord'])->middleware('auth')->name('all/employee/update');
Route::get('all/employee/delete/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');
Route::post('all/employee/search', [App\Http\Controllers\EmployeeController::class, 'employeeSearch'])->name('all/employee/search');

// ----------------------------- profile employee ------------------------------//


// ----------------------------- form holiday

Route::get('form/holidays/new', [App\Http\Controllers\HolidayController::class, 'holiday'])->middleware('auth')->name('form/holidays/new');
Route::post('form/holidays/save', [App\Http\Controllers\HolidayController::class, 'saveRecord'])->middleware('auth')->name('form/holidays/save');
Route::post('form/holidays/update', [App\Http\Controllers\HolidayController::class, 'updateRecord'])->middleware('auth')->name('form/holidays/update');

// ----------------------------- form leaves ------------------------------//



// ----------------------------- form attendance  ------------------------------//
Route::get('form/leavesettings/page', [App\Http\Controllers\LeavesController::class, 'leaveSettings'])->middleware('auth')->name('form/leavesettings/page');

Route::get('form/shiftscheduling/page', [App\Http\Controllers\LeavesController::class, 'shiftScheduLing'])->middleware('auth')->name('form/shiftscheduling/page');
Route::get('form/shiftlist/page', [App\Http\Controllers\LeavesController::class, 'shiftList'])->middleware('auth')->name('form/shiftlist/page');

// ----------------------------- form payroll  ------------------------------//
Route::get('all/salary/export/{rec_id}', [App\Http\Controllers\PayrollController::class, 'salaryExport'])->middleware('auth')->name('all/salary/export');
Route::get('form/salary/save', [App\Http\Controllers\PayrollController::class, 'saveRecord'])->middleware('auth')->name('form/salary/save');
Route::get('salary_payment/{id}', [App\Http\Controllers\PayrollController::class, 'update'])->middleware('auth')->name('salary_payment');
Route::post('salary_payment/{id}', [App\Http\Controllers\PayrollController::class, 'updateRecord'])->middleware('auth')->name('salary_payment');




Route::post('form/salary/delete', [App\Http\Controllers\PayrollController::class, 'deleteRecord'])->middleware('auth')->name('form/salary/delete');





Route::get('form/payroll/items', [App\Http\Controllers\PayrollController::class, 'payrollItems'])->middleware('auth')->name('form/payroll/items');
Route::get('salary/edit_payslip/{rec_id}', [App\Http\Controllers\PayrollController::class, 'payroll_edit'])->middleware('auth')->name('salary/edit_payslip');

// ----------------------------- reports  ------------------------------//




// ----------------------------- performance  ------------------------------//
Route::get('form/performance/indicator/page', [App\Http\Controllers\PerformanceController::class, 'index'])->middleware('auth')->name('form/performance/indicator/page');
Route::get('form/performance/page', [App\Http\Controllers\PerformanceController::class, 'performance'])->middleware('auth')->name('form/performance/page');
Route::get('form/performance/appraisal/page', [App\Http\Controllers\PerformanceController::class, 'performanceAppraisal'])->middleware('auth')->name('form/performance/appraisal/page');
Route::post('form/performance/indicator/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordIndicator'])->middleware('auth')->name('form/performance/indicator/save');
Route::post('form/performance/indicator/delete', [App\Http\Controllers\PerformanceController::class, 'deleteIndicator'])->middleware('auth')->name('form/performance/indicator/delete');
Route::post('form/performance/indicator/update', [App\Http\Controllers\PerformanceController::class, 'updateIndicator'])->middleware('auth')->name('form/performance/indicator/update');

Route::post('form/performance/appraisal/save', [App\Http\Controllers\PerformanceController::class, 'saveRecordAppraisal'])->middleware('auth')->name('form/performance/appraisal/save');
Route::post('form/performance/appraisal/update', [App\Http\Controllers\PerformanceController::class, 'updateAppraisal'])->middleware('auth')->name('form/performance/appraisal/update');
Route::post('form/performance/appraisal/delete', [App\Http\Controllers\PerformanceController::class, 'deleteAppraisal'])->middleware('auth')->name('form/performance/appraisal/delete');

// ----------------------------- training  ------------------------------//
Route::get('form/training/list/page', [App\Http\Controllers\TrainingController::class, 'index'])->middleware('auth')->name('form/training/list/page');
Route::post('form/training/save', [App\Http\Controllers\TrainingController::class, 'addNewTraining'])->middleware('auth')->name('form/training/save');
Route::post('form/training/delete', [App\Http\Controllers\TrainingController::class, 'deleteTraining'])->middleware('auth')->name('form/training/delete');
Route::post('form/training/update', [App\Http\Controllers\TrainingController::class, 'updateTraining'])->middleware('auth')->name('form/training/update');

// ----------------------------- trainers  ------------------------------//
Route::get('form/trainers/list/page', [App\Http\Controllers\TrainersController::class, 'index'])->middleware('auth')->name('form/trainers/list/page');
Route::post('form/trainers/save', [App\Http\Controllers\TrainersController::class, 'saveRecord'])->middleware('auth')->name('form/trainers/save');
Route::post('form/trainers/update', [App\Http\Controllers\TrainersController::class, 'updateRecord'])->middleware('auth')->name('form/trainers/update');
Route::post('form/trainers/delete', [App\Http\Controllers\TrainersController::class, 'deleteRecord'])->middleware('auth')->name('form/trainers/delete');

// ----------------------------- training type  ------------------------------//
Route::get('form/training/type/list/page', [App\Http\Controllers\TrainingTypeController::class, 'index'])->middleware('auth')->name('form/training/type/list/page');
Route::post('form/training/type/save', [App\Http\Controllers\TrainingTypeController::class, 'saveRecord'])->middleware('auth')->name('form/training/type/save');
Route::post('form//training/type/update', [App\Http\Controllers\TrainingTypeController::class, 'updateRecord'])->middleware('auth')->name('form//training/type/update');
Route::post('form//training/type/delete', [App\Http\Controllers\TrainingTypeController::class, 'deleteTrainingType'])->middleware('auth')->name('form//training/type/delete');


});

    Route::group(['middleware' => ['auth', 'role_name:Admin,Finance,Manager,Line-Manager,Employee']], function () {

    // ------------------------------ Employees ---------------------------------//
    Route::get('/employee_pdf/{employee_id}',  [App\Http\Controllers\PdfController::class, 'generatePdf'])->middleware('auth');


    Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
    Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');
    Route::post('attendance/employee/page', [App\Http\Controllers\LeavesController::class, 'AttendanceEmployees'])->middleware('auth')->name('attendance/employee/page');
    Route::post('form/leaves/edit/delete', [App\Http\Controllers\LeavesController::class, 'deleteLeave'])->middleware('auth')->name('form/leaves/edit/delete');
    Route::get('attendance/employee/page', [App\Http\Controllers\LeavesController::class, 'AttendanceEmployee'])->middleware('auth')->name('attendance/employee/page');
    Route::post('form/leavesemployee/edit/delete', [App\Http\Controllers\LeavesController::class, 'deleteLeaveemployee'])->middleware('auth')->name('form/leavesemployee/edit/delete');
    Route::get('form/leavesemployee', [App\Http\Controllers\LeavesController::class, 'ShowRecord'])->middleware('auth')->name('form/leavesemployee/new');
    Route::post('form/leaves/save', [App\Http\Controllers\LeavesController::class, 'saveRecord'])->middleware('auth')->name('form/leaves/save');
    Route::post('form/leaves/edit', [App\Http\Controllers\LeavesController::class, 'editRecordLeave'])->middleware('auth')->name('form/leaves/edit');
    Route::post('form/leavesemployee/edit', [App\Http\Controllers\LeavesController::class, 'editRecordleavesemployee'])->middleware('auth')->name('form/leavesemployee/edit');


});

    Route::group(['middleware' => ['auth', 'role_name:Admin,Manager']], function () {
    Route::post('all/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateRecord'])->middleware('auth')->name('all/employee/update');
    Route::get('all/employee/view/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
    Route::get('all/employee/delete/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');
    Route::post('form/leavesadmin/edit/delete', [App\Http\Controllers\LeavesController::class, 'deleteLeaveAdmin'])->middleware('auth')->name('form/leavesadmin/edit/delete');
    Route::get('all/employee/list', [App\Http\Controllers\EmployeeController::class, 'listAllEmployee'])->middleware('auth')->name('all/employee/list');
    Route::post('all/employee/list/search', [App\Http\Controllers\EmployeeController::class, 'employeeListSearch'])->name('all/employee/list/search');
    Route::get('all/employee/export', [App\Http\Controllers\EmployeeController::class, 'export'])->middleware('auth')->name('all/employee/export');
    Route::get('employee/profile/{rec_id}', [App\Http\Controllers\EmployeeController::class, 'profileEmployee'])->middleware('auth');
    Route::get('employee/attendance_details/{employee_id}', [App\Http\Controllers\LeavesController::class, 'Attendance_Details'])->middleware('auth');
    Route::get('attendance_pdf/{rec_id}', [App\Http\Controllers\PdfController::class, 'Attendance_PDF'])->middleware('auth');
    Route::get('attendance_export', [App\Http\Controllers\LeavesController::class, 'export'])->middleware('auth')->name('attendance_export');
    Route::post('all/employee/save', [App\Http\Controllers\EmployeeController::class, 'saveRecord'])->middleware('auth')->name('all/employee/save');
    Route::get('attendance/page', [App\Http\Controllers\LeavesController::class, 'attendanceIndex'])->middleware('auth')->name('attendance/page');
    Route::get('attendance/list', [App\Http\Controllers\LeavesController::class, 'attendanceList'])->middleware('auth')->name('attendance/list');
    Route::get('form/leaves/new_admin', [App\Http\Controllers\LeavesController::class, 'leaves_admin'])->middleware('auth')->name('form/leaves/new_admin');
    Route::get('form/leaves/new', [App\Http\Controllers\LeavesController::class, 'leaves'])->middleware('auth')->name('form/leaves/new');
    Route::get('form/leaves/report', [App\Http\Controllers\LeavesController::class, 'leaveReport'])->middleware('auth')->name('form/leaves/report');
    Route::get('leave/report_annuals/{employee_id}', [App\Http\Controllers\LeavesController::class, 'leaveAnnual'])->middleware('auth');
    Route::get('leave/report_details/{employee_id}', [App\Http\Controllers\LeavesController::class, 'leaveDetails'])->middleware('auth');

    Route::post('leave/approve', [App\Http\Controllers\LeavesController::class, 'approve'])->middleware('auth')->name('leave.approve');
    Route::get('attendancelist/delete/{employee_id}', [App\Http\Controllers\LeavesController::class, 'deleteRecord'])->middleware('auth');
    Route::get('attendance_details/delete/{rec_id}/{date}', [App\Http\Controllers\LeavesController::class, 'deletedetails'])->middleware('auth');


});


Route::group(['middleware' => ['auth', 'role_name:Admin,Line-Manager']], function () {
    Route::post('all/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateRecord'])->middleware('auth')->name('all/employee/update');
    Route::get('all/employee/view/edit/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'viewRecord'])->middleware('auth');
    Route::get('all/employee/delete/{employee_id}', [App\Http\Controllers\EmployeeController::class, 'deleteRecord'])->middleware('auth');
    Route::get('all/employee/list', [App\Http\Controllers\EmployeeController::class, 'listAllEmployee'])->middleware('auth')->name('all/employee/list');
    Route::post('all/employee/list/search', [App\Http\Controllers\EmployeeController::class, 'employeeListSearch'])->name('all/employee/list/search');
    Route::get('all/employee/export', [App\Http\Controllers\EmployeeController::class, 'export'])->middleware('auth')->name('all/employee/export');
    Route::get('employee/profile/{rec_id}', [App\Http\Controllers\EmployeeController::class, 'profileEmployee'])->middleware('auth');
    Route::get('employee/attendance_details/{employee_id}', [App\Http\Controllers\LeavesController::class, 'Attendance_Details'])->middleware('auth');
    Route::get('attendance_pdf/{rec_id}', [App\Http\Controllers\PdfController::class, 'Attendance_PDF'])->middleware('auth');
    Route::get('attendance_export', [App\Http\Controllers\LeavesController::class, 'export'])->middleware('auth')->name('attendance_export');
    Route::post('all/employee/save', [App\Http\Controllers\EmployeeController::class, 'saveRecord'])->middleware('auth')->name('all/employee/save');
    Route::get('attendance/page', [App\Http\Controllers\LeavesController::class, 'attendanceIndex'])->middleware('auth')->name('attendance/page');
    Route::get('attendance/list', [App\Http\Controllers\LeavesController::class, 'attendanceList'])->middleware('auth')->name('attendance/list');
    Route::get('form/leaves/new_line', [App\Http\Controllers\LeavesController::class, 'leaves_line'])->middleware('auth')->name('form/leaves/new_line');
    Route::get('form/leaves/new', [App\Http\Controllers\LeavesController::class, 'leaves'])->middleware('auth')->name('form/leaves/new');
    Route::get('form/leaves/report', [App\Http\Controllers\LeavesController::class, 'leaveReport'])->middleware('auth')->name('form/leaves/report');
    Route::get('leave/report_annuals/{employee_id}', [App\Http\Controllers\LeavesController::class, 'leaveAnnual'])->middleware('auth');
    Route::get('leave/report_details/{employee_id}', [App\Http\Controllers\LeavesController::class, 'leaveDetails'])->middleware('auth');

    Route::get('attendancelist/delete/{employee_id}', [App\Http\Controllers\LeavesController::class, 'deleteRecord'])->middleware('auth');
    Route::get('attendance_details/delete/{rec_id}/{date}', [App\Http\Controllers\LeavesController::class, 'deletedetails'])->middleware('auth');


});


    Route::group(['middleware' => ['auth', 'role_name:Admin,Finance']], function () {



    Route::get('all/payments/delete/{rec_id}', [App\Http\Controllers\PayrollController::class, 'deletePayment'])->middleware('auth');
    Route::get('all/budget/delete/{id}', [App\Http\Controllers\PayrollController::class, 'deleteBudget'])->middleware('auth');
    Route::get('form/salary/page', [App\Http\Controllers\PayrollController::class, 'salary'])->middleware('auth')->name('form/salary/page');
    Route::get('form/salary/view/{rec_id}', [App\Http\Controllers\PayrollController::class, 'salaryView'])->middleware('auth');
    Route::get('payment/salary/view/{rec_id}', [App\Http\Controllers\PayrollController::class, 'PaymentView'])->middleware('auth');
    Route::get('form/salary/paid/{rec_id}', [App\Http\Controllers\PayrollController::class, 'salarypaid'])->middleware('auth');
    Route::get('form/salary/payments', [App\Http\Controllers\PayrollController::class, 'payments'])->middleware('auth')->name('form/salary/payments');
    Route::get('/payslip_pdf/{rec_id}',  [App\Http\Controllers\PdfController::class, 'payslip'])->middleware('auth');
    Route::get('/payment_pdf/{rec_id}',  [App\Http\Controllers\PdfController::class, 'paymentSlip'])->middleware('auth');
    Route::get('form/salary/budgets', [App\Http\Controllers\PayrollController::class, 'budgets'])->middleware('auth')->name('form/salary/budgets');
    Route::post('form/salary/budgets_new', [App\Http\Controllers\PayrollController::class, 'budgets_new'])->middleware('auth')->name('form/salary/budgets_new');
    Route::post('form/salary/edit', [App\Http\Controllers\PayrollController::class, 'budgetsEdit'])->middleware('auth')->name('form/salary/budgets_new');
    Route::post('payment/employee/save', [App\Http\Controllers\PayrollController::class, 'MenualPayment'])->middleware('auth')->name('payment/employee/save');

    });

    Route::group(['middleware' => ['auth', 'role_name:Admin,Finance,Procurement']], function () {
    });


















