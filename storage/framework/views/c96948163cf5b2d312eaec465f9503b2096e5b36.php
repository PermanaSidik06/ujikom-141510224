<?php $__env->startSection('content'); ?>
<style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2 ">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3>Payroll Application</h3>
                <h5>HALAMAN WEB</h5>
                <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-center">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a class="" href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>


                <div class="panel-body" align="center">
                    
                    <a class="btn btn-primary form-control" href="<?php echo e(url('jabatan')); ?>">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('golongan')); ?>">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('pegawai')); ?>">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a><hr> 

                </div>
            </center>
        </div>
    </div>
</div>


<center>
        <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><center>Update Data Pegawai</center></h3> </div>
                        <div class="panel-body">
                        <?php echo Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update' ,$pegawai->id]]); ?>



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
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datajabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option  value="<?php echo e($datajabatan->id); ?>" ><?php echo e($datajabatan->nama_jabatan); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>

                                    <span><?php echo e($errors->first('nama_jabatan')); ?></span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
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
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

<style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2 ">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3>Payroll Application</h3>
                <h5>HALAMAN WEB</h5>
                <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-center">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a class="" href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>


                <div class="panel-body" align="center">
                    <a class="btn btn-primary form-control" href="<?php echo e(url('lembur_pegawai')); ?>">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('penggajian')); ?>">Penggajian Karyawan</a><hr>  

                </div>
            </center>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>