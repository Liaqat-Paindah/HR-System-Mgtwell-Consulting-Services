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
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-info">
                        <h6>Total Requested</h6>
                        <h4><?php echo e($sum_requested); ?> days</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-info">
                        <h6>Total Pending Leaves</h6>
                        <h4><?php echo e($sum_approved); ?> days</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-info">
                        <h6>Total Declined</h6>
                        <h4><?php echo e($sum_Declined); ?> days</h4>
                    </div>
                </div>
            </div>
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
                           <?php $__currentLoopData = $leaves4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($items->leave_category); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Leave Category</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Leave Type</th>
                                    <th>Total</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php if(Auth::user()->role_name=='Line-Manager'): ?>
                                <?php if(!empty($leaves4)): ?>
                                    <?php $__currentLoopData = $leaves4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td  class="id"><?php echo e($items->id); ?></td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="<?php echo e(url('employee/profile/'.$items->rec_id)); ?>" class="avatar"><img alt="" src="<?php echo e(URL::to('/assets/images/'. $items->profile)); ?>" alt="<?php echo e($items->name); ?>"></a>
                                                    <a href="#"><?php echo e($items->name); ?><span><?php echo e($items->position); ?></span></a>
                                                </h2>
                                            </td>
                                            <td class="leave_category"><?php echo e($items->leave_category); ?></td>
                                            <td hidden class="from_date"><?php echo e($items->from_date); ?></td>
                                            <td><?php echo e(date('d F, Y',strtotime($items->from_date))); ?></td>
                                            <td hidden class="to_date"><?php echo e($items->to_date); ?></td>
                                            <td><?php echo e(date('d F, Y',strtotime($items->to_date))); ?></td>
                                            <td class="leave_type"><?php echo e($items->leave_type); ?></td>

                                            <td class="days"><?php echo e($items->total); ?></td>
                                            <td class="leave_reason"><?php echo e($items->leave_reason); ?></td>


                                            <td class="text-center">
                                                <div class="dropdown action-label">
                                                    <a class="dropdown-item leave_now" data-toggle="modal" data-id="<?php echo e($items->id); ?>" data-target="#confirm_leave"><i class="fa fa-dot-circle-o text-purple"></i> <?php echo e($items->status); ?></a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php endif; ?>
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



    </div>
    <!-- /Page Wrapper -->
    <?php $__env->startSection('script'); ?>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    
    <script>
        $(document).on('click','.leaveUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_number_of_days').val(_this.find('.day').text());
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
    </script>

    
    <script>
        $(document).on('click','.leaveDelete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HRS\resources\views/form/leaves_line.blade.php ENDPATH**/ ?>