<div class="table-responsive">
    <table class="table mb-0">
        <thead>
        <tr>
            <th width="65%" class="border-top-0"><?php echo app('translator')->get('admin::lang.orders.column_name_option'); ?></th>
            <th class="text-center border-top-0"><?php echo app('translator')->get('admin::lang.orders.column_quantity'); ?></th>
            <th class="text-left border-top-0"><?php echo app('translator')->get('admin::lang.orders.column_price'); ?></th>
            <th class="text-right border-top-0"><?php echo app('translator')->get('admin::lang.orders.column_total'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $model->getOrderMenusWithOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><b><?php echo e($menuItem->name); ?></b>
                    <?php $menuItemOptionGroup = $menuItem->menu_options->groupBy('order_option_category') ?>
                    <?php if($menuItemOptionGroup->isNotEmpty()): ?>
                        <ul class="list-unstyled mb-0 mt-2">
                            <?php $__currentLoopData = $menuItemOptionGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemOptionGroupName => $menuItemOptions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <u class="text-muted"><?php echo e($menuItemOptionGroupName); ?>:</u>
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = $menuItemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if($menuItemOption->quantity > 1): ?>
                                                    <?php echo e($menuItemOption->quantity); ?>x
                                                <?php endif; ?>
                                                <?php echo e($menuItemOption->order_option_name); ?>&nbsp;
                                                <?php if($menuItemOption->order_option_price > 0): ?>
                                                    (<?php echo e(currency_format($menuItemOption->quantity * $menuItemOption->order_option_price)); ?>)
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty($menuItem->comment)): ?>
                        <p class="font-weight-bold"><?php echo e($menuItem->comment); ?></p>
                    <?php endif; ?>
                </td>
                <td class="text-center"><?php echo e($menuItem->quantity); ?></td>
                <td class="text-left"><?php echo e(currency_format($menuItem->price)); ?></td>
                <td class="text-right"><b><?php echo e(currency_format($menuItem->subtotal)); ?></b></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="border-top p-0" colspan="99999"></td>
        </tr>
        <?php $__currentLoopData = $model->getOrderTotals(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($model->isCollectionType() && $total->code == 'delivery') continue; ?>
            <?php $thickLine = ($total->code == 'order_total' || $total->code == 'total') ?>
            <tr>
                <td
                    class="<?php echo e(($loop->iteration !== 1) ? 'border-top-0' : ''); ?> text-muted text-left"
                >
                    <?php echo e($total->title); ?>

                    <?php if($total->code == 'subtotal'): ?>
                        <span class="text-muted">(<?php echo e($formModel->total_items); ?> <?php echo app('translator')->get('admin::lang.orders.label_total_items'); ?>)</span>
                    <?php endif; ?>
                </td>
                <td class="<?php echo e(($loop->iteration !== 1) ? 'border-top-0' : ''); ?>"></td>
                <td class="<?php echo e(($loop->iteration !== 1) ? 'border-top-0' : ''); ?>"></td>
                <td
                    class="<?php echo e(($loop->iteration !== 1) ? 'border-top-0' : ''); ?> font-weight-bold text-right"
                ><?php echo e(currency_format($total->value)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/orders/form/order_menus.blade.php ENDPATH**/ ?>