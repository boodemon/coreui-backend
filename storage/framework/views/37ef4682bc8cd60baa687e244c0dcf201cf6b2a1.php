<?php $__env->startSection('top-search'); ?>
    <form class="form-inline" action="<?php echo e(url('backend/content')); ?>" method="GET">
        <div class="form-group mb-2">
          <input type="text"  class="form-control" name="keywords" value="<?php echo e(Request::input('keywords')); ?>" placeholder="Keywords">
        </div>
        <div class="form-group mb-2">
          <select class="form-control" name="group">
              <option value="all">ALL </option>
              <?php echo App\Models\Category::option( $langs[0]->code ,(Request::exists('group') ? Request::input('group') : '')); ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
      <div class="card-header">
        <i class="icon icon-notebook"></i> Contents
        <div class="pull-right">
            <button type="button" id="btn-new" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> New</button>
            <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </div>
      
      <div class="card-body">
        <table class="table table-sm table-data table-bordered">
          <thead>
            <tr>
                <th class="w20"><input type="checkbox" id="checkAll"/></th>
                <th class="w120">Thumbnail</th>
                <th>Subject</th>
                <th class="">Category</th>
                <th class="w120">View</th>
                <th class="w120">Review</th>
                <th class="w120">Last updated</th>
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
                    <td class="">
                        <img class="img-thumbnail" src="<?php echo e(asset('public/images/contents/'. @$row->gallery[0]->attach_file )); ?>" />
                    </td>
                    <td><?php echo e(@$row->subject->$rc); ?></td>
                    <td><?php echo e(@$cate[$row->category_id]['subject']->$rc); ?></td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td><?php echo e(date('d M Y H:i',$row->updated_at)); ?></td>
                    <td class="action">
                        <a title="Edit" class="text-primary onEdit" href="<?php echo e(url('products/content/' . $row->id . '/edit' )); ?>" data-id="<?php echo e($row->id); ?>" ><i class="icon-note"></i></a>
                        <a title="Delete" href="#" class="text-danger onDelete" data-id="<?php echo e($row->id); ?>" ><i class="icon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
              <?php endif; ?>
          </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('public/build/js/content-index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>