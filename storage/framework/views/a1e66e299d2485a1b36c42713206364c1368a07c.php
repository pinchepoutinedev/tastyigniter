<div class="row-fluid">
    <?php echo form_open([
        'id'     => 'preview-form',
        'role'   => 'form',
    ]); ?>


    <?php echo $this->renderForm(['preview' => TRUE]); ?>


    <?php echo form_close(); ?>

</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/customers/preview.blade.php ENDPATH**/ ?>