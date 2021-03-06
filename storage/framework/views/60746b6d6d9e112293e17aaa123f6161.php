<form
    id="location-search"
    method="POST"
    role="form"
    data-request="<?php echo e($searchEventHandler); ?>"
>
    <div class="input-group postcode-group">
        <span
            class="input-group-text"
            <?php if($searchDefaultAddress): ?>
            role="button"
            data-address-picker-control="new"
            <?php endif; ?>
        ><i class="fa fa-map-marker"></i></span>
        <input
            type="text"
            id="search-query"
            class="form-control text-center"
            name="search_query"
            placeholder="<?php echo app('translator')->get('igniter.local::default.label_search_query'); ?>"
            value="<?php echo e($__SELF__->getSearchQuery()); ?>"
        >
        <button
            type="button"
            class="btn btn-light"
            data-control="search-local"
            data-replace-loading="fa fa-spinner fa-spin"
        ><i class="fa fa-check"></i></button>
    </div>
</form>

