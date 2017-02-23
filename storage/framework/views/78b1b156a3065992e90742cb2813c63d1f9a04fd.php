<?php $__env->startSection('content'); ?>

<center><h1>Data Jabatan</center></h1>
	<table class="table table-striped table-bordered table-hover">
    <!-- <table class="table table-default"> -->
		<table class="table table-hover table-striped ">
			<tr class="danger">
				<a href="<?php echo e(url('/jabatan/create')); ?>"class="btn btn-primary form-control">Tambah Data</a><br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode jabatan</center></th>
		<th><center>nama jabatan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($jabatans->kode_jabatan); ?></td>
			<td><?php echo e($jabatans->nama_jabatan); ?></td>
            <td><center><?php echo 'Rp.' . number_format($jabatans->besaran_uang,2,',','.') ?></center></td>
			
		<td><a href="<?php echo e(route('jabatan.edit',$jabatans->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<td>

		<?php echo Form::open(['method'=>'DELETE','route'=>['jabatan.destroy',$jabatans->id]]); ?>

		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php echo e($jabatan->links()); ?>


	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>