<div
    id="<?php echo e($field->getId('container')); ?>"
    class="input-group"
>
    <input
        type="text"
        id="<?php echo e($field->getId()); ?>"
        value="<?php echo e($value); ?>"
        placeholder="<?php echo e($field->placeholder); ?>"
        class="form-control"
        autocomplete="off"
        pattern="-?\d+(\.\d+)?"
        maxlength="255"
        disabled
        <?php echo $field->getAttributes(); ?>

    />

    <a
        class="btn btn-outline-default <?php echo e($previewMode ? 'disabled' : ''); ?>"
        data-toggle="record-editor"
        data-handler="<?php echo e($this->getEventHandler('onLoadRecord')); ?>"
    ><?php echo app('translator')->get('admin::lang.stocks.button_manage_stock'); ?></a>
    <a
        class="btn btn-outline-default <?php echo e($previewMode ? 'disabled' : ''); ?>"
        data-toggle="record-editor"
        data-handler="<?php echo e($this->getEventHandler('onLoadHistory')); ?>"
    ><?php echo app('translator')->get('admin::lang.stocks.button_stock_history'); ?></a>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/stockeditor/stockeditor.blade.php ENDPATH**/ ?>