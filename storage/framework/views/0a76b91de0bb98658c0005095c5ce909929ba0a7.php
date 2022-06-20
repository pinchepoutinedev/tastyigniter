<div
    data-control="components"
    data-alias="<?php echo e($this->alias); ?>"
    data-remove-handler="<?php echo e($this->getEventHandler('onRemoveComponent')); ?>"
    data-sortable-container=".components-container"
>
    <div class="components d-flex">
        <div class="components-item components-picker">
            <div
                class="component btn btn-light p-4 h-100"
                data-component-control="load"
                data-component-context="create"
            >
                <b><i class="fa fa-plus"></i></b>
                <p class="text-muted mb-0"><?php echo app('translator')->get($this->prompt); ?></p>
            </div>
        </div>

        <div
            id="<?php echo e($this->getId('container')); ?>"
            class="components-container"
        >
            <?php echo $this->makePartial('container', ['components' => $components]); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/main/formwidgets/components/components.blade.php ENDPATH**/ ?>