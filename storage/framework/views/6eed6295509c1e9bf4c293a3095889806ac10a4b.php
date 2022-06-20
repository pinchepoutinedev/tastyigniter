<div
    class="input-group control-colorpicker"
    data-control="colorpicker"
    data-swatches-colors='<?php echo json_encode($availableColors, 15, 512) ?>'
    data-use-alpha="<?php echo e($showAlpha ? 'true' : 'false'); ?>"
>
    <div class="component input-group-text"><i class="fa fa-square"></i></div>
    <input
        type="text"
        id="<?php echo e($this->getId('input')); ?>"
        name="<?php echo e($name); ?>"
        class="form-control"
        value="<?php echo e($value); ?>"
        <?php echo ($this->disabled || $this->previewMode) ? 'disabled="disabled"' : ''; ?>

        <?php echo ($this->readOnly) ? 'readonly="readonly"' : ''; ?>

    />
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/colorpicker/colorpicker.blade.php ENDPATH**/ ?>