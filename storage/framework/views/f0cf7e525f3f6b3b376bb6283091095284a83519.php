<?php $__env->startSection('content'); ?>

<div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <center>
                <h3>MY APPLICATION</h3>
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
                </div>

                <div class="panel-body" align="center">
                    <a class="btn btn-primary form-control" href="<?php echo e(url('jabatan')); ?>">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('golongan')); ?>">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('pegawai')); ?>">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('lembur_pegawai')); ?>">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="<?php echo e(url('penggajian')); ?>">Penggajian Karyawan</a><hr>  

                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h3>Tunjangan Karyawan</center></h3> </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/tunjangan_pegawai')); ?>">
                        <?php echo e(csrf_field()); ?>


                         <div class="col-md-12">
                                <label>Kode Tunjangan</label>
                                <select name="kode_tunjangan" class="form-control">
                                <option>Pilih Kode Tunjangan</option>
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

                        <div class="col-md-12">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                <option>Pilih Nama Pegawai</option>
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
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>