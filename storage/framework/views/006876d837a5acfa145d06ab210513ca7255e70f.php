<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-wrapper">

                <div class="content container-fluid">

                <div class="page-header">
                <div class="row">
                <div class="col-sm-12">
                <h3 class="page-title">Welcome <?php echo e(Auth::user()->name); ?>!</h3>
                <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
                </ul>
                </div>
                </div>
                </div>

                <?php if(Auth::user()->role_name=='Employee' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Finance' || Auth::user()->role_name=='Line-Manager'): ?>
                <div class="row">
                <div class="col-md-12">
                <div class="card-group m-b-30">
                <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                <div>
                <span class="d-block">Leaves Taken</span>
                </div>
                <div>
                <span class="text-success"><?php echo e($leaves); ?> days</span>
                </div>
                </div>
                <h4 class="mb-4"> <?php echo e($requested); ?> Days Pending</h4>
                <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                </div>
                <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                <div>
                <span class="d-block">Attendance: </span>
                </div>
                <div>
                <span class="text-success">
                <?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>

                </span>
                </div>
                </div>
                <h4 class="mb-3"><?php echo e($attendance); ?> days</h4>
                <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                </div>

                <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                <div>
                <span class="d-block">Pending Tasks</span>
                </div>
                <div>
                <span class="text-success">0</span>
                </div>
                </div>
                <h4 class="mb-3">Completed Tasks</h4>
                <div class="progress mb-2" style="height: 5px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <?php $__currentLoopData = $userscount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usercount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="<?php echo e(URL::to('/assets/images/'. $usercount->profile)); ?>" alt="<?php echo e($usercount->name); ?>"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name mt-2 mb-0"><?php echo e($usercount->name); ?> </h3>
                                                    <h6 class=" nid"> Tazkira || NID: <?php echo e($usercount->nid); ?></h6>
                                                    <p class="text-muted">Position: <?php echo e($usercount->position); ?></p>
                                                    <p class="text-muted">Employee ID: <?php echo e($usercount->employee_id); ?></p>
                                                    <div class="small doj text-muted">Date of Join : <?php echo e($usercount->created_at); ?></div>
                                                    <a href="<?php echo e(url('employee_pdf/'.$usercount->employee_id)); ?>" class="btn btn-outline-success btn-sm"> <i class="fa fa-print"></i> Print Details</a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                        <h3 class="card-title">Personal Information </h3>

                                                <table class="personal-info">
                                                    <tr>
                                                        <th class="dt-details">Phone Number:</th>
                                                        <td class="dt-contents"><?php echo e($usercount->phone); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Email:</th>
                                                        <td class="dt-contents"><?php echo e($usercount->email); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">birthDate:</th>
                                                        <td class="dt-contents"><?php echo e($usercount->birth_date); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Gender:</th>
                                                        <td class="dt-contents"><?php echo e($usercount->gender); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="dt-details">Blood Group:</th>
                                                        <td class="dt-contents"><?php echo e($usercount->blood_group); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-content">
                    <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">General Information</h3>
                                        <table class="personal-info">
                                            <tr>
                                                <th class="dt-details">Account Number:</th>
                                                <td class="dt-contents"><?php echo e($usercount->account_number); ?></td>
                                            </tr>

                                            <tr>
                                                <th class="dt-details">Project:</th>
                                                <td class="dt-contents"><?php echo e($usercount->project); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Work Station:</th>
                                                <td class="dt-contents"><?php echo e($usercount->work_station); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Current Address :</th>
                                                <td class="dt-contents"><?php echo e($usercount->current_address); ?></td>
                                            </tr>
                                                                                        <tr>
                                                <th class="dt-details">Permanent Address :</th>
                                                <td class="dt-contents"><?php echo e($usercount->permanent_address); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Salary Infromation</h3>
                                        <table class="personal-info">
                                            <tr>
                                                <th class="dt-details">Gross Salary:</th>
                                                <td class="dt-contents"><?php echo e($usercount->gross_salary); ?> Afghani</td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Tax:</th>
                                                <td class="dt-contents"><?php echo e($usercount->tax); ?> Afghani</td>
                                            </tr>
                                            <tr>
                                                <th class="dt-details">Net Salary:</th>
                                                <td class="dt-contents"><?php echo e($usercount->net_salary); ?> Afghani</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Profile Info Tab -->

                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Projects Tab -->

                    <!-- Bank Statutory Tab -->
                    <div class="tab-pane fade" id="bank_statutory">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"> Basic Salary Information</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select salary basis type</option>
                                                    <option>Hourly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Payment type</label>
                                                <select class="select">
                                                    <option>Select payment type</option>
                                                    <option>Bank transfer</option>
                                                    <option>Check</option>
                                                    <option>Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="card-title"> PF Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF contribution</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h3 class="card-title"> ESI Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI contribution</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ESI rate</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A" value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Statutory Tab -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php elseif(Auth::user()->role_name=='Admin'): ?>


                <?php endif; ?>
             <!---  <div class="row">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-6 text-center">
                <div class="card">
                <div class="card-body">
               <h3 class="card-title">Salaries</h3>
                <canvas id="salaryChart" width="100" height="40px"></canvas>

                </div>
                </div>
                </div >
                <div class="col-md-6 text-center">
                <div class="card">
                <div class="card-body">
             <h3 class="card-title">Payment Overview</h3>
                <canvas id="salaryChart" width="100" height="50px"></canvas>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
               -->



            <!-- /Page Header -->
            
            <?php echo Toastr::message(); ?>

            <!-- Statistics Widget -->
        </div>
        <!-- /Page Content -->
    </div>
  <!--  <script>
        const ctx = document.getElementById('salaryChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($months, 15, 512) ?>,
                datasets: [{
                    label: 'Total Salaries',
                    data: <?php echo json_encode($totalSalaries, 15, 512) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Number of Staff Paid',
                    data: <?php echo json_encode($staffCounts, 15, 512) ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
    -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/mgtwepsq/hrs.mgtwell.com/resources/views/dashboard/dashboard.blade.php ENDPATH**/ ?>