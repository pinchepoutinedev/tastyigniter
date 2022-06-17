<div class="nav flex-column">
    <a
        href="<?php echo e(site_url($accountPage)); ?>"
        class="nav-item nav-link <?php echo e(($this->page->getId() == 'account-account') ? 'active fw-bold' : 'text-reset'); ?>"
    ><span class="fa fa-user me-3"></span><?php echo app('translator')->get('igniter.user::default.text_account'); ?></a>
    <a
        href="<?php echo e(site_url($addressPage)); ?>"
        class="nav-item nav-link <?php echo e(($this->page->getId() == 'account-address') ? 'active fw-bold' : 'text-reset'); ?>"
    ><span class="fa fa-book me-3"></span><?php echo app('translator')->get('igniter.user::default.text_address'); ?></a>
    <a
        href="<?php echo e(site_url($ordersPage)); ?>"
        class="nav-item nav-link <?php echo e((in_array($this->page->getId(), ['account-order', 'account-orders'])) ? 'active fw-bold' : 'text-reset'); ?>"
    ><span class="fa fa-list-alt me-3"></span><?php echo app('translator')->get('igniter.user::default.text_orders'); ?></a>
    <a
        href="<?php echo e(site_url($reservationsPage)); ?>"
        class="nav-item nav-link <?php echo e(($this->page->getId() == 'account-reservations') ? 'active fw-bold' : 'text-reset'); ?>"
    ><span class="fa fa-calendar me-3"></span><?php echo app('translator')->get('igniter.user::default.text_reservations'); ?></a>
</div>
