<?php if($reviewable): ?>
    <h4 class="text-center fw-normal">
        <?php if($customerReview): ?>
            <?php echo app('translator')->get('igniter.local::default.review.text_your_review'); ?>
        <?php else: ?>
            <?php echo app('translator')->get('igniter.local::default.review.text_write_review'); ?>
        <?php endif; ?>
    </h4>
    <form
        role="form"
        method="POST"
        accept-charset="utf-8"
        <?php echo $customerReview ? '' : 'data-request="'.$__SELF__.'::onLeaveReview"'; ?>

    >
        <div class="d-flex text-center">
            <div class="form-group flex-fill">
                <label
                    class="form-label d-block"
                    for="quality"
                ><?php echo app('translator')->get('igniter.local::default.review.label_quality'); ?></label>
                <div
                    class="h4"
                    data-control="star-rating"
                    data-score="<?php echo e($customerReview ? $customerReview->quality : set_radio('rating[quality]')); ?>"
                    data-hints='<?php echo json_encode(array_values($reviewRatingHints), 15, 512) ?>'
                    data-score-name="rating[quality]"
                    <?php echo $customerReview ? 'data-read-only="true"' : ''; ?>

                >
                    <div class="rating rating-star text-warning"></div>
                </div>
                <?php echo form_error('rating.quality', '<span class="text-danger">', '</span>'); ?>

            </div>
            <div class="form-group flex-fill">
                <label
                    class="form-label d-block"
                    for="delivery"
                ><?php echo app('translator')->get('igniter.local::default.review.label_delivery'); ?></label>
                <div
                    class="h4"
                    data-control="star-rating"
                    data-score="<?php echo e($customerReview ? $customerReview->delivery : set_radio('rating[quality]')); ?>"
                    data-hints='<?php echo json_encode(array_values($reviewRatingHints), 15, 512) ?>'
                    data-score-name="rating[delivery]"
                    <?php echo $customerReview ? 'data-read-only="true"' : ''; ?>

                >
                    <div class="rating rating-star text-warning"></div>
                </div>
                <?php echo form_error('rating.delivery', '<span class="text-danger">', '</span>'); ?>

            </div>
            <div class="form-group flex-fill">
                <label
                    class="form-label d-block"
                    for="service"
                ><?php echo app('translator')->get('igniter.local::default.review.label_service'); ?></label>
                <div
                    class="h4"
                    data-control="star-rating"
                    data-score="<?php echo e($customerReview ? $customerReview->service : set_radio('rating[quality]')); ?>"
                    data-hints='<?php echo json_encode(array_values($reviewRatingHints), 15, 512) ?>'
                    data-score-name="rating[service]"
                    <?php echo $customerReview ? 'data-read-only="true"' : ''; ?>

                >
                    <div class="rating rating-star text-warning"></div>
                </div>
                <?php echo form_error('rating.service', '<span class="text-danger">', '</span>'); ?>

            </div>
        </div>
        <?php if(!$customerReview): ?>
            <div class="form-group">
                <label
                    for="review-text"
                ><?php echo app('translator')->get('igniter.local::default.review.label_review'); ?></label>
                <textarea
                    name="review_text"
                    id="review-text"
                    rows="5"
                    class="form-control"
                ><?php echo e(set_value('review_text')); ?></textarea>
                <?php echo form_error('review_text', '<span class="text-danger">', '</span>'); ?>

            </div>

            <div class="buttons">
                <button
                    type="submit"
                    class="btn btn-light btn-block text-primary"
                    data-attach-loading=""
                ><?php echo app('translator')->get('igniter.local::default.review.button_review'); ?></button>
            </div>
        <?php else: ?>
            <div class="form-group text-center">
                <p class="lead"><?php echo e($customerReview->review_text); ?></p>
            </div>
        <?php endif; ?>
    </form>
<?php endif; ?>

