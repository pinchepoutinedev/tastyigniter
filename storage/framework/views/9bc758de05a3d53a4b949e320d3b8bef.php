<?php $__currentLoopData = $locationsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locationObject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a
        class="card w-100 p-3 mb-2"
        href="<?php echo e(page_url('local/menus', ['location' => $locationObject->permalink])); ?>"
    >
        <div class="boxes d-sm-flex g-0">
            <div class="col-12 col-sm-7">
                <div class="d-sm-flex">
                    <?php if($locationObject->hasThumb): ?>
                        <div class="col-sm-3 p-0 me-sm-4 mb-3 mb-sm-0">
                            <img
                                class="img-fluid img-fluid"
                                src="<?php echo e($locationObject->thumb); ?>"
                            />
                        </div>
                    <?php endif; ?>
                    <dl class="no-spacing">
                        <dd><h2 class="h5 mb-0 text-body"><?php echo e($locationObject->name); ?></h2></dd>
                        <?php if($showReviews): ?>
                            <dd>
                                <div class="rating rating-sm text-muted">
                                    <?php $reviewScore = $locationObject->reviewsScore ?> <?php for($value = 1; $value<6; $value++): ?>
                                        <span class="fa fa-star<?php echo e($value > $reviewScore ? '-o' : ''); ?>"></span>
                                    <?php endfor; ?>
                                    <span class="small">(<?php echo e($locationObject->reviewsCount ?? 0); ?>)</span>
                                </div>
                            </dd>
                        <?php endif; ?>
                        <dd class="d-none">
                        <span
                            class="text-muted text-truncate"><?php echo format_address($locationObject->address); ?></span>
                        </dd>
                        <?php if($locationObject->distance): ?>
                            <dd>
                                <span
                                    class="text-muted small"
                                ><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo e(number_format($locationObject->distance, 1)); ?> <?php echo e($distanceUnit); ?></span>
                            </dd>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <dl class="no-spacing">
                    <?php if($locationObject->openingSchedule->isOpen()): ?>
                        <dt><?php echo app('translator')->get('igniter.local::default.text_is_opened'); ?></dt>
                    <?php elseif($locationObject->openingSchedule->isOpening()): ?>
                        <dt class="text-muted"><?php echo sprintf(lang('igniter.local::default.text_opening_time'), $locationObject->openingTime->isoFormat($openingTimeFormat)); ?></dt>
                    <?php else: ?>
                        <dt class="text-muted"><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></dt>
                    <?php endif; ?>
                    <?php $__currentLoopData = $locationObject->orderTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $orderType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <dd class="text-muted">
                            <?php if($orderType->isDisabled()): ?>
                                <?php echo $orderType->getDisabledDescription(); ?>

                            <?php elseif($orderType->getSchedule()->isOpen()): ?>
                                <?php echo $orderType->getOpenDescription(); ?>

                            <?php elseif($orderType->getSchedule()->isOpening()): ?>
                                <?php echo $orderType->getOpeningDescription($openingTimeFormat); ?>

                            <?php else: ?>
                                <?php echo $orderType->getClosedDescription(); ?>

                            <?php endif; ?>
                        </dd>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </dl>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

