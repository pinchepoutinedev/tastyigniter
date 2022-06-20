<?php
    $activeTab = $activeTab ? $activeTab : '#'.$tabs->section.'tab-1';
?>
<div class="tab-heading">
    <ul class="form-nav nav nav-tabs">
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a
                    class="nav-link<?php echo e((('#'.$tabs->section.'tab-'.$loop->iteration) == $activeTab) ? ' active' : ''); ?>"
                    href="<?php echo e('#'.$tabs->section.'tab-'.$loop->iteration); ?>"
                    data-bs-toggle="tab"
                ><?php echo app('translator')->get($name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<div class="tab-content">
    <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
            class="tab-pane <?php echo e((('#'.$tabs->section.'tab-'.$loop->iteration) == $activeTab) ? 'active' : ''); ?>"
            id="<?php echo e($tabs->section.'tab-'.$loop->iteration); ?>">
            <div class="form-fields">
                <?php if($loop->iteration == 1): ?>
                    <div class="row w-100">
                        <div class="col-md-9">
                            <?php if(isset($fields['order_menus'])): ?>
                                <div class="card bg-light shadow-sm mb-2 p-2">
                                    <?php echo $this->renderFieldElement($fields['order_menus']); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(isset($fields['order_details'])): ?>
                                <div class="card bg-light shadow-sm mb-2 p-2">
                                    <?php echo $this->renderFieldElement($fields['order_details']); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 px-md-0">
                            <?php if($formModel->comment): ?>
                                <div class="card bg-light shadow-sm mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo app('translator')->get('admin::lang.orders.label_comment'); ?></h5>
                                        <p class="mb-0"><?php echo e($formModel->comment); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="card bg-light shadow-sm mb-2">
                                <?php if(isset($fields['customer'])): ?>
                                    <?php echo $this->renderFieldElement($fields['customer']); ?>

                                <?php endif; ?>
                            </div>
                            <?php if(isset($fields['location'])): ?>
                                <div class="card bg-light shadow-sm mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo app('translator')->get($fields['location']->label); ?></h5>
                                        <?php echo $this->renderFieldElement($fields['location']); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php echo $this->makePartial('form/form_fields', ['fields' => $fields]); ?>

                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/pinchepoutine.dev/tastyigniter/app/admin/views/orders/form/form_tabs.blade.php ENDPATH**/ ?>