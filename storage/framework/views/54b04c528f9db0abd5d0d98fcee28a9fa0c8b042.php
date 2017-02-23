<?php $__env->startSection('content'); ?>

<center><h1>Data Golongan</h1></center>
		<table class="table table-striped table-bordered table-hover">

			<a href="<?php echo e(url('/golongan/create')); ?>"class="btn btn-primary form-control">Tambah Data</a><br><br>
			<?php echo e($golongan->links()); ?>

			
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode golongan</center></th>
		<th><center>nama golongan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr>
			<td><?php echo e($no++); ?></td>
			<td><?php echo e($golongans->kode_golongan); ?></td>
			<td><?php echo e($golongans->nama_golongan); ?></td>
			<td><center><?php echo 'Rp.' . number_format($golongans->besaran_uang,2,',','.') ?></center></td>
			
		<td><a href="<?php echo e(route('golongan.edit',$golongans->id)); ?>" class="btn btn-warning">Update</a></td>	
		</td>
		<th>
                                    <?php echo Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$golongans->id]]); ?>

                                    <?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>

                                </th>
		</tr>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>