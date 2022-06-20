<div class="card-body">
    <h5 class="card-title"><?php echo app('translator')->get($field->label); ?></h5>
    <div class="py-2 lead">
        <?php if($formModel->customer): ?>
            <a href="<?php echo e(admin_url('customers/preview/'.$formModel->customer_id)); ?>"><?php echo e($formModel->customer_name); ?></a>
        <?php else: ?>
            <?php echo e($formModel->customer_name); ?>

        <?php endif; ?>
    </div>
    <div class="py-2">
        <i class="fa fa-envelope fa-fw text-muted"></i>&nbsp;&nbsp;
        <?php echo e($formModel->email); ?>

    </div>
    <?php if($formModel->telephone): ?>
        <div class="py-2">
            <i class="fa fa-phone fa-fw text-muted"></i>&nbsp;&nbsp;
            <?php echo e($formModel->telephone); ?>

        </div>
    <?php endif; ?>
</div>
<?php if($formModel->isDeliveryType() && $formModel->address): ?>
    <div class="card-body border-top">
        <h5 class="card-title"><?php echo app('translator')->get('admin::lang.orders.label_delivery_address'); ?></h5>
        <div class="py-2">
            <?php echo format_address($formModel->address->toArray()); ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/orders/form/field_customer.blade.php ENDPATH**/ ?>