<div
    id="<?php echo e($this->getId('items-container')); ?>"
    class="field-connector"
    data-control="connector"
    data-alias="<?php echo e($this->alias); ?>"
    data-sortable-container="#<?php echo e($this->getId('items')); ?>"
    data-sortable-handle=".<?php echo e($this->getId('items')); ?>-handle"
    data-editable="<?php echo e(($this->previewMode || !$this->editable) ? 'false' : 'true'); ?>"
>
    <div
        id="<?php echo e($this->getId('items')); ?>"
        role="tablist"
        aria-multiselectable="true">
        <?php echo $this->makePartial('connector/connector_items'); ?>

    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/connector/connector.blade.php ENDPATH**/ ?>