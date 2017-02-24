<?php $__env->startSection('content'); ?>
<center><h1>Data Pegawai</h1></center>
<hr>
        <table class="table table-striped table-bordered table-hover">

        <div class="panel-body">
                <div class="form-group"><center>
                    <form action="<?php echo e(url('/pegawai')); ?>/?name=name">
                    <input type="text" name="name" placeholder="Cari">
                    <input class="btn btn-sm btn-primary" type="submit" value="Cari"/></form>
                </center></div>

<a href="<?php echo e(url('/pegawai/create')); ?>"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>Nip</center></th>
		<th><center>Nama</center></th>
		<th><center>Email</center></th>
		<th><center>permision</center></th>
		<th colspan="2"><center>Jabatan dan golongan</center></th>
		<th><center>Foto</center></th>
		<th colspan="3"><center>Action</center></th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		 ?>
		<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<tr><center>
			<td><center><?php echo e($no++); ?></center></td>
			<td><center><?php echo e($pegawais->nip); ?></center></td>
			<td><center><?php echo e($pegawais->User->name); ?></center></td>
			<td><center><?php echo e($pegawais->User->email); ?></center></td>
			<td><center><?php echo e($pegawais->User->permision); ?></center></td>
			<td><center><?php echo e($pegawais->jabatanModel->nama_jabatan); ?></center></td>
			<td><center><?php echo e($pegawais->golonganModel->nama_golongan); ?></center></td>
			
	   <th><img  width="50px" height="50px" class="img-circle" src="assets/image/<?php echo e($pegawais->foto); ?>"></th>

		<td><a href="<?php echo e(route('pegawai.edit',$pegawais->id)); ?>"class="btn btn-warning">edit</a></td>	
		</td>

		<td>
		<?php echo Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$pegawais->id]]); ?>

		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		<?php echo Form::close(); ?>

		</td>
		</tr>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

	</tbody>
</table>
<center><?php echo e($searchuser->links()); ?></center>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>