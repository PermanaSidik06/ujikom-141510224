@extends('layouts.admin')
@section('content')

<center><h1>Data Jabatan</center></h1>
	<table class="table table-striped table-bordered table-hover">
    <!-- <table class="table table-default"> -->
		<table class="table table-hover table-striped ">
			<tr class="danger">
				<a href="{{url('/jabatan/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode jabatan</center></th>
		<th><center>nama jabatan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3"><center>Action</center></th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($jabatan as $jabatans)
		<tr>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$jabatans->kode_jabatan}}</center></td>
			<td><center>{{$jabatans->nama_jabatan}}</center></td>
            <td><center><?php echo 'Rp.' . number_format($jabatans->besaran_uang,2,',','.') ?></center></td>
			
		<td><center><a href="{{route('jabatan.edit',$jabatans->id)}}" class="btn btn-warning">Update</a></center></td>	
		</td>
		<td><center>

		{!!Form::open(['method'=>'DELETE','route'=>['jabatan.destroy',$jabatans->id]])!!}
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
        </center>
		</td>
		</tr>
		
		@endforeach
{{$jabatan->links()}}

	</tbody>
</table>




@endsection