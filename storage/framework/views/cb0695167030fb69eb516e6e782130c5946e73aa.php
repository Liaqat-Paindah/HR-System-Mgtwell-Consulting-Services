<?php $__env->startSection('content'); ?>

<?php echo Toastr::message(); ?>

<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid" id="app">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Payslip</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('form/salary/page')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payslip</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="btn-group btn-group-sm">
                        <?php
                        $thresholdDate = \Carbon\Carbon::now()->startOfMonth()->addDays(0);
                        $canPay = \Carbon\Carbon::now()->greaterThan($thresholdDate); // Check if today is after the 29th of the current month
                    ?>

                    <button class="btn btn-white m-2">
                        <?php if($canPay): ?>
                            <a href="<?php echo e(url('form/salary/paid/'.$users->rec_id)); ?>">
                                <i class="fa fa-money fa-sm"></i> Payment
                            </a>
                        <?php else: ?>
                            <span style="color: gray; cursor: not-allowed;">
                                <i class="fa fa-money fa-sm"></i> Payment (Not Available)
                            </span>
                        <?php endif; ?>
                    </button>


                        <button class="btn btn-white m-2"><a href="<?php echo e(url('payslip_pdf/'.$users->rec_id)); ?>"
                                target="_blank"> <i class="fa fa-print fa-sm"></i> PDF</a></button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title"> Mgtwell Consulting Services
                            </h4>
                            <h5>Payslip for the month of <?php echo e(\Carbon\Carbon::now()->format('M')); ?> <?php echo e(\Carbon\Carbon::now()->year); ?> </h5>
                            <h6>For Office Only</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <tr>
                                        <th>Employee Information</th>
                                    </tr>
                                </table>
                                <table class="table table-hover table-striped table-bordered">
                                    <tr>
                                        <th>S Number:</th>
                                        <td> <?php echo e($users->id); ?> </td>
                                        <th>Budget Code:</th>
                                        <td><?php echo e($budgets->category); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Voucher Number:</th>
                                        <td> <?php echo e($users->rec_id); ?>  </td>
                                        <th>Date:</th>
                                        <td id="now"> </td>
                                    </tr>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td> <?php echo e($users->name); ?></td>
                                        <th>Position:</th>
                                        <td><?php echo e($users->position); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Father Name:</th>
                                        <td> <?php echo e($users->fname); ?> </td>
                                        <th>Address:</th>
                                        <td> <?php echo e($users->address); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Bank Account #:</th>
                                        <td> <?php echo e($users->account_number); ?></td>
                                        <th>Department</th>
                                        <td> Finance</td>
                                    </tr>
                                    <tr>
                                        <th> Duty Station:</th>
                                        <td> <?php echo e($users->work_station); ?></td>
                                        <th>Project:</th>
                                        <td> <?php echo e($users->project); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Month Days:</th>
                                        <td> <?php echo e($daysInMonth); ?> </td>
                                        <th>Present Days:</th>
                                        <td> <?php echo e($Present_days); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Absent Days:</th>
                                        <td> <?php echo e($Absent_days); ?></td>
                                        <th>Paid and Leave Accepted Days:</th>
                                        <td> <?php echo e($Present_days+$leaves24); ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Contracted Salary:</th>
                                        <td> <?php echo e($users->net_salary); ?></td>
                                        <th>Tax:</th>
                                        <td> <?php echo e($users->tax); ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Gross Salary:</th>
                                        <td> <?php echo e($users->gross_salary); ?></td>
                                        <th>Net Amount:</th>
                                        <td> <?php echo e($Net_Amount); ?> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <h5>Finance Manager Signature</h5>
                                    <hr>
                                    <h6>Ahmad Noorani </h6>
                                </div>
                                <div class="col-md-6">
                                    <img src="" alt="">
                                </div>
                                <div class="col-md-3">
                                    <h5>Employee Signature</h5>
                                    <hr>
                                    <h6><?php echo e($users->name); ?> </h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <script>
        function Paid_Date() {
            var days = new Date();
            document.getElementById('now').innerHTML = days;

        }

    </script>
    <!-- /Page Wrapper -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/mgtwepsq/hrs.mgtwell.com/resources/views/payroll/salaryview.blade.php ENDPATH**/ ?>