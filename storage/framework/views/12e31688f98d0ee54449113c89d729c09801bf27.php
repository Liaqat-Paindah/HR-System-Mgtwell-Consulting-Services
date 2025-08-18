<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- Page Wrapper -->
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leave Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leave Report</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                            <a href="<?php echo e(url('/home')); ?>" class="btn btn-warning btn-sm px-3"><i
                            class="fa fa-file-excel-o"></i> Export</a>

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
                                <th>Profile</th>
                                <th>Employee ID</th>
                                <th>Sick Leave</th>
                                <th>Annual Leave</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="<?php echo e(url('leave/report_details/'.$result->employee_id)); ?>" class="avatar"><img
                                                alt="" src="<?php echo e(URL::to('/assets/images/'. $result->profile)); ?>"></a>
                                        <a href="<?php echo e(url('leave/report_details/'.$result->employee_id)); ?>"><?php echo e($result->name); ?><span><?php echo e($result->position); ?></span></a>
                                    </h2>
                                <td><?php echo e($result->employee_id); ?></td>
                                <td>
                                    <a href="<?php echo e(url('leave/report_details/'.$result->employee_id)); ?>" class="btn btn-success btn-sm"><i
                                        class="fa fa-user-circle-o"></i> Sick Leave</a>
                                </td>
                                <td>
                                <a href="<?php echo e(url('leave/report_annuals/'.$result->employee_id)); ?>" class="btn btn-success btn-sm"><i
                                    class="fa fa-file-pdf-o"></i> Annual Leave</a>
                                <td class="text-right">Actions</td>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/mgtwepsq/hrs.mgtwell.com/resources/views/reports/leaveReport.blade.php ENDPATH**/ ?>