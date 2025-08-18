
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
                    <h3 class="page-title"><?php echo e($departmentValue); ?> Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('departmentlist')); ?>">Department</a></li>
                        <li class="breadcrumb-item active">Department Details</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <div class="view-icons">
                        <a href="<?php echo e(route('all/employee/card')); ?>" class="grid-view btn btn-link active"><i
                                class="fa fa-th"></i></a>
                        <a href="<?php echo e(route('all/employee/list')); ?>" class="list-view btn btn-link"><i
                                class="fa fa-bars"></i></a>
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
                                <th>Email</th>
                                <th>Mobile</th>
                                <th class="text-nowrap">Join Date</th>
                                <th>Position</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="<?php echo e(url('employee/profile/'.$items->id)); ?>" class="avatar"><img
                                                alt="" src="<?php echo e(URL::to('/assets/images/'. $items->profile)); ?>"></a>
                                        <a href="<?php echo e(url('employee/profile/'.$items->id)); ?>"><?php echo e($items->name); ?><span><?php echo e($items->position); ?></span></a>
                                    </h2>
                                </td>
                                <td><?php echo e($items->employee_id); ?></td>
                                <td><?php echo e($items->email); ?></td>
                                <td><?php echo e($items->phone); ?></td>
                                <td><?php echo e($items->created_at); ?></td>
                                <td><?php echo e($items->position); ?></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/employee/view/edit/'.$items->id)); ?>"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/employee/delete/'.$items->id)); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/mgtwepsq/hrs.mgtwell.com/resources/views/department/departmentdetails.blade.php ENDPATH**/ ?>