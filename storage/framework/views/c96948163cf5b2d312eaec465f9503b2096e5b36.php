<?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Update</center></h3> </div>
                    <div class="panel-body">
                     <?php echo Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update' ,$pegawai->id]]); ?>

                        
                        <div class="col-md-12">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-6 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="name" class="form-control" name="name" value="<?php echo e($pegawai->user->name); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control"  name="email" value="<?php echo e($pegawai->user->email); ?>" >

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <label >Type User Lama</label>
                                   <input type="text" class="form-control" value="<?php echo e($user->permision); ?>" readonly>
                            </div>
                            
                            <div class="col-md-6">
                                <label >Type User</label>
                                   <select name="permision" class="col-md-6 form-control" required>
                                       <option value="">Pilih Type User</option>
                                       <option value="Admin">Admin</option>
                                       <option value="HRD">HRD</option>
                                       <option value="Bagian Administrasi">Bagian Administrasi</option>
                                       <option value="Pegawai">Pegawai</option>
                                   </select>
                                    <?php if($errors->has('permision')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('permision')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <label >Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <label >Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><center>Update Data Pegawai</center></h3> </div>
                        <div class="panel-body">

                         <div class="col-md-12">
                            <div class="form-group<?php echo e($errors->has('nip') ? ' has-error' : ''); ?>">
                            <label for="nip" class="control-label">NIP</label>

                           
                                <input id="nip" type="text" class="form-control" name="nip" value="<?php echo e($pegawai->nip); ?>"  autofocus>

                                <?php if($errors->has('nip')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <label>Jabatan Lama</label>
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datajabatan->id == $pegawai->jabatan_id): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datajabatan->nama_jabatan); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>

                            <div class="col-md-6">
                                <label>Golongan Lama</label>
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($datagolongan->id == $pegawai->golongan_id): ?>
                                    <input type="text" class ="form-control" value="<?php echo e($datagolongan->nama_golongan); ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="nama_jabatan">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <span><?php echo e($errors->first('nama_jabatan')); ?></span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="nama_golongan">
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datagolongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datagolongan->id); ?>" ><?php echo e($datagolongan->nama_golongan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('nama_golongan')): ?>
                                    <span class="help-block">
                                        <?php echo e($errors->first('nama_golongan')); ?>

                                    </span>
                                    <?php endif; ?>
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                      <input type="file" name="foto" value="<?php echo e(old('foto')); ?>" required ></input>

                                    <?php if($errors->has('foto')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('foto')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                            </div>

                            <div class="col-md-6"></div>

                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary form-control">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>