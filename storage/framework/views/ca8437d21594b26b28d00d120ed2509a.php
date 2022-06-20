<div class="panel">
    <?php if(strlen($locationInfo->description)): ?>
        <div class="panel-body">
            <h1
                class="h4 wrap-bottom border-bottom"
            ><?php echo e(sprintf(lang('igniter.local::default.text_info_heading'), $locationInfo->name)); ?></h1>
            <p class="m-0"><?php echo nl2br($locationInfo->description); ?></p>
        </div>
    <?php endif; ?>

    <div class="list-group list-group-flush">
        <?php $__currentLoopData = $locationInfo->orderTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $orderType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="list-group-item">
                <?php if($orderType->isDisabled()): ?>
                    <?php echo $orderType->getDisabledDescription(); ?>

                <?php elseif($orderType->getSchedule()->isOpen()): ?>
                    <?php echo $orderType->getOpenDescription(); ?>

                <?php elseif($orderType->getSchedule()->isOpening()): ?>
                    <?php echo $orderType->getOpeningDescription($openingTimeFormat); ?>

                <?php else: ?>
                    <?php echo $orderType->getClosedDescription(); ?>

                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($locationInfo->hasDelivery): ?>
            <div class="list-group-item">
                <?php echo app('translator')->get('igniter.local::default.text_last_order_time'); ?>&nbsp;
                <b><?php echo e($locationInfo->lastOrderTime->isoFormat($lastOrderTimeFormat)); ?></b>
            </div>
        <?php endif; ?>
        <?php if($locationInfo->payments): ?>
            <div class="list-group-item">
                <i class="fas fa-credit-card fa-fw"></i>&nbsp;<b><?php echo app('translator')->get('igniter.local::default.text_payments'); ?></b><br/>
                <?php echo implode(', ', $locationInfo->payments); ?>.
            </div>
        <?php endif; ?>
    </div>

    <?php echo controller()->renderPartial('@areas'); ?>

    <h4 class="panel-title p-3"><b><?php echo app('translator')->get('igniter.local::default.text_hours'); ?></b></h4>

    <?php echo controller()->renderPartial('@hours'); ?>
</div>


