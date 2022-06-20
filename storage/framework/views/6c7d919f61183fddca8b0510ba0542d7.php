<div
    data-control="checkout"
    data-choose-payment-handler="<?php echo e($choosePaymentEventHandler); ?>"
    data-delete-payment-handler="<?php echo e($deletePaymentEventHandler); ?>"
    data-validate-handler="<?php echo e($validateCheckoutEventHandler); ?>"
    data-partial="checkoutForm"
>
    <?php echo controller()->renderPartial($isMultiStepCheckout ? '@multi_step_form' : '@form'); ?>
</div>

