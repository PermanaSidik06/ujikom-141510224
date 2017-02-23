<?php $__env->startSection('content'); ?>
<center><h1>Update Tunjangan Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">
                     <?php echo Form::model($tunjangan_pegawai,['method'=>'PATCH','route'=>['tunjangan_pegawai.update',$tunjangan_pegawai->id]]); ?>


                        <div class="col-md-6">
                                <label>Kode Tunjangan Sebelumnya</label>
                                <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datap): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datap->id == $tunjangan_pegawai->kode_tunjangan): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datap->kode_tunjangan); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>

                        <div class="col-md-6">
                                <label>Pegawai Sebelumnya</label>
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datapp->id == $tunjangan_pegawai->pegawai_id): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datapp->User->name); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                        
                        <div class="col-md-6">
                                <label>Kode Tunjangan</label>
                                <select name="kode_tunjangan" class="form-control">
                                <option>Pilih Kode Baru</option>
                                <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datatunjangan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($datatunjangan->id); ?>">
                                        <?php echo e($datatunjangan->kode_tunjangan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                    </span>
                        </div>

                        <div class="col-md-6">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                <option>Pilih Pegawai Baru</option>
                                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapegawai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($datapegawai->id); ?>">
                                        <?php echo e($datapegawai->User->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('pegawai_id')); ?></strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Update</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>