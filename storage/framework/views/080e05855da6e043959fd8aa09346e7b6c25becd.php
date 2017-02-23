<?php $__env->startSection('content'); ?>
<center>
                <h3>MY APPLICATION</h3>
                    <h5>SELAMAT DATANG <?php echo e(auth::user()->name); ?></h5>
                </div>
            </div>
        </div>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>