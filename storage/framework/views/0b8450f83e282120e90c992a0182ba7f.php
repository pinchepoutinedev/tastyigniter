<?php if($paymentGateways): ?>
    <div class="row payments">
        <div class="col-sm-8">
            <div class="form-group">
                <label for=""><?php echo app('translator')->get('igniter.cart::default.checkout.label_payment_method'); ?></label><br/>
                <input type="hidden" name="payment" value=""/>
                <div
                    data-toggle="payments"
                    class="progress-indicator-container"
                >
                    <div class="list-group">
                        <?php $__currentLoopData = $paymentGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentGateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $paymentIsSelected = ($order->payment == $paymentGateway->code);
                                $paymentIsNotApplicable = !$paymentGateway->isApplicable($order->order_total, $paymentGateway);
                            ?>
                            <div
                                class="list-group-item<?php echo e($paymentIsSelected ? ' bg-light' : ''); ?><?php echo e($paymentIsNotApplicable ? ' disabled' : ''); ?>"
                            >
                                <div
                                    class="form-check"
                                    data-checkout-control="choose-payment"
                                    data-payment-code="<?php echo e($paymentGateway->code); ?>"
                                >
                                    <input
                                        type="radio"
                                        id="payment-<?php echo e($paymentGateway->code); ?>"
                                        class="form-check-input"
                                        name="payment"
                                        value="<?php echo e($paymentGateway->code); ?>"
                                        <?php echo $paymentIsSelected ? 'checked="checked"' : ''; ?>

                                        <?php echo $paymentIsNotApplicable ? 'disabled="disabled"' : ''; ?>

                                        data-pre-validate-checkout="<?php echo e($paymentGateway->completesPaymentOnClient() ? 'true' : 'false'); ?>"
                                        autocomplete="off"
                                    />
                                    <label
                                        class="form-check-label d-block"
                                        for="payment-<?php echo e($paymentGateway->code); ?>"
                                    ><?php echo e($paymentGateway->name); ?></label>
                                    <?php if(strlen($paymentGateway->description)): ?>
                                        <p class="hide small fw-normal mb-0">
                                            <?php echo $paymentGateway->description; ?>

                                        </p>
                                    <?php endif; ?>
                                    <?php if($paymentIsNotApplicable): ?>
                                        <p class="small fw-normal mb-0">
                                            <em>
                                                <?php echo sprintf(
                                                    lang('igniter.payregister::default.alert_min_order_total'),
                                                    currency_format($paymentGateway->order_total),
                                                    lang('igniter.payregister::default.text_this_payment')
                                                ); ?>

                                            </em>
                                        </p>
                                    <?php endif; ?>
                                    <?php if($paymentGateway->hasApplicableFee()): ?>
                                        <p class="small fw-normal mb-0">
                                            <em>
                                                <?php echo sprintf(
                                                    lang('igniter.payregister::default.alert_order_fee'),
                                                    $paymentGateway->getFormattedApplicableFee(),
                                                    lang('igniter.payregister::default.text_this_payment')
                                                ); ?>

                                            </em>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <?php if($paymentIsSelected): ?>
                                    <?php echo $paymentGateway->renderPaymentForm($this->controller); ?>

                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php echo form_error('payment', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
    </div>
<?php endif; ?>

