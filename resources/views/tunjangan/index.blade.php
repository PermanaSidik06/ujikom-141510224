@extends('layouts/admin')
@section('content')
<center><h1>Tunjangan</h1></center>
        <table class="table table-striped table-bordered table-hover">
<a href="{{url('/tunjangan/create')}}"class="btn btn-primary form-control">Tambah Data</a>
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
		@php
		$no=1;
		@endphp
		@foreach($tunjangan as $tunjangans)
		<tr>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$tunjangans->kode_tunjangan}}</center></td>
			<td><center>{{$tunjangans->jabatanModel->nama_jabatan}}</center></td>
			<td><center>{{$tunjangans->golonganModel->nama_golongan}}</center></td>
			<td><center>{{$tunjangans->status}}</center></td>
			<td><center>{{$tunjangans->jumlah_anak}}</center></td>
			<td><center><?php echo 'Rp.' . number_format($tunjangans->besaran_uang,2,',','.') ?></center></td>


		<td><a href="{{route('tunjangan.edit',$tunjangans->id)}}"class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['tunjangan.destroy',$tunjangans->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection