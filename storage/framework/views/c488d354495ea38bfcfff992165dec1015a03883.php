<?php $__env->startSection('content'); ?>
    <div class="card">
      <div class="card-header">
        <i class="fa fa-train"></i> Rails Groups Setting
        <div class="pull-right">
            <button type="button" id="btn-new" data-id="0" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New</button>
            <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </div>
      
      <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-data table-bordered">
                    <thead>
                        <th class="w20"><input type="checkbox" id="checkAll"/></th>
                        <th>Group Name</th>
                        <th>Station</th>
                        <th class="action">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="action"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

      </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('backend.category.modal-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('public/build/js/rail-group-index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>