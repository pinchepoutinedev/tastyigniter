<div
    class="modal-dialog modal-lg modal-dialog-scrollable"
    role="document"
>
    <?php echo form_open([
        'id' => 'list-recommended-form',
        'role' => 'form',
        'method' => 'PATCH',
    ]); ?>

    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo e(sprintf(lang('system::lang.updates.text_popular_title'), ucwords(str_plural($itemType)))); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <?php if(isset($items) && count($items)): ?>
                <?php $__currentLoopData = $items['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card card-body <?php echo e(empty($item['installed']) ? 'bg-white' : ''); ?> mb-3">
                        <div class="d-flex align-items-center">
                            <div>
                                <span
                                    class="extension-icon rounded pull-left"
                                    style="<?php echo e($item['icon']['styles'] ?? ''); ?>"
                                ><i class="<?php echo e($item['icon']['class'] ?? 'fa fa-paint-brush'); ?>"></i></span>
                            </div>
                            <div class="flex-grow-1 px-3">
                                <b><?php echo e($item['name']); ?></b><span class="small text-muted"> by <?php echo e($item['author']); ?></span>
                                <p class="help-block font-weight-normal"><?php echo e(str_limit($item['description'], 128)); ?></p>
                            </div>
                            <div class="form-check form-switch">
                                <input
                                    type="checkbox"
                                    id="list-recommended-<?php echo e($item['code']); ?>"
                                    class="form-check-input"
                                    name="install_items[<?php echo e($index); ?>]"
                                    value="<?php echo e($item['code']); ?>"
                                    <?php echo e(($itemType != 'theme' || $loop->first) ? 'checked="checked"' : ''); ?>

                                    <?php echo empty($item['installed']) ? '' : 'disabled="disabled"'; ?>

                                />
                                <label
                                    class="form-check-label"
                                    for="list-recommended-<?php echo e($item['code']); ?>"
                                ></label>
                            </div>
                        </div>
                        <input type="hidden" name="items[<?php echo e($index); ?>][name]" value="<?php echo e($item['code']); ?>">
                        <input type="hidden" name="items[<?php echo e($index); ?>][type]" value="<?php echo e($item['type']); ?>">
                        <input type="hidden" name="items[<?php echo e($index); ?>][ver]" value="<?php echo e($item['version']); ?>">
                        <input type="hidden" name="items[<?php echo e($index); ?>][action]" value="install">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-primary"
                data-control="apply-recommended"
            ><?php echo app('translator')->get('system::lang.updates.button_install'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>

</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/system/views/updates/list_recommended.blade.php ENDPATH**/ ?>