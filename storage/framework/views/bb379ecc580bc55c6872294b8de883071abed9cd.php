
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Toastr::message(); ?>


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
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_expense"><i class="fa fa-plus"></i> Add Expense</a>
                </div>
            </div>
        </div>

        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <div class="">
                        <input class="form-control floating" type="text">
                    </div>
                    <label class="focus-label">Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
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
                                 <td  class="id"><?php echo e($Expense->id); ?></td>
                                 <td class="title"><?php echo e($Expense->title); ?></td>
                                <td class="quantity"><?php echo e($Expense->quantity); ?></td>
                                <td class="desc"><?php echo e($Expense->description); ?></td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-purple"></i> <?php echo e($Expense->status); ?>

                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item ExpenseUpdate" data-toggle="modal" data-id="<?php echo e($Expense->id); ?>" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                            href="<?php echo e(url('all/expenseemployee/delete/'.$Expense->id)); ?>"
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

    <!-- Add Expense Modal -->
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
                                    <input class="form-control" type="text" required name="name" placeholder="Example: HP LaserJet Printer">
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
                                    <label>Description:</label>
                                    <textarea name="description" id="" class="form-control" required placeholder="Description..."></textarea>
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

    <!-- Edit Expense Modal -->
    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('form/expense/edit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="e_id" name="id" value="">
                        <div class="form-group">
                            <label>Name:  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="e_title" name="title" value="">
                        </div>
                        <div class="form-group">
                            <label>Quantity: <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="e_quantity" name="quantity" value="">
                        </div>
                        <div class="form-group">
                            <label>Description: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="e_desc" name="desc" value="">
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Expense Modal -->
    <div class="modal custom-modal fade" id="delete_expense" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Expense</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.ExpenseUpdate', function() {
        var _this = $(this).parents('tr');
        $('#e_id').val(_this.find('.id').text());
        $('#e_title').val(_this.find('.title').text());
        $('#e_quantity').val(_this.find('.quantity').text());
        $('#e_desc').val(_this.find('.desc').text());
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/reports/expenses.blade.php ENDPATH**/ ?>