<div
    id="<?php echo e($this->getId('area-'.$area->area_id)); ?>"
    class="map-area card bg-light shadow-sm mb-2"
    data-control="area"
    data-area-id="<?php echo e($area->area_id); ?>"
    data-item-index="<?php echo e($index); ?>"
>
    <div
        class="card-body"
        role="tab"
        id="<?php echo e($this->getId('area-header-'.$area->area_id)); ?>"
    >
        <div class="d-flex w-100 justify-content-between">
            <?php if(!$this->previewMode && $sortable): ?>
                <input type="hidden" name="<?php echo e($sortableInputName); ?>[]" value="<?php echo e($area->area_id); ?>">
                <div class="align-self-center">
                    <a
                        class="btn handle <?php echo e($this->getId('areas')); ?>-handle mt-1"
                        role="button">
                        <i class="fa fa-arrows-alt-v text-black-50"></i>
                    </a>
                </div>
            <?php endif; ?>
            <div class="align-self-center mr-3">
                 <span
                     class="badge"
                     style="background-color:<?php echo e($area->color); ?>"
                 >&nbsp;</span>
            </div>
            <div
                class="flex-fill align-self-center mt-1"
                data-control="load-area"
                data-handler="<?php echo e($this->getEventHandler('onLoadArea')); ?>"
                role="button"
            ><b><?php echo e($area->name); ?></b></div>
            <div class="align-self-center ml-auto">
                <a
                    class="close text-danger"
                    aria-label="Remove"
                    role="button"
                    <?php if (! ($this->previewMode)): ?>
                    data-control="remove-area"
                    data-confirm-message="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                    <?php endif; ?>
                ><i class="fa fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/maparea/area.blade.php ENDPATH**/ ?>