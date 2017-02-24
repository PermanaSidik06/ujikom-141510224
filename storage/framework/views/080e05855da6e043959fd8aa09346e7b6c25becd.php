<?php $__env->startSection('content'); ?>
<center>
                    <font><h1>Selamat datang <?php echo e(auth::user()->name); ?></h1></font>
                    <font><h1>Login Sebagai : <?php echo e(auth::user()->permision); ?></h1></font>
                    <font><h1>Alamat Email Anda : <?php echo e(auth::user()->email); ?></h1></font>
                
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>