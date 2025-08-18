
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo Toastr::message(); ?>



    <!-- Page Wrapper -->
    <div class="page-wrapper">

<div class="content container-fluid">
<div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Expenses</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Expenses</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_expense"><i
                            class="fa fa-plus"></i> Add Expense</a>
                </div>
            </div>
        </div>


<div class="row filter-row">
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus">
    <input type="text" class="form-control floating">
    <label class="focus-label">Item Name</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus select-focus">
    <select class="select floating">
    <option> -- Select -- </option>
    </select>
    <label class="focus-label">Purchased By</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus select-focus">
    <select class="select floating">
    <option> -- Select -- </option>
    </select>
    <label class="focus-label">Confirmed By</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus">
    <div class="cal-icon">
    <input class="form-control floating datetimepicker" type="text">
    </div>
    <label class="focus-label">From</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus">
    <div class="cal-icon">
    <input class="form-control floating datetimepicker" type="text">
    </div>
    <label class="focus-label">To</label>
    </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <a href="#" class="btn btn-success btn-block"> Search </a>
    </div>
    </div>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped custom-table mb-0 datatable">
<thead>
<tr>
<th>ID</th>
<th>Requested By</th>
<th>Name</th>
<th>Quantity </th>
<th>Description</th>
<th class="text-center">Status</th>
<th class="text-right">Actions</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $Expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($Expense->id); ?></td>
    <td>
        <a href="#" class="avatar avatar-xs">
        <img src="/assets/images/<?php echo e($Expense->profile); ?>" alt="User">
        </a>
        <h2><a href="#"><?php echo e($Expense->name); ?></a></h2>
         </td>
<td>
<strong><?php echo e($Expense->title); ?></strong>
<td><?php echo e($Expense->quantity); ?></td>
</td>
<td><?php echo e($Expense->description); ?></td>
</td>
<td class="text-center">
 <div class="dropdown action-label">
    <a class="dropdown-item leave_now" data-toggle="modal" data-id="<?php echo e($Expense->id); ?>" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-purple"></i> <?php echo e($Expense->status); ?></a>
</div>
</td>
<td class="text-right">
<div class="dropdown dropdown-action">
<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item ExpensesUpdate" data-toggle="modal" data-id="'.$Expense->id.'" data-target="#edit_categories"><i class="fa fa-pencil m-r-5"></i> Edit</a>


<a class="dropdown-item"
href="<?php echo e(url('all/expense/delete/'.$Expense->id)); ?>"
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
<div id="add_expense" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="<?php echo e(url('form/expense/new')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input class="form-control" type="text" required name="name"
                                    placeholder="Example: HP LaserJet Printer">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input class="form-control" type="number" name="quantity" required placeholder="Example: 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name:</label>
                                <textarea name="description" id="" class="form-control" required
                                    placeholder="Description..."></textarea>
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


     <!-- Approve Leave Modal -->
     <div class="modal custom-modal fade" id="approve_leave" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <p class="modal-title">Expense Confirmation </p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('form/expense/confirm')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Expense Action <span class="text-danger">*</span></label>
                            <select name="status" class="select">
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                                <option value="Declined">Declined</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Expense ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="id" id="e_id" >
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Approve Leave Modal -->
</div>
</div>
</div>

</div>
    <!-- /Page Wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/reports/expensereport.blade.php ENDPATH**/ ?>