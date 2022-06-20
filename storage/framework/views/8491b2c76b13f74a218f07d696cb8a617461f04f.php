<div
    id="<?php echo e($this->getId('items-container')); ?>"
    class="field-translationseditor"
    data-control="translationseditor"
    data-alias="<?php echo e($this->alias); ?>"
>
    <label
        for="<?php echo e($this->getId('items')); ?>"
    ><?php echo e(sprintf(lang('system::lang.languages.text_locale_strings'), $translatedProgress, $totalStrings)); ?></label>
    <div
        id="<?php echo e($this->getId('items')); ?>"
        class="table-responsive"
    >
        <table class="table mb-0 border-bottom">
            <thead>
            <tr>
                <th width="45%"><?php echo app('translator')->get('system::lang.languages.column_variable'); ?></th>
                <th><?php echo e(sprintf(lang('system::lang.languages.column_language'), $this->model->name)); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if($field->options && $field->options->count()): ?>
                <?php $__currentLoopData = $field->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <p><?php echo e($value['source']); ?></p>
                            <span class="text-muted"><?php echo e($key); ?></span>
                        </td>
                        <td>
                            <input
                                type="hidden"
                                name="<?php echo e($field->getName()); ?>[<?php echo e($key); ?>][source]"
                                value="<?php echo e($value['source']); ?>"
                            />
                            <textarea
                                class="form-control"
                                rows="3"
                                name="<?php echo e($field->getName()); ?>[<?php echo e($key); ?>][translation]"
                            ><?php echo $value['translation']; ?></textarea>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-top">
                    <td colspan="999">
                        <div class="d-flex justify-content-end">
                            <?php echo $field->options->render(); ?>

                        </div>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="99" class="text-center"><?php echo app('translator')->get('system::lang.languages.text_empty_translations'); ?>
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/system/views/languages/translationseditor.blade.php ENDPATH**/ ?>