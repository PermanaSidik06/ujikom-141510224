<?php $__env->startSection('content'); ?>

<center><h1>Tambah Golongan</h1></center>
        <table class="table table-striped table-bordered table-hover">

                     <?php echo Form::open(['url' => 'golongan']); ?>

                    <div class="col-md-6">
                        <?php echo Form::label('kode golongan', 'kode golongan'); ?>

                        <?php echo Form::text('kode_golongan',null,['class'=>'form-control']); ?>


                        <?php if($errors->has('kode_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo Form::label('Nama golongan', 'Nama golongan'); ?>

                        <?php echo Form::text('nama_golongan',null,['class'=>'form-control']); ?>

                        <?php if($errors->has('nama_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <?php echo Form::label('besaran uang', 'besaran uang'); ?>

                        <?php echo Form::text('besaran_uang',null,['class'=>'form-control']); ?>

                        <?php if($errors->has('besaran_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    &nbsp;
                    <div class="col-md-12">
                        <?php echo Form::submit('SAVE', ['class' => 'btn btn-primary form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>