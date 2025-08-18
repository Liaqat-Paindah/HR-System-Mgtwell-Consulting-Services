<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="SoengSouy Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="SoengSouy Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard - HRMS</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(URL::to('assets/img/favicon.png')); ?>">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/bootstrap.min.css')); ?>">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/font-awesome.min.css')); ?>">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/line-awesome.min.css')); ?>">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/dataTables.bootstrap4.min.css')); ?>">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/select2.min.css')); ?>">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/bootstrap-datetimepicker.min.css')); ?>">
	<!-- Chart CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('ssets/plugins/morris/morris.css')); ?>">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/style.css')); ?>">

	
	<link rel="stylesheet" href="<?php echo e(URL::to('assets/css/toastr.min.css')); ?>">
	<script src="<?php echo e(URL::to('assets/js/toastr_jquery.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/js/toastr.min.js')); ?>"></script>
</head>

<body>
	<style>
		.invalid-feedback{
			font-size: 14px;
		}
	</style>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		
		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="<?php echo e(route('home')); ?>" class="logo"> <img src="<?php echo e(URL::to('assets/img/logo.png')); ?>" width="40" height="40" alt=""></a>
			</div>
			<!-- /Logo -->
			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon"><span></span><span></span><span></span></span>
			</a>
			<!-- Header Title -->
			<div class="page-title-box">
				<h3><?php echo e(Auth::user()->name); ?></h3>
			</div>
			<!-- /Header Title -->
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			<!-- Header Menu -->
			<ul class="nav user-menu">
				<!-- Search -->
				<li class="nav-item">
					<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search"> <i class="fa fa-search"></i> </a>
						<form action="search.html">
							<input class="form-control" type="text" placeholder="Search here">
							<button class="btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</li>


                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-comment-o"></i>
                        <span class="badge badge-pill"><?php echo e(Auth::user()->unreadNotifications->count()); ?></span>  <!-- Dynamic unread count -->
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti" id="clear-notifications">Clear All</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- Loop through unread notifications -->
                                    <li class="notification-message">
                                        <a href="<?php echo e(route('home', $notification->id)); ?>" class="notification-link">  <!-- Link to mark as read -->
                                            <div class="list-item">
                                                <div class="list-left">
                                                    <span class="avatar">
                                                        <img alt="Avatar" src="<?php echo e(asset('assets/img/profiles/avatar-09.jpg')); ?>"> <!-- Employee avatar -->
                                                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <span class="message-author"><?php echo e($notification->data['employee_name']); ?></span> <!-- Employee name -->
                                                    <span class="message-time"><?php echo e($notification->created_at->diffForHumans()); ?></span> <!-- Time difference -->
                                                    <div class="clearfix"></div>
                                                    <span class="message-content">Leave Request: <?php echo e($notification->data['leave_category']); ?> from <?php echo e($notification->data['from_date']); ?> to <?php echo e($notification->data['to_date']); ?></span> <!-- Notification content -->
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="<?php echo e(route('home')); ?>">View all Notifications</a> <!-- Link to view all notifications -->
                        </div>
                    </div>
                </li>


				<!-- /Search -->
				<!-- Flag -->
				<!-- /Message Notifications -->
				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img">
						<img src="<?php echo e(URL::to('/assets/images/'. Auth::user()->avatar)); ?>" >
						<span class="status online"></span></span>
						<span><?php echo e(Auth::user()->name); ?></span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo e(url('employee/profile/'.Auth::user()->rec_id)); ?>">My Profile</a>
						<a class="dropdown-item" href="<?php echo e(url('change/password')); ?>">Setting</a>

						<a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
					</div>
				</li>
			</ul>
			<!-- /Header Menu -->
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-ellipsis-v"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="profile.html">My Profile</a>
					<a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
				</div>
			</div>
			<!-- /Mobile Menu -->
		</div>
		<!-- /Header -->
		<!-- Sidebar -->
		
		<!-- /Sidebar -->
		<!-- Page Wrapper -->
		<?php echo $__env->yieldContent('content'); ?>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="<?php echo e(URL::to('assets/js/jquery-3.5.1.min.js')); ?>"></script>
	<!-- Bootstrap Core JS -->
	<script src="<?php echo e(URL::to('assets/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/js/bootstrap.min.js')); ?>"></script>
	<!-- Chart JS -->
	<script src="<?php echo e(URL::to('assets/plugins/morris/morris.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/plugins/raphael/raphael.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/js/chart.js')); ?>"></script>
	<!-- Slimscroll JS -->
	<script src="<?php echo e(URL::to('assets/js/jquery.slimscroll.min.js')); ?>"></script>
	<!-- Select2 JS -->
	<script src="<?php echo e(URL::to('assets/js/select2.min.js')); ?>"></script>
	<!-- Datetimepicker JS -->
	<script src="<?php echo e(URL::to('assets/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
	<!-- Datatable JS -->
	<script src="<?php echo e(URL::to('assets/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(URL::to('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
	<!-- Multiselect JS -->
	<script src="<?php echo e(URL::to('assets/js/multiselect.min.js')); ?>"></script>
	<!-- Custom JS -->
	<script src="<?php echo e(URL::to('assets/js/app.js')); ?>"></script>

	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HR\resources\views/layouts/master.blade.php ENDPATH**/ ?>