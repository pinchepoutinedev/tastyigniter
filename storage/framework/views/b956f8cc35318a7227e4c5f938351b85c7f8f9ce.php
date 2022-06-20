<?php $__empty_1 = true; $__currentLoopData = $fieldItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php echo $this->makePartial('connector/connector_item', [
        'item' => $fieldItem,
        'index' => $loop->iteration,
    ]); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php echo app('translator')->get($emptyMessage); ?>
<?php endif; ?>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/connector/connector_items.blade.php ENDPATH**/ ?>