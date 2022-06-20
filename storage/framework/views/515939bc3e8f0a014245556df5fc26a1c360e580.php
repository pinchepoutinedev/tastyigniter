<?php
    $isCheckboxMode = $scope->mode ?? 'checkbox';
    $selectMultiple = $isCheckboxMode == 'checkbox';
    $options = $this->getSelectOptions($scope->scopeName);
    $enableFilter = (count($options['available']) > 20);
?>
<div class="filter-scope selectlist form-group">
    <div class="control-selectlist w-100">
        <select
            data-control="selectlist"
            name="<?php echo e($this->getScopeName($scope).($selectMultiple ? '[]' : '')); ?>"
            <?php echo $scope->disabled ? 'disabled="disabled"' : ''; ?>

            <?php if($scope->label): ?>data-non-selected-text="<?php echo app('translator')->get($scope->label); ?>" <?php endif; ?>
            <?php echo $selectMultiple ? 'multiple="multiple"' : ''; ?>

            data-enable-filtering="<?php echo e($enableFilter); ?>"
            data-enable-case-insensitive-filtering="<?php echo e($enableFilter); ?>"
            data-number-displayed="2"
        >
            <?php if($scope->label): ?><option value=""><?php echo app('translator')->get($scope->label); ?></option><?php endif; ?>
            <?php $__currentLoopData = $options['available']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if (!is_array($options['active'])) $options['active'] = [$options['active']];
                ?>
                <option
                    value="<?php echo e($key); ?>"
                    <?php echo in_array($key, $options['active']) ? 'selected="selected"' : ''; ?>

                ><?php echo e((strpos($value, 'lang:') !== FALSE) ? lang($value) : $value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/widgets/filter/scope_selectlist.blade.php ENDPATH**/ ?>