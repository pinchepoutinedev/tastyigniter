<div
    class="components-item"
    data-control="component"
    data-component-alias="<?php echo e($component->alias); ?>"
>
    <div class="btn btn-light text-left p-3 w-100 component<?php echo e($component->fatalError ? ' border-danger' : ''); ?>">
        <div
            class="components-item-info"
            data-component-control="load"
            data-component-context="edit"
        >
            <span class="d-block mb-1"><?php echo app('translator')->get($component->name); ?></span>
            <p class="text-muted text-sm mb-0"><?php echo e($component->description ? lang($component->description) : ''); ?></p>
            <?php if($component->fatalError): ?>
                <p class="text-danger text-sm mb-0"><?php echo e($component->fatalError); ?></p>
            <?php endif; ?>
        </div>
        <div class="components-item-action">
            <a
                role="button"
                class="partial btn btn-light btn-sm mr-1"
                data-component-control="load"
                data-component-context="partial"
                title="<?php echo app('translator')->get('main::lang.components.button_copy_partial'); ?>"
            ><i class="fa fa-file-alt"></i></a>
            <a
                data-component-control="drag"
                class="handle btn btn-light btn-sm mr-1"
                role="button"
            ><i class="fa fa-arrows-alt"></i></a>
            <a
                data-component-control="remove"
                class="remove btn btn-light btn-sm"
                role="button"
                data-prompt="<?php echo app('translator')->get('admin::lang.alert_confirm'); ?>"
                title="<?php echo app('translator')->get('main::lang.components.button_delete'); ?>"
            ><i class="fa fa-trash text-danger"></i></a>
        </div>
    </div>
    <input
        type="hidden"
        name="<?php echo e($this->formField->getName()); ?>[]"
        value="<?php echo e($component->alias); ?>"
    >
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/main/formwidgets/components/component.blade.php ENDPATH**/ ?>