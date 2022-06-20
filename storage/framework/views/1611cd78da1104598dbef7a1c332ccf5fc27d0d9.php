<div class="input-group">
    <input
        type="text"
        id="<?php echo e($this->getId('datetime')); ?>"
        class="form-control"
        autocomplete="off"
        value="<?php echo e($value ? $value->format($formatAlias) : null); ?>"
        <?php echo $field->getAttributes(); ?>

        <?php if($this->previewMode): ?> readonly="readonly" <?php endif; ?>
        data-control="datepicker"
        data-toggle="datetimepicker"
        data-target="#<?php echo e($this->getId('datetime')); ?>"
        data-mode="<?php echo e($this->mode); ?>"
        <?php if($startDate): ?> data-start-date="<?php echo e($startDate); ?>" <?php endif; ?>
        <?php if($endDate): ?> data-end-date="<?php echo e($endDate); ?>" <?php endif; ?>
        <?php if($datesDisabled): ?> data-dates-disabled="<?php echo e($datesDisabled); ?>" <?php endif; ?>
        data-format="<?php echo e($datePickerFormat); ?>"
    />
    <input
        type="hidden"
        name="<?php echo e($field->getName()); ?>"
        value="<?php echo e($value ? $value->format('Y-m-d H:i:s') : null); ?>"
        data-datepicker-value
    />
    <span class="input-group-text"><i class="fa fa-calendar-o"></i></span>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/formwidgets/datepicker/picker_datetime.blade.php ENDPATH**/ ?>