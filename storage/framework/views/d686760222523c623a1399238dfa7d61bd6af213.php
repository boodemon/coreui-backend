<?php $__env->startSection('content'); ?>
    <div class="card">
      <div class="card-header">
        <i class="fa fa-train"></i> Rails Groups Form
        <div class="pull-right">
            <button type="button" class="btn btn-sm btn-outline-dark btn-back"><i class="icon-arrow-left"></i> Back</button>
        </div>
      </div>
      
      <div class="card-body">      </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('public/build/js/rail-group-form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>