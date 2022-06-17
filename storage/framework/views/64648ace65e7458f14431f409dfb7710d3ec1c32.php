<div class="row-fluid">
    <?php echo form_open([
        'id'     => 'edit-form',
        'role'   => 'form',
        'method' => 'PATCH',
    ]); ?>


    <?php echo $this->renderForm(); ?>


    <?php echo form_close(); ?>

</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/locations/edit.blade.php ENDPATH**/ ?>