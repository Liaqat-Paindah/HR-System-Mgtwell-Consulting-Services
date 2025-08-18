<?php $__env->startSection('content'); ?>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('home')); ?>">Admin Dashboard</a></li>
                            <li><a href="<?php echo e(route('em/dashboard')); ?>">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    <?php if(Auth::user()->role_name=='Admin'): ?>
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#" class="noti-dot">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="<?php echo e(route('userManagement')); ?>">All User</a></li>
                                <li><a class="active" href="<?php echo e(route('activity/log')); ?>">Activity Log</a></li>
                                <li><a href="<?php echo e(route('activity/login/logout')); ?>">Activity User</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span> Employees</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('all/employee/card')); ?>">All Employees</a></li>
                            <li><a href="<?php echo e(route('form/holidays/new')); ?>">Holidays</a></li>
                            <li><a href="<?php echo e(route('form/leaves/new')); ?>">Leaves (Admin) 
                                <span class="badge badge-pill bg-primary float-right">1</span></a>
                            </li>
                            <li><a href="<?php echo e(route('form/leavesemployee/new')); ?>">Leaves (Employee)</a></li>
                            <li><a href="<?php echo e(route('form/leavesettings/page')); ?>">Leave Settings</a></li>
                            <li><a href="<?php echo e(route('attendance/page')); ?>">Attendance (Admin)</a></li>
                            <li><a href="<?php echo e(route('attendance/employee/page')); ?>">Attendance (Employee)</a></li>
                            <li><a href="departments.html">Departments</a></li>
                            <li><a href="designations.html">Designations</a></li>
                            <li><a href="timesheet.html">Timesheet</a></li>
                            <li><a href="shift-scheduling.html">Shift & Schedule</a></li>
                            <li><a href="overtime.html">Overtime</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>HR</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-files-o"></i>
                            <span> Sales </span> 
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="estimates.html">Estimates</a></li>
                            <li><a href="<?php echo e(route('form/invoice/view/page')); ?>">Invoices</a></li>
                            <li><a href="payments.html">Payments</a></li>
                            <li><a href="expenses.html">Expenses</a></li>
                            <li><a href="provident-fund.html">Provident Fund</a></li>
                            <li><a href="taxes.html">Taxes</a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-money"></i>
                        <span> Payroll </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('form/salary/page')); ?>"> Employee Salary </a></li>
                            <li><a href="<?php echo e(url('form/salary/view')); ?>"> Payslip </a></li>
                            <li><a href="<?php echo e(route('form/payroll/items')); ?>"> Payroll Items </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-pie-chart"></i>
                        <span> Reports </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('form/expense/reports/page')); ?>"> Expense Report </a></li>
                            <li><a href="<?php echo e(route('form/invoice/reports/page')); ?>"> Invoice Report </a></li>
                            <li><a href="payments-reports.html"> Payments Report </a></li>
                            <li><a href="employee-reports.html"> Employee Report </a></li>
                            <li><a href="payslip-reports.html"> Payslip Report </a></li>
                            <li><a href="attendance-reports.html"> Attendance Report </a></li>
                            <li><a href="<?php echo e(route('form/leave/reports/page')); ?>"> Leave Report </a></li>
                            <li><a href="<?php echo e(route('form/daily/reports/page')); ?>"> Daily Report </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Performance</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-graduation-cap"></i>
                        <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('form/performance/indicator/page')); ?>"> Performance Indicator </a></li>
                            <li><a href="<?php echo e(route('form/performance/page')); ?>"> Performance Review </a></li>
                            <li><a href="<?php echo e(route('form/performance/appraisal/page')); ?>"> Performance Appraisal </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-edit"></i>
                        <span> Training </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="<?php echo e(route('form/training/list/page')); ?>"> Training List </a></li>
                            <li><a href="<?php echo e(route('form/trainers/list/page')); ?>"> Trainers</a></li>
                            <li><a href="<?php echo e(route('form/training/type/list/page')); ?>"> Training Type </a></li>
                        </ul>
                    </li>
                    <li> <a href="assets.html"><i class="la la-object-ungroup">
                        </i> <span>Assets</span></a>
                    </li>
                    <li class="submenu"> <a href="#"><i class="la la-briefcase"></i>
                        <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="user-dashboard.html"> User Dasboard </a></li>
                            <li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
                            <li><a href="jobs.html"> Manage Jobs </a></li>
                            <li><a href="manage-resumes.html"> Manage Resumes </a></li>
                            <li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
                            <li><a href="interview-questions.html"> Interview Questions </a></li>
                            <li><a href="offer_approvals.html"> Offer Approvals </a></li>
                            <li><a href="experiance-level.html"> Experience Level </a></li>
                            <li><a href="candidates.html"> Candidates List </a></li>
                            <li><a href="schedule-timing.html"> Schedule timing </a></li>
                            <li><a href="apptitude-result.html"> Aptitude Results </a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">User Activity Log</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Activity Log</li>
                        </ul>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- /Search Filter -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Role Name</th>
                                    <th>Modify</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $activityLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$key); ?></td>
                                        <td><?php echo e($item->user_name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->phone_number); ?></td>
                                        <td><?php echo e($item->status); ?></td>
                                        <td><?php echo e($item->role_name); ?></td>
                                        <td><?php echo e($item->modify_user); ?></td>
                                        <td><?php echo e($item->date_time); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HR\resources\views/usermanagement/user_activity_log.blade.php ENDPATH**/ ?>