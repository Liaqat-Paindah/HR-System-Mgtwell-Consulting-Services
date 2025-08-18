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
                        <h3 class="page-title">Employee View</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee View Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <?php echo Toastr::message(); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Employee edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('all/employee/update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo e($employees2[0]->id); ?>">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo e($employees2[0]->name); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Family Name:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="fname"
                                            value="<?php echo e($employees2[0]->fname); ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo e($employees2[0]->email); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Birth Date</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="birth_date"
                                            name="birth_date" value="<?php echo e($employees2[0]->birth_date); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> NID || Tazkira Number:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="nid" name="nid"
                                            value="<?php echo e($employees2[0]->nid); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Blood Group</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="blood_group" name="blood_group"
                                            value="<?php echo e($employees2[0]->blood_group); ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Phone Number:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="<?php echo e($employees2[0]->phone); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Account Number</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="account_number" name="account_number"
                                            value="<?php echo e($employees2[0]->account_number); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"> Position:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="position" name="position"
                                            value="<?php echo e($employees2[0]->position); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="gender" name="gender">
                                            <option value="<?php echo e($employees2[0]->gender); ?>" <?php echo e(($employees2[0]->gender == $employees2[0]->gender) ? 'selected' : ''); ?>>
                                                <?php echo e($employees2[0]->gender); ?> </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Department:</label>
                                    <div class="col-md-10">
                                        <select class="select form-control" id="department_id" name="department_id">
                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>" <?php echo e(($department->id == $department->id) ? 'selected' : ''); ?>><?php echo e($department->department); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Employee ID</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="employee_id" name="employee_id"
                                            value="<?php echo e($employees2[0]->employee_id); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Project:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="project:" name="project"
                                            value="<?php echo e($employees2[0]->project); ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Permanent Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                                            value="<?php echo e($employees2[0]->permanent_address); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Current Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="current_address" name="current_address"
                                            value="<?php echo e($employees2[0]->current_address); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Work Station:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="work_station:" name="work_station"
                                            value="<?php echo e($employees2[0]->work_station); ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Gross Salary:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="gross_salary:" name="gross_salary"
                                            value="<?php echo e($employees2[0]->gross_salary); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tax:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="tax:" name="tax"
                                            value="<?php echo e($employees2[0]->tax); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Net Salary:</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" id="net_salary:" name="net_salary"
                                            value="<?php echo e($employees2[0]->net_salary); ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->
    <?php $__env->startSection('script'); ?>
        <script>
            $("input:checkbox").on('click', function () {
                var $box = $(this);
                if ($box.is(":checked")) {
                    var group = "input:checkbox[class='" + $box.attr("class") + "']";
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                }
                else {
                    $box.prop("checked", false);
                }
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HRS\resources\views/form/edit/editemployee.blade.php ENDPATH**/ ?>