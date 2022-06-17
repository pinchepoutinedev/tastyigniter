<?php echo form_open([
    'id' => 'edit-form',
    'role' => 'form',
    'method' => 'DELETE',
]); ?>


<input type="hidden" name="_handler" value="onDelete">
<div class="toolbar">
    <div class="toolbar-action">
        <button
            type="submit"
            class="btn btn-danger"
            data-request="onDelete"
        ><?php echo app('translator')->get('system::lang.themes.button_yes_delete'); ?></button>
        <a class="btn btn-default" href="<?php echo e(admin_url('themes')); ?>">
            <?php echo app('translator')->get('system::lang.themes.button_return_to_list'); ?>
        </a>
    </div>
</div>

<div class="form-fields flex-column">
    <?php
        $deleteAction = !empty($themeData)
            ? lang('system::lang.themes.text_files_data')
            : lang('system::lang.themes.text_files');
    ?>
    <p><?php echo sprintf(lang('system::lang.themes.alert_delete_warning'), $deleteAction, $themeObj->label); ?></p>
    <p><?php echo e(sprintf(lang('system::lang.themes.alert_delete_confirm'), $deleteAction)); ?></p>

    <?php if($themeData): ?>
        <div class="form-group span-full">
            <label
                for="input-delete-data"
                class="form-label"
            ><?php echo app('translator')->get('system::lang.themes.label_delete_data'); ?></label>
            <br>
            <div id="input-delete-data">
                <input
                    type="hidden"
                    name="delete_data"
                    value="0"
                >
                <div class="form-check form-switch">
                    <input
                        type="checkbox"
                        name="delete_data"
                        id="delete-data"
                        class="form-check-input"
                        value="1"
                    />
                    <label
                        class="form-check-label"
                        for="delete-data"
                    ><?php echo app('translator')->get('admin::lang.text_no'); ?>/<?php echo app('translator')->get('admin::lang.text_yes'); ?></label>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php echo form_close(); ?>

<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/system/views/themes/delete.blade.php ENDPATH**/ ?>