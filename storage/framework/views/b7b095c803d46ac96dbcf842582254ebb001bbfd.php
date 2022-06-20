<?php
    $fieldOptions = $field->options();
    $checkedValues = (array)$field->value;
?>
<div class="field-checkbox">
    <?php $__empty_1 = true; $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $checkboxId = 'checkbox_'.$field->getId().'_'.$loop->iteration;
            if (is_string($option)) $option = [$option];
            $checkboxLabel = is_lang_key($option[0]) ? lang($option[0]) : $option[0];
        ?>
        <div
            id="<?php echo e($field->getId()); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-check form-check-inline' => $checkboxLabel]) ?>"
        >
            <input
                type="checkbox"
                id="<?php echo e($checkboxId); ?>"
                class="form-check-input"
                name="<?php echo e($field->getName()); ?>[]"
                value="<?php echo e($value); ?>"
                <?php echo in_array($value, $checkedValues) ? 'checked="checked"' : ''; ?>

                <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                <?php echo $field->getAttributes(); ?>

            />
            <?php if($checkboxLabel): ?>
                <label
                    class="form-check-label"
                    for="<?php echo e($checkboxId); ?>"
                ><?php echo e($checkboxLabel); ?></label>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <input
            type="hidden"
            name="<?php echo e($field->getName()); ?>"
            value="0"
            <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>>

        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-check form-check-inline' => $field->placeholder]) ?>"
            class="form-check"
        >
            <input
                type="checkbox"
                class="form-check-input"
                id="<?php echo e($field->getId()); ?>"
                name="<?php echo e($field->getName()); ?>"
                value="1"
                <?php echo $this->previewMode ? 'disabled="disabled"' : ''; ?>

                <?php echo $field->value == 1 ? 'checked="checked"' : ''; ?>

                <?php echo $field->getAttributes(); ?>

            />
            <?php if($field->placeholder): ?>
                <label class="form-check-label" for="<?php echo e($field->getId()); ?>"><?php echo app('translator')->get($field->placeholder); ?></label>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/widgets/form/field_checkbox.blade.php ENDPATH**/ ?>