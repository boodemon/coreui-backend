<div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('dashboard')); ?>"><i class="icon-speedometer"></i> Dashboard </a>
          </li>

          <li class="nav-title">
            UI Elements
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-settings"></i> PRODUCTS</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('products/category')); ?>"><i class="icon-arrow-right"></i> CATEGORY</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(url('products/content')); ?>"><i class="icon-arrow-right"></i> CONTENTS</a>
              </li>
            </ul>
          </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-folder-alt"></i> Data</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('data/carrier')); ?>"><i class="icon-arrow-right"></i> Carrier info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo e(url('data/inter')); ?>" ><i class="icon-arrow-right"></i> International code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo e(url('data/service-code')); ?>" ><i class="icon-arrow-right"></i> Service code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo e(url('data/exchange')); ?>" ><i class="icon-arrow-right"></i> Money Exchange</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo e(url('data/rail-groups')); ?>" ><i class="icon-arrow-right"></i> Rail Groups</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo e(url('payment')); ?>"><i class="icon-wallet"></i> Payments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo e(url('report')); ?>"><i class="icon-basket-loaded"></i> Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo e(url('member')); ?>"><i class="icon-people"></i> Member</a>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-settings"></i> SETTING</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('setting/language')); ?>"><i class="icon-arrow-right"></i> LANGUAGE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('setting/user')); ?>"><i class="icon-arrow-right"></i> ADMINISTRATORS</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo e(url('logout')); ?>"><i class="icon-logout"></i> ออกจากระบบ</a>
        </li>        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>