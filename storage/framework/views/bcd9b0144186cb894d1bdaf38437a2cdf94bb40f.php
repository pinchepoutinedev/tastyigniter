<div class="form-fields p-0">
    <input type="hidden" name="context" value="<?php echo e($this->isStatusMode ? 'status' : 'assignee'); ?>">
    <?php $__currentLoopData = $formWidget->getFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $formWidget->renderField($field); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/statuseditor/fields.blade.php ENDPATH**/ ?>