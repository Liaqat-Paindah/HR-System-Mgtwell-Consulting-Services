<?php
    use Carbon\Carbon;

?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo Toastr::message(); ?>



<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Payments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payments</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
                            class="fa fa-plus"></i> Payment</a>

                </div>
            </div>
        </div>

        <!-- /Page Header -->

        <!-- Search Filter -->
        <form action="<?php echo e(route('all/employee/list/search')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating" name="employee_id">
                        <label class="focus-label">Employee ID</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control  required floating">
                        <label class="focus-label">Position</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="sumit" class="btn btn-success btn-block"> Search </button>
                </div>
            </div>
        </form>
        <!-- Search Filter -->
        
        <?php echo Toastr::message(); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Months</th>
                                <th>Budget Code</th>
                                <th>Paid Days</th>
                                <th>Net Amount</th>
                                <th>Paid Date</th>
                                <th>Generate Slip</th>

                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="<?php echo e(url('employee/profile/'.$items->employee_id)); ?>" class="avatar"><img
                                                alt="" src="<?php echo e(URL::to('/assets/images/'. $items->profile)); ?>"></a>
                                        <a href="<?php echo e(url('employee/profile/'.$items->employee_id)); ?>"><?php echo e($items->name); ?><span><?php echo e($items->position); ?></span></a>
                                    </h2>
                                </td>
                                <td><?php echo e($items->rec_id); ?></td>
                                <td><?php echo e($items->month); ?></td>
                                <td> <?php echo e($items->code); ?></td>
                                <td><?php echo e($items->paiddays); ?></td>
                                <td><?php echo e(number_format($items->net_amount, 0)); ?> Afghani</td>
                                <td><?php echo e(Carbon::parse($items->created_at)->format('Y-m-d')); ?></td>
                                <td><a class="btn btn-sm btn-primary" href="<?php echo e(url('payment/salary/view/'.$items->rec_id)); ?>">Generate Slip</a></td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/employee/view/edit/'.$items->rec_id)); ?>"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/payments/delete/'.$items->rec_id)); ?>"
                                                onclick="return confirm('Are you sure to want to delete it?')"><i
                                                    class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

   <!-- Add Employee Modal -->
   <div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('payment/employee/save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Select Employee: </label>
                                <select class="select" id="name" name="name">
                                    <option value="">-- Select --</option>
                                    <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->name); ?>" data-employee_id=<?php echo e($user->rec_id); ?>

                                        data-email=<?php echo e($user->email); ?> data-tax=<?php echo e($user->tax); ?> data-gross_salary=<?php echo e($user->gross_salary); ?> data-net_salary=<?php echo e($user->net_salary); ?> ><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required id="employee_id" name="employee_id"
                                    placeholder="Auto id employee" readonly>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Budget Category: </label>
                                <select class="select form-control" id="code" name="code">
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->code); ?>"><?php echo e($project->category); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gross Salary</label>
                                <input class="form-control" required type="text" id="gross_salary"
                                    name="gross_salary" placeholder="Example: 48000 Afghani" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>tax:</label>
                                <input class="form-control" required type="text" id="tax"
                                    name="tax" placeholder="Example: 2500 Afghani" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Net Salary:</label>
                                <input class="form-control" required type="text" id="net_salary"
                                    name="net_salary" placeholder="Example: 45000 Afghani" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Month:</label>
                                <select  class="select" id="month" name="month" onchange="updateDays()">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Days of Month:</label>
                                <input class="form-control" required type="number" id="days"
                                    name="days" placeholder="Example: 30 days">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Present Days:</label>
                                <input class="form-control" required type="number" id="present_days"
                                    name="present_days" placeholder="Example: 3 days">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Leaves:</label>
                                <input class="form-control" required type="number" id="leaves"
                                    name="leaves" placeholder="Example: 3 days">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Payment Date:</label>
                                <input class="form-control" required type="date" id="payment_date"
                                    name="payment_date" placeholder="">
                            </div>
                        </div>



                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /Add Employee Modal -->
</div>
<!-- /Page Wrapper -->
<?php $__env->startSection('script'); ?>
<script>

    // select auto id and email
    $('#name').on('change', function () {
        $('#employee_id').val($(this).find(':selected').data('employee_id'));
        $('#gross_salary').val($(this).find(':selected').data('gross_salary'));
        $('#tax').val($(this).find(':selected').data('tax'));
        $('#net_salary').val($(this).find(':selected').data('net_salary'));

    });



    function updateDays() {
        const month = document.getElementById('month').value;
        const daysInput = document.getElementById('days');

        // Determine the number of days in the selected month
        let days;
        if (month == 2) { // February
            days = 28; // Assuming non-leap year
        } else if (month == 4 || month == 6 || month == 9 || month == 11) { // April, June, September, November
            days = 30;
        } else { // January, March, May, July, August, October, December
            days = 31;
        }

        // Update the days input field
        daysInput.value = days;
    }

    // Initialize the days input when the page loads
    window.onload = updateDays;
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/payroll/payments.blade.php ENDPATH**/ ?>