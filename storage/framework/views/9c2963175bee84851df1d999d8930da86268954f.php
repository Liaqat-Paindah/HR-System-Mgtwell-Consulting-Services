<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-lists-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="<?php echo e(route('all/employee/card')); ?>" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="<?php echo e(route('all/employee/list')); ?>" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="<?php echo e(route('all/employee/search')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="employee_id">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="name">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="position">
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

            <div class="row staff-grid-row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="<?php echo e(url('employee/profile/'.$lists->rec_id)); ?>" class="avatar"><img src="<?php echo e(URL::to('/assets/images/'. $lists->profile)); ?>" alt="<?php echo e($lists->avatar); ?>" alt="<?php echo e($lists->avatar); ?>"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(url('all/employee/view/edit/'.$lists->rec_id)); ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="<?php echo e(url('all/employee/delete/'.$lists->rec_id)); ?>"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html"><?php echo e($lists->name); ?></a></h4>
                        <div class="small text-muted"><?php echo e($lists->position); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <option value="<?php echo e($user->name); ?>" data-employee_id=<?php echo e($user->rec_id); ?> data-email=<?php echo e($user->email); ?>><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control"  required type="email" id="email" name="email" placeholder="Auto email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tazkira || NID</label>
                                            <input class="form-control"  required type="text" id="birthDate" name="nid" placeholder="Example: 1400-0404-76952">
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
                                            <input class="form-control"  required type="text" id="tin" name="tin" placeholder="Example: 140 72 186">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                            <input class="form-control"  required type="text" id="phone_number" name="phone_number" placeholder="Example: +93(0) 702-079-812">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                            <input class="form-control"  required type="text" id="account_number" name="account_number" placeholder="Example: 140-072-1860">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                            <input class="form-control"  required type="text" id="position" name="position" placeholder="Example: Program Manager">
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
                                        <input type="text" class="form-control"  required id="employee_id" name="employee_id" placeholder="Auto id employee" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project</label>
                                            <input class="form-control"  required type="text" id="project" name="project" placeholder="Example: Access girl for Education - UNICEF ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Station</label>
                                            <input class="form-control"  required type="text" id="work_station" name="work_station" placeholder="Example: Kabul (Main - Office)">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                            <input class="form-control"  required type="text" id="category" name="category" placeholder="Example: NTA Grade A">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>step</label>
                                            <input class="form-control"  required type="text" id="step" name="step" placeholder="Example: 3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gross Salary</label>
                                            <input class="form-control"  required type="text" id="gross_salary" name="gross_salary" placeholder="Example: 48000 Afghani">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Profile: </label>
                                            <input class="form-control"  required type="file" id="profile" name="profile" >
                                    </div>
                                </div>
                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control"  required>Example: 4th-Kabul</textarea>
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
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
        });
    </script>
    <script>
        // select auto id and email
        $('#name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
            $('#email').val($(this).find(':selected').data('email'));
        });
    </script>
    
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_image').val(_this.find('.image').text());

            var name_role = (_this.find(".role_name").text());
            var _option = '<option selected value="' + name_role+ '">' + _this.find('.role_name').text() + '</option>'
            $( _option).appendTo("#e_role_name");

            var position = (_this.find(".position").text());
            var _option = '<option selected value="' +position+ '">' + _this.find('.position').text() + '</option>'
            $( _option).appendTo("#e_position");

            var department = (_this.find(".department").text());
            var _option = '<option selected value="' +department+ '">' + _this.find('.department').text() + '</option>'
            $( _option).appendTo("#e_department");

            var statuss = (_this.find(".statuss").text());
            var _option = '<option selected value="' +statuss+ '">' + _this.find('.statuss').text() + '</option>'
            $( _option).appendTo("#e_status");
            
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/form/allemployeecard.blade.php ENDPATH**/ ?>