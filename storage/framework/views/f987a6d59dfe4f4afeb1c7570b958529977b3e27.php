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
                        <h3 class="page-title">Leaves</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leaves</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(Session::get('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(Session::get('fail')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                <?php endif; ?>
            <!-- Leave Statistics -->
            <!-- /Leave Statistics -->
            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating">
                                <option> -- Select -- </option>

                            </select>
                            <label class="focus-label">Leave Type</label>
                        </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating">
                                <option> -- Select -- </option>
                                <option> Pending </option>
                                <option> Approved </option>
                                <option> Rejected </option>
                            </select>
                            <label class="focus-label">Leave Status</label>
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
            <!-- /Search Filter -->

			<!-- /Page Header -->
            
            <?php echo Toastr::message(); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <th>Leave Category</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total of Days/Hours</th>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $leaves2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="admin_id"><?php echo e($leave->admin_id); ?></td>
                                    <td class="leave_category"><?php echo e($leave->leave_category); ?></td>
                                    <td class="from_date"><?php echo e($leave->from_date); ?></td>
                                    <td class="to_date"><?php echo e($leave->to_date); ?></td>
                                    <td class="days"><?php echo e($leave->total); ?></td>
                                    <td class="leave_type"><?php echo e($leave->leave_type); ?></td>
                                    <td class="leave_reason"><?php echo e($leave->leave_reason); ?></td>
                                    <td class="text-center">
                                        <div class="action-label">
                                            <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                <i class="fa fa-dot-circle-o text-purple"></i> <?php echo e($leave->status); ?>

                                            </a>
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item leaveUpdate" data-toggle="modal" data-id="'.$leave->admin_id.'" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
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

		<!-- Add Leave Modal -->
        <div id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">Leave Request Form </p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post"  enctype="multipart/form-data" action="<?php echo e(route('form/leaves/save')); ?>" >
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Leave Category <span class="text-danger">*</span></label>
                                <select class="select"  name="leave_category">
                                    <option value="Not Select"  >...</option>
                                    <option value="Annual Vacation" >Annual Vacation</option>
                                    <option value="Sick Leave" >Sick Leave</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input required class="form-control datetimepicker" name="from" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input required class="form-control datetimepicker" name="to" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of days/Hours <span class="text-danger">*</span></label>
                                <input required class="form-control" name="total" type="text">
                            </div>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select" name="leave_type">
                                    <option disabled>...</option>
                                    <option value="Hourly" >Hourly </option>
                                    <option value="Daily" >Daily</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" name="leave_reason" required class="form-control"></textarea>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->

        <!-- Edit Leave Modal -->
        <div id="edit_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('form/leavesemployee/edit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="admin_id" class="e_id" value="">

                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select" id="e_leave_category" name="leave_category">
                                   <option value="Not Select"  >...</option>
                                    <option value="Annual Vacation" >Annual Vacation</option>
                                    <option value="Sick Leave" >Sick Leave</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" id="e_from_date" name="from_date" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" id="e_to_date" name="to_date" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="number_of_days" name="days" value="">
                            </div>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select" id="e_leave_type" name="leave_type">
                                   <option value="Not Select"  >...</option>
                                    <option value="Daily" >Daily</option>
                                    <option value="Hourly" >Hourly</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control" id="e_leave_reason" name="leave_reason" value=""></textarea>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Leave Modal -->



    </div>

    <script>

        $(document).ready(function() {
            $(document).on('click', '.leaveDelete', function() {
                var _this = $(this).closest('tr');
                var adminId = _this.find('.admin_id').text();
                $('.e_id').val(adminId);
            });
        });


        $(document).on('click','.leaveUpdate',function()
        {
            var _this = $(this).parents('tr');
            var adminId = _this.find('.admin_id').text();
            $('.e_id').val(adminId);

            $('#e_from_date').val(_this.find('.from_date').text());
            $('#e_to_date').val(_this.find('.to_date').text());
            $('#number_of_days').val(_this.find('.days').text());
            $('#e_leave_reason').val(_this.find('.leave_reason').text());
            var leave_type = (_this.find(".leave_type").text());
            var _option = '<option selected value="' + leave_type+ '">' + _this.find('.leave_type').text() + '</option>'
            $( _option).appendTo("#e_leave_type");

            var leave_category = (_this.find(".leave_category").text());
            var _option = '<option selected value="' + leave_category+ '">' + _this.find('.leave_category').text() + '</option>'
            $( _option).appendTo("#e_leave_category");
        });

        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/mgtwepsq/hrs.mgtwell.com/resources/views/form/leavesemployee.blade.php ENDPATH**/ ?>