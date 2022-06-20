<div
    id="<?php echo e($tableId); ?>"
    data-control="table"
    class="control-table"
    data-columns='<?php echo json_encode($columns, 15, 512) ?>'
    data-alias="<?php echo e($tableAlias); ?>"
    data-data="<?php echo e($data); ?>"
    data-data-field="<?php echo e($recordsKeyFrom); ?>"
    data-dynamic-height="<?php echo e($dynamicHeight); ?>"
    data-field-name="<?php echo e($tableAlias); ?>"
    data-height="<?php echo e($height); ?>"
    data-page-size="<?php echo e($pageLimit); ?>"
    data-pagination="<?php echo e($showPagination ? 'true' : 'false'); ?>"
    data-use-ajax="<?php echo e($useAjax ? 'true' : 'false'); ?>"
    <?php echo $this->getAttributes(); ?>

></div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/widgets/table/table.blade.php ENDPATH**/ ?>