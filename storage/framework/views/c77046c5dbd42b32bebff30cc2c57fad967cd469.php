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
                    <div class="panel-heading"><h3><center>Tambah Lembur Karyawan</center></h3> </div>
                    <div class="panel-body">
                         <?php echo Form::open(['url'=>'lembur_pegawai']); ?>

                    <div class="col-md-6">
                   <label>Kode Lembur</label>
                    <select name="kode_lembur_id" class="form-control" required>
                        <?php $__currentLoopData = $katlembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_lembur); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>
                        </div>
                    <div class="col-md-6">
                        <?php echo Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai '); ?>

                                    <select class="form-control" name="pegawai_id">
                                    <option>Pilih NIP dan Nama Pegawai</option>
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