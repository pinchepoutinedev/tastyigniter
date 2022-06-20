<?php echo form_open([
    'id' => 'checkout-form',
    'role' => 'form',
    'method' => 'POST',
    'data-handler' => $confirmCheckoutEventHandler,
]); ?>


<?php echo controller()->renderPartial('@customer_fields'); ?>

<?php if($order->isDeliveryType()): ?>
    <?php echo controller()->renderPartial('@address_fields'); ?>
<?php endif; ?>

<div data-partial="checkoutPayments">
    <?php echo controller()->renderPartial('@payments'); ?>
</div>

<div class="form-group">
    <label for="comment"><?php echo app('translator')->get('igniter.cart::default.checkout.label_comment'); ?></label>
    <textarea
        name="comment"
        id="comment"
        rows="3"
        class="form-control"
    ><?php echo set_value('comment', $order->comment); ?></textarea>
</div>

<?php if($agreeTermsSlug): ?>
    <div class="form-group">
        <div class="form-check">
            <input
                id="terms-condition"
                type="checkbox"
                name="terms_condition"
                value="1"
                class="form-check-input" <?php echo set_checkbox('terms_condition', '1'); ?>

            >
            <label class="form-check-label ms-2" for="terms-condition">
                <?php echo sprintf(lang('igniter.cart::default.checkout.label_terms'), url($agreeTermsSlug)); ?>

            </label>
        </div>
        <?php echo form_error('terms_condition', '<span class="text-danger col-xs-12">', '</span>'); ?>

    </div>
<?php endif; ?>

<?php echo form_close(); ?>


