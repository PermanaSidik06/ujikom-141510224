<?php $__env->startSection('content'); ?>
<center><h1>Edit Jabatan</h1></center>
    <table class="table table-striped table-bordered table-hover">
        <table class="table table-hover table-striped ">
            <tr class="danger">
                     <?php echo Form::model($jabatan,['method'=>'PATCH','route'=>['jabatan.update',$jabatan->id]]); ?>

                    <div class="col-md-6">
                        <label>Kode Jabatan</label>
                        <input type="text" name="kode_jabatan" class="form-control" value="<?php echo e($jabatan->kode_jabatan); ?>" >
                       <?php if($errors->has('kode_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label>Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" value="<?php echo e($jabatan->nama_jabatan); ?>" >
                        <span class="help-block">
                            <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
                        </span>
                    </div>
                    <div class="col-md-12">
                        <label>Besaran Uang</label>
                        <input type="text" name="besaran_uang" class="form-control" value="<?php echo e($jabatan->besaran_uang); ?>" >
                        <span class="help-block">
                            <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                        </span>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12">
                        <?php echo Form::submit('SAVE', ['class' => 'btn btn-primary form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>