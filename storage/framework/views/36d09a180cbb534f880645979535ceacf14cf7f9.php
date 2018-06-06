<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $__env->make('backend.layouts.inc-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('stylesheet'); ?>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<?php echo $__env->make('backend.layouts.inc-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="app-body">
    <?php echo $__env->make('backend.layouts.inc-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Main content -->
    <main class="main">
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
          <?php if( $_breadcrumb != 'Dashboard' ): ?>
          <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a></li>
          <?php echo Lib::bcm( $_breadcrumb ); ?>

          <?php else: ?>
          <li class="breadcrumb-item active">Dashboard</li>
          <?php endif; ?>
          <li class="top-search">
              <?php echo $__env->yieldContent('top-search'); ?>
          </li>
        </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
        <?php echo $__env->yieldContent('content'); ?>
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>
  </div>
<?php echo $__env->make('backend.layouts.inc-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('modal'); ?>;
<?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>