<?php $__env->startSection('content'); ?>
<center><h1>Tunjangan</h1></center>
        <table class="table table-striped table-bordered table-hover">
<a href="<?php echo e(url('/tunjangan/create')); ?>"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="danger">
		<th>No</th>
		<th><center>kode tunjangan</center></th>
		<th><center>jabatan </center></th>
		<th><center>golongan </center></th>
		<th><center>status</center></th>
		<th><center>jumlah anak</center></th>
		<th><center>besaran uang</center></th>
		<th colspan="3"><center>Action</center></th>
	</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tunjangans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><center><?php echo e($no++); ?></center></td>
			<td><center><?php echo e($tunjangans->kode_tunjangan); ?></center></td>
			<td><center><?php echo e($tunjangans->jabatanModel->nama_jabatan); ?></center></td>
			<td><center><?php echo e($tunjangans->golonganModel->nama_golongan); ?></center></td>
			<td><center><?php echo e($tunjangans->status); ?></center></td>
			<td><center><?php echo e($tunjangans->jumlah_anak); ?></center></td>
			<td><center><?php echo 'Rp.' . number_format($tunjangans->besaran_uang,2,',','.') ?></center></td>


		<td><a href="<?php echo e(route('tunjangan.edit',$tunjangans->id)); ?>"class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['tunjangan.destroy',$tunjangans->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>