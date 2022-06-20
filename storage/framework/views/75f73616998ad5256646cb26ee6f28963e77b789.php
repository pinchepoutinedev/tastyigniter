                    <?php if($out_of_stock->contains($value)): ?>
                        <a class="btn font-weight-bold p-0 text-danger" href="<?php echo e($out_of_stock_url.'/stock/'.$value); ?>"><?php echo app('translator')->get('thoughtco.outofstock::default.button_stock'); ?></a>
                    <?php else: ?>
                        <button class="btn font-weight-bold p-0 dropdown-toggle text-secondary" type="button" data-toggle="dropdown"><?php echo app('translator')->get('thoughtco.outofstock::default.button_nostock'); ?></button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <?php $__currentLoopData = $out_of_stock_delays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a class="dropdown-item" href="<?php echo e($out_of_stock_url.'/nostock/'.$value.'?hours='.$delay['time']); ?>"><?php echo e($delay['label']); ?></a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    <?php if($out_of_stock_location): ?><a class="dropdown-item" href="<?php echo e($out_of_stock_url.'/nostock/'.$value.'?hours=closing'); ?>"><?php echo app('translator')->get('thoughtco.outofstock::default.button_closing'); ?></a><?php endif; ?>
						    <a class="dropdown-item" href="<?php echo e($out_of_stock_url.'/nostock/'.$value); ?>"><?php echo app('translator')->get('thoughtco.outofstock::default.button_forever'); ?></a>
						</div>
                    <?php endif; ?>
<?php /**PATH extensions/thoughtco/outofstock/views/form/stock_column.blade.php ENDPATH**/ ?>