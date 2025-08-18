<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/dashboard/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    const shareBtn = document.getElementById('Share');
    if(shareBtn) {
        shareBtn.addEventListener('click', function() {
            alert('Button clicked!');
        });
    }
});
const Print = () => {
    const report = document.querySelector('.print-report');

    // Convert all canvases to responsive images
    report.querySelectorAll('canvas').forEach(c => {
        const img = document.createElement('img');
        img.src = c.toDataURL();
        img.style.width = '100%'; // make it scale to container
        img.style.height = 'auto';
        c.replaceWith(img);
    });

    // Clone and remove elements with 'not-print' class
    const clone = report.cloneNode(true);
    clone.querySelectorAll('.not-print').forEach(el => el.remove());

    const w = window.open('', '', 'height=800,width=1000');
    w.document.write(`
        <html>
        <head>
            <title>Print Report</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="assets/dashboard/css/style.css">
            <style>
                body { margin: 10px; font-size: 12pt; }
                img, table { max-width: 100%; height: auto; }
                .print-report { width: 100%; box-sizing: border-box; }
                @media  print {
                    .not-print { display: none; }
                }
            </style>
        </head>
        <body>${clone.innerHTML}</body>
        </html>
    `);
    w.document.close();
    w.focus();
    setTimeout(() => { w.print(); w.close(); }, 500);
};

    
</script>
<script src="assets/dashboard/vendors/chart.js/chart.umd.js"></script>
<script src="assets/dashboard/vendors/progressbar.js/progressbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/dashboard/js/off-canvas.js"></script>
<script src="assets/dashboard/js/template.js"></script>
<script src="assets/dashboard/js/settings.js"></script>
<script src="assets/dashboard/js/hoverable-collapse.js"></script>
<script src="assets/dashboard/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/dashboard/js/jquery.cookie.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/dashboard/vendors/feather/feather.css">
<link rel="stylesheet" href="assets/dashboard/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/dashboard/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/dashboard/vendors/typicons/typicons.css">
<link rel="stylesheet" href="assets/dashboard/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="assets/dashboard/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="assets/dashboard/js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="assets/dashboard/css/style.css">
<!-- endinject -->
<script src="assets/dashboard/js/dashboard.js"></script>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome <?php echo e(Auth::user()->name); ?>!</h3>

                    </div>
                </div>
            </div>

            <?php if(Auth::user()->role_name == 'Employee' || Auth::user()->role_name == 'Manager' || Auth::user()->role_name == 'Finance' || Auth::user()->role_name == 'Line-Manager'): ?>
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
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                <a href="#"><img alt="" src="<?php echo e(URL::to('/assets/images/' . $usercount->profile)); ?>"
                                                        alt="<?php echo e($usercount->name); ?>"></a>
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
                                                        <div class="small doj text-muted">Date of Join :
                                                            <?php echo e($usercount->created_at); ?></div>
                                                        <a href="<?php echo e(url('employee_pdf/' . $usercount->employee_id)); ?>"
                                                            class="btn btn-outline-success btn-sm"> <i class="fa fa-print"></i>
                                                            Print Details</a>
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
                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                    href="#"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-target="#edit_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a data-target="#delete_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                                src="assets/img/profiles/avatar-16.jpg"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Team :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                                src="assets/img/profiles/avatar-02.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                                src="assets/img/profiles/avatar-09.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                                src="assets/img/profiles/avatar-10.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                                src="assets/img/profiles/avatar-05.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="all-users">+15</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                            <div class="progress progress-xs mb-0">
                                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                    class="progress-bar bg-success" data-original-title="40%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown profile-action">
                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                    href="#"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-target="#edit_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a data-target="#delete_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                                src="assets/img/profiles/avatar-16.jpg"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Team :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                                src="assets/img/profiles/avatar-02.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                                src="assets/img/profiles/avatar-09.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                                src="assets/img/profiles/avatar-10.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                                src="assets/img/profiles/avatar-05.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="all-users">+15</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                            <div class="progress progress-xs mb-0">
                                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                    class="progress-bar bg-success" data-original-title="40%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown profile-action">
                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                    href="#"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-target="#edit_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a data-target="#delete_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                                src="assets/img/profiles/avatar-16.jpg"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Team :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                                src="assets/img/profiles/avatar-02.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                                src="assets/img/profiles/avatar-09.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                                src="assets/img/profiles/avatar-10.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                                src="assets/img/profiles/avatar-05.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="all-users">+15</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                            <div class="progress progress-xs mb-0">
                                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                    class="progress-bar bg-success" data-original-title="40%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropdown profile-action">
                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"
                                                    href="#"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-target="#edit_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a data-target="#delete_project" data-toggle="modal" href="#"
                                                        class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                        <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt=""
                                                                src="assets/img/profiles/avatar-16.jpg"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-members m-b-15">
                                                <div>Team :</div>
                                                <ul class="team-members">
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Doe"><img alt=""
                                                                src="assets/img/profiles/avatar-02.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt=""
                                                                src="assets/img/profiles/avatar-09.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="John Smith"><img alt=""
                                                                src="assets/img/profiles/avatar-10.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt=""
                                                                src="assets/img/profiles/avatar-05.jpg"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="all-users">+15</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                            <div class="progress progress-xs mb-0">
                                                <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar"
                                                    class="progress-bar bg-success" data-original-title="40%"></div>
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
                                                    <label class="col-form-label">Salary basis <span
                                                            class="text-danger">*</span></label>
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
                                                    <label class="col-form-label">Salary amount <small class="text-muted">per
                                                            month</small></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Type your salary amount" value="0.00">
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
                                                    <label class="col-form-label">Additional rate <span
                                                            class="text-danger">*</span></label>
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
                                                    <label class="col-form-label">Additional rate <span
                                                            class="text-danger">*</span></label>
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
                                                    <label class="col-form-label">Additional rate <span
                                                            class="text-danger">*</span></label>
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

            <?php elseif(Auth::user()->role_name == 'Admin'): ?>
                <div class="col-sm-12 print-report">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom not-print">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                                        aria-selected="false">Employees</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab"
                                        aria-selected="false">Leaves</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab"
                                        aria-selected="false">More</a>
                                </li>
                            </ul>
                            <div>
                                <div class="btn-wrapper">
                                    <a href="mailto:employees@mgtwell.com?subject=Report&body=Please find the report attached." class="btn btn-otline-dark align-items-center"><i class="icon-share"></i>
                                        Share</a>
                                    <a href="#" class="btn btn-otline-dark" onclick="Print()"><i class="icon-printer"></i>
                                        Print</a>
                                    <a href="#" class="btn btn-primary text-white me-0" onclick="Print()"><i class="icon-download"></i> Export</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="statistics-title">Active Employees</p>
                                                <h3 class="rate-percentage"><?php echo e($active_employees); ?></h3>
                                                <p class="text-success d-flex"><i
                                                        class="mdi mdi-menu-down"></i><span><?php echo e($active_percentage); ?>%</span></p>
                                            </div>
                                            <div>
                                                <p class="statistics-title">Inactive Employees</p>
                                                <h3 class="rate-percentage"><?php echo e($inactive_employees); ?></h3>
                                                <p class="text-success d-flex"><i
                                                        class="mdi mdi-menu-up"></i><span><?php echo e($inactive_percentage); ?>%</span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="statistics-title">Avg. Leaves</p>
                                                <h3 class="rate-percentage"><?php echo e(round($AVG, 2)); ?></h3>
                                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>36</span>
                                                </p>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <p class="statistics-title">Total Monthly Leaves</p>
                                                <h3 class="rate-percentage"><?php echo e($total_leaves); ?></h3>
                                                <p class="text-success d-flex"><i
                                                        class="mdi mdi-menu-down"></i><span><?php echo e(round($AVG, 2)); ?></span></p>
                                            </div>
                                            <div class="d-none d-md-block">
                                                <p class="statistics-title">Pending Leaves</p>
                                                <h3 class="rate-percentage"><?php echo e($pendding_leaves); ?> </h3>
                                                <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>8</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column">
                                        <div class="row">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="d-sm-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h4 class="card-title card-title-dash">Monthly Leaves based on
                                                                    Employees</h4>
                                                                <p class="card-subtitle card-subtitle-dash">This report provides
                                                                    a detailed overview of employee leave patterns on a monthly
                                                                    basis, helping organizations track leave usage, manage
                                                                    workforce availability, and plan resources efficiently.</p>
                                                            </div>
                                                            <div>
                                                                <div class="dropdown">
                                                                    <button
                                                                        class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                        type="button" id="dropdownMenuButton2"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"> This month </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton2">
                                                                        <h6 class="dropdown-header">Settings</h6>
                                                                        <a class="dropdown-item" href="#">April</a>
                                                                        <a class="dropdown-item" href="#">May</a>
                                                                        <a class="dropdown-item" href="#">June</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                            <div
                                                                class="d-sm-flex align-items-center mt-4 justify-content-between">
                                                                <h2 class="me-2 fw-bold">34 </h2>
                                                                <h4 class="me-2">days</h4>
                                                                <h4 class="text-success">(+1.37%)</h4>
                                                            </div>
                                                            <div class="me-3">
                                                                <div id="marketingOverview-legend" height="400px"></div>
                                                            </div>
                                                        </div>
                                                        <div class="chartjs-bar-wrapper mt-3">
                                                            <canvas id="marketingOverview" height="250px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="d-sm-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h4 class="card-title card-title-dash">Pending Requests</h4>
                                                                <p class="card-subtitle card-subtitle-dash">You have 50+ new
                                                                    requests</p>
                                                            </div>
                                                            <div>
                                                                <button class="btn btn-primary btn-lg text-white mb-0 me-0"
                                                                    type="button"><i class="mdi mdi-account-plus"></i>Add new
                                                                    member</button>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive  mt-1">
                                                            <table class="table select-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false" id="check-all"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </th>
                                                                        <th>Employee Name</th>
                                                                        <th>Postions</th>
                                                                        <th>Leave Progress</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex ">
                                                                                <img src="assets/dashboard/images/faces/face1.jpg"
                                                                                    alt="">
                                                                                <div>
                                                                                    <h6>Brandon Washington</h6>
                                                                                    <p>Head admin</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p>M&E Officer</p>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">79%</p>
                                                                                    <p>12/30</p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar" style="width: 85%"
                                                                                        aria-valuenow="25" aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge badge-opacity-warning">In progress
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <img src="assets/dashboard/images/faces/face2.jpg"
                                                                                    alt="">
                                                                                <div>
                                                                                    <h6>Laura Brooks</h6>
                                                                                    <p>Head admin</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p>M&E Officer</p>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">65%</p>
                                                                                    <p>12/30</p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar" style="width: 65%"
                                                                                        aria-valuenow="65" aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge badge-opacity-warning">In progress
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <img src="assets/dashboard/images/faces/face3.jpg"
                                                                                    alt="">
                                                                                <div>
                                                                                    <h6>Wayne Murphy</h6>
                                                                                    <p>Head admin</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p>M&E Officer</p>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">65%</p>
                                                                                    <p>12/30</p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-warning"
                                                                                        role="progressbar" style="width: 38%"
                                                                                        aria-valuenow="38" aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge badge-opacity-warning">In progress
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <img src="assets/dashboard/images/faces/face4.jpg"
                                                                                    alt="">
                                                                                <div>
                                                                                    <h6>Matthew Bailey</h6>
                                                                                    <p>Head admin</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p>M&E Officer</p>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">65%</p>
                                                                                    <p>12/30</p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-danger"
                                                                                        role="progressbar" style="width: 15%"
                                                                                        aria-valuenow="15" aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge badge-opacity-warning">In Progress
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check form-check-flat mt-0">
                                                                                <label class="form-check-label">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        aria-checked="false"><i
                                                                                        class="input-helper"></i></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex">
                                                                                <img src="assets/dashboard/images/faces/face5.jpg"
                                                                                    alt="">
                                                                                <div>
                                                                                    <h6>Katherine Butler</h6>
                                                                                    <p>Head admin</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p>M&E Officer</p>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <div
                                                                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                    <p class="text-success">100%</p>
                                                                                    <p>12/30</p>
                                                                                </div>
                                                                                <div class="progress progress-md">
                                                                                    <div class="progress-bar bg-success"
                                                                                        role="progressbar" style="width: 100%"
                                                                                        aria-valuenow="100" aria-valuemin="0"
                                                                                        aria-valuemax="100"></div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge badge-opacity-success">Completed
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h4 class="card-title card-title-dash">Recent Leave list
                                                                    </h4>
                                                                    <div class="add-items d-flex mb-0">
                                                                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                                                        <button
                                                                            class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i
                                                                                class="mdi mdi-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="list-wrapper">
                                                                    <ul class="todo-list todo-list-rounded">

                                                                        <li class="d-block">
                                                                            <div class="form-check w-100">
                                                                                <label class="form-check-label">
                                                                                    <input class="checkbox" type="checkbox">
                                                                                    Sayed Safarullah Pacha requested new annaul
                                                                                    leave <i class="input-helper rounded"></i>
                                                                                </label>
                                                                                <div class="d-flex mt-2">
                                                                                    <div class="ps-4 text-small me-3">23 August
                                                                                        2025</div>
                                                                                    <div
                                                                                        class="badge badge-opacity-warning me-3">
                                                                                        Due to tomarrow</div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="form-check w-100">
                                                                                <label class="form-check-label">
                                                                                    <input class="checkbox" type="checkbox">
                                                                                    Waris Stanikzay recently requested new sick
                                                                                    leave <i class="input-helper rounded"></i>
                                                                                </label>
                                                                                <div class="d-flex mt-2">
                                                                                    <div class="ps-4 text-small me-3">24 August
                                                                                        2025</div>
                                                                                    <div
                                                                                        class="badge badge-opacity-success me-3">
                                                                                        Done</div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="border-bottom-0">
                                                                            <div class="form-check w-100">
                                                                                <label class="form-check-label">
                                                                                    <input class="checkbox" type="checkbox">
                                                                                    Nawidullah Assadzay requested annual leave!
                                                                                    <i class="input-helper rounded"></i>
                                                                                </label>
                                                                                <div class="d-flex mt-2">
                                                                                    <div class="ps-4 text-small me-3">14 August
                                                                                        2025</div>
                                                                                    <div
                                                                                        class="badge badge-opacity-danger me-3">
                                                                                        Expired</div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow ">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h4 class="card-title card-title-dash">Type By Amount</h4>
                                                                </div>
                                                                <div>
                                                                    <canvas class="my-auto" id="doughnutChart"></canvas>
                                                                </div>
                                                                <div id="doughnutChart-legend" class="mt-5 text-center"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Leave Report</h4>
                                                                    </div>
                                                                    <div>
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                                                                type="button" id="dropdownMenuButton3"
                                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false"> Month Wise </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton3">
                                                                                <h6 class="dropdown-header">week Wise</h6>
                                                                                <a class="dropdown-item" href="#">Year Wise</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <canvas id="leaveReport"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-grow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            
            <?php echo Toastr::message(); ?>

            <!-- Statistics Widget -->
        </div>
        <!-- /Page Content -->
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HRS\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>