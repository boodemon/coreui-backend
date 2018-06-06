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
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-settings"></i> SETTING</a>
          <ul class="nav-dropdown-items">
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