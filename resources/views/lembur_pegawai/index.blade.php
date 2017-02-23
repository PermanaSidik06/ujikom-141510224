@extends('layouts.admin')
@section('content')
<center><h1>Data Lembur Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">

<a href="{{url('/lembur_pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur </center></th>
		<th colspan="2"><center>Nip Dan Nama Pegawai</center></th>
		<th><center>jumlah jam</center></th>
		
		<th colspan="3"><center>Action</center></th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($lembur_pegawai as $lembur_pegawais)
		<tr>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$lembur_pegawais->kode_lembur_id}}</center></td>
			<td><center>{{$lembur_pegawais->pegawaiModel->nip}}</center></td>
			<td><center>{{$lembur_pegawais->pegawaiModel->user->name}}<center></td>
			<td><center>{{$lembur_pegawais->jumlah_jam}}<center></td>
			
		<td><center><a href="{{route('lembur_pegawai.edit',$lembur_pegawais->id)}}" class="btn btn-warning">Update</center></a></td>	
		</td>
		<td><center>
		{!!Form::open(['method'=>'DELETE','route'=>['lembur_pegawai.destroy',$lembur_pegawais->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</center></td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection