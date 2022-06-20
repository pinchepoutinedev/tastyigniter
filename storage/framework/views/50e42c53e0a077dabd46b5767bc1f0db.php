<h2 class="h4 mb-0 fw-normal"><?php echo app('translator')->get('igniter.cart::default.checkout.text_order_details'); ?></h2>

<div class="cart-items pt-2">
    <ul>
        <?php $__currentLoopData = $order->getOrderMenusWithOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <span class="price pull-right"><?php echo e(currency_format($orderItem->subtotal)); ?></span>
                <span class="name fw-bold">
                    <?php if($orderItem->quantity > 1): ?>
                        <span class="quantity">
                            <?php echo e($orderItem->quantity); ?> <?php echo app('translator')->get('igniter.cart::default.text_times'); ?>
                        </span>
                    <?php endif; ?>
                    <?php echo e($orderItem->name); ?>

                </span>
                <?php $itemOptionGroup = $orderItem->menu_options->groupBy('order_option_category') ?>
                <?php if($itemOptionGroup->isNotEmpty()): ?>
                    <ul class="list-unstyled small">
                        <?php $__currentLoopData = $itemOptionGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemOptionGroupName => $itemOptions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <u class="text-muted"><?php echo e($itemOptionGroupName); ?>:</u>
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $itemOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php if($itemOption->quantity > 1): ?>
                                                <?php echo e($itemOption->quantity); ?> <?php echo app('translator')->get('igniter.cart::default.text_times'); ?>
                                            <?php endif; ?>
                                            <?php echo e($itemOption->order_option_name); ?>&nbsp;
                                            <?php if($itemOption->order_option_price > 0): ?>
                                                (<?php echo e(currency_format($itemOption->quantity * $itemOption->order_option_price)); ?>)
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
                <?php if(!empty($orderItem->comment)): ?>
                    <p class="comment text-muted small">
                        <?php echo $orderItem->comment; ?>

                    </p>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<div class="cart-totals">
    <div class="table-responsive">
        <table class="table table-sm mb-0">
            <tbody>
            <tr>
                <td class="border-top p-0" colspan="99999"></td>
            </tr>
            <?php $__currentLoopData = $order->getOrderTotals(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderTotal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($order->isCollectionType() && $orderTotal->code == 'delivery') continue; ?>
                <?php ($thickLine = ($orderTotal->code == 'order_total' || $orderTotal->code == 'total')); ?>
                <?php if(!$thickLine && !$orderTotal->is_summable) continue; ?>
                <tr>
                    <td class="px-0 <?php echo e($thickLine ? 'border-top lead fw-bold' : 'text-muted border-0'); ?>">
                        <?php echo e($orderTotal->title); ?>

                    </td>
                    <td class="text-right px-0 <?php echo e($thickLine ? 'border-top lead fw-bold' : 'border-0'); ?>">
                        <?php echo e(currency_format($orderTotal->value)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

