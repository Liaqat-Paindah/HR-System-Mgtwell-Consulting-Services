<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        * {
            font-family: Calibri, sans-serif;
            font-size: 12px;
        }
        /* Styles for print */
        @media  print {
            body {
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
        .profile-img img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .profile-info-left h3, .profile-info-left h6, .profile-info-left p {
            margin: 0;
        }
        .personal-info {
            width: 100%;
            border-collapse: collapse;
        }
        .personal-info th, .personal-info td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .personal-info th {
            text-align: left;
            background-color: #f2f2f2;
        }
        .profile-img img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

    </style>
</head>
<body>
    <div>
        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                              <!-- <div class="profile-img">
                                                    <img src="<?php echo e(URL::to('/assets/images/'. $users->profile)); ?>" alt="Profile Image">
                                                </div>-->
                                                <h3 class="user-name mt-2 mb-0"><?php echo e($users->name); ?> <?php echo e($users->fname); ?></h3>
                                                <h6 class=" nid"> Tazkira || NID: <?php echo e($users->nid); ?></h6>
                                                <p class="text-muted">Position: <?php echo e($users->position); ?></p>
                                                <p class="text-muted">Employee ID: <?php echo e($users->employee_id); ?></p>
                                                <div class="small doj text-muted">Date of Join : <?php echo e($users->created_at); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                    <h3 class="card-title">Personal Information </h3>

                                            <table class="personal-info table">
                                                <tr>
                                                    <th class="dt-details">Phone Number:</th>
                                                    <td class="dt-contents"><?php echo e($users->phone); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Email:</th>
                                                    <td class="dt-contents"><?php echo e($users->email); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">birthDate:</th>
                                                    <td class="dt-contents"><?php echo e($users->birth_date); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Gender:</th>
                                                    <td class="dt-contents"><?php echo e($users->gender); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Blood Group:</th>
                                                    <td class="dt-contents"><?php echo e($users->blood_group); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Account Number:</th>
                                                    <td class="dt-contents"><?php echo e($users->account_number); ?></td>
                                                </tr>

                                                <tr>
                                                    <th class="dt-details">Project:</th>
                                                    <td class="dt-contents"><?php echo e($users->project); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Work Station:</th>
                                                    <td class="dt-contents"><?php echo e($users->work_station); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">current_address :</th>
                                                    <td class="dt-contents"><?php echo e($users->current_address); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Gross Salary:</th>
                                                    <td class="dt-contents"><?php echo e($users->gross_salary); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Tax:</th>
                                                    <td class="dt-contents"><?php echo e($users->tax); ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="dt-details">Net Salary:</th>
                                                    <td class="dt-contents"><?php echo e($users->net_salary); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HRS\resources\views/form/employee_pdf.blade.php ENDPATH**/ ?>