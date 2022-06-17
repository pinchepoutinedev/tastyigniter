<div class="py-3 px-4 border-top border-bottom">
    <form
        id="menu-search"
        method="GET"
        role="form"
        action="<?php echo e(current_url()); ?>"
    >
        <div class="input-group">
            <?php if(strlen($menuSearchTerm)): ?>
                <a
                    class="btn btn-light"
                    href="<?php echo e(current_url()); ?>"
                ><i class="fa fa-times"></i></a>
            <?php else: ?>
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            <?php endif; ?>
            <input
                type="search"
                class="form-control"
                name="q"
                placeholder="<?php echo app('translator')->get('igniter.local::default.label_menu_search'); ?>"
                value="<?php echo e($menuSearchTerm); ?>"
                autocomplete="off"
            >
        </div>
    </form>
</div>

