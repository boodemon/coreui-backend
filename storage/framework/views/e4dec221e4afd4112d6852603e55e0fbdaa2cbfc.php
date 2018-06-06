<?php $__env->startSection('content'); ?>
<form enctype="multipart/form-data" class="form-horizontal" id="frm-user" method="POST" action="<?php echo e(url('data/exchange')); ?>">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
<div class="card">
    <div class="card-header">
        <i class="fa fa-user"></i> Exchange Rate
        <div class="pull-right">
            <button type="submit" id="btn-new" data-id="0" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> UPDATE</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-data table-bordered">
          <thead>
            <tr>
                <th class="">MONEY</th>
                <th class="">THB Exchange Rate</th>
                <th class="w120">Append</th>
                <th class="w120">Operation</th>
                <th class="w120">Amount</th>
                <th class="w160">Last Update</th>
            </tr>
            </thead>
            <tbody>
                <?php if( $moneys ): ?>
                <?php foreach( $moneys as $money => $text ): ?>
                <?php 
                    $current = isset( $aps->$money ) ? $aps->$money : false;
                    $code    = strtoupper($money) .'/THB';
                    $rate    = $current ? $current->money_value : \Swap::latest( $code )->getValue();
                    $op      = $current ? $current->operation:'plus';
                    $append  = $current ? $current->money_append : 0;
                    $row = App\Models\Exchange::where('money_code',$money)->first();
                ?>
                    <tr>
                        <td class="text-center"><?php echo e($text); ?></td>
                        <td class="text-right"><?php echo e(Lib::nb($rate,2)); ?></td>
                        <td>
                            <input type="text" class="form-control text-center" name="money[<?php echo e($money); ?>]" value=" <?php echo e($append); ?>" />
                            <input type="hidden"  name="rate[<?php echo e($money); ?>]" value=" <?php echo e($rate); ?>" />
                        </td>
                        <td class="text-center">
                            <select name="operation[<?php echo e($money); ?>]" class="form-control text-center">
                                <option value="plus" <?php echo e($op == 'plus' ? 'selected' : ''); ?>>+</option>
                                <option value="mul"  <?php echo e($op == 'mul'  ? 'selected' : ''); ?>>x</option>
                                <option value="per"  <?php echo e($op == 'per'  ? 'selected' : ''); ?>>%</option>
                            </select>
                        </td>
                        <td class="text-right"><?php echo e(Lib::nb( Lib::exRate($op,$rate,$append) ,2)); ?></td>
                        <td class="text-right"><?php echo e($current ? date('d M Y H:i', strtotime($current->updated_at) ) : 0); ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>