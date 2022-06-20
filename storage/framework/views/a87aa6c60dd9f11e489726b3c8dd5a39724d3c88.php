<div class="d-flex">
    <div class="mr-3 flex-fill">
        <label class="form-label">
            <?php echo app('translator')->get('admin::lang.orders.label_order_id'); ?>
        </label>
        <h3>#<?php echo e($formModel->order_id); ?></h3>
    </div>
    <div class="mr-3 flex-fill text-center">
        <label class="form-label">
            <?php echo app('translator')->get('admin::lang.orders.label_order_type'); ?>
        </label>
        <h3><?php echo e($formModel->order_type_name); ?></h3>
    </div>
    <div class="mr-3 flex-fill text-center">
        <label class="form-label">
            <?php echo app('translator')->get('admin::lang.orders.label_order_date_time'); ?>
        </label>
        <h3>
            <?php echo e($formModel->order_date_time->isoFormat(lang('system::lang.moment.date_time_format_short'))); ?>

            <?php if($formModel->order_time_is_asap): ?>
                <span class="small text-muted">(<?php echo app('translator')->get('admin::lang.orders.text_asap'); ?>)</span>
            <?php endif; ?>
        </h3>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/orders/form/info.blade.php ENDPATH**/ ?>