<div class="table-responsive">
    <table class="table table-borderless mb-0">
        <tbody>
        <?php if($formModel->payment_method): ?>
            <tr>
                <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_payment_method'); ?></td>
                <td class="text-right"><?php echo e($formModel->payment_method->name); ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_invoice'); ?></td>
            <td class="text-right">
                <?php if($formModel->hasInvoice()): ?>
                    <a
                        class="font-weight-bold"
                        href="<?php echo e(admin_url('orders/invoice/'.$formModel->order_id)); ?>"
                        target="_blank"
                    ><?php echo e($formModel->invoice_number); ?></a>
                <?php else: ?>
                    <?php echo e($formModel->invoice_number); ?>

                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_date_added'); ?></td>
            <td class="text-right"><?php echo e($formModel->created_at->isoFormat(lang('system::lang.moment.date_time_format_short'))); ?></td>
        </tr>
        <tr>
            <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_date_modified'); ?></td>
            <td class="text-right"><?php echo e($formModel->updated_at->isoFormat(lang('system::lang.moment.date_time_format_short'))); ?></td>
        </tr>
        <tr>
            <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_ip_address'); ?></td>
            <td class="text-right"><?php echo e($formModel->ip_address); ?></td>
        </tr>
        <tr>
            <td class="text-muted"><?php echo app('translator')->get('admin::lang.orders.label_user_agent'); ?></td>
            <td class="text-right"><?php echo e($formModel->user_agent); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/orders/form/order_details.blade.php ENDPATH**/ ?>