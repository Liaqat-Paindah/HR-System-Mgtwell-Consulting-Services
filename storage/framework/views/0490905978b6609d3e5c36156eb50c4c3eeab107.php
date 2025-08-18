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
                        <button class="btn btn-white m-2"><a href="<?php echo e(url('payment_pdf/'.$users->rec_id)); ?>"
                                target="_blank"> <i class="fa fa-print fa-sm"></i> PDF</a></button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title"> Afghanistan Research, Development and Health Organization (ARDHO)
                            </h4>
                            <h5>Payslip for the month of  <?php echo e(\Carbon\Carbon::create()->month($users->month)->format('F')); ?> <?php echo e(\Carbon\Carbon::now()->year); ?> </h5>
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
                                        <td><?php echo e($users->budget_code); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Voucher Number:</th>
                                        <td> <?php echo e($users->rec_id); ?>  </td>
                                        <th>Date:</th>
                                        <td>  <?php echo e(\Carbon\Carbon::parse($users->salary_created_at)->format('Y-m-d')); ?></td>
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
                                        <td> Operation</td>
                                    </tr>
                                    <tr>
                                        <th> Duty Station:</th>
                                        <td> <?php echo e($users->work_station); ?></td>
                                        <th>Project:</th>
                                        <td> <?php echo e($users->project); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Month Days:</th>
                                        <td> <?php echo e($users->days); ?>  </td>
                                        <th>Paid and Leave Accepted Days:</th>
                                        <td> <?php echo e($users->paiddays); ?>  </td>
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
                                        <td> <?php echo e($users->net_amount); ?> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <h5>Finance Cashier Signature</h5>
                                    <hr>
                                    <h6>Maiwand Shaida </h6>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/payroll/paymentview.blade.php ENDPATH**/ ?>