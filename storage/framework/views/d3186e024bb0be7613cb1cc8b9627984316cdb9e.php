<?php if(count($components)): ?>
    <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $this->makePartial('component', [
            'component' => $component,
        ]); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/main/formwidgets/components/container.blade.php ENDPATH**/ ?>