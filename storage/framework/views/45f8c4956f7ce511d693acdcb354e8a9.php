<?php if(count($locationInfo->scheduleItems)): ?>
    <div class="px-3">
        <ul class="nav nav-tabs justify-content-center">
            <?php $__currentLoopData = $locationInfo->scheduleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $definition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a
                        role="button"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'active' => $code == $locationInfo->orderType->getCode()]) ?>"
                        data-bs-toggle="tab"
                        data-bs-target="#<?php echo e($code); ?>"
                    ><?php echo app('translator')->get(array_get($definition, 'name')); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="tab-content border-top">
            <?php $__currentLoopData = $locationInfo->scheduleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $schedules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['tab-pane', 'active' => $code == $locationInfo->orderType->getCode()]) ?>"
                    id="<?php echo e($code); ?>"
                    role="tabpanel"
                    aria-labelledby="<?php echo e($code); ?>-tab"
                >
                    <div class="list-group list-group-flush">
                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day => $hours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between">
                                    <div class="text-muted"><?php echo e($day); ?></div>
                                    <div class="text-right text-nowrap text-truncate">
                                        <?php $__empty_1 = true; $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php ($formatted = sprintf('%s-%s', $hour['open'], $hour['close'])); ?>
                                            <span title="<?php echo e($formatted); ?>"><?php echo e($formatted); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <span><?php echo app('translator')->get('igniter.local::default.text_closed'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

