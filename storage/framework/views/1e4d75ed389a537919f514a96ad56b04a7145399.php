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
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn btn-sm m-2" data-toggle="modal" data-target="#add_employee"><i
                            class="fa fa-plus"></i> Add Employee</a>
                            <a href="<?php echo e(url('all/employee/export')); ?>" class="btn add-btn btn-sm  m-2"><i
                            class="fa fa-file-excel-o"></i> Export</a>
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
                                <th>Role</th>
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
                                <td><?php echo e($items->email); ?></td>
                                <td><?php echo e($items->phone_number); ?></td>
                                <td><?php echo e($items->join_date); ?></td>
                                <td><?php echo e($items->role_name); ?></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/employee/view/edit/'.$items->rec_id)); ?>"><i
                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="<?php echo e(url('all/employee/delete/'.$items->rec_id)); ?>"
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
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('all/employee/save')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Full Name</label>
                                    <select class="select" id="name" name="name">
                                        <option value="">-- Select --</option>
                                        <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->name); ?>" data-employee_id=<?php echo e($user->rec_id); ?>

                                            data-email=<?php echo e($user->email); ?>><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Father Name: </label>
                                    <input class="form-control" required type="text" id="fname" name="fname"
                                        placeholder="Example: Azizullah">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="hidden" id="email" name="email"
                                        placeholder="Auto email" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control  required datetimepicker" type="text" id="birthDate"
                                            name="birthDate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tazkira || NID</label>
                                    <input class="form-control" required type="text" id="birthDate" name="nid"
                                        placeholder="Example: 1400-0404-76952">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blood Group</label>
                                    <select class="select form-control" id="blood_group" name="blood_group">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                        <option value="Unknown">Unknown</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TIN</label>
                                    <input class="form-control" required type="text" id="tin" name="tin"
                                        placeholder="Example: 140 72 186">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" required type="text" id="phone_number"
                                        name="phone_number" placeholder="Example: +93(0) 702-079-812">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input class="form-control" required type="text" id="account_number"
                                        name="account_number" placeholder="Example: 140-072-1860">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input class="form-control" required type="text" id="position" name="position"
                                        placeholder="Example: Program Manager">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="select form-control" id="gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
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
                                    <label>Budget Type: </label>
                                    <select class="select form-control" id="gender" name="project">
                                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project->code); ?>"><?php echo e($project->category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Budget Employee Code</label>
                                    <input class="form-control" required type="text" id="budget_employee_code"
                                        name="budget_employee_code" placeholder="Example: 3.01">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Work Station</label>
                                    <input class="form-control" required type="text" id="work_station"
                                        name="work_station" placeholder="Example: Kabul (Main - Office)">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="form-control" required type="text" id="category" name="category"
                                        placeholder="Example: NTA Grade A">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>step</label>
                                    <input class="form-control" required type="text" id="step" name="step"
                                        placeholder="Example: 3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gross Salary</label>
                                    <input class="form-control" required type="text" id="gross_salary"
                                        name="gross_salary" placeholder="Example: 48000 Afghani">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department: </label>
                                    <select class="select form-control" id="gender" name="department">
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>"><?php echo e($department->department); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Profile: </label>
                                    <input class="form-control" required type="file" id="profile" name="profile">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" cols="30" rows="4" class="form-control"
                                        required ></textarea>
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
        $('#email').val($(this).find(':selected').data('email'));
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HR\resources\views/form/employeelist.blade.php ENDPATH**/ ?>