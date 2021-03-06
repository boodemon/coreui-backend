<?php $__env->startSection('content'); ?>
    <div class="card">
      <div class="card-header">
        <i class="fa fa-user"></i> Language setting
        <div class="pull-right">
            <button type="button" id="btn-new" data-id="0" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New</button>
            <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </div>
      
      <div class="card-body">
        <table class="table table-sm table-data table-bordered">
          <thead>
            <tr>
                <th class="w20"><input type="checkbox" id="checkAll"/></th>
                <th class="w120">Code</th>
                <th class="">Name</th>
                <th class="w80">Action</th>
            </tr>
          </thead>
          <tbody>
              <?php if($rows ): ?>
                <?php foreach( $rows as $row ): ?>
                <tr>                    
                    <td class="text-center">
                        <input type="checkbox" class="checkboxAll" value="<?php echo e($row->id); ?>" >
                    </td>
                    <td><?php echo e($row->code); ?></td>
                    <td><?php echo e($row->name); ?></td>
                    <td class="action">
                        <a title="Edit" class="text-primary onEdit" href="#" data-id="<?php echo e($row->id); ?>" ><i class="icon-note"></i></a>
                        <a title="Delete" class="text-danger onDelete" data-id="<?php echo e($row->id); ?>" ><i class="icon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
              <?php endif; ?>
          </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('backend.language.modal-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('public/build/js/backend-language-index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>