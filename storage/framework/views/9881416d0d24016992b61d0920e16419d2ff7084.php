<?php $__env->startSection('content'); ?>
<center><h1>Edit Lembur Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">
                        <?php echo Form::model($lembur_pegawai,['method'=>'PATCH','route'=>['lembur_pegawai.update',$lembur_pegawai->id]]); ?>

                    
                    <div class="col-md-12">
                        <?php echo Form::label('Kode Lembur', 'Kode Lembur'); ?>

                        <?php echo Form::text('kode_lembur_id',null,['class'=>'form-control','required']); ?>

                    </div>

                      <div class="col-md-6">
                                <label>NIP Sebelumnya</label>
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datap): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datap->id == $lembur_pegawai->pegawai_id): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datap->nip); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>

                            <div class="col-md-6">
                                <label>Pegawai Sebelumnya</label>
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datapp->id == $lembur_pegawai->pegawai_id): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datapp->User->name); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>

                    <div class="col-md-12">
                        <?php echo Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai '); ?>

                                    <select class="form-control" name="pegawai_id">
                                    <option>Pilih Nip dan Pegawai Baru</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($pegawais->id); ?>" >
                                            <?php echo e($pegawais->nip); ?> <?php echo e($pegawais->User->name); ?>

                                                </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>

                    </div>

                    <div class="col-md-12">
                        <?php echo Form::label('jumlah jam', 'jumlah jam'); ?>

                        <?php echo Form::text('jumlah_jam',null,['class'=>'form-control','required']); ?>

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