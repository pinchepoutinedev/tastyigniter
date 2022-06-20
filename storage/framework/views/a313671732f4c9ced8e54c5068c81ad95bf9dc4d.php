<div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo app('translator')->get($title); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body text-center">
            <span class="fa-stack fa-3x text-muted">
                <i class="fa-solid fa-circle fa-stack-2x"></i>
                <i class="fa-solid fa-arrow-up fa-stack-1x fa-inverse"></i>
            </span>
            <p class="lead mt-4"><?php echo e($message); ?></p>
        </div>
        <div class="modal-footer progress-indicator-container">
            <button
                type="button"
                class="btn btn-link"
                data-bs-dismiss="modal"
            ><?php echo app('translator')->get('admin::lang.button_close'); ?></button>
            <?php if(isset($language->code)): ?>
                <button
                    type="button"
                    id="apply-updates"
                    class="btn btn-primary"
                    data-progress-indicator="<?php echo app('translator')->get('admin::lang.text_loading'); ?>"
                ><?php echo app('translator')->get('system::lang.languages.button_apply_update'); ?></button>
            <?php endif; ?>
        </div>
    </div>
    <?php echo form_close(); ?>

</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/system/views/languages/updates.blade.php ENDPATH**/ ?>