

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sidebar.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="page-wrapper">

<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Department</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Department</li>
</ul>
</div>

</div>
</div>
<div class="row">
    <div class="col-sm-12">
    <form action="<?php echo e(url('departmentedit/'.$department->id)); ?>" method="post" enctype="multipart/form-data" >
        <?php echo csrf_field(); ?>
    <div class="form-group">
    <label>Department Name <span class="text-danger">*</span></label>
    <input class="form-control" type="text" required   value="<?php echo e($department->department); ?>" name="name">
    </div>
    <div class="submit-section">
    <button class="btn btn-primary submit-btn">Update</button>
    </div>
    </form>
</div></div>
</div>


</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ardho/hrs.ardho.org/resources/views/department/departmentedit.blade.php ENDPATH**/ ?>