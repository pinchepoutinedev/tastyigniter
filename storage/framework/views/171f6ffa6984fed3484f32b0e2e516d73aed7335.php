<?php if(empty($value)): ?>
    <span
        class="label <?php echo e($value ? 'label-default' : ''); ?>"
        style="background-color: <?php echo e($record->status_color); ?>;"
    ><?php echo e($value ?? lang('admin::lang.text_incomplete')); ?></span>
<?php else: ?>
    <div class="dropdown">
        <button
            class="btn font-weight-bold p-0 dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            style="border-bottom: 1px dashed;color: <?php echo e($record->status_color); ?>;"
        ><?php echo e($value ?? lang('admin::lang.text_incomplete')); ?></button>
        <div class="dropdown-menu">
            <?php $__currentLoopData = $statusesOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($record->status_id == $index) continue; ?>
                <a
                    class="dropdown-item"
                    data-request="onUpdateStatus"
                    data-request-data="recordId: '<?php echo e($record->getKey()); ?>', statusId: '<?php echo e($index); ?>'"
                ><?php echo e($value); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/statuses/form/status_column.blade.php ENDPATH**/ ?>