@extends('layouts.admin')
@section('content')
<center><h1>Data Kategori Lembur</h1></center>
        <table class="table table-striped table-bordered table-hover">

<a href="{{url('/kategori_lembur/create')}}"class="btn btn-primary form-control">Tambah Data</a>
<br><br>
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode lembur</center></th>
		<th><center>jabatan </center></th>
		<th><center>golongan </center></th>
		<th><center>besaran uang </center></th>
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($kategori_lembur as $kategori_lemburs)
		<tr><center>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$kategori_lemburs->kode_lembur}}</center></td>
			<td><center>{{$kategori_lemburs->jabatanModel->nama_jabatan}}</center></td>
			<td><center>{{$kategori_lemburs->golonganModel->nama_golongan}}</center></td>
			<td><center><?php echo 'Rp.' . number_format($kategori_lemburs->besaran_uang,2,',','.') ?></center></td>
			
		<td><a href="{{route('kategori_lembur.edit',$kategori_lemburs->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<td>
		{!!Form::open(['method'=>'DELETE','route'=>['kategori_lembur.destroy',$kategori_lemburs->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</td>
		</tr>
		</div>
		@endforeach

	</tbody>
</table>

@endsection