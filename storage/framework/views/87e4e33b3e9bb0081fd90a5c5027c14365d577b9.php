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
                    <h3 class="page-title">Employee</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ul>
                </div>
                <div class="float-right">
                    <div class="col-sm-12 mx-0 px-1">
                        <a href="<?php echo e(url('attendance_export')); ?>" target="_blank" class="btn btn-outline-success btn-sm" rel="noopener noreferrer"> <i class="fa fa-print"></i> Export XSL </a>
                    </div>
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
                                <th>Month</th>
                                <th>Year</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="<?php echo e(url('employee/attendance_details/'.$attendance->rec_id)); ?>" class="avatar"><img
                                                alt="" src="<?php echo e(URL::to('/assets/images/'. $attendance->profile)); ?>"></a>
                                        <a href="<?php echo e(url('employee/attendance_details/'.$attendance->rec_id)); ?>"><?php echo e($attendance->name); ?><span><?php echo e($attendance->position); ?></span></a>
                                    </h2>
                                </td>
                                <td><?php echo e($attendance->rec_id); ?></td>
                                <td><?php echo e($attendance->months); ?></td>
                                <td><?php echo e(\Carbon\Carbon::create()->parse($attendance->created_at)->format('Y')); ?></td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('attendancelist/delete/'.$attendance->rec_id)); ?>"
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

</div>
<!-- /Page Wrapper -->
<?php $__env->startSection('script'); ?>
<script>

    // select auto id and email
    $('#name').on('change', function () {
        $('#employee_id').val($(this).find(':selected').data('employee_id'));
        $('#email').val($(this).find(':selected').data('email'));
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/form/attendancelist.blade.php ENDPATH**/ ?>