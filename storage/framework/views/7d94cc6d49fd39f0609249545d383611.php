<div class="d-sm-flex">
    <?php if($location->hasMedia('thumb')): ?>
        <div class="w-sm-25 d-none d-sm-block me-sm-4">
            <img
                class="img-fluid"
                src="<?php echo e($location->getThumb()); ?>"
            >
        </div>
    <?php endif; ?>

    <div class="">
        <dl class="no-spacing mb-0">
            <dd><h2 class="h4 mb-0 fw-normal"><?php echo e($location->location_name); ?></h2></dd>
            <dd>
                <span class="text-muted text-truncate"><?php echo format_address($location->getAddress(), FALSE); ?></span>
            </dd>
            <dd><?php echo e($location->location_telephone); ?></dd>
            <dd>
                <a
                    href="<?php echo e(page_url('local/menus', ['location' => $location->permalink_slug])); ?>"
                ><?php echo app('translator')->get('main::lang.menu_menu'); ?></a>
            </dd>
        </dl>
    </div>

</div>

