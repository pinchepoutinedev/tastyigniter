<div class="filter-scope select form-group">
    <select
        name="<?php echo e($this->getScopeName($scope)); ?>"
        class="form-select"
        <?php echo $scope->disabled ? 'disabled="disabled"' : ''; ?>

    >
        <option value=""><?php echo app('translator')->get($scope->label); ?></option>
        <?php $options = $this->getSelectOptions($scope->scopeName) ?>
        <?php $__currentLoopData = $options['available']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($key); ?>"
                <?php echo ($options['active'] == $key) ? 'selected="selected"' : ''; ?>

            ><?php echo e((strpos($value, 'lang:') !== false) ? lang($value) : $value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/widgets/filter/scope_select.blade.php ENDPATH**/ ?>