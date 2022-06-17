<div class="form-row">
    <div class="col-md-2 pb-3 pb-md-0">
        <select
            id="<?php echo e($field->getId('type')); ?>"
            name="<?php echo e($field->getName()); ?>[type]"
            class="form-select"
            data-template-control="choose-type"
            data-request="<?php echo e($this->getEventHandler('onChooseFile')); ?>"
            data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_loading'); ?>"
        >
            <?php $__currentLoopData = $templateTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    value="<?php echo e($value); ?>"
                    <?php echo $value == $selectedTemplateType ? 'selected="selected"' : ''; ?>

                ><?php echo app('translator')->get($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-10">
        <div class="input-group">
            <div class="control-selectlist flex-grow-1">
                <select
                    data-control="selectlist"
                    id="<?php echo e($field->getId('file')); ?>"
                    name="<?php echo e($field->getName()); ?>[file]"
                    data-template-control="choose-file"
                    data-request="<?php echo e($this->getEventHandler('onChooseFile')); ?>"
                    data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_loading'); ?>"
                >
                    <?php if($this->placeholder): ?>
                        <option
                            value=""
                        ><?php echo e(sprintf(lang($this->placeholder), strtolower($selectedTypeLabel))); ?></option>
                    <?php endif; ?>
                    <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (!is_array($option)) $option = [$option]; ?>
                        <option
                            <?php echo $value == $selectedTemplateFile ? 'selected="selected"' : ''; ?>

                            <?php if(isset($option[1])): ?> data-<?php echo e(strpos($option[1], '.') ? 'image' : 'icon'); ?>="<?php echo e($option[1]); ?>" <?php endif; ?>
                            value="<?php echo e($value); ?>"
                        ><?php echo e(is_lang_key($option[0]) ? lang($option[0]) : $option[0]); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button
                type="button"
                class="btn btn-outline-default"
                data-bs-toggle="modal"
                data-bs-target="#<?php echo e($this->getId('modal')); ?>"
                data-modal-title="<?php echo e(sprintf(lang($this->addLabel), $selectedTypeLabel)); ?>"
                data-modal-source-action="new"
                data-modal-source-name=""
            ><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo e(sprintf(lang($this->addLabel), $selectedTypeLabel)); ?>

            </button>
            <?php if(!empty($selectedTemplateFile)): ?>
                <button
                    type="button"
                    class="btn btn-outline-default"
                    data-bs-toggle="modal"
                    data-bs-target="#<?php echo e($this->getId('modal')); ?>"
                    data-modal-title="<?php echo e(sprintf(lang($this->editLabel), $selectedTypeLabel)); ?>"
                    data-modal-source-action="rename"
                    data-modal-source-name="<?php echo e($selectedTemplateFile); ?>"
                ><i class="fa fa-pencil"></i>&nbsp;&nbsp;<?php echo e(sprintf(lang($this->editLabel), $selectedTypeLabel)); ?>

                </button>
                <button
                    type="button"
                    class="btn btn-outline-danger"
                    title="<?php echo e(sprintf(lang($this->deleteLabel), $selectedTypeLabel)); ?>"
                    data-request="<?php echo e($this->getEventHandler('onManageSource')); ?>"
                    data-request-data="action: 'delete'"
                    data-request-confirm="<?php echo app('translator')->get('admin::lang.alert_warning_confirm'); ?>"
                    data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_deleting'); ?>"
                ><i class="fa fa-trash"></i></button>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/main/formwidgets/templateeditor/toolbar.blade.php ENDPATH**/ ?>